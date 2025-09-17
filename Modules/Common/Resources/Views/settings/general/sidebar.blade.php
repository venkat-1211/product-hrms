<div class="col-xl-3 theiaStickySidebar">
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-column list-group settings-list">
                <a href="{{ route('company.profile.setting', $company->account_url) }}" class="d-inline-flex align-items-center rounded {{ Route::currentRouteName() == 'company.profile.setting' ? 'active' : '' }} py-2 px-3">{!! Route::currentRouteName() == 'company.profile.setting' ? '<i class="ti ti-arrow-badge-right me-2"></i>' : '' !!}Profile Settings</a>
                <a href="{{ route('company.security.setting', $company->account_url) }}" class="d-inline-flex align-items-center rounded {{ Route::currentRouteName() == 'company.security.setting' ? 'active' : '' }} py-2 px-3">{!! Route::currentRouteName() == 'company.security.setting' ? '<i class="ti ti-arrow-badge-right me-2"></i>' : '' !!}Security Settings</a>
                <a href="{{ route('company.notification.setting', $company->account_url) }}" class="d-inline-flex align-items-center rounded {{ Route::currentRouteName() == 'company.notification.setting' ? 'active' : '' }} py-2 px-3">{!! Route::currentRouteName() == 'company.notification.setting' ? '<i class="ti ti-arrow-badge-right me-2"></i>' : '' !!}Notifications</a>
                <a href="{{ route('company.connected-apps', $company->account_url) }}" class="d-inline-flex align-items-center rounded {{ Route::currentRouteName() == 'company.connected-apps' ? 'active' : '' }} py-2 px-3">{!! Route::currentRouteName() == 'company.connected-apps' ? '<i class="ti ti-arrow-badge-right me-2"></i>' : '' !!}Connected Apps</a>
            </div>
        </div>
    </div>
</div>