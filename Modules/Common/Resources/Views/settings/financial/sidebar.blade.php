<div class="col-xl-3 theiaStickySidebar">
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-column list-group settings-list">
                <a href="{{ route('company.payment-gateways', $company->account_url) }}" class="d-inline-flex align-items-center rounded {{ Route::currentRouteName() == 'company.payment-gateways' ? 'active' : '' }} py-2 px-3">{!! Route::currentRouteName() == 'company.payment-gateways' ? '<i class="ti ti-arrow-badge-right me-2"></i>' : '' !!}Payment Gateways</a>
                <a href="{{ route('company.tax-rates', $company->account_url) }}" class="d-inline-flex align-items-center {{ Route::currentRouteName() == 'company.tax-rates' ? 'active' : '' }} rounded py-2 px-3">{!! Route::currentRouteName() == 'company.tax-rates' ? '<i class="ti ti-arrow-badge-right me-2"></i>' : '' !!}Tax Rates</a>
                <a href="{{ route('company.currencies', $company->account_url) }}" class="d-inline-flex align-items-center rounded {{ Route::currentRouteName() == 'company.currencies' ? 'active' : '' }} py-2 px-3">{!! Route::currentRouteName() == 'company.currencies' ? '<i class="ti ti-arrow-badge-right me-2"></i>' : '' !!}Currencies</a>
            </div>
        </div>
    </div>
</div>