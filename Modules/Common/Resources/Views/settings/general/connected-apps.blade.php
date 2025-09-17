@extends('common::layouts.master')

@section('title', 'Connected Apps')

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

    <x-settings-bread-crumb title="Connected Apps" />

    <x-settings-navbar main-menu="general" />
    <div class="row">
        @include('common::settings.general.sidebar')
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body pb-0">
                    <div class="border-bottom mb-3 pb-3">
                        <h4>Connectd Apps</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar avatar-lg bg-gray-100 me-2 flex-shrink-0">
                                                <img src="{{ asset('assets/img/settings/connected-app-01.svg') }}" class="w-auto h-auto" alt="Img">
                                            </span>
                                            <h5>Slack</h5>
                                        </div>
                                        <div class="form-check form-check-md form-switch">
                                            <input class="form-check-input me-2" type="checkbox" role="switch">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-truncate line-clamb-2">Team communication platform with channels for group discussions and direct messaging.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar avatar-lg bg-gray-100 me-2 flex-shrink-0">
                                                <img src="{{ asset('assets/img/settings/connected-app-02.svg') }}" class="w-auto h-auto" alt="Img">
                                            </span>
                                            <h5>Google Calendar</h5>
                                        </div>
                                        <div class="form-check form-check-md form-switch">
                                            <input class="form-check-input me-2" type="checkbox" role="switch">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-truncate line-clamb-2">Google Calendar is a web-based scheduling tool that allows users to create, manage, and share events.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar avatar-lg bg-gray-100 me-2 flex-shrink-0">
                                                <img src="{{ asset('assets/img/settings/connected-app-03.svg') }}" class="w-auto h-auto" alt="Img">
                                            </span>
                                            <h5>Gmail</h5>
                                        </div>
                                        <div class="form-check form-check-md form-switch">
                                            <input class="form-check-input me-2" type="checkbox" role="switch">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-truncate line-clamb-2">Gmail is a free email service by Google that offers robust spam protection & 15GB of storage.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar avatar-lg bg-gray-100 me-2 flex-shrink-0">
                                                <img src="{{ asset('assets/img/settings/connected-app-04.svg') }}" class="w-auto h-auto" alt="Img">
                                            </span>
                                            <h5>Github</h5>
                                        </div>
                                        <div class="form-check form-check-md form-switch">
                                            <input class="form-check-input me-2" type="checkbox" role="switch">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-truncate line-clamb-2">Github is a web-based platform for version control and collaboration, allowing developers to host & review code</p>
                                    </div>
                                </div>
                            </div>
                        </div>
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