<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/dist/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ url('/dist/assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ url('/dist/assets/css/pages/auth.css') }}">
    <link rel="stylesheet" href="{{ url('/frontend/vendors/toastify/toastify.css') }}">
    <link rel="stylesheet" href="{{ url('/frontend/vendors/sweetalert2/sweetalert2.min.css') }}">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
</head>

<body>
<div id="auth">

    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="{{ route('home') }}"><img src="{{ url('/dist/assets/images/logo/logo.png') }}" alt="Logo"></a>
                </div>
                <h1 class="auth-title">Log in.</h1>
                <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

                <form action="{{ route('install') }}" method="post">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Log in</button>
                </form>

            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>

</div>

<!-- JAVASCRIPTS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ url('/frontend/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ url('/frontend/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ url('/frontend/plugins/bootstrap/js/bootstrap-slider.js') }}"></script>
<!-- tether js -->
<script src="{{ url('/frontend/plugins/tether/js/tether.min.js') }}"></script>
<script src="{{ url('/frontend/plugins/raty/jquery.raty-fa.js') }}"></script>
<script src="{{ url('/frontend/plugins/slick-carousel/slick/slick.min.js') }}"></script>
<script src="{{ url('/frontend/plugins/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ url('/frontend/plugins/fancybox/jquery.fancybox.pack.js') }}"></script>
<script src="{{ url('/frontend/plugins/smoothscroll/SmoothScroll.min.js') }}"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="{{ url('/frontend/plugins/google-map/gmap.js') }}"></script>
<script src="{{ url('/frontend/js/script.js') }}"></script>
<script src="{{ url('/frontend/vendors/toastify/toastify.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ url('/frontend/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>

@if(session()->has('success'))
    <script>
        swal("{{ session()->get('success') }}", "", "success")
    </script>
    <script>
        Swal.fire({
            icon: 'error',
            title: '{{ __('Great!')  }}',
            text: '{{ session()->get('success') }}'
        })
    </script>
@endif
@if(session()->has('warning'))
    <script>
        swal("{{ session()->get('warning') }}", "", "warning")
    </script>
@endif
</body>

</html>
