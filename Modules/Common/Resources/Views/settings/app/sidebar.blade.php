<div class="col-xl-3 theiaStickySidebar">
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-column list-group settings-list">
                <a href="{{ route('company.salary.setting', $company->account_url) }}" class="d-inline-flex align-items-center rounded {{ Route::currentRouteName() == 'company.salary.setting' ? 'active' : '' }} py-2 px-3">{!! Route::currentRouteName() == 'company.salary.setting' ? '<i class="ti ti-arrow-badge-right me-2"></i>' : '' !!}Salary Settings</a>
                <a href="{{ route('company.approval.setting', $company->account_url) }}" class="d-inline-flex align-items-center rounded {{ Route::currentRouteName() == 'company.approval.setting' ? 'active' : '' }} py-2 px-3">{!! Route::currentRouteName() == 'company.approval.setting' ? '<i class="ti ti-arrow-badge-right me-2"></i>' : '' !!}Approval Settings</a>
                <a href="{{ route('company.invoice.setting', $company->account_url) }}" class="d-inline-flex align-items-center rounded {{ Route::currentRouteName() == 'company.invoice.setting' ? 'active' : '' }} py-2 px-3">{!! Route::currentRouteName() == 'company.invoice.setting' ? '<i class="ti ti-arrow-badge-right me-2"></i>' : '' !!}Invoice Settings</a>
                <a href="{{ route('company.leave-type', $company->account_url) }}" class="d-inline-flex align-items-center rounded {{ Route::currentRouteName() == 'company.leave-type' ? 'active' : '' }} py-2 px-3">{!! Route::currentRouteName() == 'company.leave-type' ? '<i class="ti ti-arrow-badge-right me-2"></i>' : '' !!}Leave Type</a>
                <a href="{{ route('company.custom-fields', $company->account_url) }}" class="d-inline-flex align-items-center rounded {{ Route::currentRouteName() == 'company.custom-fields' ? 'active' : '' }} py-2 px-3">{!! Route::currentRouteName() == 'company.custom-fields' ? '<i class="ti ti-arrow-badge-right me-2"></i>' : '' !!}Custom Fields</a>
            </div>
        </div>
    </div>
</div>