@extends('common::layouts.master')

@section('title', 'Packages')

@section('links')

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">

    <!-- Theme Script js -->
    <script src="assets/js/theme-script.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- Feather CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Color Picker Css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css">

    <!-- Daterangepikcer CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"  rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

@endsection

@section('content')
    <div class="content">

        <!-- Breadcrumb -->
        <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
            <div class="my-auto mb-2">
                <h2 class="mb-1">Packages</h2>
                @role('ceo', 1)
                    <h1>Welcome, CEO.</h1>
                @endrole
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="ti ti-smart-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            Superadmin
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Packages List</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
                <div class="me-2 mb-2">
                    <div class="d-flex align-items-center border bg-white rounded p-1 me-2 icon-list">
                        <a href="{{ route('packages') }}" class="btn btn-icon btn-sm active bg-primary text-white me-1"><i class="ti ti-list-tree"></i></a>
                        <a href="{{ route('packages-grid') }}" class="btn btn-icon btn-sm"><i class="ti ti-layout-grid"></i></a>
                    </div>
                </div>
                <div class="me-2 mb-2">
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                            <i class="ti ti-file-export me-1"></i>Export
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end p-3">
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-pdf me-1"></i>Export as PDF</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-xls me-1"></i>Export as Excel </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mb-2">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#add_plans" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add New Plan</a>
                </div>
                <div class="ms-2 head-icons">
                    <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
                        <i class="ti ti-chevrons-up"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->

        <div class="row">

            <!-- Total Plans -->
            <div class="col-lg-3 col-md-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center overflow-hidden">
                            <div>
                                <p class="fs-12 fw-medium mb-1 text-truncate">Total Plans</p>
                                <h4>{{ optional($packages)->count() }}</h4>
                            </div>
                        </div>
                        <div>
                            <span class="avatar avatar-lg bg-primary flex-shrink-0">
                                <i class="ti ti-box fs-16"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Total Plans -->

            <!-- Total Plans -->
            <div class="col-lg-3 col-md-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center overflow-hidden">
                            <div>
                                <p class="fs-12 fw-medium mb-1 text-truncate">Active Plans</p>
                                <h4>{{ optional($packages)->where('status', 'Active')->count() }}</h4>
                            </div>
                        </div>
                        <div>
                            <span class="avatar avatar-lg bg-success flex-shrink-0">
                                <i class="ti ti-activity-heartbeat fs-16"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Total Plans -->

            <!-- Inactive Plans -->
            <div class="col-lg-3 col-md-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center overflow-hidden">
                            <div>
                                <p class="fs-12 fw-medium mb-1 text-truncate">Inactive Plans</p>
                                <h4>{{ optional($packages)->where('status', 'Inactive')->count() }}</h4>
                            </div>
                        </div>
                        <div>
                            <span class="avatar avatar-lg bg-danger flex-shrink-0">
                                <i class="ti ti-player-pause fs-16"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Inactive Companies -->

            <!-- No of Plans  -->
            <div class="col-lg-3 col-md-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center overflow-hidden">
                            <div>
                                <p class="fs-12 fw-medium mb-1 text-truncate">No of Plan Types</p>
                                <h4>{{ $typeCount }}</h4>
                            </div>
                        </div>
                        <div>
                            <span class="avatar avatar-lg bg-skyblue flex-shrink-0">
                                <i class="ti ti-mask fs-16"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /No of Plans -->

        </div>

        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                <h5>Plan List</h5>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">
                    <div class="me-3">
                        <div class="input-icon-end position-relative">
                            <input type="text" class="form-control date-range bookingrange" placeholder="dd/mm/yyyy - dd/mm/yyyy">
                            <span class="input-icon-addon">
                                <i class="ti ti-chevron-down"></i>
                            </span>
                        </div>
                    </div>
                    <div class="dropdown me-3">
                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                            Select Plan
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end p-3">
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Monthly</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Yearly</a>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown me-3">
                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                            Select Status
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end p-3">
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Active</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Inactive</a>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                            Sort By : Last 7 Days
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end p-3">
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Recently Added</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Ascending</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Desending</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Last Month</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Last 7 Days</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="custom-datatable-filter table-responsive">
                    <table class="table" id="plans-datatable">
                        <thead class="thead-light">
                            <tr>
                                <th class="no-sort">
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox" id="select-all">
                                    </div>
                                </th>
                                <th>Plan Name</th>
                                <th>Plan Type</th>
                                <th>Total Subscribers</th>
                                <th>Price</th>
                                <th>Created Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('modals')
    <!-- Add Plan -->
    <div class="modal fade" id="add_plans">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Plan</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <form id="addPlanForm" action="{{ route('package.store') }}" method="POST">
                    @csrf
                    <div class="modal-body pb-0">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Plan Name<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control @error('name', 'addPlan') is-invalid @enderror" placeholder="Plan Name" name="name" value="{{ old('name') }}">
                                    @error('name', 'addPlan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Plan Type<span class="text-danger"> *</span></label>
                                    <select class="select @error('type', 'addPlan') is-invalid @enderror" name="type">
                                        <option disabled selected>Select</option>
                                        <option value="Monthly" {{ old('type') == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                                        <option value="Yearly" {{ old('type') == 'Yearly' ? 'selected' : '' }}>Yearly</option>
                                        <option value="Lifetime" {{ old('type') == 'Lifetime' ? 'selected' : '' }}>Lifetime</option>
                                    </select>
                                    @error('type', 'addPlan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Plan Position<span class="text-danger"> *</span></label>
                                    <select class="select @error('position', 'addPlan') is-invalid @enderror" name="position">
                                        <option disabled selected>Select</option>
                                        <option value="1" {{ old('position') == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('position') == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('position') == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('position') == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('position') == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('position', 'addPlan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Plan Currency<span class="text-danger"> *</span></label>
                                    <select class="js-example-basic-single select2 @error('currency', 'addPlan') is-invalid @enderror" name="currency">
                                        <option disabled selected>Select</option>
                                        <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>USD</option>
                                        <option value="EUR" {{ old('currency') == 'EUR' ? 'selected' : '' }}>EUR</option>
                                        <option value="INR" {{ old('currency') == 'INR' ? 'selected' : '' }}>INR</option>
                                        <option value="GBP" {{ old('currency') == 'GBP' ? 'selected' : '' }}>GBP</option>
                                        <option value="CAD" {{ old('currency') == 'CAD' ? 'selected' : '' }}>CAD</option>
                                        <option value="JPY" {{ old('currency') == 'JPY' ? 'selected' : '' }}>JPY</option>
                                    </select>
                                    @error('currency', 'addPlan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Plan Price<span class="text-danger"> *</span></label>
                                    <div class="pass-group">
                                        <input type="number" class="form-control @error('price', 'addPlan') is-invalid @enderror" name="price" value="{{ old('price') }}">
                                        @error('price', 'addPlan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Discount Type<span class="text-danger"> *</span></label>
                                    <div class="pass-group">
                                        <select class="select @error('discount_type', 'addPlan') is-invalid @enderror" name="discount_type">
                                            <option disabled selected>Select</option>
                                            <option value="Fixed" {{ old('discount_type') == 'Fixed' ? 'selected' : '' }}>Fixed</option>
                                            <option value="Percentage" {{ old('discount_type') == 'Percentage' ? 'selected' : '' }}>Percentage</option>
                                        </select>
                                        @error('discount_type', 'addPlan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Discount<span class="text-danger"> *</span></label>
                                    <div class="pass-group">
                                        <input type="number" class="form-control @error('discount', 'addPlan') is-invalid @enderror" name="discount" value="{{ old('discount') }}">
                                        @error('discount', 'addPlan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Limitations Invoices</label>
                                    <input type="number" class="form-control @error('limitation_invoices', 'addPlan') is-invalid @enderror" name="limitation_invoices" value="{{ old('limitation_invoices') }}">
                                    @error('limitation_invoices', 'addPlan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Max Users</label>
                                    <input type="number" class="form-control @error('max_users', 'addPlan') is-invalid @enderror" name="max_users" value="{{ old('max_users') }}">
                                    @error('max_users', 'addPlan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Product</label>
                                    <input type="text" class="form-control @error('product', 'addPlan') is-invalid @enderror" name="product" value="{{ old('product') }}">
                                    @error('product', 'addPlan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Supplier</label>
                                    <input type="text" class="form-control @error('supplier', 'addPlan') is-invalid @enderror" name="supplier" value="{{ old('supplier') }}">
                                    @error('supplier', 'addPlan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6>Plan Modules</h6>
                                    <div class="form-check d-flex align-items-center">
                                        <label class="form-check-label mt-0 text-dark fw-medium">
                                            <input class="form-check-input @error('modules', 'addPlan') is-invalid @enderror" type="checkbox" id="selectAllModules">
                                            <span id="selectAllModulesText">Select All</span>
                                            @error('modules', 'addPlan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @forelse ($menus as $menu)
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="form-check d-flex align-items-center mb-3">
                                            <label class="form-check-label mt-0 text-dark fw-medium">
                                                <input class="form-check-input module-checkbox" type="checkbox" value="{{ $menu->id }}" name="modules[]" {{ in_array($menu->id, old('modules', [])) ? 'checked' : '' }}>
                                                {{ $menu->name }}
                                            </label>
                                        </div>
                                    </div>
                                @empty
                                    <x-no-data-available color="warning" message="No menus available" />
                                @endforelse
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6>Plan Departments</h6>
                                    <div class="form-check d-flex align-items-center">
                                        <label class="form-check-label mt-0 text-dark fw-medium">
                                            <input class="form-check-input @error('departments', 'addPlan') is-invalid @enderror" type="checkbox" id="selectAllDepartments">
                                            <span id="selectAllDepartmentsText">Select All</span>
                                            @error('departments', 'addPlan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @forelse ($departments as $department)
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="form-check d-flex align-items-center mb-3">
                                            <label class="form-check-label mt-0 text-dark fw-medium">
                                                <input class="form-check-input department-checkbox" type="checkbox" value="{{ $department->id }}" name="departments[]" {{ in_array($department->id, old('departments', [])) ? 'checked' : '' }}>
                                                {{ $department->display_name }}
                                            </label>
                                        </div>
                                    </div>
                                @empty
                                    <x-no-data-available color="warning" message="No roles available" />
                                @endforelse
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6>Plan Roles</h6>
                                    <div class="form-check d-flex align-items-center">
                                        <label class="form-check-label mt-0 text-dark fw-medium">
                                            <input class="form-check-input @error('roles', 'addPlan') is-invalid @enderror" type="checkbox" id="selectAllRoles">
                                            <span id="selectAllRolesText">Select All</span>
                                            @error('roles', 'addPlan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @forelse ($roles as $role)
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="form-check d-flex align-items-center mb-3">
                                            <label class="form-check-label mt-0 text-dark fw-medium">
                                                <input class="form-check-input role-checkbox" type="checkbox" value="{{ $role->id }}" name="roles[]" {{ in_array($role->id, old('roles', [])) ? 'checked' : '' }}>
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                    </div>
                                @empty
                                    <x-no-data-available color="warning" message="No roles available" />
                                @endforelse`
                            </div>
                            <div class="row align-items-center gx-3">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="flex-fill">
                                            <label class="form-label">Trial Days</label>
                                            <input type="number" class="form-control @error('trial_days', 'addPlan') is-invalid @enderror" name="trial_days" value="{{ old('trial_days') }}">
                                            @error('trial_days', 'addPlan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Status<span class="text-danger"> *</span></label>
                                        <select class="select @error('status', 'addPlan') is-invalid @enderror" name="status">
                                            <option disabled selected>Select</option>
                                            <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                                            <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status', 'addPlan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-block align-items-center ms-3">
                                    <label class="form-check-label mt-0 me-2 text-dark fw-medium">Is Recommended</label>
                                    <div class="form-check form-switch me-2">
                                        <input class="form-check-input me-2 @error('is_recommended', 'addPlan') is-invalid @enderror" type="checkbox" role="switch" name="is_recommended" {{ old('is_recommended') ? 'checked' : '' }} value="1">
                                        @error('is_recommended', 'addPlan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-center mb-3">
                                    <label class="form-check-label mt-0 me-2 text-dark fw-medium">Access Trial</label>
                                    <div class="form-check form-switch me-2">
                                        <input class="form-check-input me-2 @error('access_trial', 'addPlan') is-invalid @enderror" type="checkbox" role="switch" name="access_trial" {{ old('access_trial') ? 'checked' : '' }} value="1">
                                        @error('access_trial', 'addPlan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-center mb-3">
                                    <label class="form-check-label mt-0 me-2 text-dark fw-medium">UI Cusomization</label>
                                    <div class="form-check form-switch me-2">
                                        <input class="form-check-input me-2 @error('ui_customize', 'addPlan') is-invalid @enderror" type="checkbox" role="switch" name="ui_customize" {{ old('ui_customize') ? 'checked' : '' }} value="1">
                                        @error('ui_customize', 'addPlan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control @error('description', 'addPlan') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
                                    @error('description', 'addPlan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary add-plan">Add Plan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Plan -->

    <!-- Edit Plan -->
    <div class="modal fade" id="edit_plans">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Plan</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <form id="addPlanForm" action="{{ route('package.store') }}" method="POST">
                    @csrf
                    <div class="modal-body pb-0">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Plan Name<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control @error('name', 'addPlan') is-invalid @enderror" placeholder="Plan Name" name="name" value="{{ old('name') }}">
                                    @error('name', 'addPlan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Plan Type<span class="text-danger"> *</span></label>
                                    <select class="select @error('type', 'addPlan') is-invalid @enderror" name="type">
                                        <option disabled selected>Select</option>
                                        <option value="Monthly" {{ old('type') == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                                        <option value="Yearly" {{ old('type') == 'Yearly' ? 'selected' : '' }}>Yearly</option>
                                        <option value="Lifetime" {{ old('type') == 'Lifetime' ? 'selected' : '' }}>Lifetime</option>
                                    </select>
                                    @error('type', 'addPlan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Plan Position<span class="text-danger"> *</span></label>
                                    <select class="select @error('position', 'addPlan') is-invalid @enderror" name="position">
                                        <option disabled selected>Select</option>
                                        <option value="1" {{ old('position') == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('position') == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('position') == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('position') == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('position') == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('position', 'addPlan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Plan Currency<span class="text-danger"> *</span></label>
                                    <select class="js-example-basic-single select2 @error('currency', 'addPlan') is-invalid @enderror" name="currency">
                                        <option disabled selected>Select</option>
                                        <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>USD</option>
                                        <option value="EUR" {{ old('currency') == 'EUR' ? 'selected' : '' }}>EUR</option>
                                        <option value="INR" {{ old('currency') == 'INR' ? 'selected' : '' }}>INR</option>
                                        <option value="GBP" {{ old('currency') == 'GBP' ? 'selected' : '' }}>GBP</option>
                                        <option value="CAD" {{ old('currency') == 'CAD' ? 'selected' : '' }}>CAD</option>
                                        <option value="JPY" {{ old('currency') == 'JPY' ? 'selected' : '' }}>JPY</option>
                                    </select>
                                    @error('currency', 'addPlan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Plan Price<span class="text-danger"> *</span></label>
                                    <div class="pass-group">
                                        <input type="number" class="form-control @error('price', 'addPlan') is-invalid @enderror" name="price" value="{{ old('price') }}">
                                        @error('price', 'addPlan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Discount Type<span class="text-danger"> *</span></label>
                                    <div class="pass-group">
                                        <select class="select @error('discount_type', 'addPlan') is-invalid @enderror" name="discount_type">
                                            <option disabled selected>Select</option>
                                            <option value="Fixed" {{ old('discount_type') == 'Fixed' ? 'selected' : '' }}>Fixed</option>
                                            <option value="Percentage" {{ old('discount_type') == 'Percentage' ? 'selected' : '' }}>Percentage</option>
                                        </select>
                                        @error('discount_type', 'addPlan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Discount<span class="text-danger"> *</span></label>
                                    <div class="pass-group">
                                        <input type="number" class="form-control @error('discount', 'addPlan') is-invalid @enderror" name="discount" value="{{ old('discount') }}">
                                        @error('discount', 'addPlan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Limitations Invoices</label>
                                    <input type="number" class="form-control @error('limitation_invoices', 'addPlan') is-invalid @enderror" name="limitation_invoices" value="{{ old('limitation_invoices') }}">
                                    @error('limitation_invoices', 'addPlan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Max Users</label>
                                    <input type="number" class="form-control @error('max_users', 'addPlan') is-invalid @enderror" name="max_users" value="{{ old('max_users') }}">
                                    @error('max_users', 'addPlan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Product</label>
                                    <input type="text" class="form-control @error('product', 'addPlan') is-invalid @enderror" name="product" value="{{ old('product') }}">
                                    @error('product', 'addPlan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Supplier</label>
                                    <input type="text" class="form-control @error('supplier', 'addPlan') is-invalid @enderror" name="supplier" value="{{ old('supplier') }}">
                                    @error('supplier', 'addPlan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6>Plan Modules</h6>
                                    <div class="form-check d-flex align-items-center">
                                        <label class="form-check-label mt-0 text-dark fw-medium">
                                            <input class="form-check-input @error('modules', 'addPlan') is-invalid @enderror" type="checkbox" id="selectAllModules">
                                            <span id="selectAllModulesText">Select All</span>
                                            @error('modules', 'addPlan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @forelse ($menus as $menu)
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="form-check d-flex align-items-center mb-3">
                                            <label class="form-check-label mt-0 text-dark fw-medium">
                                                <input class="form-check-input module-checkbox" type="checkbox" value="{{ $menu->id }}" name="modules[]" {{ in_array($menu->id, old('modules', [])) ? 'checked' : '' }}>
                                                {{ $menu->name }}
                                            </label>
                                        </div>
                                    </div>
                                @empty
                                    <x-no-data-available color="warning" message="No menus available" />
                                @endforelse
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6>Plan Roles</h6>
                                    <div class="form-check d-flex align-items-center">
                                        <label class="form-check-label mt-0 text-dark fw-medium">
                                            <input class="form-check-input @error('roles', 'addPlan') is-invalid @enderror" type="checkbox" id="selectAllRoles">
                                            <span id="selectAllRolesText">Select All</span>
                                            @error('roles', 'addPlan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @forelse ($roles as $role)
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="form-check d-flex align-items-center mb-3">
                                            <label class="form-check-label mt-0 text-dark fw-medium">
                                                <input class="form-check-input role-checkbox" type="checkbox" value="{{ $role->id }}" name="roles[]" {{ in_array($role->id, old('roles', [])) ? 'checked' : '' }}>
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                    </div>
                                @empty
                                    <x-no-data-available color="warning" message="No roles available" />
                                @endforelse
                            </div>
                            <div class="row align-items-center gx-3">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="flex-fill">
                                            <label class="form-label">Trial Days</label>
                                            <input type="number" class="form-control @error('trial_days', 'addPlan') is-invalid @enderror" name="trial_days" value="{{ old('trial_days') }}">
                                            @error('trial_days', 'addPlan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Status<span class="text-danger"> *</span></label>
                                        <select class="select @error('status', 'addPlan') is-invalid @enderror" name="status">
                                            <option disabled selected>Select</option>
                                            <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                                            <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status', 'addPlan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-block align-items-center ms-3">
                                    <label class="form-check-label mt-0 me-2 text-dark fw-medium">Is Recommended</label>
                                    <div class="form-check form-switch me-2">
                                        <input class="form-check-input me-2 @error('is_recommended', 'addPlan') is-invalid @enderror" type="checkbox" role="switch" name="is_recommended" {{ old('is_recommended') ? 'checked' : '' }} value="1">
                                        @error('is_recommended', 'addPlan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-center mb-3">
                                    <label class="form-check-label mt-0 me-2 text-dark fw-medium">Access Trial</label>
                                    <div class="form-check form-switch me-2">
                                        <input class="form-check-input me-2 @error('access_trial', 'addPlan') is-invalid @enderror" type="checkbox" role="switch" name="access_trial" {{ old('access_trial') ? 'checked' : '' }} value="1">
                                        @error('access_trial', 'addPlan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-center mb-3">
                                    <label class="form-check-label mt-0 me-2 text-dark fw-medium">UI Cusomization</label>
                                    <div class="form-check form-switch me-2">
                                        <input class="form-check-input me-2 @error('ui_customize', 'addPlan') is-invalid @enderror" type="checkbox" role="switch" name="ui_customize" {{ old('ui_customize') ? 'checked' : '' }} value="1">
                                        @error('ui_customize', 'addPlan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control @error('description', 'addPlan') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
                                    @error('description', 'addPlan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary add-plan">Add Plan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Edit Plan -->

    <!-- Delete Modal -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <span class="avatar avatar-xl bg-transparent-danger text-danger mb-3">
                        <i class="ti ti-trash-x fs-36"></i>
                    </span>
                    <h4 class="mb-1">Confirm Delete</h4>
                    <p class="mb-3">You want to delete all the marked items, this cant be undone once you delete.</p>
                    <div class="d-flex justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</a>
                        <!-- <a href="packages.html" class="btn btn-danger">Yes, Delete</a> -->
                        <button type="button" class="btn btn-danger confirm-delete-plan">Yes, Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Modal -->
@endsection

@section('scripts')
    <!-- Cloudflare Email Decode -->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap Bundle JS (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Feather Icons -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <!-- jQuery Slimscroll -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>

    <!-- Pickr Color Picker -->
    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.es5.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    

    <!-- Daterangepikcer JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/6.0.0/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/theme-colorpicker.js"></script>
    <script src="assets/js/script.js"></script>

    <script>
        $(document).ready(function() {

            var plansDatatable = $('#plans-datatable').DataTable({
                processing: true,
                serverSide: true,
                // pageLength: 1,
                ajax: '{{ route("package.data-table") }}',
                columns: [
                    { data: 'checkbox', name: 'checkbox', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'type', name: 'type' },
                    { data: 'subscribers', name: 'subscribers', orderable: false, searchable: false },
                    { data: 'price', name: 'price' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'status', name: 'status', orderable: false, searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });

            // Select2 Loaded for Mosal Inside
            $('.js-example-basic-single').select2({
                dropdownParent: $('#add_plans')
            });

            // Select All Modules Button Click To All checkbox check
            $("#selectAllModules").click(function () {
                $(".module-checkbox").prop('checked', $(this).prop('checked'));
                if ($('.module-checkbox:checked').length === $('.module-checkbox').length) {
                    $('#selectAllModulesText').text('Diselect All');
                } else {
                    $('#selectAllModulesText').text('Select All');
                }
            });

            // Individual Module check box check to select all modules check box Trigger
            $(document).on('click', '.module-checkbox', function () {
            $('#selectAllModules').prop('checked', $('.module-checkbox:checked').length === $('.module-checkbox').length);
            if ($('.module-checkbox:checked').length === $('.module-checkbox').length) {
                    $('#selectAllModulesText').text('Diselect All');
                } else {
                    $('#selectAllModulesText').text('Select All');
                }
            });

            // Select All Roles Button Click To All checkbox check
            $("#selectAllRoles").click(function () {
                $(".role-checkbox").prop('checked', $(this).prop('checked'));
                if ($('.role-checkbox:checked').length === $('.role-checkbox').length) {
                    $('#selectAllRolesText').text('Diselect All');
                } else {
                    $('#selectAllRolesText').text('Select All');
                }
            });

            // Individual Role check box check to select all modules check box Trigger
            $(document).on('click', '.role-checkbox', function () {
            $('#selectAllRoles').prop('checked', $('.role-checkbox:checked').length === $('.role-checkbox').length);
            if ($('.role-checkbox:checked').length === $('.role-checkbox').length) {
                    $('#selectAllRolesText').text('Diselect All');
                } else {
                    $('#selectAllRolesText').text('Select All');
                }
            });

            // Select All Departments Button Click To All checkbox check
            $("#selectAllDepartments").click(function () {
                $(".department-checkbox").prop('checked', $(this).prop('checked'));
                if ($('.department-checkbox:checked').length === $('.department-checkbox').length) {
                    $('#selectAllDepartmentsText').text('Diselect All');
                } else {
                    $('#selectAllDepartmentsText').text('Select All');
                }
            });

            // Individual Role check box check to select all modules check box Trigger
            $(document).on('click', '.department-checkbox', function () {
            $('#selectAllDepartments').prop('checked', $('.department-checkbox:checked').length === $('.department-checkbox').length);
            if ($('.department-checkbox:checked').length === $('.department-checkbox').length) {
                    $('#selectAllDepartmentsText').text('Diselect All');
                } else {
                    $('#selectAllDepartmentsText').text('Select All');
                }
            });

            // Delete Plan

            $(document).on('click', '.confirm-delete-plan', function () {
                var id = $(this).data('id');
                $.ajax({
                        url: '{{ route('package.delete', ':id') }}'.replace(':id', id),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id
                        },
                        success: function (response) {
                            $('#delete_modal').modal('hide');
                            showToast('success', response.success);
                            plansDatatable.ajax.reload(null, false);
                        },
                        error: function () {
                            showToast('error', 'Something went wrong');
                        }
                });
            });
            
            $('#delete_modal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var modal = $(this);
                modal.find('.confirm-delete-plan').data('id', id);
            });


        // End Document Ready
        });
    </script>

    @if ($errors->hasBag('addPlan'))
    <script>
        $(document).ready(function () {
            $('#add_plans').modal('show');
        });
    </script>
    @endif

@endsection

