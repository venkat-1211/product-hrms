@extends('common::layouts.master')

@section('title', 'Holidays')

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

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/@simonwep/pickr/themes/nano.min.css') }}">

    <!-- Daterangepikcer CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection

@section('content')
<div class="content">

    <!-- Breadcrumb -->
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">Holidays</h2>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="ti ti-smart-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        Employee
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Holidays</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
            <div class="mb-2">
                @permission('holidays_add|holidays')
                    <a href="#" data-bs-toggle="modal" data-bs-target="#add_holiday" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add Holiday</a>
                @endpermission
            </div>
            <div class="head-icons ms-2">
                <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
                    <i class="ti ti-chevrons-up"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->


    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
            <h5>Holidays List</h5>
        </div>
        <div class="card-body p-0">
            <div class="custom-datatable-filter table-responsive">
                <table class="table datatable" id="holidays-datatable">
                    <thead class="thead-light">
                        <tr>
                            <th class="no-sort">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                </div>
                            </th>
                            @foreach($company->holidayFields()->whereJsonContains('visibility->list', true)->get() as $field)
                                <th>{{ $field->label }}</th>
                            @endforeach
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <h6 class="fw-medium"><a href="#">New Year</a></h6>
                            </td>
                            <td>01 Jan 2024</td>
                            <td>First day of the new year</td>
                            <td>
                                <span class="badge badge-success d-inline-flex align-items-center badge-sm">
                                    <i class="ti ti-point-filled me-1"></i>Active
                                </span>
                            </td>
                            <td>
                                <div class="action-icon d-inline-flex">
                                    <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_holiday"><i class="ti ti-edit"></i></a>
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                                </div>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

