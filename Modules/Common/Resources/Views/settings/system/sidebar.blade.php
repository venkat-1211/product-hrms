<div class="col-xl-3 theiaStickySidebar">
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-column list-group settings-list">
                <a href="{{ route('company.email.setting', $company->account_url) }}" class="d-inline-flex align-items-center rounded {{ Route::currentRouteName() == 'company.email.setting' ? 'active' : '' }} py-2 px-3">{!! Route::currentRouteName() == 'company.email.setting' ? '<i class="ti ti-arrow-badge-right me-2"></i>' : '' !!}Email Settings</a>
                <a href="{{ route('company.email.template', $company->account_url) }}" class="d-inline-flex align-items-center rounded {{ Route::currentRouteName() == 'company.email.template' ? 'active' : '' }} py-2 px-3">{!! Route::currentRouteName() == 'company.email.template' ? '<i class="ti ti-arrow-badge-right me-2"></i>' : '' !!}Email Templates</a>
                <a href="{{ route('company.sms.setting', $company->account_url) }}" class="d-inline-flex align-items-center rounded {{ Route::currentRouteName() == 'company.sms.setting' ? 'active' : '' }} py-2 px-3">{!! Route::currentRouteName() == 'company.sms.setting' ? '<i class="ti ti-arrow-badge-right me-2"></i>' : '' !!}SMS Settings</a>
                <a href="{{ route('company.sms.template', $company->account_url) }}" class="d-inline-flex align-items-center rounded {{ Route::currentRouteName() == 'company.sms.template' ? 'active' : '' }} py-2 px-3">{!! Route::currentRouteName() == 'company.sms.template' ? '<i class="ti ti-arrow-badge-right me-2"></i>' : '' !!}SMS Templates</a>
                <a href="{{ route('company.otp.setting', $company->account_url) }}" class="d-inline-flex align-items-center rounded {{ Route::currentRouteName() == 'company.otp.setting' ? 'active' : '' }} py-2 px-3">{!! Route::currentRouteName() == 'company.otp.setting' ? '<i class="ti ti-arrow-badge-right me-2"></i>' : '' !!}OTP</a>
                <a href="{{ route('company.gdpr', $company->account_url) }}" class="d-inline-flex align-items-center rounded {{ Route::currentRouteName() == 'company.gdpr' ? 'active' : '' }} py-2 px-3">{!! Route::currentRouteName() == 'company.gdpr' ? '<i class="ti ti-arrow-badge-right me-2"></i>' : '' !!}GDPR Cookies</a>
                <a href="{{ route('company.maintenance-mode', $company->account_url) }}" class="d-inline-flex align-items-center {{ Route::currentRouteName() == 'company.maintenance-mode' ? 'active' : '' }} rounded py-2 px-3">{!! Route::currentRouteName() == 'company.maintenance-mode' ? '<i class="ti ti-arrow-badge-right me-2"></i>' : '' !!}Maintenance Mode</a>
            </div>
        </div>
    </div>
</div>