<?php

namespace Modules\Common\Repositories;


use Modules\Common\Repositories\Interfaces\CommonRepositoryInterface;
use Modules\Common\Models\Module;
use Modules\Common\Models\Prefix;
use Modules\Common\Models\LeaveType;
use Modules\Common\Models\TaxRate;
use Modules\Auth\Models\Role;
use Modules\SuperAdmin\Models\Package;
use Modules\Common\Data\GenericFormData;
use Yajra\DataTables\Facades\DataTables;
use Modules\Common\Helpers\FileHelper;

class CommonRepository implements CommonRepositoryInterface
{
    // Use Place = ['globally']
    // public function sidebarModules() {

    //     $sidebarModules = Module::with(['children.children.children']) // up to 3 levels
    //     ->whereNull('parent_id')
    //     ->where('is_active', true)
    //     ->orderBy('id')
    //     ->get();

    //     return $sidebarModules;
    // }

    // public function sidebarModules()
    // {
    //     // Get current company from route
    //     $company = request()->route('company');

    //     if (!$company) {   // Once company not found , This is return for all modules
    //         $sidebarModules = Module::with('childrenRecursive') // up to 3 levels
    //             ->whereNull('parent_id')
    //             ->where('is_active', true)
    //             ->orderBy('id')
    //             ->get();

    //         return $sidebarModules;
    //     }

    //     // Only fetch modules assigned to this company's package
    //     $package = $company->package_id;

    //     $package = Package::find($package);

    //     if (!$package) {
    //         return [];
    //     }

    //     $moduleIds = $package->modules->pluck('id');

    //     // Return module tree where modules belong to package
    //     $sidebarModules = Module::with('childrenRecursive')
    //         ->whereIn('id', $moduleIds)
    //         ->where('is_active', true)
    //         ->orderBy('id')
    //         ->get();

    //     return $sidebarModules;
    // }

    public function sidebarModules()
    {
        // Get current company from route
        $company = request()->route('company');

        if (!$company) {   // Once company not found , This is return for all modules
            $sidebarModules = Module::with('childrenRecursive') // up to 3 levels
                ->whereNull('parent_id')
                ->where('is_active', true)
                ->orderBy('id')
                ->get();

            return $sidebarModules;
        }

        // Only fetch modules assigned to this company's package
        $package = $company->package_id;

        $package = Package::find($package);

        if (!$package) {
            return [];
        }

        $moduleIds = $package->modules->pluck('id');

        // Step 1: Get all allowed modules (children)
        $childModules = Module::with('childrenRecursive')
            ->whereIn('id', $moduleIds)
            ->where('is_active', true)
            ->orderBy('id')
            ->get();
        
        // Step 2: Collect parent IDs
        $parentIds = $childModules->pluck('parent_id')->unique()->filter()->values()->toArray();
        
        // \DB::enableQueryLog();
        // Step 3: Fetch parent modules with only allowed children
        $sidebarModules = Module::with(['childrenRecursive' => function ($q) use ($moduleIds) {
            $q->whereIn('id', $moduleIds); // Load only allowed children
            // $q->where('type', 'menu'); // Load only allowed children
        }])
        ->whereIn('id', $parentIds)
        ->where('is_active', true)
        ->orderBy('id')
        ->get();

        // dd(\DB::getQueryLog()); // Show results of log
        
        return $sidebarModules; // ✅ returns collection of Module models
    }

    // Use Place = ['PackageController => index', ]
    public function menus() {

        $allMenus = collect(); // Initialize an empty collection

        Module::where('type', 'menu')
            ->where('is_active', true)
            ->where('slug', '!=', 'super-admin')
            ->where('slug', '!=', 'crm-companies')
            ->select(['id', 'name'])
            ->chunkById(100, function ($chunk) use (&$allMenus) {
                $allMenus->push(...$chunk);
            });

        return $allMenus;
    }

    // Use Place = ['PackageController => index', ]
    public function roles() {

        $allRoles = collect(); // Initialize an empty collection

        Role::where('name', '!=', 'super_admin')
            ->select(['id', 'name'])
            ->chunkById(100, function ($chunk) use (&$allRoles) {
                $allRoles->push(...$chunk);
            });

        return $allRoles;
    }

    public function getCompany() {
        $company = request()->route('company');
        return $company;
    }


    public function getPackage() {
        $company = $this->getCompany();
        $package = $company->package_id;
        $package = Package::find($package);
        return $package;
    }

    public function getPackageRoles() {
        $package = $this->getPackage();
        $roles = $package->roles;
        return $roles;
    }

