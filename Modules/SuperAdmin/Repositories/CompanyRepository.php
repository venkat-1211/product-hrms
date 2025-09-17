<?php

namespace Modules\SuperAdmin\Repositories;


use Modules\SuperAdmin\Repositories\Interfaces\CompanyRepositoryInterface;
use Modules\Common\Data\GenericFormData;
use Modules\SuperAdmin\Models\Company;
use Modules\SuperAdmin\Models\Package;
use Modules\Common\Helpers\FileHelper;
use Modules\Auth\Models\Role;
use Modules\Auth\Models\Permission;
use DB;
use Yajra\DataTables\Facades\DataTables;
use Modules\Common\Helpers\ViewHelper;
use Storage;
use Modules\Common\Repositories\Interfaces\CommonRepositoryInterface;

class CompanyRepository implements CompanyRepositoryInterface
{
    public function all() {
        $allCompanies = collect();
    
        Company::with(['package', 'user'])
            ->select(['id', 'name', 'logo', 'account_url', 'type', 'status', 'created_at'])
            ->chunkById(100, function ($chunk) use (&$allCompanies) {
                $allCompanies->push(...$chunk);
            });
    
        return $allCompanies;
    }

    public function store($request, $handler) {
        $genericFormData = GenericFormData::fromRequest($request, ['name', 'email', 'password', 'logo', 'account_url', 'phone', 'address', 'website', 'package_id', 'type', 'currency', 'status']);

        // Comapny Data Add
        // File Upload
        $logoPath = FileHelper::UploadFile($request->file('logo'), 'assets/img/company');
        $company_data = [
            'name' => $genericFormData->get('name'),
            'logo' => $logoPath ?? '',
            'account_url' => $genericFormData->get('account_url'),
            'phone' => $genericFormData->get('phone'),
            'address' => $genericFormData->get('address'),
            'website' => $genericFormData->get('website'),
            'package_id' => $genericFormData->get('package_id'),
            'type' => $genericFormData->get('type'),
            'currency' => $genericFormData->get('currency'),
            'status' => $genericFormData->get('status')
        ];
        $comapny_final_data = GenericFormData::fromArray($company_data);
        $companyModel = $handler->create($comapny_final_data, 'SuperAdmin', 'Company');

        // Add Company Owner for user table
        $user_data = [
            'username' => $genericFormData->get('name'),
            'email' => $genericFormData->get('email'),
            'password' => $genericFormData->get('password'),
            'company_id' => $companyModel->id
        ];

        $user_final_data = GenericFormData::fromArray($user_data);
        $userModel = $handler->create($user_final_data, 'Auth', 'User');

        // Add User Role
        $ceoRole = Role::where('name', 'ceo')->first();

        // permission _role
        // Modules fetch
        $package = Package::with('modules')->findOrFail($genericFormData->get('package_id'));

        $permissionNames = $package->modules->pluck('name')
        ->when($package->ui_customize, fn($names) => $names->push('ui-access')); // assuming `modules.name` matches permission `name`

        $permissions = Permission::whereIn('name', $permissionNames)->get();
        
        $permissionIds = $permissions->pluck('id');
    
        $ceoRole = Role::where('name', 'ceo')->first();

        // Add User Role
        $userModel->addRole($ceoRole, $companyModel->id);
        
        foreach ($permissionIds as $permissionId) {
            DB::table('permission_role')->updateOrInsert([
                'role_id'       => $ceoRole->id,
                'permission_id' => $permissionId,
                'company_id'    => $companyModel->id, // Your team context
            ]);
        }

        // Add prefix
        $commonRepository = app(CommonRepositoryInterface::class);
        $commonRepository->startPrefix($handler, $companyModel);

        return redirect()->route('companies')->with('success', 'Company added successfully!');
    }

    public function dataTable()
    {
        $data = Company::with(['package', 'user'])->select(['id', 'name', 'logo', 'account_url', 'type', 'status', 'created_at', 'package_id']);

        return DataTables::of($data)
            ->addColumn('checkbox', fn($row) => '
                <div class="form-check form-check-md">
                    <input class="form-check-input" type="checkbox" value="' . $row->id . '">
                </div>
            ')
            ->addColumn('name', function ($row) {
                $logoUrl = $row->logo ? Storage::url($row->logo) : asset('assets/img/logo.svg'); // fallback
                return '<h6 class="fw-medium">
                            <a href="#">
                                <img src="' . e($logoUrl) . '" alt="company logo" width="40" class="me-2">
                                ' . e($row->name) . '
                            </a>
                        </h6>';
            })
            ->addColumn('email', fn($row) => optional($row->user)->email ?? '-')
            ->addColumn('account_url', fn($row) => e($row->account_url))
            ->addColumn('plan', fn($row) =>
                optional($row->package)->name
                    ? e($row->package->name . ' (' . $row->type . ')')
                    : '-'
            )
            ->addColumn('created_at', fn($row) => ViewHelper::formatCustomDate($row->created_at))
            ->addColumn('status', function ($row) {
                return view('common::components.status-badge', [
                    'color' => $row->status_color,
                    'icon' => $row->status_icon,
                    'label' => $row->status
                ])->render();
            })
            ->addColumn('action', function ($row) {
                return view('common::components.action', [
                    'target' => ['edit_company', 'delete_modal'],
                    'list' => ['edit', 'delete'],
                    'id' => $row->id
                ])->render();
            })
            ->rawColumns(['checkbox', 'name', 'email', 'account_url', 'plan', 'created_at', 'status', 'action'])
            ->make(true);
    }
}