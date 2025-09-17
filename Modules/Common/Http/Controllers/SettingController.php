<?php

namespace Modules\Common\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Common\Repositories\Interfaces\CommonRepositoryInterface;
use Modules\Common\Actions\HandleFormSubmission;
use Modules\SuperAdmin\Models\Company;
use Modules\Common\Http\Requests\UpdateAuthenticationSettingsRequest;
use Modules\Common\Http\Requests\AddPrefixRequest;
use Modules\Common\Http\Requests\UpdatePrefixRequest;
use Modules\Common\Http\Requests\AddLocalizationRequest;
use Modules\Common\Http\Requests\AddLeaveTypeRequest;
use Modules\Common\Http\Requests\UpdateLeaveTypeRequest;
use Modules\Common\Http\Requests\MaintenanceModeRequest;
use Modules\Common\Http\Requests\AddTaxRateRequest;
use Modules\Common\Http\Requests\UpdateTaxRateRequest;
use Modules\Common\Models\LeaveType;
use Modules\Common\Models\TaxRate;

class SettingController extends Controller
{

    protected $commonRepository;
    public function __construct(CommonRepositoryInterface $commonRepository)
    {
        $this->commonRepository = $commonRepository;
    }

    public function profileSetting()
    {
        return view('common::settings.general.profile');
    }
    
    public function securitySetting()
    {
        return view('common::settings.general.security');
    }

    public function notificationSetting()
    {
        return view('common::settings.general.notification');
    }

    public function connectedApps()
    {
        return view('common::settings.general.connected-apps');
    }

    public function bussinessSetting()
    {
        return view('common::settings.website.bussiness');
    }

    public function seoSetting()
    {
        return view('common::settings.website.seo');
    }

    public function authenticationSetting()
    {
        return view('common::settings.website.authentication');
    }

    public function authenticationSettingsUpdate(UpdateAuthenticationSettingsRequest $request, HandleFormSubmission $handler, Company $company)
    {
        if($this->commonRepository->authenticationSettingsUpdate($request, $handler, $company)) {
            return redirect()
                ->route('company.authentication.setting', $company->account_url) 
                ->with('success', 'Authentication settings updated successfully.');
        }

        return back()->with('error', 'Failed to update authentication settings.');
    }

    public function prefix()
    {
        $prefix = $this->commonRepository->getPrefix();
        return view('common::settings.website.prefix', compact('prefix'));
    }

    public function addPrefix(AddPrefixRequest $request, HandleFormSubmission $handler, Company $company)
    {
        if($this->commonRepository->addPrefix($request, $handler, $company))
        {
            return redirect()
                ->route('company.prefix', $company->account_url) 
                ->with('success', 'Prefix added successfully.');
        }
        
        return back()->with('error', 'Failed to add prefix.');
        
    }

    public function updatePrefix(UpdatePrefixRequest $request, HandleFormSubmission $handler, Company $company)
    {
        if($this->commonRepository->updatePrefix($request, $handler, $company))
        {
            return redirect()
                ->route('company.prefix', $company->account_url) 
                ->with('success', 'Prefix updated successfully.');
        }
        
        return back()->with('error', 'Failed to update prefix.');
        
    }

    public function preferences()
    {
        return view('common::settings.website.preferences');
    }

    public function appearance()
    {
        return view('common::settings.website.appearance');
    }

    public function language()
    {
        return view('common::settings.website.language');
    }

    public function aiSetting()
    {
        return view('common::settings.website.ai');
    }

    public function localizationSetting()
    {
        return view('common::settings.website.localization');
    }

    public function addLocalizationSetting(AddLocalizationRequest $request, HandleFormSubmission $handler, Company $company)
    {
        if($this->commonRepository->addLocalizationSetting($request, $handler, $company))
        {
            return redirect()
                ->route('company.localization.setting', $company->account_url) 
                ->with('success', 'Localization setting updated successfully.');
        }
        
        return back()->with('error', 'Failed to update localization setting.');
        
    }

    public function leaveType()
    {
        return view('common::settings.app.leave-type');
    }

    public function leaveTypeDataTable()
    {
        return $this->commonRepository->leaveTypeDataTable();
    }

