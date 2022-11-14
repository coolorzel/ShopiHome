<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ShopiHome') }} - @yield('title')</title>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/iconly/bold.css') }}" >
    <link rel="stylesheet" href="{{ asset('admin/vendors/bootstrap-icons/bootstrap-icons.css') }}" >

    <link rel="stylesheet" href="{{ asset('admin/vendors/toastify/toastify.css') }}">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.css') }}" >
    <link rel="stylesheet" href="{{ asset('admin/css/app.css') }}" >
    <link rel="stylesheet" href="{{ asset('admin/vendors/simple-datatables/style.css') }}">

    <!-- Perfect ScrollBar -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/perfect-scrollbar/perfect-scrollbar.css') }}" >

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.svg') }}" type="image/x-icon">
</head>
<body>
<div id="app">
    @include('layouts.admin.inc.sidebar')

    <div id="main" class="layout-navbar">
        <header class="mb-3">
            @include('layouts.admin.inc.navbar')
        </header>
        <div id="main-content">
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>@yield('heading')</h3>
                            <p class="text-subtitle text-muted">@yield('description')</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    @yield('navlink')
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')

            @include('layouts.admin.inc.footer')
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>


<script src="{{ asset('admin/js/pages/dashboard.js') }}"></script>

<script src="{{ asset('admin/vendors/simple-datatables/simple-datatables.js') }}"></script>

<!-- filepond validation -->
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

<!-- image editor -->
<script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-filter/dist/filepond-plugin-image-filter.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- toastify -->
<script src="{{ asset('admin/vendors/toastify/toastify.js') }}"></script>
<!-- filepond -->
<script src="{{ asset('admin/js/filepond.js') }}"></script>



@if(session()->has('success'))
<script>
    swal("{{ session()->get('success') }}", "", "success")
</script>
@endif
@if(session()->has('warning'))
    <script>
        swal("{{ session()->get('warning') }}", "", "warning")
    </script>
@endif
@yield('scripts')

<script src="{{ asset('admin/js/main.js') }}"></script>
</body>
</html>
