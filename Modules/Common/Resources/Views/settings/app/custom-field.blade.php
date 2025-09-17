@extends('common::layouts.master')

@section('title', 'Custom Field')

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

        <x-settings-bread-crumb title="Custom Field" />

        <x-settings-navbar main-menu="app" />
        <div class="row">
            @include('common::settings.app.sidebar')
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Custom Fields</h4>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new-field"><i class="ti ti-circle-plus me-2"></i>Add Fields</a>
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
                                        <th class="fw-semibold">Module</th>
                                        <th class="fw-semibold">Label</th>
                                        <th class="fw-semibold">Type</th>
                                        <th class="fw-semibold">Default Value</th>
                                        <th class="fw-semibold">Required/Disable</th>
                                        <th class="fw-semibold">Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="no-sort">
                                            <div class="form-check form-check-md">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </th>
                                        <th>Employee</th>
                                        <th class="text-gray fw-normal">Preferred Language</th>
                                        <th class="text-gray fw-normal">Select</th>
                                        <th class="text-gray fw-normal">English</th>
                                        <th class="text-gray fw-normal">
                                            Required
                                        </th>
                                        <th class="d-flex">
                                            <span class="badge badge-success badge-sm d-flex align-items-center"><i class="ti ti-point-filled"></i>Active</span>
                                        </th>
                                        <th>
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="text-gray" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit-field"><i class="ti ti-edit me-2"></i>Edit</a>
                                                    <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-trash me-2"></i>Delete</a>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="no-sort">
                                            <div class="form-check form-check-md">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </th>
                                        <th>Projects</th>
                                        <th class="text-gray fw-normal">Project Type</th>
                                        <th class="text-gray fw-normal">Select</th>
                                        <th class="text-gray fw-normal">Internal</th>
                                        <th class="text-gray fw-normal">
                                            Required
                                        </th>
                                        <th class="d-flex">
                                            <span class="badge badge-success badge-sm d-flex align-items-center"><i class="ti ti-point-filled"></i>Active</span>
                                        </th>
                                        <th>
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="text-gray" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit-field"><i class="ti ti-edit me-2"></i>Edit</a>
                                                    <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-trash me-2"></i>Delete</a>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="no-sort">
                                            <div class="form-check form-check-md">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </th>
                                        <th>Tasks</th>
                                        <th class="text-gray fw-normal">Task Type</th>
                                        <th class="text-gray fw-normal">Select</th>
                                        <th class="text-gray fw-normal">Design</th>
                                        <th class="text-gray fw-normal">
                                            Required
                                        </th>
                                        <th class="d-flex">
                                            <span class="badge badge-success badge-sm d-flex align-items-center"><i class="ti ti-point-filled"></i>Active</span>
                                        </th>
                                        <th>
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="text-gray" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                                                <div class="dropdown-menu">
                                                    <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit-field"><i class="ti ti-edit me-2"></i>Edit</a>
                                                    <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-trash me-2"></i>Delete</a>
                                                </div>
                                            </div>
                                        </th>
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

@section('modals')
    <!-- Add New Fields -->
    <div class="modal fade" id="new-field">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Add Custom Field
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="custom-fields.html">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Module</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Label</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Default Value</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Input Type</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Text</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex mb-3">
                                    <label class="form-label me-3">Required</label>
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="required" id="required1" checked>
                                        <label class="form-check-label" for="required1">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="required" type="radio" id="required2">
                                        <label class="form-check-label" for="required2">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <Select class="select">
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </Select>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-6">
                                <a href="#" class="btn btn-outline-primary w-100" data-bs-dismiss="modal" aria-label="Close">Cancel</a>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add New Fields -->

    <!-- Edit New Fields -->
    <div class="modal fade" id="edit-field">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Edit Custom Field
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="custom-fields.html">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Module</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Label</label>
                                    <input class="form-control" type="text" value="Middle Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Default Value</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Input Type</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>Text</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex mb-3">
                                    <label class="form-label me-3">Required</label>
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="required" id="required3" checked>
                                        <label class="form-check-label" for="required3">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="required" type="radio" id="required4">
                                        <label class="form-check-label" for="required4">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <Select class="select">
                                        <option selected>Active</option>
                                        <option>Inactive</option>
                                    </Select>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-6">
                                <a href="#" class="btn btn-outline-primary w-100" data-bs-dismiss="modal" aria-label="Close">Cancel</a>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit New Fields -->
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