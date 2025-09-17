@extends('common::layouts.master')

@section('title', 'Prefix')

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

        <x-settings-bread-crumb title="Prefixes" />

        <x-settings-navbar main-menu="website" />
        <div class="row">
            @include('common::settings.website.sidebar')
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap">
                            <h4 class="mb-0">Prefixes</h4>
                            <button type="button" class="btn btn-primary mt-2 mt-sm-0" data-bs-toggle="modal" data-bs-target="#addprefix-modal">Add</button>
                        </div>
                        <form action="{{ route('company.prefix.update', $company->account_url) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="border-bottom mb-3">
                                <div class="row">
                                    @forelse($prefix->data as $key => $value)
                                        <div class="col-md-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label mb-md-0">{{ $key }}</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control @error('prefix.' . $key) is-invalid @enderror" value="{{$value}}" name="prefix[{{ $key }}]">
                                                    @error('prefix.' . $key)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror 
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    <div class="text-center">
                                        <h5>No prefixes found</h5>
                                    </div>
                                    @endforelse
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

    <!-- Add Prefix Modal -->
    <div id="addprefix-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addprefix-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addprefix-modalLabel">Add Prefix</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('company.prefix.add', $company->account_url) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label class="col-lg-3 form-label">Key</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control @error('key', 'addPrefix') is-invalid @enderror" name="key">
                                @error('key', 'addPrefix')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-3 form-label">Value</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control @error('value', 'addPrefix') is-invalid @enderror" name="value">
                                @error('value', 'addPrefix')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror 
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Prefix Modal End -->
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

    <!-- Select2 JS -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <!-- Bootstrap Tagsinput JS -->
    <script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/theme-colorpicker.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    @if ($errors->hasBag('addPrefix'))
        <script>
            $(document).ready(function () {
                $('#addprefix-modal').modal('show');
            });
        </script>
    @endif
@endsection