    public function addLeaveType(AddLeaveTypeRequest $request, HandleFormSubmission $handler, Company $company)
    {
        if($this->commonRepository->addLeaveType($request, $handler, $company))
        {
            return redirect()
                ->route('company.leave-type', $company->account_url) 
                ->with('success', 'Leave type added successfully.');
        }
        
        return back()->with('error', 'Failed to add leave type.');
        
    }

    public function getLeaveType(Company $company, LeaveType $leaveType)
    {
        return $this->commonRepository->getLeaveType($company, $leaveType);
    }

    public function updateLeaveType(UpdateLeaveTypeRequest $request, HandleFormSubmission $handler, Company $company, LeaveType $leaveType)
    {
        if($this->commonRepository->updateLeaveType($request, $handler, $leaveType))
        {
            return redirect()
                ->route('company.leave-type', $company->account_url) 
                ->with('success', 'Leave type updated successfully.');
        }
        
        return back()->with('error', 'Failed to update leave type.');
        
    }

    public function deleteLeaveType(HandleFormSubmission $handler, Company $company, LeaveType $leaveType)
    {
        if($this->commonRepository->deleteLeaveType($handler, $leaveType))
        {
            return redirect()
                ->route('company.leave-type', $company->account_url) 
                ->with('success', 'Leave type deleted successfully.');
        }
        
        return back()->with('error', 'Failed to delete leave type.');
        
    }

    public function salarySettings()
    {
        return view('common::settings.app.salary');
    }

    public function approvalSettings()
    {
        return view('common::settings.app.approval');
    }

    public function invoiceSettings()
    {
        return view('common::settings.app.invoice');
    }

    public function customFields()
    {
        return view('common::settings.app.custom-field');
    }

    public function emailSettings()
    {
        return view('common::settings.system.email-setting');
    }

    public function emailTemplate()
    {
        return view('common::settings.system.email-template');
    }

    public function smsSettings()
    {
        return view('common::settings.system.sms-setting');
    }

    public function smsTemplate()
    {
        return view('common::settings.system.sms-template');
    }

    public function otpSettings()
    {
        return view('common::settings.system.otp');
    }

    public function gdpr()
    {
        return view('common::settings.system.gdpr');
    }
    
    public function maintenanceMode()
    {
        return view('common::settings.system.maintenance-mode');
    }

    public function maintenanceModeStore(MaintenanceModeRequest $request, HandleFormSubmission $handler, Company $company)
    {
        if($this->commonRepository->maintenanceModeStore($request, $handler, $company))
        {
            return redirect()
                ->route('company.maintenance-mode', $company->account_url) 
                ->with('success', 'Maintenance mode updated successfully.');
        }
        
        return back()->with('error', 'Failed to update maintenance mode.');
        
    }

    public function paymentGateways()
    {
        return view('common::settings.financial.payment-gateway');
    }

    public function taxRates()
    {
        return view('common::settings.financial.tax-rates');
    }

    public function AddtaxRate(AddTaxRateRequest $request, HandleFormSubmission $handler, Company $company)
    {
        if($this->commonRepository->AddtaxRate($request, $handler, $company))
        {
            return redirect()
                ->route('company.tax-rates', $company->account_url) 
                ->with('success', 'Tax rate added successfully.');
        }
        
        return back()->with('error', 'Failed to add tax rate.');
    }

    public function taxRatesDataTable()
    {
        return $this->commonRepository->taxRatesDataTable();
    }

    public function getTaxRate(Company $company, TaxRate $taxRate)
    {
        return $this->commonRepository->getTaxRate($company, $taxRate);
    }

    public function updateTaxRate(UpdateTaxRateRequest $request, HandleFormSubmission $handler, Company $company, TaxRate $taxRate)
    {
        if($this->commonRepository->updateTaxRate($request, $handler, $taxRate))
        {
            return redirect()
                ->route('company.tax-rates', $company->account_url) 
                ->with('success', 'Tax rate updated successfully.');
        }
        
        return back()->with('error', 'Failed to update tax rate.');
    }

    public function deleteTaxRate(HandleFormSubmission $handler, Company $company, TaxRate $taxRate)
    {
        if($this->commonRepository->deleteTaxRate($handler, $taxRate))
        {
            return redirect()
                ->route('company.tax-rates', $company->account_url) 
                ->with('success', 'Tax rate deleted successfully.');
        }
        
        return back()->with('error', 'Failed to delete tax rate.');
    }

    public function currencies()
    {
        return view('common::settings.financial.currencies');
    }
}
