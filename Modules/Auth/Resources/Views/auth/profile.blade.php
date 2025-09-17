@extends('common::layouts.master')

@section('title', 'Employees')

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

        <!-- Breadcrumb -->
        <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
            <div class="my-auto mb-2">
                <h2 class="mb-1">Profile </h2>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="ti ti-smart-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            Pages
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Profile </li>
                    </ol>
                </nav>
            </div>
            <div class="head-icons ms-2">
                <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
                    <i class="ti ti-chevrons-up"></i>
                </a>
            </div>
        </div>
        <!-- /Breadcrumb -->

        <div class="card">
            <div class="card-body">
                <div class="border-bottom mb-3 pb-3">
                    <h4>Profile </h4>
                </div>
                <form action="{{ route('company.profile.update', [$company->account_url, Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="border-bottom mb-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <h6 class="mb-3">Basic Information</h6>
                                    <div class="d-flex align-items-center flex-wrap row-gap-3 bg-light w-100 rounded p-3 mb-4">
                                        <div class="d-flex align-items-center justify-content-center avatar avatar-xxl rounded-circle border border-dashed me-2 flex-shrink-0 text-dark frames">
                                            <!-- <i class="ti ti-photo text-gray-3 fs-16"></i> -->
                                            <img src="{{ !empty(Auth::user()->profile->profile_image) ? Storage::url(Auth::user()->profile->profile_image) : Storage::url('assets/img/users/profile/user.png') }}" alt="" class="img-fluid rounded-circle">
                                        </div>
                                        <div class="profile-upload">
                                            <div class="mb-2">
                                                <h6 class="mb-1">Profile Photo</h6>
                                                <p class="fs-12">Recommended image size is 40px x 40px</p>
                                            </div>
                                            <div class="profile-uploader d-flex align-items-center">
                                                <div class="drag-upload-btn btn btn-sm btn-primary me-2">
                                                    Upload
                                                    <input type="file" class="form-control image-sign @error('profile_image') is-invalid @enderror" name="profile_image">
                                                    @error('profile_image')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <a href="javascript:void(0);" class="btn btn-light btn-sm">Cancel</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row align-items-center mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label mb-md-0">First Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" value="{{ Auth::user()->profile->first_name }}" name="first_name">
                                        @error('first_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row align-items-center mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label mb-md-0">Last Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" value="{{ Auth::user()->profile->last_name }}" name="last_name">
                                        @error('last_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row align-items-center mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label mb-md-0">Email</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}" name="email">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row align-items-center mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label mb-md-0">Phone</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" value="{{ Auth::user()->profile->phone_number }}" name="phone_number">
                                        @error('phone_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{ optional(json_decode(Auth::user()->profile->address))->address }}" name="address">
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row align-items-center mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label mb-md-0">Country</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="select2 country @error('country') is-invalid @enderror" onchange="loadStates()" name="country" data-selected="{{ optional(json_decode(Auth::user()->profile->address))->country }}">
                                            <option value="">Select Country</option>
                                            <!-- <option>USA</option>
                                            <option>Canada</option>
                                            <option>Germany</option>
                                            <option>France</option> -->
                                        </select>
                                        @error('country')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
                                            <select class="select2 state @error('state') is-invalid @enderror" onchange="loadCities()" name="state" data-selected="{{ optional(json_decode(Auth::user()->profile->address))->state }}">
                                                <option value="">Select State</option>
                                                <!-- <option >California</option>
                                                <option>New York</option>
                                                <option>Texas</option>
                                                <option>Florida</option> -->

                                            </select>
                                            @error('state')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
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
                                        <div>
                                            <select class="select2 city @error('city') is-invalid @enderror" name="city" data-selected="{{ optional(json_decode(Auth::user()->profile->address))->city }}">
                                                    <option value="">Select City</option>
                                                    <!-- <option >Los Angeles</option>
                                                    <option>San Diego</option>
                                                    <option>Fresno</option>
                                                    <option>San Francisco</option> -->
                                                    
                                            </select>
                                            @error('city')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row align-items-center mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label mb-md-0">Postal Code</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control @error('postal_code') is-invalid @enderror" value="{{ optional(json_decode(Auth::user()->profile->address))->postal_code }}" name="postal_code">
                                        @error('postal_code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-bottom mb-3">
                        <h6 class="mb-3">Change Password</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row align-items-center mb-3">
                                    <div class="col-md-5">
                                        <label class="form-label mb-md-0">Current Password</label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="pass-group">
                                            <input type="password" class="pass-input form-control @error('current_password') is-invalid @enderror" name="current_password">
                                            @error('current_password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <span class="ti toggle-password ti-eye-off"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row align-items-center mb-3">
                                    <div class="col-md-5">
                                        <label class="form-label mb-md-0">New Password</label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="pass-group">
                                            <input type="password" class="pass-inputs form-control @error('password') is-invalid @enderror" name="password">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <span class="ti toggle-passwords ti-eye-off"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row align-items-center mb-3">
                                    <div class="col-md-5">
                                        <label class="form-label mb-md-0">Confirm Password</label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="pass-group">
                                            <input type="password" class="pass-inputa form-control @error('confirm_password') is-invalid @enderror" name="confirm_password">
                                            @error('confirm_password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <span class="ti toggle-passworda ti-eye-off"></span>
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
    <script src="{{ asset('assets/js/country-state-city.js') }}"></script>
@endsection