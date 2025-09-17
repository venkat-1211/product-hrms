<?php

namespace Modules\Hrm\Repositories;


use Modules\Hrm\Repositories\Interfaces\HrmRepositoryInterface;
use Modules\SuperAdmin\Models\Package;
use Modules\Common\Models\Module;
use Modules\Hrm\Models\Department;
use Modules\Hrm\Models\Designation;
use Modules\Common\Data\GenericFormData;
use DB;
use Modules\Common\Helpers\FileHelper;
use Modules\Auth\Models\Permission;
use Modules\Auth\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Modules\Common\Helpers\ViewHelper;
use Storage;


class HrmRepository implements HrmRepositoryInterface
{
    public function companyPermissions() : object
    {
        // Get current company from route
        $company = request()->route('company');

        // Only fetch modules assigned to this company's package
        $package = $company->package_id;

        $package = Package::find($package);

        if (!$package) {
            return [];
        }

        $moduleIds = $package->modules->pluck('id');

        // Step 1: Get all allowed modules (children)
        $childModules = Module::with('childrenRecursive')
            ->select(['id', 'name', 'slug'])
            ->whereIn('id', $moduleIds)
            ->where('is_active', true)
            ->orderBy('id')
            ->get();

        return $childModules;
    }

    public function departments() : object
    {
        $departments = Department::all();
        return $departments;
    }

    public function getDesignationsByDepartmentId($department) : object
    {
        $designations = $department->designations()->select('id', 'display_name')->orderBy('display_name')->get();
        return $designations;
    }

    // Employees
    public function getEmployees() : object
    {
        $allEmployees = collect(); // Initialize an empty collection

        User::with(['profile', 'company'])
            ->whereHas('company', function ($query) {
                $query->where('company_id', auth()->user()->company_id);
            })
            ->chunkById(100, function ($chunk) use (&$allEmployees) {
                $allEmployees->push(...$chunk);
            });

        return $allEmployees;
    }

    public function employeesDataTable()
    {
        // Base query: only user table columns
        $data = User::with(['profile', 'designations', 'departments'])
            ->select(['id', 'email', 'status', 'created_at'])
            ->whereHas('company', function ($query) {
                $query->where('company_id', auth()->user()->company_id);
            });
    
        return DataTables::of($data)
            ->addColumn('checkbox', fn($row) => '
                <div class="form-check form-check-md">
                    <input class="form-check-input" type="checkbox" value="' . $row->id . '">
                </div>
            ')
            ->addColumn('employee_id', fn($row) => e(optional($row->profile)->employee_id ?? '-'))
            ->addColumn('name', function ($row) {
                $logoUrl = $row->profile && $row->profile->profile_image
                    ? Storage::url($row->profile->profile_image)
                    : Storage::url('assets/img/users/profile/user.png'); // fallback
    
                return '<h6 class="fw-medium mb-0">
                            <a href="#">
                                <img src="' . e($logoUrl) . '" alt="profile image" width="40" class="me-2 rounded-circle">
                                ' . e(optional($row->profile)->first_name . ' ' . optional($row->profile)->last_name) . '
                            </a>
                        </h6>
                        <small class="text-muted">
                            ' . e($row->departments->pluck('display_name')->join(', ') ?: '-') . '
                        </small>';
            })
            ->addColumn('email', fn($row) => e($row->email ?? '-'))
            ->addColumn('phone', fn($row) => e(optional($row->profile)->phone_number ?? '-'))
            ->addColumn('designation', fn($row) => e($row->designations->pluck('display_name')->join(', ') ?: '-'))
            ->addColumn('join_date', fn($row) => e(optional($row->profile)->joining_date ?? '-'))
            ->addColumn('status', function ($row) {
                return view('common::components.status-badge', [
                    'color' => $row->status_color,
                    'icon'  => $row->status_icon,
                    'label' => $row->status
                ])->render();
            })
            ->addColumn('action', function ($row) {
                return view('common::components.action', [
                    'target' => ['edit_employee', 'delete_modal'],
                    'list'   => ['edit', 'delete'],
                    'id'     => $row->id
                ])->render();
            })
            ->rawColumns(['checkbox', 'employee_id', 'name', 'status', 'action'])
            ->make(true);
    }
    
/*************  ✨ Windsurf Command ⭐  *************/
    /**
     * Store a newly created employee in storage.
     *
     * @param  \Modules\Common\Http\Requests\AddEmployeeRequest  $request
     * @param  \Modules\Common\Data\HandleFormSubmission  $handler
     * @param  \Modules\SuperAdmin\Models\Company  $company
     * @return \Modules\Auth\Models\User
     */
/*******  4ef71efe-7e4f-444a-9d1b-ac2c7a510e50  *******/
    public function employeeStore($request, $handler, $company) : object
    {
        $genericFormData = GenericFormData::fromRequest($request, ['profile_image', 'first_name', 'last_name', 'employee_id', 'joining_date', 'phone_number', 'address', 'about', 'username', 'email','password','confirm_password','department_id','designation_id','permissions'], ['company_id' => $company->id]);

        // Users table
        $userData = [
            'username' => $genericFormData->get('username'),
            'email' => $genericFormData->get('email'),
            'password' => $genericFormData->get('password'),
            'company_id' => $company->id
        ];
        $userData = GenericFormData::fromArray($userData);
        $user = $handler->create($userData, 'Auth', 'User');

        // Profile table
        // File Upload
        $profilePath = FileHelper::UploadFile($request->file('profile_image'), 'assets/img/users/profile');
        $profileData = [
            'user_id' => $user->id, 
            'profile_image' => $profilePath ?? '',
            'first_name' => $genericFormData->get('first_name'),
            'last_name' => $genericFormData->get('last_name'),
            'employee_id' => $genericFormData->get('employee_id'),
            'joining_date' => $genericFormData->get('joining_date'),
            'phone_number' => $genericFormData->get('phone_number'),
            'address' => json_encode([
                'address' => $genericFormData->get('address')
            ]),
            'about' => $genericFormData->get('about'),
        ];
        $profileData = GenericFormData::fromArray($profileData);
        $profile = $handler->create($profileData, 'Auth', 'Profile');

        // User depatment store
        $user->departments()->sync([$genericFormData->get('department_id')]);

        // User designation store
        $user->designations()->sync([$genericFormData->get('designation_id')]);

        // user roles set
        $user->addRole($genericFormData->get('designation_id'), $genericFormData->get('company_id'));

        // user_permissions set
        $permissionNames = $genericFormData->get('permissions');
        $permissions = Permission::whereIn('name', $permissionNames)->get();
        
        $permissionIds = $permissions->pluck('id');
        foreach ($permissionIds as $permissionId) {
            DB::table('permission_user')->updateOrInsert([
                'permission_id' => $permissionId,
                'user_id'      => $user->id,
                'user_type'     => 'Modules\Auth\Models\User',
                'company_id'    => $genericFormData->get('company_id'),
            ]);
        }

        return $user;
    }
}