@extends('common::layouts.master')

@section('title', 'Payment Gateway')

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

    <!-- Summernote JS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-lite.min.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection

@section('content')
<div class="content">

    <x-settings-bread-crumb title="Payment Gateway" />

    <x-settings-navbar main-menu="financial" />
    <div class="row">
        @include('common::settings.financial.sidebar')
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body pb-1">
                    <div class="border-bottom mb-3 pb-3">
                        <h4>Payment Gateways</h4>
                    </div>
                    <form action="payment-gateways.html">
                        <div class="row">
                            <div class="col-xxl-6 col-xl-6 d-flex">
                                <div class="card mb-3 flex-fill">
                                    <div class="card-header d-flex align-items-center justify-content-between border-0 mb-3 pb-0">
                                        <span class="d-inline-flex align-items-center justify-content-center border rounded p-2"><img
                                                src="assets/img/payment-gateway/payment-gateway-01.svg"
                                                alt="Img"></span>
                                        <div class="d-flex align-items-center">
                                            <div class="status-toggle modal-status">
                                                <input type="checkbox" id="user1" class="check" checked>
                                                <label for="user1" class="checktoggle"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <p>PayPal is the faster, safer way to send and receive money or make an online payment.</p>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-dark rounded">
                                            <i class="ti ti-checks me-2"></i>Connected</a>
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#connect_payment"><i class="ti ti-settings fs-24 fw-normal"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 d-flex">
                                <div class="card mb-3 flex-fill">
                                    <div class="card-header d-flex align-items-center justify-content-between border-0 mb-3 pb-0">
                                        <span class="d-inline-flex align-items-center justify-content-center border rounded p-2"><img
                                                src="assets/img/payment-gateway/payment-gateway-02.svg"
                                                alt="Img"></span>
                                        <div class="d-flex align-items-center">
                                            <div class="status-toggle modal-status">
                                                <input type="checkbox" id="user2" class="check">
                                                <label for="user2" class="checktoggle"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <p>APIs to accept credit cards, manage subscriptions, send money.</p>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-dark rounded">
                                            <i class="ti ti-checks me-2"></i>Connected</a>
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#connect_payment"><i class="ti ti-settings fs-24 fw-normal"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 d-flex">
                                <div class="card mb-3 flex-fill">
                                    <div class="card-header d-flex align-items-center justify-content-between border-0 mb-3 pb-0">
                                        <span class="d-inline-flex align-items-center justify-content-center border rounded p-2"><img
                                                src="assets/img/payment-gateway/payment-gateway-03.svg"
                                                alt="Img"></span>
                                        <div class="d-flex align-items-center">
                                            <div class="status-toggle modal-status">
                                                <input type="checkbox" id="user6" class="check">
                                                <label for="user6" class="checktoggle"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <p>Allows send international money transfers and payments quickly with low fees.</p>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-dark rounded">
                                            <i class="ti ti-checks me-2"></i>Connected</a>
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#connect_payment"><i class="ti ti-settings fs-24 fw-normal"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 d-flex">
                                <div class="card mb-3 flex-fill">
                                    <div class="card-header d-flex align-items-center justify-content-between border-0 mb-3 pb-0">
                                        <span class="d-inline-flex align-items-center justify-content-center border rounded p-2"><img
                                                src="assets/img/payment-gateway/payment-gateway-04.svg"
                                                alt="Img"></span>
                                        <div class="d-flex align-items-center">
                                            <div class="status-toggle modal-status">
                                                <input type="checkbox" id="user10" class="check">
                                                <label for="user10" class="checktoggle"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <p>Paytm stands for Pay through mobile and it is India's largest mobile payments.
                                        </p>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-dark rounded">
                                            <i class="ti ti-checks me-2"></i>Connected</a>
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#connect_payment"><i class="ti ti-settings fs-24 fw-normal"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modals')
    <!-- Add Payment Gateway -->
    <div class="modal fade" id="connect_payment">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Paypal</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <form action="payment-gateways.html">
                    <div class="modal-body pb-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Api Client ID</label>
                                    <input type="text" class="form-control" placeholder="Enter Email Address">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Api Client Secret</label>
                                    <input type="text" class="form-control" placeholder="Enter API Key">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Payment Gateway -->
@endsection

@section('scripts')
    <!-- Cloudflare Email Decode Script -->
    <script data-cfasync="false" src="{{ asset('cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>

    <!-- jQuery -->
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

    <!-- Summernote JS -->
    <script src="{{ asset('assets/plugins/summernote/summernote-lite.min.js') }}"></script>

    <!-- Select2 JS -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <!-- Bootstrap Tagsinput JS -->
    <script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/theme-colorpicker.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
@endsection