@section('modals')
    <!-- Add Plan -->
    <div class="modal fade" id="add_holiday">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Holiday</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <form action="{{ route('company.holiday.add', $company->account_url) }}" method="POST">
                    @csrf
                    <div class="modal-body pb-0">
                        <div class="row">
                            @foreach($company->holidayFields()->whereJsonContains('visibility->form', true)->get() as $field)
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">{{ $field->label }}</label>

                                        @if($field->type === 'text')
                                            <input 
                                                type="text" 
                                                class="form-control @error($field->key, 'addHoliday') is-invalid @enderror" 
                                                name="{{ $field->key }}" 
                                                value="{{ old($field->key) }}">
                                                @error($field->key, 'addHoliday')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                        
                                        @elseif($field->type === 'date')
                                            <div class="input-icon-end position-relative">
                                                <input 
                                                    type="text" 
                                                    class="form-control datetimepicker @error($field->key, 'addHoliday') is-invalid @enderror" 
                                                    name="{{ $field->key }}" 
                                                    placeholder="dd/mm/yyyy" 
                                                    value="{{ old($field->key) }}">
                                                <span class="input-icon-addon">
                                                    <i class="ti ti-calendar text-gray-7"></i>
                                                </span>
                                                @error($field->key, 'addHoliday')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        
                                        @elseif($field->type === 'textarea')
                                            <textarea 
                                                class="form-control @error($field->key, 'addHoliday') is-invalid @enderror" 
                                                name="{{ $field->key }}" 
                                                rows="3">{{ old($field->key) }}</textarea>
                                                @error($field->key, 'addHoliday')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                        
                                        @elseif($field->type === 'select')
                                            <select class="select form-control @error($field->key, 'addHoliday') is-invalid @enderror" name="{{ $field->key }}">
                                                @foreach(json_decode($field->options, true) ?? [] as $option)
                                                    <option value="{{ $option }}" {{ old($field->key) == $option ? 'selected' : '' }}>
                                                        {{ $option }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error($field->key, 'addHoliday')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @elseif($field->type === 'checkbox')
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="{{ $field->key }}" id="flexCheckDefault" {{ old($field->key) ? 'checked' : '' }}>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Holiday</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- /Add Plan -->

    <!-- Edit Plan -->
    <div class="modal fade" id="edit_holiday">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Holiday</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <form action="holidays.html">
                    <div class="modal-body pb-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" value="New Year">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Date</label>
                                    <div class="input-icon-end position-relative">
                                        <input type="text" class="form-control datetimepicker" value="01 Jan 2024">
                                        <span class="input-icon-addon">
                                            <i class="ti ti-calendar text-gray-7"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="3">First day of the new year</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="select">
                                        <option selected>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
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
                        <a href="holidays.html" class="btn btn-danger">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Modal -->

    <!-- Manage Table -->
    <div id="manage-table-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="manage-table-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="manage-table-modalLabel">Visibility</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('company.holiday.manage.table', $company->account_url) }}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="list">
                    <div class="modal-body">
                        @foreach ($company->holidayFields()->get() as $field)
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label">{{ $field->label }}</label>
                                </div>
                                <div class="col-6">
                                    <input type="checkbox" class="form-check-input @error('fields.' . $field->id) is-invalid @enderror" name="fields[{{ $field->id }}]" @if ($field->visibility['list']) checked @endif>
                                    @error('fields.' . $field->id)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Manage Table -->

    <!-- Manage Form -->
    <div class="modal fade" id="manage-form-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manageFormTableLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="manageFormTableLabel">Visibility</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('company.holiday.manage.table', $company->account_url) }}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="form">
                    <div class="modal-body">
                        @foreach ($company->holidayFields()->get() as $field)
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label">{{ $field->label }}</label>
                                </div>
                                <div class="col-6">
                                    <input type="checkbox" class="form-check-input @error('fields.' . $field->id) is-invalid @enderror" name="fields[{{ $field->id }}]" @if ($field->visibility['form']) checked @endif>
                                    @error('fields.' . $field->id)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Manage Form -->

    <!-- Add New Field -->
    <div class="modal fade" id="add-new-field-modal" tabindex="-1" aria-labelledby="addNewFieldLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg"> <!-- lg for large screens -->
            <div class="modal-content">
                
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewFieldLabel">Add New Field</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Form -->
                <form action="{{ route('company.holiday.add.new.field', $company->account_url) }}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="form">

                    <!-- Modal Body -->
                    <div class="modal-body" style="max-height:70vh; overflow-y:auto;">
                        <div class="row g-3">
                            
                            <!-- Key -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Key</label>
                                <input type="text" class="form-control @error('key', 'addNewFieldHoliday') is-invalid @enderror" name="key" placeholder="e.g. title" value="{{ old('key') }}">
                                @error('key', 'addNewFieldHoliday')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Label -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Label</label>
                                <input type="text" class="form-control @error('label', 'addNewFieldHoliday') is-invalid @enderror" name="label" placeholder="e.g. Holiday Title" value="{{ old('label') }}">
                                @error('label', 'addNewFieldHoliday')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Field Type -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Field Type</label>
                                <select name="type" class="form-select  @error('type', 'addNewFieldHoliday') is-invalid @enderror">
                                    @forelse ($typeEnums as $value)
                                        <option value="{{ $value }}" {{ old('type') == $value ? 'selected' : '' }}>{{ ucfirst($value) }}</option>
                                    @empty
                                        <option value="">No Field Type</option>
                                    @endforelse
                                </select>
                                @error('type', 'addNewFieldHoliday')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Sort Order -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Sort Order</label>
                                <input type="number" class="form-control @error('sort_order', 'addNewFieldHoliday') is-invalid @enderror" name="sort_order" value="{{ old('sort_order') }}" min="0">
                                @error('sort_order', 'addNewFieldHoliday')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Options -->
                            <div class="col-12">
                                <label class="form-label fw-semibold">Options (JSON)</label>
                                <textarea name="options" class="form-control @error('options', 'addNewFieldHoliday') is-invalid @enderror" rows="2" placeholder='["Active","Inactive"]'>{{ old('options') }}</textarea>
                                @error('options', 'addNewFieldHoliday')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Visibility -->
                            <div class="col-12">
                                <label class="form-label fw-semibold">Visibility</label>
                                <div class="d-flex flex-wrap gap-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input @error('visibility', 'addNewFieldHoliday') is-invalid @enderror" name="visibility[form]" value="1" id="visForm" {{ old('visibility.form') ? 'checked' : '' }}>
                                        @error('visibility', 'addNewFieldHoliday')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="form-check-label" for="visForm">Form</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input @error('visibility', 'addNewFieldHoliday') is-invalid @enderror" name="visibility[list]" value="1" id="visList" {{ old('visibility.list') ? 'checked' : '' }}>
                                        @error('visibility', 'addNewFieldHoliday')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="form-check-label" for="visList">List</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input @error('visibility', 'addNewFieldHoliday') is-invalid @enderror" name="visibility[api]" value="1" id="visApi" {{ old('visibility.api') ? 'checked' : '' }}>
                                        @error('visibility', 'addNewFieldHoliday')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="form-check-label" for="visApi">API</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input @error('visibility', 'addNewFieldHoliday') is-invalid @enderror" name="visibility[export]" value="1" id="visExport" {{ old('visibility.export') ? 'checked' : '' }}>
                                        @error('visibility', 'addNewFieldHoliday')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="form-check-label" for="visExport">Export</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Validation Rules -->
                            <div class="col-12">
                                <label class="form-label fw-semibold">Validation Rules</label>
                                <div class="d-flex flex-wrap gap-3">
                                    
                                    @php
                                        $availableRules = [
                                            'required' => 'Required',
                                            'string'   => 'String',
                                            'date'     => 'Date',
                                            'email'    => 'Email',
                                            'numeric'  => 'Numeric',
                                            'boolean'  => 'Boolean',
                                            'max:255'  => 'Max 255 Characters',
                                            'min:3'    => 'Min 3 Characters',
                                        ];
                                        $oldValidation = old('validation', []);
                                    @endphp

                                    @foreach ($availableRules as $rule => $label)
                                        <div class="form-check">
                                            <input 
                                                type="checkbox" 
                                                class="form-check-input @error('validation', 'addNewFieldHoliday') is-invalid @enderror" 
                                                name="validation[]" 
                                                value="{{ $rule }}" 
                                                id="val_{{ $rule }}"
                                                {{ in_array($rule, (array) $oldValidation) ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="val_{{ $rule }}">{{ $label }}</label>
                                        </div>
                                    @endforeach

                                    @error('validation', 'addNewFieldHoliday')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <!-- Toggles -->
                            <div class="col-12 d-flex flex-wrap gap-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input @error('is_required', 'addNewFieldHoliday') is-invalid @enderror" name="is_required" value="1" id="isRequired" {{ old('is_required') ? 'checked' : '' }}>
                                    @error('is_required', 'addNewFieldHoliday')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="form-check-label" for="isRequired">Required</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input @error('is_searchable', 'addNewFieldHoliday') is-invalid @enderror" name="is_searchable" value="1" id="isSearchable" {{ old('is_searchable') ? 'checked' : '' }}>
                                    @error('is_searchable', 'addNewFieldHoliday')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="form-check-label" for="isSearchable">Searchable</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input @error('is_filterable', 'addNewFieldHoliday') is-invalid @enderror" name="is_filterable" value="1" id="isFilterable" {{ old('is_filterable') ? 'checked' : '' }}>
                                    @error('is_filterable', 'addNewFieldHoliday')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="form-check-label" for="isFilterable">Filterable</label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- /Add New Field -->
@endsection

<x-dynamic-button :types="['table','form','field']" />

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

    <!-- Datatable JS -->
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>

    <!-- Daterangepikcer JS -->
    <script src="{{ asset('assets/js/moment.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>

    <!-- Select2 JS -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="assets/plugins/apexchart/chart-data.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/theme-colorpicker.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script>
        $(document).ready(function() {
            if ($.fn.DataTable.isDataTable('#holidays-datatable')) {
                $('#holidays-datatable').DataTable().clear().destroy();
            }

            $('#holidays-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("company.holidays.data-table", $company->account_url) }}',
                columns: [
                    { data: 'checkbox', name: 'checkbox', orderable: false, searchable: false },
                    @foreach ($company->holidayFields()->whereJsonContains('visibility->list', true)->get() as $field)
                        { data: 'dynamic_fields.{{ $field->key }}', name: '{{ $field->key }}' },
                    @endforeach
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                initComplete: function () {
                    // let newDiv = $(`
                    //     <div class="custom-button-div d-inline-block ms-3">
                    //        <button type="button" class="btn btn-primary mt-1" data-bs-toggle="modal" data-bs-target="#manage-table-modal">Manage Table</button>
                    //         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#manage-form-modal">
                    //             Manage Form
                    //         </button>
                    //         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-new-field-modal">
                    //             Add New Field
                    //         </button>
                    //     </div>
                    // `);
                    // $("#holidays-datatable_length").after(newDiv);

                    let buttonDiv = $('#custom-button-div');
                    if (buttonDiv.length) {
                        $('#holidays-datatable_length').after(buttonDiv);
                    }

                    // Add click event for the button
                    // $("#customButton").on("click", function() {
                    //     // Define the action for the "Manage Table" button
                    //     alert('Custom button action triggered!');
                    //     // Replace with your desired action, e.g., window.location.href = '...';
                    // });
                }
            });

            // If Manage Form Modal Close, Automatically Open Add holiday Modal
            // $('#manage-form-modal').on('hidden.bs.modal', function () {
            //     $('#add_holiday').modal('show');
            // });

            // If Add New Field Modal Close, Automatically Open Add holiday Modal
            // $('#add-new-field-modal').on('hidden.bs.modal', function () {
            //     $('#add_holiday').modal('show');
            // });

        // Document ready end 
        });
    </script>

    @if ($errors->hasBag('addHoliday'))
        <script>
            $(document).ready(function () {
                $('#add_holiday').modal('show');
            });
        </script>
    @endif

    @if ($errors->hasBag('ManageFields'))
        <script>
            $(document).ready(function () {
                $('#manage-table-modal').modal('show');
            });
        </script>
    @endif
    
    @if ($errors->hasBag('addNewFieldHoliday'))
        <script>
            $(document).ready(function () {
                $('#add-new-field-modal').modal('show');
            });
        </script>
    @endif

    @if(session('open_add_holiday_modal'))
        <script>
            $(document).ready(function () {
                $('#add_holiday').modal('show');
            });
        </script>
    @endif

@endsection