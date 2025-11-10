<?php

namespace Modules\Hrm\Repositories;


use Modules\Hrm\Repositories\Interfaces\HrmRepositoryInterface;
use Modules\SuperAdmin\Models\Package;
use Modules\Common\Models\Module;
use Modules\Hrm\Models\Department;
use Modules\Hrm\Models\Designation;
use Modules\Hrm\Models\Holiday;
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
        if ($user) {
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
            if($permissionNames){
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
            }
            
        }

        return $user;
    }

    public function holidaysDataTable($company)
    {
        // Get visible fields for listing
        $fields = $company->holidayFields()
            ->whereJsonContains('visibility->list', true)
            ->orderBy('sort_order')
            ->get();
    
        // Base query with relationships
        $query = Holiday::where('company_id', $company->id)
            ->with(['meta']); // load meta once
    
        return DataTables::of($query)
            ->addColumn('checkbox', fn($row) => '
                <div class="form-check form-check-md">
                    <input class="form-check-input" type="checkbox" value="' . $row->id . '">
                </div>
            ')
            // Dynamically add each meta field column
            // ->editColumn('id', fn($row) => $row->id) // keep id
            ->addColumn('action', function ($row) {
                return view('common::components.action', [
                    'target' => ['edit_holiday', 'delete_modal'],
                    'list'   => ['edit', 'delete'],
                    'id'     => $row->id,
                    'permission' => [
                        'edit' => 'holidays|holidays_edit',
                        'delete' => 'holidays|holidays_delete',
                    ]
                ])->render();
            })
            ->addColumn('dynamic_fields', function ($row) use ($fields) {
                $data = [];
                foreach ($fields as $field) {
                    $meta = $row->meta->firstWhere('holiday_field_id', $field->id);
                    $data[$field->key] = $meta->value ?? '-';
                }
                return $data;
            })
            ->rawColumns(['checkbox','action'])
            ->make(true);
    }
    
    

    public function addHoliday($request, $handler, $company) : bool
    {
        /// 1. Create Holiday
        $holidayData = [
            'company_id' => $company->id,
        ];
        $holiday = $handler->create(
            GenericFormData::fromArray($holidayData),
            'Hrm',
            'Holiday'
        );

        // 2. Get all visible form fields
        $columns = $company->holidayFields()
            ->whereJsonContains('visibility->form', true)
            ->get()
            ->keyBy('key'); // associative: key => HolidayField model

        // 3. Extract request data
        $genericFormData = GenericFormData::fromRequest($request);

        // 4. Loop through request values and store in HolidayMeta
        foreach ($genericFormData->all() as $fieldKey => $fieldValue) {
            if (isset($columns[$fieldKey])) {
                $finalData = [
                    'holiday_id'       => $holiday->id,
                    'holiday_field_id' => $columns[$fieldKey]->id,
                    'value'            => $fieldValue,
                ];

                $handler->create(
                    GenericFormData::fromArray($finalData),
                    'Hrm',
                    'HolidayMeta'
                );
            }
        }

        return true;

    }

    public function addNewFieldHoliday($request, $handler, $company) : bool
    {
        $genericFormData = GenericFormData::fromRequest($request, ['key', 'label', 'type', 'options', 'visibility', 'validation', 'is_required', 'is_searchable', 'is_filterable', 'sort_order']);
        
        $visibility = $genericFormData->get('visibility', []);

        // Normalize to real boolean values
        $normalizedVisibility = collect($visibility)
            ->map(fn($val) => filter_var($val, FILTER_VALIDATE_BOOLEAN))
            ->toArray();

        $holidayFieldData = [
            'company_id' => $company->id,
            'key'        => $genericFormData->get('key'),
            'label'      => $genericFormData->get('label'),
            'type'       => $genericFormData->get('type'),
            'options'    => $genericFormData->get('options'),
            'visibility' => $normalizedVisibility,
            'validation' => $genericFormData->get('validation'),
            'is_required' => $genericFormData->get('is_required') ? 1 : 0,
            'is_searchable' => $genericFormData->get('is_searchable') ? 1 : 0,
            'is_filterable' => $genericFormData->get('is_filterable') ? 1 : 0,
            'sort_order' => $genericFormData->get('sort_order'),
        ];
        $holidayField = $handler->create(
            GenericFormData::fromArray($holidayFieldData),
            'Hrm',
            'HolidayField'
        );

        return true;
    }

    // public function holidayManageTable($request, $handler, $company): bool
    // {
    //     // Get all holiday fields for this company
    //     $fields = $company->holidayFields()->get();

    //     foreach ($fields as $field) {
    //         // If checkbox was ticked → mark as true, else false
    //         $isChecked = isset($request->fields[$field->id]);

    //         // Decode visibility JSON into array
    //         $visibility = is_array($field->visibility)
    //             ? $field->visibility
    //             : json_decode($field->visibility ?? '{}', true);

    //         // Update only the "list" key
    //         $visibility['list'] = $isChecked;

    //         // Save back into DB
    //         $field->update([
    //             'visibility' => $visibility,
    //         ]);
    //     }

    //     return true;
    // }

    public function holidayManageTable($request, $handler, $company)
    {
        // Validate the type (only "list" or "form" allowed)
        if (! in_array($request->type, ['list', 'form'])) {
            return false;
        }

        // Get all holiday fields for this company
        $fields = $company->holidayFields()->get();

        foreach ($fields as $field) {
            // Checkbox checked → true, else false
            $isChecked = isset($request->fields[$field->id]);

            // Ensure visibility is an array
            $visibility = is_array($field->visibility)
                ? $field->visibility
                : json_decode($field->visibility ?? '{}', true);

            // Update only the "list" flag
            $visibility[$request->type] = $isChecked;

            // Build data for update
            $finalData = [
                'id'         => $field->id, // required so handler knows which record
                'visibility' => $visibility,
            ];

            // Update HolidayField using GenericFormData
            $handler->update(
                GenericFormData::fromArray($finalData),
                $field
            );
        }

        return $request->type;
            
    }


}