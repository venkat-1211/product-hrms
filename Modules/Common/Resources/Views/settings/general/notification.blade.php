@extends('common::layouts.master')

@section('title', 'Notification Settings')

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

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection

@section('content')
<div class="content">

    <x-settings-bread-crumb title="Notification Settings" />

    <x-settings-navbar main-menu="general" />
    <div class="row">
        @include('common::settings.general.sidebar')
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <div class="border-bottom mb-3 pb-3">
                        <h4>Notifications</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="w-75 ps-2 border-0">Modules</th>
                                    <th class="border-0">Push</th>
                                    <th class="border-0">SMS</th>
                                    <th class="pe-0 border-0">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-0">
                                        <h5 class="mb-1 fw-medium">New Hire and Onboarding Notifications</h5>
                                        <p>Alerts when a new hire is added to the system.</p>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md form-switch me-2">
                                            <input class="form-check-input me-2" type="checkbox" role="switch" checked>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md form-switch me-2">
                                            <input class="form-check-input me-2" type="checkbox" role="switch" checked>
                                        </div>
                                    </td>
                                    <td class="pe-0">
                                        <div class="form-check form-check-md form-switch">
                                            <input class="form-check-input me-2" type="checkbox" role="switch" checked>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-0">
                                        <h5 class="mb-1 fw-medium">Time Off and Leave Requests</h5>
                                        <p>Notifications when leave requests are approved or rejected.</p>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md form-switch me-2">
                                            <input class="form-check-input me-2" type="checkbox" role="switch" checked>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md form-switch me-2">
                                            <input class="form-check-input me-2" type="checkbox" role="switch" checked>
                                        </div>
                                    </td>
                                    <td class="pe-0">
                                        <div class="form-check form-check-md form-switch">
                                            <input class="form-check-input me-2" type="checkbox" role="switch" checked>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-0">
                                        <h5 class="mb-1 fw-medium">Employee Performance and Review Updates</h5>
                                        <p>Notifications when leave requests are approved or rejected.</p>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md form-switch me-2">
                                            <input class="form-check-input me-2" type="checkbox" role="switch" checked>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md form-switch me-2">
                                            <input class="form-check-input me-2" type="checkbox" role="switch" checked>
                                        </div>
                                    </td>
                                    <td class="pe-0">
                                        <div class="form-check form-check-md form-switch">
                                            <input class="form-check-input me-2" type="checkbox" role="switch" checked>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-0">
                                        <h5 class="mb-1 fw-medium">Payroll and Compensation</h5>
                                        <p>Alerts when payroll is processed or pending approval.</p>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md form-switch me-2">
                                            <input class="form-check-input me-2" type="checkbox" role="switch" checked>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md form-switch me-2">
                                            <input class="form-check-input me-2" type="checkbox" role="switch" checked>
                                        </div>
                                    </td>
                                    <td class="pe-0">
                                        <div class="form-check form-check-md form-switch">
                                            <input class="form-check-input me-2" type="checkbox" role="switch" checked>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-0">
                                        <h5 class="mb-1 fw-medium">Job Applications and Recruitment</h5>
                                        <p>Alerts for new applications or stage updates.</p>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md form-switch me-2">
                                            <input class="form-check-input me-2" type="checkbox" role="switch" checked>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md form-switch me-2">
                                            <input class="form-check-input me-2" type="checkbox" role="switch" checked>
                                        </div>
                                    </td>
                                    <td class="pe-0">
                                        <div class="form-check form-check-md form-switch">
                                            <input class="form-check-input me-2" type="checkbox" role="switch" checked>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/theme-colorpicker.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
@endsection