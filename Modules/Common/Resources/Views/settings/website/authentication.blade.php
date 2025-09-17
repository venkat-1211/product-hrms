@extends('common::layouts.master')

@section('title', 'Authentication Settings')

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

        <x-settings-bread-crumb title="Authentication Settings" />

        <x-settings-navbar main-menu="website" />
        <div class="row">
            @include('common::settings.website.sidebar')
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="border-bottom mb-3 pb-3">
                            <h4>Authentication Settings</h4>
                        </div>
                        <form action="{{ route('company.authentication.setting.update', $company->account_url) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="border-bottom mb-3">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row row-gap-2 mb-3">
                                            <div class="col-md-6">
                                                <h6 class="fw-medium">Allow Registration</h6>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center">
                                                <div class="form-check form-switch me-2">
                                                    <input type="hidden" name="allow_registration" value="off">
                                                    <input class="form-check-input @error('allow_registration') is-invalid @enderror" type="checkbox" role="switch" name="allow_registration" value="on" @checked(old('allow_registration', $company->authenticationSetting->allow_registration ?? 'off') == 'on')>
                                                </div>
                                                <div class="form-check form-check-md">
                                                    <input class="form-check-input @error('allow_registration') is-invalid @enderror" type="checkbox" id="checkebox-md" name="allow_registration" value="invite_only" @checked(old('allow_registration', $company->authenticationSetting->allow_registration ?? 'off') == 'invite_only')>
                                                    <label class="form-check-label" for="checkebox-md">
                                                        Invite Only
                                                    </label>
                                                    @error('allow_registration')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="row row-gap-2 mb-3">
                                            <div class="col-md-6">
                                                <h6 class="fw-medium">Verification Required</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input type="hidden" name="verification_required" value="0">
                                                    <input class="form-check-input @error('verification_required') is-invalid @enderror" type="checkbox" role="switch" name="verification_required" value="1" @checked(old('verification_required', $company->authenticationSetting->verification_required ?? 0) == 1)>
                                                    @error('verification_required')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-gap-2 mb-3">
                                            <div class="col-md-6 d-flex">
                                                <div class="d-flex align-items-center">
                                                    <h6 class="fw-medium">Verification Expired</h6>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" class="form-control @error('verification_expired') is-invalid @enderror" placeholder="In Minutes" name="verification_expired" value="{{ old('verification_expired', $company->authenticationSetting->verification_expired ?? 0) }}">
                                                @error('verification_expired')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row row-gap-2 mb-3">
                                            <div class="col-md-6">
                                                <h6 class="fw-medium">Referral System</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input type="hidden" name="referral_system" value="0">
                                                    <input class="form-check-input @error('referral_system') is-invalid @enderror" type="checkbox" role="switch" name="referral_system" value="1" @checked(old('referral_system', $company->authenticationSetting->referral_system ?? 0) == 1)>
                                                    @error('referral_system')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-gap-2 mb-3">
                                            <div class="col-md-6 d-flex">
                                                <div class="d-flex align-items-center">
                                                    <h6 class="fw-medium">Login Type</h6>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select class="form-select @error('login_type') is-invalid @enderror" aria-label="Default select example" name="login_type">
                                                        <option @if ($company->authenticationSetting->login_type == 'email') selected @endif value="email">Email Address</option>
                                                        <option @if ($company->authenticationSetting->login_type == 'username') selected @endif value="username">Username</option>
                                                        <option @if ($company->authenticationSetting->login_type == 'phone') selected @endif value="phone">Phone Number</option>
                                                        <option @if ($company->authenticationSetting->login_type == 'username_or_email') selected @endif value="username_or_email">Username or Email</option>
                                                        <option @if ($company->authenticationSetting->login_type == 'username_or_phone') selected @endif value="username_or_phone">Username or Phone</option>
                                                        <option @if ($company->authenticationSetting->login_type == 'email_or_phone') selected @endif value="email_or_phone">Email or Phone</option>
                                                    </select>
                                                    @error('login_type')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-gap-2 mb-3">
                                            <div class="col-md-6">
                                                <h6 class="fw-medium">Password</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input type="hidden" name="password_enabled" value="0">
                                                    <input class="form-check-input @error('password_enabled') is-invalid @enderror" type="checkbox" role="switch" name="password_enabled" value="1" @checked(old('password_enabled', $company->authenticationSetting->password_enabled ?? 0) == 1)>
                                                    @error('password_enabled')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-gap-2 mb-3">
                                            <div class="col-md-6">
                                                <h6 class="fw-medium">OTP System</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input type="hidden" name="otp_system" value="0">
                                                    <input class="form-check-input @error('otp_system') is-invalid @enderror" type="checkbox" role="switch" name="otp_system" value="1" @checked(old('otp_system', $company->authenticationSetting->otp_system ?? 0) == 1)>
                                                    @error('otp_system')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-gap-2 mb-3">
                                            <div class="col-md-6 d-flex">
                                                <div class="d-flex align-items-center">
                                                    <h6 class="fw-medium">OTP Type</h6>
                                                </div>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center">
                                                <div class="form-check me-2">
                                                    <input class="form-check-input @error('otp_type') is-invalid @enderror" type="radio" name="otp_type" id="Radio-smtwo" value="sms" @checked(old('otp_type', $company->authenticationSetting->otp_type ?? '') == 'sms')>
                                                    <label class="form-check-label" for="Radio-smtwo">
                                                        SMS OTP
                                                    </label>
                                                </div>
                                                <div class="form-check me-2">
                                                    <input class="form-check-input @error('otp_type') is-invalid @enderror" type="radio" name="otp_type" id="Radio-smthree" value="email" @checked(old('otp_type', $company->authenticationSetting->otp_type ?? '') == 'email')>
                                                    <label class="form-check-label" for="Radio-smthree">
                                                        Email OTP
                                                    </label>
                                                    @error('otp_type')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
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
        $(document).ready(function () {

            // When switch changes
            $('input[name="allow_registration"][value="on"]').on('change', function () {
                if ($(this).is(':checked')) {
                    // Uncheck invite only
                    $('input[name="allow_registration"][value="invite_only"]').prop('checked', false);
                }
            });

            // When invite_only changes
            $('input[name="allow_registration"][value="invite_only"]').on('change', function () {
                if ($(this).is(':checked')) {
                    // Turn off switch
                    $('input[name="allow_registration"][value="on"]').prop('checked', false);
                }
            });

        // document ready function end
        });

    </script>
@endsection