    public function getPackageModules() {
        $package = $this->getPackage();
        $modules = $package->modules;
        return $modules;
    }

    public function getPackageDepartments() {
        $package = $this->getPackage();
        $departments = $package->departments;
        return $departments;
    }

    public function authenticationSettingsUpdate($request, $handler, $company) {
        $genericFormData = GenericFormData::fromRequest($request, ['allow_registration', 'verification_required', 'login_type', 'verification_expired', 'referral_system', 'password_enabled', 'otp_system', 'otp_type']);
        return $handler->updateOrCreate($genericFormData, 'common', 'AuthenticationSetting', ['company_id' => $company->id]);
    }

    public function getPrefix() {
        return Prefix::select(['id', 'data'])->where('company_id', auth()->user()->company_id)->sole();
    }

    public function addPrefix($request, $handler, $company) {
        $genericFormData = GenericFormData::fromRequest($request, ['key', 'value']);
        
        // Decode old data safely
        $oldData = $company->prefix->data ?? [];

        $oldData[$genericFormData->get('key')] = $genericFormData->get('value');

        $finalData = ['data' => $oldData];

        return $handler->update(
            GenericFormData::fromArray($finalData),
            $company->prefix
        );
    }

    public function updatePrefix($request, $handler, $company) {
        $genericFormData = GenericFormData::fromRequest($request, ['prefix']);
        
        $finalData = [
            'data' => $genericFormData->get('prefix')
        ];
        
        return $handler->update(
            GenericFormData::fromArray($finalData),
            $company->prefix
        );
    }

    public function startPrefix($handler, $company) {
        $data = [
            'Employee' => 'EMP-',
            'Clients' => 'CLI-',
            'Invoice' => 'INV-',
            'Tickets' => 'TIC-',
            'Candidate' => 'CAND-',
            'Job' => 'JOB-',
            'Referral' => 'REF-',
            'Assets' => 'AST-'
        ];

        $finalData = [
            'company_id' => $company->id,
            'data' => $data
        ];
        
        return $handler->create(
            GenericFormData::fromArray($finalData),
            'common',
            'Prefix'
        );
    }

    public function addLocalizationSetting($request, $handler, $company) {
        $genericFormData = GenericFormData::fromRequest($request, ['language', 'language_switcher', 'timezone', 'date_format', 'time_format', 'financial_year', 'starting_month', 'currency', 'currency_symbol', 'currency_position', 'decimal_seperator', 'thousand_seperator', 'countries_restriction', 'allowed_files', 'max_file_size']);

        $customStructure = [
            'currency_info' => [
                'currency' => $genericFormData->get('currency'),
                'symbol' => $genericFormData->get('currency_symbol'),
                'position' => $genericFormData->get('currency_position'),
            ],
            'country_settings' => [
                'restriction' => $genericFormData->get('countries_restriction'),
            ],
            'file_settings' => [
                'allowed_files' => $genericFormData->get('allowed_files'),
                'max_file_size' => $genericFormData->get('max_file_size'),
            ],
            'others' => [
                'language' => $genericFormData->get('language'),
                'language_switcher' => $genericFormData->get('language_switcher'),
                'timezone' => $genericFormData->get('timezone'),
                'date_format' => $genericFormData->get('date_format'),
                'time_format' => $genericFormData->get('time_format'),
                'financial_year' => $genericFormData->get('financial_year'),
                'starting_month' => $genericFormData->get('starting_month'),
                'decimal_seperator' => $genericFormData->get('decimal_seperator'),
                'thousand_seperator' => $genericFormData->get('thousand_seperator'),
            ]
        ];

        $genericFormData = GenericFormData::fromArray($customStructure);
        return $handler->updateOrCreate($genericFormData, 'common', 'Localization', ['company_id' => $company->id]);
    }

