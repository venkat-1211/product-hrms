<?php

namespace Modules\SuperAdmin\Repositories;


use Modules\SuperAdmin\Repositories\Interfaces\PackageRepositoryInterface;
use Modules\Common\Data\GenericFormData;
use Modules\SuperAdmin\Models\Package;
use Yajra\DataTables\Facades\DataTables;
use Modules\Common\Helpers\ViewHelper;

class PackageRepository implements PackageRepositoryInterface
{

    public function dataTable()
    {
        $data = Package::select([
            'id', 'name', 'type', 'currency', 'price', 'status', 'created_at'
        ]);
    
        return DataTables::of($data)
            ->addColumn('checkbox', fn($row) => '
                <div class="form-check form-check-md">
                    <input class="form-check-input" type="checkbox" value="' . $row->id . '">
                </div>
            ')
            ->addColumn('name', fn($row) => '<h6 class="fw-medium"><a href="#">' . e($row->name) . '</a></h6>')
            ->addColumn('type', fn($row) => e($row->type))
            ->addColumn('subscribers', fn($row) => 0)
            ->addColumn('price', fn($row) => ViewHelper::currencySymbol($row->currency) . number_format($row->price, 2))
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
                    'target' => ['edit_plans', 'delete_modal'],
                    'list' => ['edit', 'delete'],
                    'id' => $row->id
                ])->render();
            })
            ->rawColumns(['checkbox', 'name', 'status', 'action'])
            ->make(true);
    }

    public function all() {
        $allPackages = collect(); // Initialize an empty collection

        Package::select(['id', 'name', 'type', 'price', 'discount','currency', 'status', 'created_at'])
            ->chunkById(100, function ($chunk) use (&$allPackages) {
                $allPackages->push(...$chunk);
            });

        return $allPackages;
    }

    public function allActivePackages() {
        $allPackages = collect(); // Initialize an empty collection

        Package::select(['id', 'name', 'type', 'price', 'discount','currency', 'status', 'created_at'])
            ->active()
            ->chunkById(100, function ($chunk) use (&$allPackages) {
                $allPackages->push(...$chunk);
            });

        return $allPackages;
    }

    public function allWithRoles() {
        $allPackages = collect(); // Initialize an empty collection

        Package::with('roles')->select(['id', 'name', 'type', 'price', 'discount','currency', 'status', 'created_at'])
            ->chunkById(100, function ($chunk) use (&$allPackages) {
                $allPackages->push(...$chunk);
            });

        return $allPackages;
    }

    public function allWithModules() {
        $allPackages = collect(); // Initialize an empty collection

        Package::with('modules')->select(['id', 'name', 'type', 'price', 'discount','currency', 'status', 'created_at'])
            ->chunkById(100, function ($chunk) use (&$allPackages) {
                $allPackages->push(...$chunk);
            });

        return $allPackages;
    }

    public function allWithDepartments() {
        $allDepartments = collect(); // Initialize an empty collection

        Package::with('departments')->select(['id', 'name', 'type', 'price', 'discount','currency', 'status', 'created_at'])
            ->chunkById(100, function ($chunk) use (&$allDepartments) {
                $allDepartments->push(...$chunk);
            });

        return $allDepartments;
    }

    public function allWithModulesAndRoles() {
        $allPackages = collect(); // Initialize an empty collection

        Package::Select(
                'id',
                'name',
                'type',
                'price',
                'discount',
                'currency',
                'max_users',
                'ui_customize',
                'access_trial',
                'is_recommended',
                'status',
                'created_at',
            )
            ->withCount(['modules', 'roles'])
            ->chunkById(100, function ($chunk) use (&$allPackages) {
                $allPackages->push(...$chunk);
            });

        return $allPackages;
    }

    public function store($request, $handler)
    {
        $plan_data = GenericFormData::fromRequest($request, ['name', 'type', 'position', 'price', 'currency', 'discount_type', 'discount', 'description', 'limitation_invoices','max_users','product','supplier','access_trial','trial_days','is_recommended','ui_customize','status', 'modules', 'roles', 'departments']);
        $packageModel = $handler->create($plan_data, 'SuperAdmin', 'Package');

        $packageModel->modules()->sync($plan_data->get('modules'));
        $packageModel->roles()->sync($plan_data->get('roles'));
        $packageModel->departments()->sync($plan_data->get('departments'));


        return redirect()->route('packages')->with('success', 'Package added successfully!');
    }

    public function delete($package, $handler) {
        $handler->delete($package);

        return response()->json(['success' => 'Package deleted successfully!']);
    }
}