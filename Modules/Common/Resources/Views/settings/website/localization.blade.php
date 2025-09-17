@extends('common::layouts.master')

@section('title', 'Localization Settings')

@section('links')
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}">

    <!-- Theme Script js -->
    <script src="{{ asset('assets/js/theme-script.js') }}"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Feather CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icons/feather/feather.css') }}">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/@simonwep/pickr/themes/nano.min.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection

@section('content')
<div class="content">

    <x-settings-bread-crumb title="Localization Settings" />

    <x-settings-navbar main-menu="website" />
    <div class="row">
        @include('common::settings.website.sidebar')
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <div class="border-bottom mb-3 pb-3">
                        <h4>Localization</h4>
                    </div>
                    <form action="{{ route('company.localization.setting.add', $company->account_url) }}" method="post">
                        @csrf
                        <div class="border-bottom mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-5">
                                            <label class="form-label mb-md-0">Language</label>
                                        </div>
                                        <div class="col-md-7">
                                            <select class="select @error('language') is-invalid @enderror" id="languageSelect" name="language">
                                                <option value="">Select</option>
                                            </select>
                                            @error('language')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror 
                                            <p class="fs-13 fw-normal mt-2 form-check form-check-md form-switch me-2">
                                            <input type="hidden" name="language_switcher" value="0">
                                            <input 
                                                class="form-check-input me-2 @error('language_switcher') is-invalid @enderror" 
                                                type="checkbox" 
                                                role="switch" 
                                                name="language_switcher" 
                                                value="1" 
                                                @checked(old('language_switcher', $company->localization->others['language_switcher'] ?? 0) == 1) 
                                            >
                                            <label>Language Switcher</label>
                                                @error('language_switcher')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-5">
                                            <label class="form-label mb-md-0">Timezone</label>
                                        </div>
                                        <div class="col-md-7">
                                            <select class="select @error('timezone') is-invalid @enderror" id="timezoneSelect" name="timezone">
                                                <option value="">Select</option>
                                                <!-- <option>(UTC +5:30)</option> -->
                                                <!-- <option>(UTC+11:00) INR</option> -->
                                            </select>
                                            @error('timezone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-5">
                                            <label class="form-label mb-md-0">Date Format</label>
                                        </div>
                                        <div class="col-md-7">
                                            <select class="select @error('date_format') is-invalid @enderror" name="date_format">
                                                <option value="">Select</option>
                                                @forelse (config('custom.date_formats') as $key => $value)
                                                    <option value="{{ $value }}" @if($company->localization->others['date_format'] == $value) selected @endif>{{ $value }}</option>
                                                @empty
                                                    <p>No date formats found</p>
                                                @endforelse
                                                <!-- <option>MM/DD/YYYY</option>
                                                <option>DD/MM/YYYY</option>
                                                <option>YYYY/MM/DD</option> -->
                                            </select>
                                            @error('date_format')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-5">
                                            <label class="form-label mb-md-0">Time Format</label>
                                        </div>
                                        <div class="col-md-7">
                                            <select class="select @error('time_format') is-invalid @enderror" name="time_format">
                                                <option value="">Select</option>
                                                @forelse (config('custom.time_formats') as $key => $value)
                                                    <option value="{{ $value }}" @if($company->localization->others['time_format'] == $value) selected @endif>{{ $value }}</option>
                                                @empty
                                                    <p>No time formats found</p>
                                                @endforelse
                                                <!-- <option>12 Hours</option>
                                                <option>24 Hours</option> -->
                                            </select>
                                            @error('time_format')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-5">
                                            <label class="form-label mb-md-0">Financial Year</label>
                                        </div>
                                        <div class="col-md-7">
                                            <select class="select @error('financial_year') is-invalid @enderror" name="financial_year">
                                                <option value="">Select</option>
                                                @forelse (config('custom.financial_years') as $key => $value)
                                                    <option value="{{ $value }}" @if($company->localization->others['financial_year'] == $value) selected @endif>{{ $value }}</option>
                                                @empty
                                                    <p>No time formats found</p>
                                                @endforelse
                                            </select>
                                            @error('financial_year')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-5">
                                            <label class="form-label mb-md-0">Starting Month</label>
                                        </div>
                                        <div class="col-md-7">
                                            <select class="select @error('starting_month') is-invalid @enderror" name="starting_month">
                                                <option value="">Select</option>
                                                @forelse (config('custom.months') as $key => $value)
                                                    <option value="{{ $value }}" @if($company->localization->others['starting_month'] == $value) selected @endif>{{ $value }}</option>
                                                @empty
                                                    <p>No time formats found</p>
                                                @endforelse
                                            </select>
                                            @error('starting_month')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mb-3">
                            <h6 class="mb-3">Currency Information</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-5">
                                            <label class="form-label mb-md-0">Currency</label>
                                        </div>
                                        <div class="col-md-7">
                                            <select class="select @error('currency') is-invalid @enderror" name="currency" id="currencySelect">
                                                <option value="">Select</option>
                                                <!-- <option>USD</option>
                                                <option>EURO</option> -->
                                            </select>
                                            @error('currency')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-5">
                                            <label class="form-label mb-md-0">Currency Symbol</label>
                                        </div>
                                        <div class="col-md-7">
                                            <select class="select @error('currency_symbol') is-invalid @enderror" name="currency_symbol" id="currencySymbolSelect">
                                                <option value="">Select</option>
                                                <!-- <option>$</option>
                                                <option>€</option> -->
                                            </select>
                                            @error('currency_symbol')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-5">
                                            <label class="form-label mb-md-0">Currency Position</label>
                                        </div>
                                        <div class="col-md-7">
                                            <select class="select @error('currency_position') is-invalid @enderror" name="currency_position">
                                                <option value="">Select</option>
                                                <option value="left" @if($company->localization->currency_info['position'] == 'left') selected @endif>100$</option>
                                                <option value="right" @if($company->localization->currency_info['position'] == 'right') selected @endif>$100</option>
                                            </select>
                                            @error('currency_position')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-5">
                                            <label class="form-label mb-md-0">Decimal Seperator</label>
                                        </div>
                                        <div class="col-md-7">
                                            <select class="select @error('decimal_seperator') is-invalid @enderror" name="decimal_seperator">
                                                <option value="">Select</option>
                                                @forelse (config('custom.separators') as $key => $value)
                                                    <option value="{{ $value }}" @if($company->localization->others['decimal_seperator'] == $value) selected @endif>{{ $value }}</option>
                                                @empty
                                                    <p>No separators found</p>
                                                @endforelse
                                                <!-- <option>.</option>
                                                <option>,</option> -->
                                            </select>
                                            @error('decimal_seperator')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-5">
                                            <label class="form-label mb-md-0">Thousand Seperator</label>
                                        </div>
                                        <div class="col-md-7">
                                            <select class="select @error('thousand_seperator') is-invalid @enderror" name="thousand_seperator">
                                                <option value="">Select</option>
                                                @forelse (config('custom.separators') as $key => $value)
                                                    <option value="{{ $value }}" @if($company->localization->others['thousand_seperator'] == $value) selected @endif>{{ $value }}</option>
                                                @empty
                                                    <p>No separators found</p>
                                                @endforelse
                                                <!-- <option>.</option>
                                                <option>,</option> -->
                                            </select>
                                            @error('thousand_seperator')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mb-3">
                            <h6 class="mb-3">Country Settings</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-5">
                                            <label class="form-label mb-md-0">Countries Restriction</label>
                                        </div>
                                        <div class="col-md-7">
                                            <select class="select @error('countries_restriction') is-invalid @enderror" name="countries_restriction">
                                                <option value="">Select</option>
                                                <option value="allow" @if($company->localization->country_settings['restriction'] == 'allow') selected @endif>Allow All Countries</option>
                                                <option value="deny" @if($company->localization->country_settings['restriction'] == 'deny') selected @endif>Deny All Countries</option>
                                            </select>
                                            @error('countries_restriction')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mb-3">
                            <h6 class="mb-3">File Settings</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-5">
                                            <label class="form-label mb-md-0">Allowed Files</label>
                                        </div>
                                        <div class="col-md-7">
                                            <select class="select @error('allowed_files') is-invalid @enderror" name="allowed_files[]" id="allowedFiles" multiple>
                                                <option value="">Select</option>
                                                <!-- <option>jpg</option>
                                                <option>gif</option>
                                                <option>png</option> -->
                                            </select>
                                            @error('allowed_files')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-5">
                                            <label class="form-label mb-md-0">Max File Size</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control @error('max_file_size') is-invalid @enderror" placeholder="5000 MB" name="max_file_size" value="{{ $company->localization->file_settings['max_file_size'] }}">
                                            @error('max_file_size')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-end">
                            <button type="button" class="btn btn-outline-light border me-3">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <!-- jQuery -->
    <script data-cfasync="false" src="{{ asset('cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Feather Icon JS -->
    <script src="{{ asset('assets/js/feather.min.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>

    <!-- Color Picker JS -->
    <script src="{{ asset('assets/plugins/@simonwep/pickr/pickr.es5.min.js') }}"></script>

    <!-- Sticky Sidebar JS -->
    <script src="{{ asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>

    <!-- Select2 JS -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <!-- Bootstrap Tagsinput JS -->
    <script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/theme-colorpicker.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script>
        $(document).ready(function() {

            // Dynamically fetch all languages

            // Pass Laravel variable into JS
            const selectedLanguage = @json($company->localization->others['language'] ?? '');

            $.get("https://restcountries.com/v3.1/all?fields=languages", function(countries) {
                const langs = {};

                // collect all languages
                countries.forEach(c => {
                if (c.languages) {
                    Object.entries(c.languages).forEach(([code, name]) => {
                    langs[code] = name;
                    });
                }
                });

                // map for Select2
                const data = Object.entries(langs).map(([code, name]) => ({
                id: code,
                text: `${name} (${code})`
                }));

                // initialize Select2
                $("#languageSelect").select2({
                    data: data,
                    placeholder: "Select a language",
                    allowClear: true
                });

                // set pre-selected value from Laravel
                if (selectedLanguage) {
                    $("#languageSelect").val(selectedLanguage).trigger("change");
                }

            });
            // Dynamically fetch all languages end

            // Dynamically fetch all timezones
            const apiKey = "48021SO4A0W0"; 
            const apiUrl = `https://api.timezonedb.com/v2.1/list-time-zone?key=${apiKey}&format=json`;

            // Pass Laravel variable into JS
            const selectedTimezone = @json($company->localization->others['timezone'] ?? '');

            fetch(apiUrl)
            .then(res => res.json())
            .then(data => {
                const select = document.querySelector("#timezoneSelect");
                select.innerHTML = '<option value="">Select</option>';
                
                data.zones.forEach(zone => {
                    const hours = Math.floor(zone.gmtOffset / 3600);
                    const minutes = Math.abs((zone.gmtOffset % 3600) / 60);
                    const sign = hours >= 0 ? '+' : '-';
                    
                    const option = document.createElement("option");
                    option.value = zone.zoneName;
                    option.textContent = `(UTC ${sign}${String(Math.abs(hours)).padStart(2, '0')}:${String(minutes).padStart(2, '0')}) ${zone.zoneName}`;
                    select.appendChild(option);
                });

                // initialize Select2 after options are loaded
                $("#timezoneSelect").select2({
                    placeholder: "Select a timezone",
                    allowClear: true
                });

                // set pre-selected value from Laravel
                if (selectedTimezone) {
                    $("#timezoneSelect").val(selectedTimezone).trigger("change");
                }
            })
            .catch(err => console.error("Error fetching timezones:", err));
            // Dynamically fetch all timezones end

            // Fetch currencies from REST Countries API
            const selectedCurrency = @json($company->localization->currency_info['currency'] ?? '');
            $.get("https://restcountries.com/v3.1/all?fields=currencies", function(countries) {
                const currencies = {};

                // Extract currencies
                countries.forEach(c => {
                    if (c.currencies) {
                        Object.entries(c.currencies).forEach(([code, details]) => {
                            currencies[code] = details.symbol || code;
                        });
                    }
                });

                // Unique currencies
                const uniqueCurrencies = Object.entries(currencies);

                // Currency dropdown
                const $currencySelect = $("#currencySelect");
                $currencySelect.empty().append('<option value="">Select</option>');

                uniqueCurrencies.forEach(([code, symbol]) => {
                    $currencySelect.append(`<option value="${code}">${code}</option>`);
                });

                // On change, update symbol dropdown
                $currencySelect.on("change", function() {
                    const selectedCode = $(this).val();
                    const selectedSymbol = currencies[selectedCode] || "";

                    const $symbolSelect = $("#currencySymbolSelect");
                    $symbolSelect.empty().append('<option value="">Select</option>');

                    if (selectedSymbol) {
                        $symbolSelect.append(`<option value="${selectedSymbol}" selected>${selectedSymbol}</option>`);
                    }
                });

                // set pre-selected value from Laravel
                if (selectedCurrency) {
                    $("#currencySelect").val(selectedCurrency).trigger("change");
                }
            });

            $("#currencySelect").select2({
                placeholder: "Select a currency",
                allowClear: true
            });
            // Fetch currencies from REST Countries API end

            // Fetch MIME types from public mime-db
            const selectedAllowedFiles = @json($company->localization->file_settings['allowed_files'] ?? '');
            $.get("https://cdn.jsdelivr.net/gh/jshttp/mime-db/db.json", function(data) {
                const extensions = [];

                // Extract extensions from MIME db
                Object.values(data).forEach(mime => {
                    if (mime.extensions) {
                        extensions.push(...mime.extensions);
                    }
                });

                // Remove duplicates
                const uniqueExtensions = [...new Set(extensions)].sort();

                // Populate dropdown
                const $allowedFiles = $("#allowedFiles");
                $allowedFiles.empty().append('<option value="">Select</option>');

                uniqueExtensions.forEach(ext => {
                    $allowedFiles.append(`<option value="${ext}">${ext}</option>`);
                });

                // set pre-selected value from Laravel
                if (selectedAllowedFiles) {
                    $("#allowedFiles").val(selectedAllowedFiles).trigger("change");
                }
            });

            $("#allowedFiles").select2({
                placeholder: "Select an extension",
                allowClear: true
            });
            // Fetch MIME types from public mime-db end


        // End document ready function    
        });
    </script>
@endsection