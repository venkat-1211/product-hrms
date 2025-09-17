@extends('common::layouts.master')

@section('title', 'Preferences')

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

        <x-settings-bread-crumb title="Preferences" />

        <x-settings-navbar main-menu="website" />
        <div class="row">
            @include('common::settings.website.sidebar')
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-body pb-1">
                        <div class="border-bottom mb-3 pb-3">
                            <h4>Preferences</h4>
                        </div>
                        <div class="row">
                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="d-md-flex justify-content-between align-items-center border rounded bg-white p-3 mb-3">
                                    <h5 class="fw-medium fs-14">Employees</h5>
                                    <div class="status-toggle modal-status">
                                        <input type="checkbox" id="user1" class="check" checked>
                                        <label for="user1" class="checktoggle"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="d-md-flex justify-content-between align-items-center border rounded bg-white p-3 mb-3">
                                    <h5 class="fw-medium fs-14">Clients</h5>
                                    <div class="status-toggle modal-status">
                                        <input type="checkbox" id="user2" class="check" checked>
                                        <label for="user2" class="checktoggle"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="d-md-flex justify-content-between align-items-center border rounded bg-white p-3 mb-3">
                                    <h5 class="fw-medium fs-14">Projects</h5>
                                    <div class="status-toggle modal-status">
                                        <input type="checkbox" id="user3" class="check" checked>
                                        <label for="user3" class="checktoggle"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="d-md-flex justify-content-between align-items-center border rounded bg-white p-3 mb-3">
                                    <h5 class="fw-medium fs-14">Contacts</h5>
                                    <div class="status-toggle modal-status">
                                        <input type="checkbox" id="user4" class="check" checked>
                                        <label for="user4" class="checktoggle"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="d-md-flex justify-content-between align-items-center border rounded bg-white p-3 mb-3">
                                    <h5 class="fw-medium fs-14">Companies</h5>
                                    <div class="status-toggle modal-status">
                                        <input type="checkbox" id="user5" class="check" checked>
                                        <label for="user5" class="checktoggle"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="d-md-flex justify-content-between align-items-center border rounded bg-white p-3 mb-3">
                                    <h5 class="fw-medium fs-14">Deals</h5>
                                    <div class="status-toggle modal-status">
                                        <input type="checkbox" id="user6" class="check" checked>
                                        <label for="user6" class="checktoggle"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="d-md-flex justify-content-between align-items-center border rounded bg-white p-3 mb-3">
                                    <h5 class="fw-medium fs-14">Leads</h5>
                                    <div class="status-toggle modal-status">
                                        <input type="checkbox" id="user12" class="check" checked>
                                        <label for="user12" class="checktoggle"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="d-md-flex justify-content-between align-items-center border rounded bg-white p-3 mb-3">
                                    <h5 class="fw-medium fs-14">Pipeline</h5>
                                    <div class="status-toggle modal-status">
                                        <input type="checkbox" id="user7" class="check" checked>
                                        <label for="user7" class="checktoggle"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="d-md-flex justify-content-between align-items-center border rounded bg-white p-3 mb-3">
                                    <h5 class="fw-medium fs-14">Activities</h5>
                                    <div class="status-toggle modal-status">
                                        <input type="checkbox" id="user8" class="check" checked>
                                        <label for="user8" class="checktoggle"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="d-md-flex justify-content-between align-items-center border rounded bg-white p-3 mb-3">
                                    <h5 class="fw-medium fs-14">Sales</h5>
                                    <div class="status-toggle modal-status">
                                        <input type="checkbox" id="user9" class="check" checked>
                                        <label for="user9" class="checktoggle"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="d-md-flex justify-content-between align-items-center border rounded bg-white p-3 mb-3">
                                    <h5 class="fw-medium fs-14">Accounting</h5>
                                    <div class="status-toggle modal-status">
                                        <input type="checkbox" id="user10" class="check" checked>
                                        <label for="user10" class="checktoggle"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="d-md-flex justify-content-between align-items-center border rounded bg-white p-3 mb-3">
                                    <h5 class="fw-medium fs-14">Reports</h5>
                                    <div class="status-toggle modal-status">
                                        <input type="checkbox" id="user11" class="check" checked>
                                        <label for="user11" class="checktoggle"> </label>
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

    <!-- Select2 JS -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <!-- Bootstrap Tagsinput JS -->
    <script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/theme-colorpicker.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
@endsection