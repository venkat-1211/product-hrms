<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, html5, responsive, Projects">
    <meta name="author" content="Dreams technologies - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title')</title>

    @yield('links')

    @yield('styles')

</head>

<body>

    <div id="global-loader">
        <div class="page-loader"></div>
    </div>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

       @include('common::layouts.header')

       @include('common::layouts.sidebar')

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            @yield('content')

            <div class="footer d-sm-flex align-items-center justify-content-between border-top bg-white p-3">
                <p class="mb-0">2014 - 2025 &copy; SmartHR.</p>
                <p>Designed &amp; Developed By <a href="javascript:void(0);" class="text-primary">Dreams</a></p>
            </div>

        </div>
        <!-- /Page Wrapper -->

        @yield('modals')

    </div>
    <!-- /Main Wrapper -->

    <!-- Toast Message -->
    <!-- Flash-based Toast Handler -->
    @if (session('success') || session('error'))
    <div id="flash-toast-data"
        data-type="{{ session('success') ? 'success' : 'error' }}"
        data-message="{{ session('success') ?? session('error') }}">
    </div>
    @endif

    <!-- Toast Container -->
    <div id="toast-container" class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;"></div>


    @yield('scripts')
    
    <script>
        //Toaster Message 
        function showToast(type, message) {
        const icon = type === 'success' ? '✅' : '❌';
        const bg = type === 'success' ? 'bg-success' : 'bg-danger';

        const toastHtml = `
            <div class="toast colored-toast ${bg}-transparent text-primary show fade" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header ${bg} text-fixed-white">
                    <strong class="me-auto">${type.charAt(0).toUpperCase() + type.slice(1)}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">${icon} ${message}</div>
            </div>
        `;

        const container = document.getElementById('toast-container');
        container.innerHTML = toastHtml;

        const toastEl = container.querySelector('.toast');
        const toast = new bootstrap.Toast(toastEl);
        toast.show();
    }

    // Automatically show toast from Laravel session if present
    document.addEventListener('DOMContentLoaded', function () {
        const flashData = document.getElementById('flash-toast-data');
        if (flashData) {
            const type = flashData.dataset.type;
            const message = flashData.dataset.message;
            showToast(type, message);
        }
    });
    </script>

</body>

</html>