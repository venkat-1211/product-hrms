@extends('common::layouts.master')

@section('title', 'Language')

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

        <x-settings-bread-crumb title="Language" />

        <x-settings-navbar main-menu="website" />
        <div class="row">
            @include('common::settings.website.sidebar')
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-header px-0 mx-3">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6 col-sm-4">
                                <h4>Language</h4>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="d-flex justify-content-sm-end align-items-center flex-wrap row-gap-2">
                                    <div class="me-3">
                                        <select class="select">
                                            <option>Select Language</option>
                                            <option>English</option>
                                            <option>Spanish</option>
                                        </select>
                                    </div>
                                    <a href="#" class="btn btn-primary">Add Language</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pb-0">
                        <div class="card mb-3">
                            <div class="card-header">
                                <div class="row align-items-center g-3">
                                    <div class="col-sm-8">
                                        <h6>Language List</h6>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="position-relative search-input">
                                            <input type="text" class="form-control" placeholder="Search">
                                            <div class="search-addon">
                                                <span><i class="ti ti-search"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="no-sort">
                                                    <div class="form-check form-check-md">
                                                        <input class="form-check-input" type="checkbox" id="select-all">
                                                    </div>
                                                </th>
                                                <th>Language</th>
                                                <th>Code</th>
                                                <th>RTL</th>
                                                <th>Default </th>
                                                <th>Total</th>
                                                <th>Done</th>
                                                <th>Progress</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-md">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="d-flex align-items-center fw-medium">
                                                        <img src="assets/img/flags/us.png" class="me-2 avatar avatar-sm avatar-rounded" alt="Img"> English
                                                    </h6>
                                                </td>
                                                <td>en</td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" checked>
                                                    </div>
                                                </td>
                                                <td>1620</td>
                                                <td>1296</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="circle-progress" data-value="80">
                                                            <span class="progress-left">
                                                                <span class="progress-bar border-warning"></span>
                                                            </span>
                                                            <span class="progress-right">
                                                                <span class="progress-bar border-warning"></span>
                                                            </span>

                                                        </div>
                                                        <div class="progress-value ms-2">80%</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="#" class="btn btn-sm btn-icon btn-light border me-2">
                                                            <i class="ti ti-download"></i>
                                                        </a>
                                                        <a href="language-web.html" class="btn btn-sm border me-2">Web</a>
                                                        <a href="language-web.html" class="btn btn-sm border me-2">App</a>
                                                        <a href="language-web.html" class="btn btn-sm border me-2">Admin</a>
                                                        <a href="#" class="btn btn-sm btn-icon btn-light border">
                                                            <i class="ti ti-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-md">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="d-flex align-items-center fw-medium">
                                                        <img src="assets/img/flags/ae.png" class="me-2 avatar avatar-sm avatar-rounded" alt="Img"> Arabic
                                                    </h6>
                                                </td>
                                                <td>ar</td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch">
                                                    </div>
                                                </td>
                                                <td>1620</td>
                                                <td>810</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="circle-progress" data-value="50">
                                                            <span class="progress-left">
                                                                <span class="progress-bar border-purple"></span>
                                                            </span>
                                                            <span class="progress-right">
                                                                <span class="progress-bar border-purple"></span>
                                                            </span>

                                                        </div>
                                                        <div class="progress-value ms-2">50%</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="#" class="btn btn-sm btn-icon btn-light border me-2">
                                                            <i class="ti ti-download"></i>
                                                        </a>
                                                        <a href="language-web.html" class="btn btn-sm border me-2">Web</a>
                                                        <a href="language-web.html" class="btn btn-sm border me-2">App</a>
                                                        <a href="language-web.html" class="btn btn-sm border me-2">Admin</a>
                                                        <a href="#" class="btn btn-sm btn-icon btn-light border">
                                                            <i class="ti ti-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-md">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="d-flex align-items-center fw-medium">
                                                        <img src="assets/img/flags/de.png" class="me-2 avatar avatar-sm avatar-rounded" alt="Img"> German
                                                    </h6>
                                                </td>
                                                <td>de</td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch">
                                                    </div>
                                                </td>
                                                <td>1620</td>
                                                <td>972</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="circle-progress" data-value="70">
                                                            <span class="progress-left">
                                                                <span class="progress-bar border-skyblue"></span>
                                                            </span>
                                                            <span class="progress-right">
                                                                <span class="progress-bar border-skyblue"></span>
                                                            </span>

                                                        </div>
                                                        <div class="progress-value ms-2">70%</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="#" class="btn btn-sm btn-icon btn-light border me-2">
                                                            <i class="ti ti-download"></i>
                                                        </a>
                                                        <a href="language-web.html" class="btn btn-sm border me-2">Web</a>
                                                        <a href="language-web.html" class="btn btn-sm border me-2">App</a>
                                                        <a href="language-web.html" class="btn btn-sm border me-2">Admin</a>
                                                        <a href="#" class="btn btn-sm btn-icon btn-light border">
                                                            <i class="ti ti-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-md">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="d-flex align-items-center fw-medium">
                                                        <img src="assets/img/flags/fr.png" class="me-2 avatar avatar-sm avatar-rounded" alt="Img"> French
                                                    </h6>
                                                </td>
                                                <td>fr</td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch">
                                                    </div>
                                                </td>
                                                <td>1620</td>
                                                <td>324</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="circle-progress" data-value="20">
                                                            <span class="progress-left">
                                                                <span class="progress-bar border-danger"></span>
                                                            </span>
                                                            <span class="progress-right">
                                                                <span class="progress-bar border-danger"></span>
                                                            </span>

                                                        </div>
                                                        <div class="progress-value ms-2">20%</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="#" class="btn btn-sm btn-icon btn-light border me-2">
                                                            <i class="ti ti-download"></i>
                                                        </a>
                                                        <a href="language-web.html" class="btn btn-sm border me-2">Web</a>
                                                        <a href="language-web.html" class="btn btn-sm border me-2">App</a>
                                                        <a href="language-web.html" class="btn btn-sm border me-2">Admin</a>
                                                        <a href="#" class="btn btn-sm btn-icon btn-light border">
                                                            <i class="ti ti-trash"></i>
                                                        </a>
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
    <script src="{{ asset('assets/js/circle-progress.js') }}"></script>
    <script src="{{ asset('assets/js/theme-colorpicker.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
@endsection