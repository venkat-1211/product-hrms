<?php

namespace Modules\Hrm\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Hrm\Repositories\Interfaces\HrmRepositoryInterface;
use Modules\Common\Repositories\Interfaces\CommonRepositoryInterface;
use Modules\Hrm\Models\Department;
use Modules\SuperAdmin\Models\Company;
use Modules\Common\Actions\HandleFormSubmission;
use Modules\Hrm\Http\Requests\AddEmployeeRequest;

class EmployeeController extends Controller
{

    protected $hrmRepository;
    public function __construct(HrmRepositoryInterface $hrmRepository, CommonRepositoryInterface $commonRepository)
    {
        $this->hrmRepository = $hrmRepository;
        $this->commonRepository = $commonRepository;
    }

    public function listView()
    {
        $permissions = $this->hrmRepository->companyPermissions();
        
        $departments = $this->commonRepository->getPackageDepartments();

        // $designations = $this->hrmRepository->getDesignationsByDepartmentId();

        $employees = $this->hrmRepository->getEmployees();

        return view('hrm::employee.list-view', compact('permissions', 'departments', 'employees'));
    }

    public function gridView()
    {
        return view('hrm::employee.grid-view');
    }

    public function employeesDataTable()
    {
        return $this->hrmRepository->employeesDataTable();
    }

    public function store(AddEmployeeRequest $request, HandleFormSubmission $handler, Company $company)
    {
        if($this->hrmRepository->employeeStore($request, $handler, $company)) {
            return redirect()
                ->route('company.employees.store', $company->account_url) 
                ->with('success', 'Employee added successfully.');
        }

        return back()->with('error', 'Failed to add employee.');

    }

    public function designationsFetchByDepartment(Company $company, Department $department)
    {
        $designations = $this->hrmRepository->getDesignationsByDepartmentId($department);
        return response()->json($designations);
    }
}
