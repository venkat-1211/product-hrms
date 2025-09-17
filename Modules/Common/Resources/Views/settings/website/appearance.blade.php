@extends('common::layouts.master')

@section('title', 'Appearance')

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

    <x-settings-bread-crumb title="Appearance" />

    <x-settings-navbar main-menu="website" />
    <div class="row">
        @include('common::settings.website.sidebar')
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <div class="border-bottom mb-3 pb-3">
                        <h4>Appearance</h4>
                    </div>
                    <form action="appearance.html">
                        <div class="border-bottom mb-3">
                            <div class="row align-items-center">
                                <div class="col-xl-3 col-lg-12 col-md-3">
                                    <div class="setting-info mb-4">
                                        <h6 class="fs-14 fw-medium">Select Theme</h6>
                                    </div>
                                </div>
                                <div class="col-xl-9 col-lg-12 col-md-9">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <div class="card shadow-none border-primary">
                                                <div class="card-body">
                                                    <a href="#">
                                                        <div class="border rounded border-gray mb-2">
                                                            <img src="assets/img/theme/light.svg" class="img-fluid rounded" alt="theme">
                                                        </div>
                                                        <p class="text-dark text-center">Light</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="me-3">
                                            <div class="card shadow-none">
                                                <div class="card-body">
                                                    <a href="#">
                                                        <div class="border rounded border-gray mb-2">
                                                            <img src="assets/img/theme/dark.svg" class="img-fluid rounded" alt="theme">
                                                        </div>
                                                        <p class="text-dark text-center">Dark</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="card shadow-none">
                                                <div class="card-body">
                                                    <a href="#">
                                                        <div class="border rounded border-gray mb-2">
                                                            <img src="assets/img/theme/automatic.svg" class="img-fluid rounded" alt="theme">
                                                        </div>
                                                        <p class="text-dark text-center">Automatic</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-xl-3 col-lg-12 col-md-3">
                                    <div class="setting-info mb-4">
                                        <h6 class="fs-14 fw-medium">Accent Color</h6>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-12 col-md-4">
                                    <div class="theme-colors mb-4">
                                        <ul class="d-flex align-items-center">
                                            <li>
                                                <span class="themecolorset">
                                                    <span class="primecolor bg-primary">
                                                        <span class="colorcheck text-white"><i class="ti ti-check text-primary fs-10"></i></span>
                                                </span>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="themecolorset">
                                                    <span class="primecolor bg-secondary">
                                                        <span class="colorcheck text-white"><i class="ti ti-check text-primary fs-10"></i></span>
                                                </span>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="themecolorset">
                                                    <span class="primecolor bg-info">
                                                        <span class="colorcheck text-white"><i class="ti ti-check text-primary fs-10"></i></span>
                                                </span>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="themecolorset">
                                                    <span class="primecolor bg-purple">
                                                        <span class="colorcheck text-white"><i class="ti ti-check text-primary fs-10"></i></span>
                                                </span>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="themecolorset">
                                                    <span class="primecolor bg-pink">
                                                        <span class="colorcheck text-white"><i class="ti ti-check text-primary fs-10"></i></span>
                                                </span>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="themecolorset">
                                                    <span class="primecolor bg-warning">
                                                        <span class="colorcheck text-white"><i class="ti ti-check text-primary fs-10"></i></span>
                                                </span>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="themecolorset active">
                                                    <span class="primecolor bg-danger">
                                                        <span class="colorcheck text-white"><i class="ti ti-check text-primary fs-10"></i></span>
                                                </span>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center mb-4">
                                <div class="col-xl-3 col-lg-12 col-md-3">
                                    <div class="">
                                        <h6 class="fs-14 fw-medium">Sidebar Size</h6>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-12 col-md-3">
                                    <select class="select">
                                        <option >Select</option>
                                        <option>Small - 85px</option>
                                        <option>Large - 250px</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <div class="col-xl-3 col-lg-12 col-md-3">
                                    <div class="">
                                        <h6 class="fs-14 fw-medium">Font Family</h6>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-12 col-md-3">
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Nunito</option>
                                        <option>Poppins</option>
                                    </select>
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
@endsection