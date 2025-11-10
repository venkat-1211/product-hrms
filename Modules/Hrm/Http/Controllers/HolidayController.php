<?php

namespace Modules\Hrm\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Hrm\Http\Requests\AddHolidayRequest;
use Modules\Hrm\Http\Requests\HolidayManageFieldRequest;
use Modules\Hrm\Http\Requests\AddNewFieldHolidayRequest;
use Modules\SuperAdmin\Models\Company;
use Modules\Hrm\Models\HolidayField;
use Modules\Common\Actions\HandleFormSubmission;
use Modules\Hrm\Repositories\Interfaces\HrmRepositoryInterface;

class HolidayController extends Controller
{

    protected $hrmRepository;
    public function __construct(HrmRepositoryInterface $hrmRepository)
    {
        $this->hrmRepository = $hrmRepository;
    }

    public function index()
    {
        $typeEnums = HolidayField::TYPES;
        return view('hrm::holiday.index', compact('typeEnums'));
    }

    public function dataTable(Company $company)
    {
        return $this->hrmRepository->holidaysDataTable($company);
    }

    public function addHoliday(AddHolidayRequest $request, HandleFormSubmission $handler, Company $company)
    {
        if($this->hrmRepository->addHoliday($request, $handler, $company))
        {
            return redirect()
                ->route('company.holidays', $company->account_url) 
                ->with('success', 'Holiday added successfully.');
        }
        
        return back()->with('error', 'Failed to add holiday.');
    }

    public function manageTable(HolidayManageFieldRequest $request, HandleFormSubmission $handler, Company $company)
    {
        $result = $this->hrmRepository->holidayManageTable($request, $handler, $company);

        if($result && $result == 'form')
        {
            return redirect()
                ->route('company.holidays', $company->account_url)
                ->with('open_add_holiday_modal', true) // success bag
                ->with('success', 'Holiday updated successfully.');
        } elseif($result && $result == 'list')
        {
            return redirect()
                    ->route('company.holidays', $company->account_url) 
                    ->with('success', 'Holiday updated successfully.');
        }

        return back()->with('error', 'Failed to update holiday.');
    }

    public function addNewFieldHoliday(AddNewFieldHolidayRequest $request, HandleFormSubmission $handler, Company $company)
    {
        if($this->hrmRepository->addNewFieldHoliday($request, $handler, $company))
        {
            return redirect()
                ->route('company.holidays', $company->account_url) 
                ->with('open_add_holiday_modal', true) // success bag
                ->with('success', 'Holiday field added successfully.');
        }
        
        return back()->with('error', 'Failed to add holiday field.');
    }
}
