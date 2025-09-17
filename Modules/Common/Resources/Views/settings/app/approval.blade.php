@extends('common::layouts.master')

@section('title', 'Approval Settings')

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

        <x-settings-bread-crumb title="Approval Settings" />

        <x-settings-navbar main-menu="app" />
        <div class="row">
            @include('common::settings.app.sidebar')
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="border-bottom mb-3 pb-3">
                            <h4>Approval Settings</h4>
                        </div>
                        <form action="approval-settings.html">
                            <div class="border-bottom mb-3">
                                <div class="row">
                                    <div class="col-md-12 d-flex">
                                        <div class="flex-fill">
                                            <h6 class="mb-3">Expense Approval</h6>
                                            <div class="d-flex justify align-items-start flex-wrap row-gap-3 pb-2 mb-2">
                                                <h5>Default Expense Approval</h5>

                                                <div class="form-check ms-3">
                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                            Sequence Approval (Chain)
                                                        </label>
                                                </div>
                                                <div class="form-check ms-3">
                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option1">
                                                    <label class="form-check-label" for="exampleRadios2">
                                                            Simultaneous Approval
                                                        </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center flex-wrap roe-gap-3 mb-3">
                                                    <div class="me-3">
                                                        <label class="form-label mb-0">Expense Approvers</label>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <select class="select">
                                                            <option>Select</option>
                                                            <option>CEO</option>
                                                            <option>Manager</option>
                                                            <option>Team Lead</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="border-bottom mb-3">
                                <div class="row">
                                    <div class="col-md-12 d-flex">
                                        <div class="flex-fill">
                                            <h6 class="mb-3">Leave Approval</h6>
                                            <div class="d-flex justify align-items-start flex-wrap row-gap-3 pb-2 mb-2">
                                                <h5>Default Expense Approval</h5>
                                                <div class="form-check ms-3">
                                                    <input class="form-check-input" type="radio" name="exampleRadioss" id="sequence" value="option1" checked>
                                                    <label class="form-check-label" for="sequence">
                                                        Sequence Approval (Chain)
                                                    </label>
                                                </div>
                                                <div class="form-check ms-3">
                                                    <input class="form-check-input" type="radio" name="exampleRadioss" id="sequence1" value="option1">
                                                    <label class="form-check-label" for="sequence1">
                                                        Simultaneous Approval
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center flex-wrap roe-gap-3 mb-3">
                                                    <div class="me-3">
                                                        <label class="form-label mb-0">Leave Approvers</label>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <select class="select">
                                                            <option>Select</option>
                                                            <option>CEO</option>
                                                            <option>Manager</option>
                                                            <option>Team Lead</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-bottom mb-3">
                                <div class="row">
                                    <div class="col-md-12 d-flex">
                                        <div class="flex-fill">
                                            <h6 class="mb-3">Offer Approval</h6>
                                            <div class="d-flex justify align-items-start flex-wrap row-gap-3 pb-2 mb-2">
                                                <h5>Default Expense Approval</h5>
                                                <div class="form-check ms-3">
                                                    <input class="form-check-input" type="radio" name="exampleRadioss" id="sequence3" value="option1" checked>
                                                    <label class="form-check-label" for="sequence3">
                                                        Sequence Approval (Chain)
                                                    </label>
                                                </div>
                                                <div class="form-check ms-3">
                                                    <input class="form-check-input" type="radio" name="exampleRadioss" id="sequence4" value="option1">
                                                    <label class="form-check-label" for="sequence4">
                                                        Simultaneous Approval
                                                    </label>
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