@extends('common::layouts.master')

@section('title', 'Tax Rates')

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

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection

@section('content')
    <div class="content">

        <x-settings-bread-crumb title="Tax Rates" />

        <x-settings-navbar main-menu="financial" />
        <div class="row">
            @include('common::settings.financial.sidebar')
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-header px-0 mx-3">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6 col-sm-4">
                                <h4>Tax Rates</h4>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="d-flex justify-content-sm-end align-items-center flex-wrap row-gap-2">
                                    <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_tax_rate"><i class="ti ti-circle-plus me-2"></i>Add Tax Rate</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pb-0">
                        <div class="card mb-3">
                            <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                                <h5>Tax Rate List</h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table" id="tax-rates-datatable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="no-sort">
                                                    <div class="form-check form-check-md">
                                                        <input class="form-check-input" type="checkbox" id="select-all">
                                                    </div>
                                                </th>
                                                <th>Name</th>
                                                <th>Tax Rate</th>
                                                <th>Status</th>
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
                                                    <h6 class="d-flex align-items-center fw-medium">
                                                        VAT
                                                    </h6>
                                                </td>
                                                <td>16%</td>
                                                <td>
                                                    <span class="badge badge-success d-inline-flex align-items-center badge-xs">
                                                        <i class="ti ti-point-filled me-1"></i>Active
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="action-icon d-inline-flex">
                                                        <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_tax_rate"><i class="ti ti-edit"></i></a>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr> -->
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

@section('modals')
    <!-- Add Tax Rate -->
    <div class="modal fade" id="add_tax_rate">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Tax Rate</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <form action="{{ route('company.tax-rates.add', $company->account_url) }}" method="POST">
                    @csrf
                    <div class="modal-body pb-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Tax Name</label>
                                    <input type="text" class="form-control @error('name', 'addTaxRate') is-invalid @enderror" placeholder="Enter Tax Name" name="name" value="{{ old('name') }}">
                                    @error('name', 'addTaxRate')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror 
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tax Rate</label>
                                    <input type="number" step="0.01" class="form-control @error('rate', 'addTaxRate') is-invalid @enderror" placeholder="Enter Tax Rate" name="rate" value="{{ old('rate') }}">
                                    @error('rate', 'addTaxRate')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror 
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="select @error('status', 'addTaxRate') is-invalid @enderror" name="status">
                                        <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Inactive" {{ old('status') == 'Active' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status', 'addTaxRate')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-primary">Add Tax Rate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Tax Rate -->

    <!-- Edit Tax Rate -->
    <div class="modal fade" id="edit_tax_rate">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Tax Rate</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <form action="" method="POST" id="edit-form">
                    @csrf
                    @method('PUT')
                    <div class="modal-body pb-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Tax Name</label>
                                    <input type="text" class="form-control @error('name', 'updateTaxRate') is-invalid @enderror" placeholder="Enter Tax Name" name="name" id="name" value="{{ old('name') }}">
                                    @error('name', 'updateTaxRate')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tax Rate</label>
                                    <input type="number" step="0.01" class="form-control @error('rate', 'updateTaxRate') is-invalid @enderror" placeholder="Enter Tax Rate" name="rate" id="rate" value="{{ old('rate') }}">
                                    @error('rate', 'updateTaxRate')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="select @error('status', 'updateTaxRate') is-invalid @enderror" name="status" id="status">
                                        <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status', 'updateTaxRate')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Edit Tax Rate -->

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
                        <form id="delete-form" method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger" id="confirm-delete">Yes, Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Modal -->
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

    <!-- Datatable JS -->
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>

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

    <script>
        $(document).ready(function () {
            
            // Datatable codes 
            if ($.fn.DataTable.isDataTable('#tax-rates-datatable')) {
                $('#tax-rates-datatable').DataTable().clear().destroy(); // cleanup
            }

            $('#tax-rates-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("company.tax-rates.datatable", $company->account_url) }}',
                columns: [
                    { data: 'checkbox', name: 'checkbox', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'rate', name: 'rate' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
            // Datatable codes End

            // Common Modal actions Click Event
            $(document).on('click', 'a[data-bs-target]', function (e) {
                e.preventDefault(); // prevent default "javascript:void(0);"

                let targetModal = $(this).data('bs-target'); // e.g. "#myModal"
                let itemId = $(this).data('id'); // your custom data-id

                // // Optional: set hidden input value inside modal
                // $(targetModal).find('input[name="id"]').val(itemId);

                if (targetModal === '#delete_modal') {
                    let actionUrl = "{{ route('company.tax-rate.delete', [$company->account_url, ':id']) }}";
                    actionUrl = actionUrl.replace(':id', itemId);

                    // Set the form action dynamically
                    $('#delete-form').attr('action', actionUrl);
                }

                if (targetModal === '#edit_tax_rate') {
                    // Set values
                    $.ajax({
                        url: "{{ route('company.tax-rate.get', [$company->account_url, ':id']) }}".replace(':id', itemId),
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            // Set values
                            $('#name').val(data.name);
                            $('#rate').val(data.rate);
                            $('#status').val(data.status);
                        }
                    });
                    
                    let actionUrl = "{{ route('company.tax-rate.update', [$company->account_url, ':id']) }}";
                    actionUrl = actionUrl.replace(':id', itemId);

                    // Set the form action dynamically
                    $('#edit-form').attr('action', actionUrl);
                }
            });
            // Common Modal actions Click Event End

        // Document ready end
        });
    </script>
    
    @if ($errors->hasBag('addTaxRate'))
        <script>
            $(document).ready(function () {
                $('#add_tax_rate').modal('show');
            });
        </script>
    @endif

    @if ($errors->hasBag('updateTaxRate'))
        <script>
            $(document).ready(function () {
                $('#edit_tax_rate').modal('show');
            });
        </script>
    @endif

@endsection