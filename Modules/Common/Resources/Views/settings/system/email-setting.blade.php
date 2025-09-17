@extends('common::layouts.master')

@section('title', 'Email Settings')

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

    <x-settings-bread-crumb title="Email Settings" />

    <x-settings-navbar main-menu="system" />
    <div class="row">
        @include('common::settings.system.sidebar')
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <div class="border-bottom mb-3 pb-3">
                        <h4>Email Settings</h4>
                    </div>
                    <form action="email-settings.html">
                        <div class="border-bottom mb-3">
                            <div class="row">

                            </div>
                            <div class="row">
                                <div class="col-md-6 d-flex">
                                    <div class="card flex-fill">
                                        <div class="card-body">
                                            <div class="border-bottom pb-3 mb-3">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <div class="d-flex align-items-center">
                                                        <span class="avatar avatar-xl p-2 me-2 bg-light flex-shrink-0">
                                                            <img src="{{ asset('assets/img/settings/phpmail.svg') }}" alt="Profile">
                                                        </span>
                                                        <h5>PHP Mailer</h5>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                    </div>
                                                </div>
                                                <p>Used to send emails safely and easily via PHP code from a web server.</p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="btn btn-sm d-inline-flex align-items-center btn-dark">
                                                    <i class="ti ti-checks me-1"></i>Connected
                                                </span>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#phpmailersettings" class="btn btn-icon btn-sm text-gray-5 fs-20"><i class="ti ti-settings"></i></a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex">
                                    <div class="card flex-fill">
                                        <div class="card-body">
                                            <div class="border-bottom pb-3 mb-3">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <div class="d-flex align-items-center">
                                                        <span class="avatar avatar-xl me-2 p-2 bg-light flex-shrink-0">
                                                            <img src="{{ asset('assets/img/settings/smtp.svg') }}" alt="Profile">
                                                        </span>
                                                        <h5>SMTP</h5>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault2">
                                                    </div>
                                                </div>
                                                <p>SMTP is used to send, relay or forward messages from a mail client.</p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="btn btn-sm d-inline-flex align-items-center btn-light">
                                                    <i class="ti ti-checks me-1"></i>Connected
                                                </span>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#smtpsettings" class="btn btn-icon btn-sm text-gray-5 fs-20"><i class="ti ti-settings"></i></a>
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

@section('modals')
    <!-- Add php mailer -->
    <div class="modal fade" id="phpmailersettings">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        PHP Mailer
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="email-settings.html">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">From Email Address</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Email Password</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">From Email Name</label>
                                    <input class="form-control" type="text">
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
    <!-- /Add php mailer -->

    <!-- Add SMTP -->
    <div class="modal fade" id="smtpsettings">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        SMTP
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="email-settings.html">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">From Email Address</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Email Password</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Email Host</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Port</label>
                                    <input class="form-control" type="text">
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
    <!-- /Add  SMTP -->
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
@endsection