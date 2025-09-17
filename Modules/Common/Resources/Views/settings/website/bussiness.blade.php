@extends('common::layouts.master')

@section('title', 'Bussiness Settings')

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

    <x-settings-bread-crumb title="Bussiness Settings" />

    <x-settings-navbar main-menu="website" />
    <div class="row">
        @include('common::settings.website.sidebar')
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <div class="border-bottom mb-3 pb-3">
                        <h4>Business Settings</h4>
                    </div>
                    <form action="bussiness-settings.html">
                        <div class="border-bottom mb-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <h6 class="mb-3">Basic Information</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label mb-md-0">Company Name</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label mb-md-0">Email Address</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label mb-md-0">Phone</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label mb-md-0">Fax</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label class="form-label mb-md-0">Web</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mb-3">
                            <h6 class="mb-3">Company Images</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center flex-wrap row-gap-3 bg-light w-100 rounded p-3 mb-4">
                                        <div class="d-flex align-items-center justify-content-center avatar avatar-xxl bg-white rounded border border-dashed me-2 flex-shrink-0 text-dark frames px-2">
                                            <img src="assets/img/logo.svg" class="img-fluid" alt="logo">
                                        </div>
                                        <div class="profile-upload">
                                            <div class="mb-2">
                                                <h6 class="mb-1">White Logo</h6>
                                                <p class="fs-12">Recommended image size is 160px x 50px</p>
                                            </div>
                                            <div class="profile-uploader d-flex align-items-center">
                                                <div class="drag-upload-btn btn btn-sm btn-primary me-2">
                                                    Change
                                                    <input type="file" class="form-control image-sign" multiple="">
                                                </div>
                                                <a href="javascript:void(0);" class="btn btn-light btn-sm">Cancel</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center flex-wrap row-gap-3 bg-light w-100 rounded p-3 mb-4">
                                        <div class="d-flex align-items-center justify-content-center avatar bg-dark avatar-xxl rounded border border-dashed me-2 px-2 flex-shrink-0 text-dark frames">
                                            <img src="assets/img/logo-white.svg" class="img-fluid text-white" alt="logo">
                                        </div>
                                        <div class="profile-upload">
                                            <div class="mb-2">
                                                <h6 class="mb-1">Dark Logo</h6>
                                                <p class="fs-12">Recommended image size is 160px x 50px</p>
                                            </div>
                                            <div class="profile-uploader d-flex align-items-center">
                                                <div class="drag-upload-btn btn btn-sm btn-primary me-2">
                                                    Change
                                                    <input type="file" class="form-control image-sign" multiple="">
                                                </div>
                                                <a href="javascript:void(0);" class="btn btn-light btn-sm">Cancel</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center flex-wrap row-gap-3 bg-light w-100 rounded p-3 mb-4">
                                        <div class="d-flex align-items-center justify-content-center avatar avatar-xxl bg-white rounded border border-dashed me-2 p-3 flex-shrink-0 text-dark frames">
                                            <img src="assets/img/logo-small.svg" class="img-fluid" alt="logo">
                                        </div>
                                        <div class="profile-upload">
                                            <div class="mb-2">
                                                <h6 class="mb-1">White Mini Logo</h6>
                                                <p class="fs-12">Recommended image size is 80px x 80px</p>
                                            </div>
                                            <div class="profile-uploader d-flex align-items-center">
                                                <div class="drag-upload-btn btn btn-sm btn-primary me-2">
                                                    Change
                                                    <input type="file" class="form-control image-sign" multiple="">
                                                </div>
                                                <a href="javascript:void(0);" class="btn btn-light btn-sm">Cancel</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center flex-wrap row-gap-3 bg-light w-100 rounded p-3 mb-4">
                                        <div class="d-flex align-items-center justify-content-center avatar avatar-xxl bg-dark rounded border border-dashed me-2 flex-shrink-0 text-dark frames">
                                            <i class="ti ti-photo text-gray-3 fs-16"></i>
                                        </div>
                                        <div class="profile-upload">
                                            <div class="mb-2">
                                                <h6 class="mb-1">Dark Mini Logo</h6>
                                                <p class="fs-12">Recommended image size is 80px x 80px</p>
                                            </div>
                                            <div class="profile-uploader d-flex align-items-center">
                                                <div class="drag-upload-btn btn btn-sm btn-primary me-2">
                                                    Upload
                                                    <input type="file" class="form-control image-sign" multiple="">
                                                </div>
                                                <a href="javascript:void(0);" class="btn btn-light btn-sm">Cancel</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center flex-wrap row-gap-3 bg-light w-100 rounded p-3 mb-4">
                                        <div class="d-flex align-items-center justify-content-center avatar avatar-xxl rounded bg-white p-3 border border-dashed me-2 flex-shrink-0 text-dark frames">
                                            <img src="assets/img/logo-small.svg" class="img-fluid" alt="logo">
                                        </div>
                                        <div class="profile-upload">
                                            <div class="mb-2">
                                                <h6 class="mb-1">Favicon</h6>
                                                <p class="fs-12">Recommended image size is 128px x 128px</p>
                                            </div>
                                            <div class="profile-uploader d-flex align-items-center">
                                                <div class="drag-upload-btn btn btn-sm btn-primary me-2">
                                                    Change
                                                    <input type="file" class="form-control image-sign" multiple="">
                                                </div>
                                                <a href="javascript:void(0);" class="btn btn-light btn-sm">Cancel</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center flex-wrap row-gap-3 bg-light w-100 rounded p-3 mb-4">
                                        <div class="d-flex align-items-center justify-content-center avatar avatar-xxl rounded bg-white p-3 border border-dashed me-2 flex-shrink-0 text-dark frames">
                                            <img src="assets/img/logo-small.svg" class="img-fluid" alt="logo">
                                        </div>
                                        <div class="profile-upload">
                                            <div class="mb-2">
                                                <h6 class="mb-1">Apple Icon</h6>
                                                <p class="fs-12">Recommended image size is 180px x 180px</p>
                                            </div>
                                            <div class="profile-uploader d-flex align-items-center">
                                                <div class="drag-upload-btn btn btn-sm btn-primary me-2">
                                                    Change
                                                    <input type="file" class="form-control image-sign" multiple="">
                                                </div>
                                                <a href="javascript:void(0);" class="btn btn-light btn-sm">Cancel</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mb-3">
                            <h6 class="mb-3">Address Information</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label class="form-label mb-md-0">Address</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label mb-md-0">Country</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option>USA</option>
                                                    <option>Canada</option>
                                                    <option>Germany</option>
                                                    <option>France</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label mb-md-0">State</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option >California</option>
                                                    <option>New York</option>
                                                    <option>Texas</option>
                                                    <option>Florida</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label mb-md-0">City</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="select">
                                                <option>Select</option>
                                                <option>Los Angeles</option>
                                                <option>San Diego</option>
                                                <option>Fresno</option>
                                                <option>San Francisco</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label mb-md-0">Postal Code</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control">
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
@endsection