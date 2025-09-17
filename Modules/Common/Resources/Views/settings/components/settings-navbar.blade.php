<ul class="nav nav-tabs nav-tabs-solid bg-transparent border-bottom mb-3">
    <li class="nav-item">
        <a class="nav-link @if($mainMenu == 'general') active @endif" href="{{ route('company.profile.setting', $company->account_url) }}"><i class="ti ti-settings me-2"></i>General Settings</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($mainMenu == 'website') active @endif" href="{{ route('company.bussiness.setting', $company->account_url) }}"><i class="ti ti-world-cog me-2"></i>Website Settings</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($mainMenu == 'app') active @endif" href="{{ route('company.salary.setting', $company->account_url) }}"><i class="ti ti-device-ipad-horizontal-cog me-2"></i>App Settings</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($mainMenu == 'system') active @endif" href="{{ route('company.email.setting', $company->account_url) }}"><i class="ti ti-server-cog me-2"></i>System Settings</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($mainMenu == 'financial') active @endif" href="{{ route('company.payment-gateways', $company->account_url) }}"><i class="ti ti-settings-dollar me-2"></i>Financial Settings</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($mainMenu == 'other') active @endif" href="custom-css.html"><i class="ti ti-settings-2 me-2"></i>Other Settings</a>
    </li>
</ul>