    public function leaveTypeDataTable()
    {
        // Base query: only user table columns
        $data = LeaveType::select(['id', 'name', 'days', 'icon', 'bg_color','badge_color', 'status'])
            ->whereHas('company', function ($query) {
                $query->where('company_id', auth()->user()->company_id);
            });
    
        return DataTables::of($data)
            ->addColumn('checkbox', fn($row) => '
                <div class="form-check form-check-md">
                    <input class="form-check-input" type="checkbox" value="' . $row->id . '">
                </div>
            ')
            ->addColumn('name', fn($row) => e(($row->name) ?? '-'))
            ->addColumn('days', fn($row) => e($row->days ?? '-'))
            ->addColumn('icon', fn($row) => e($row->icon ?? '-'))
            ->addColumn('status', function ($row) {
                return view('common::components.status-badge', [
                    'color' => $row->status_color,
                    'icon'  => $row->status_icon,
                    'label' => $row->status
                ])->render();
            })
            ->addColumn('action', function ($row) {
                return view('common::components.action', [
                    'target' => ['edit_leaves', 'delete_modal'],
                    'list'   => ['edit', 'delete'],
                    'id'     => $row->id
                ])->render();
            })
            ->rawColumns(['checkbox', 'name', 'days', 'icon', 'status', 'action'])
            ->make(true);
    }

    public function addLeaveType($request, $handler, $company) {
        $genericFormData = GenericFormData::fromRequest($request, ['name', 'days', 'icon', 'bg_color', 'badge_color']);
        $finalData = [
            'company_id' => $company->id,
            'name' => $genericFormData->get('name'),
            'days' => $genericFormData->get('days'),
            'icon' => $genericFormData->get('icon'),
            'bg_color' => $genericFormData->get('bg_color'),
            'badge_color' => $genericFormData->get('badge_color'),
        ];
        $genericFormData = GenericFormData::fromArray($finalData);
        return $handler->create($genericFormData, 'common', 'LeaveType');
    }

    public function getLeaveType($company, $leaveType) {
        return json_encode($leaveType);
    }

    public function updateLeaveType($request, $handler, $leaveType) {
        $genericFormData = GenericFormData::fromRequest($request, ['name', 'days', 'icon', 'bg_color', 'badge_color', 'status']);
        return $handler->update($genericFormData, $leaveType);
    }

    public function deleteLeaveType($handler, $leaveType) {
        return $handler->delete($leaveType);
    }

    public function maintenanceModeStore($request, $handler, $company) {
        $genericFormData = GenericFormData::fromRequest($request, ['image', 'description', 'is_active']);

        // File Upload
        $image = FileHelper::UploadFile($request->file('image'), 'assets/img/setting/maintenance-mode');

        $finalData = [
            'company_id' => $company->id,
            'image' => $image,
            'description' => $genericFormData->get('description'),
            'is_active' => $genericFormData->get('is_active'),
        ];

        $genericFormData = GenericFormData::fromArray($finalData);
        return $handler->updateOrCreate($genericFormData, 'common', 'MaintenanceMode', ['company_id' => $company->id]);
    }

    public function AddtaxRate($request, $handler, $company) {
        $genericFormData = GenericFormData::fromRequest($request, ['name', 'rate', 'status']);
        $finalData = [
            'company_id' => $company->id,
            'name' => $genericFormData->get('name'),
            'rate' => $genericFormData->get('rate'),
            'status' => $genericFormData->get('status'),
        ];
        $genericFormData = GenericFormData::fromArray($finalData);
        return $handler->create($genericFormData, 'common', 'TaxRate');
    }

    public function taxRatesDataTable()
    {
           // Base query: only user table columns
        $data = TaxRate::select(['id', 'name', 'rate', 'status'])
        ->whereHas('company', function ($query) {
            $query->where('company_id', auth()->user()->company_id);
        });

        return DataTables::of($data)
            ->addColumn('checkbox', fn($row) => '
                <div class="form-check form-check-md">
                    <input class="form-check-input" type="checkbox" value="' . $row->id . '">
                </div>
            ')
            ->addColumn('name', fn($row) => e(($row->name) ?? '-'))
            ->addColumn('rate', fn($row) => e($row->rate . '%' ?? '-'))
            ->addColumn('status', function ($row) {
                return view('common::components.status-badge', [
                    'color' => $row->status_color,
                    'icon'  => $row->status_icon,
                    'label' => $row->status
                ])->render();
            })
            ->addColumn('action', function ($row) {
                return view('common::components.action', [
                    'target' => ['edit_tax_rate', 'delete_modal'],
                    'list'   => ['edit', 'delete'],
                    'id'     => $row->id
                ])->render();
            })
            ->rawColumns(['checkbox', 'name', 'rate', 'status', 'action'])
            ->make(true);
    }

    public function getTaxRate($company, $taxRate) {
        return json_encode($taxRate);
    }

    public function updateTaxRate($request, $handler, $taxRate) {
        $genericFormData = GenericFormData::fromRequest($request, ['name', 'rate', 'status']);
        $finalData = [
            'name' => $genericFormData->get('name'),
            'rate' => $genericFormData->get('rate'),
            'status' => $genericFormData->get('status'),
        ];
        $genericFormData = GenericFormData::fromArray($finalData);
        return $handler->update($genericFormData, $taxRate);
    }

    public function deleteTaxRate($handler, $taxRate) {
        return $handler->delete($taxRate);
    }
}