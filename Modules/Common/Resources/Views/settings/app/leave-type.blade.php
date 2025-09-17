@extends('common::layouts.master')

@section('title', 'Leave Type')

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

    <!-- Daterangepikcer CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

    <!-- Bootstrap Tagsinput CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection

@section('content')
    <div class="content">

        <x-settings-bread-crumb title="Leave Type" />

        <x-settings-navbar main-menu="app" />
        <div class="row">
            @include('common::settings.app.sidebar')
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="border-bottom d-flex align-items-center justify-content-between pb-3 mb-3">
                            <h4>Leave Type</h4>
                            <div>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#add_leaves" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add Leave Type</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="card mb-0">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h6>Leave Type List</h6>
                                </div>
                                <div class="table-responsive">
                                    <table class="table" id="leave-types-datatable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="no-sort">
                                                    <div class="form-check form-check-md">
                                                        <input class="form-check-input" type="checkbox" id="select-all">
                                                    </div>
                                                </th>
                                                <th>Leave Type</th>
                                                <th>Leave Days</th>
                                                <th>Icon</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
    <!-- Add Leaves -->
    <div class="modal fade" id="add_leaves">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Leave Type</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
						<i class="ti ti-x"></i>
					</button>
                </div>
                <form action="{{ route('company.leave-type.add', $company->account_url) }}" method="POST">
                    @csrf
                    <div class="modal-body pb-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Leave Type <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name', 'addLeaveType') is-invalid @enderror" name="name">
                                    @error('name', 'addLeaveType')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror 
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Number of days <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('days', 'addLeaveType') is-invalid @enderror" name="days">
                                    @error('days', 'addLeaveType')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror 
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Choose Icon</label>
                                    <div class="input-group">
                                        <input type="text" class="icon" name="icon" 
                                            class="form-control @error('icon', 'addLeaveType') is-invalid @enderror" 
                                            placeholder="Click to pick an icon" 
                                            readonly>
                                        <span class="input-group-text"><i class="iconPreview"></i></span>
                                        @error('icon', 'addLeaveType')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div> 
                                </div>
                            </div>
                            <!-- Background Color -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Card Background Color</label>
                                    <input type="color" class="form-control form-control-color @error('bg_color', 'addLeaveType') is-invalid @enderror" 
                                        name="bg_color" value="#000000" title="Choose background color">
                                    @error('bg_color', 'addLeaveType')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Badge Color -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Badge Color</label>
                                    <input type="color" class="form-control form-control-color @error('badge_color', 'addLeaveType') is-invalid @enderror" 
                                        name="badge_color" value="#6c757d" title="Choose badge color">
                                    @error('badge_color', 'addLeaveType')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Leave</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Leaves -->

    <!-- Edit Leaves -->
    <div class="modal fade" id="edit_leaves">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Leave Type</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
						<i class="ti ti-x"></i>
					</button>
                </div>
                <form id="edit-form" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body pb-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Leave Type <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name', 'updateLeaveType') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                                    @error('name', 'updateLeaveType')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror 
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Number of days <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('days', 'updateLeaveType') is-invalid @enderror" name="days" id="days" value="{{ old('days') }}">
                                    @error('days', 'updateLeaveType')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror 
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Choose Icon</label>
                                    <div class="input-group">
                                        <input type="text" class="icon" name="icon" id="icon" 
                                            class="form-control @error('icon', 'updateLeaveType') is-invalid @enderror" 
                                            placeholder="Click to pick an icon" 
                                            readonly>
                                        <span class="input-group-text"><i class="iconPreview"></i></span>
                                        @error('icon', 'updateLeaveType')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div> 
                                </div>
                            </div>
                            <!-- Background Color -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Card Background Color</label>
                                    <input type="color" class="form-control form-control-color @error('bg_color', 'updateLeaveType') is-invalid @enderror" 
                                        name="bg_color" value="#000000" title="Choose background color" id="bg_color">
                                    @error('bg_color', 'updateLeaveType')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Badge Color -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Badge Color</label>
                                    <input type="color" class="form-control form-control-color @error('badge_color', 'updateLeaveType') is-invalid @enderror" 
                                        name="badge_color" value="#6c757d" title="Choose badge color" id="badge_color">
                                    @error('badge_color', 'updateLeaveType')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Status <span class="text-danger">*</span></label>
                                    <select class="form-select @error('status', 'updateLeaveType') is-invalid @enderror" name="status" id="status">
                                        <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status', 'updateLeaveType')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror 
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
    <!-- /Edit Leaves -->

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

    <!-- Icon Picker Modal -->
    <div class="modal fade" id="iconPickerModal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollableModalTitle">Pick an Icon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" id="iconGrid"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Icon Picker Modal -->

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

    <!-- Datatable JS -->
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>

    <!-- Sticky Sidebar JS -->
    <script src="{{ asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>

    <!-- Daterangepikcer JS -->
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>

    <!-- Select2 JS -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>

    <!-- Bootstrap Tagsinput JS -->
    <script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/theme-colorpicker.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script>
        $(document).ready(function () {
            
            // Datatable codes 
            if ($.fn.DataTable.isDataTable('#leave-types-datatable')) {
                $('#leave-types-datatable').DataTable().clear().destroy(); // cleanup
            }

            $('#leave-types-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("company.leave-type.datatable", $company->account_url) }}',
                columns: [
                    { data: 'checkbox', name: 'checkbox', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'days', name: 'days' },
                    { data: 'icon', name: 'icon' },
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
                    let actionUrl = "{{ route('company.leave-type.delete', [$company->account_url, ':id']) }}";
                    actionUrl = actionUrl.replace(':id', itemId);

                    // Set the form action dynamically
                    $('#delete-form').attr('action', actionUrl);
                }

                if (targetModal === '#edit_leaves') {
                    // Set values
                    $.ajax({
                        url: "{{ route('company.leave-type.get', [$company->account_url, ':id']) }}".replace(':id', itemId),
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            // Set values
                            $('#name').val(data.name);
                            $('#days').val(data.days);
                            $('#icon').val(data.icon);
                            $(".iconPreview").attr("class", data.icon);
                            $('#bg_color').val(data.bg_color);
                            $('#badge_color').val(data.badge_color);
                            $('#status').val(data.status);
                        }
                    });
                    
                    let actionUrl = "{{ route('company.leave-type.update', [$company->account_url, ':id']) }}";
                    actionUrl = actionUrl.replace(':id', itemId);

                    // Set the form action dynamically
                    $('#edit-form').attr('action', actionUrl);
                }
            });
            // Common Modal actions Click Event End

            // Icon Picker Codes

            const icons = {!! json_encode(config('custom.leave-type-icon')) !!};

            const $grid = $("#iconGrid");
            const $input = $(".icon");
            const $preview = $(".iconPreview");

            // Render icons
            $.each(icons, function (index, icon) {
                const $div = $(`
                    <div class="col-2 text-center p-2">
                        <i class="${icon} fs-32" style="cursor:pointer;"></i>
                    </div>
                `);

                $div.on("click", function () {
                    $input.val(icon);
                    $preview.attr("class", icon);
                    const modal = bootstrap.Modal.getInstance($("#iconPickerModal")[0]);
                    modal.hide();
                });

                $grid.append($div);
            });

            // Open modal when clicking input
            $input.on("click", function () {
                const modal = new bootstrap.Modal($("#iconPickerModal")[0]);
                modal.show();
            });
            // Icon Picker Codes End

        // Document ready end
        });
    </script>

    @if ($errors->hasBag('addLeaveType'))
        <script>
            $(document).ready(function () {
                $('#add_leaves').modal('show');
            });
        </script>
    @endif

    @if ($errors->hasBag('updateLeaveType'))
        <script>
            $(document).ready(function () {
                $('#edit_leaves').modal('show');
            });
        </script>
    @endif
@endsection