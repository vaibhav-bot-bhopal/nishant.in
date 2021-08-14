<!DOCTYPE html>
<html>
<html lang="{{session('locale')}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/assets/favicon_io/favicon.ico')}}">
    <link rel="apple-touch-icon" href="{{asset('public/assets/favicon_io/favicon.ico')}}">
    <title>Nishant Kapoor | Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Dropzone CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/dz/dropzone.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/dz/custom-dz.css')}}">
    <!-- Alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- MyStyle -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/mystyle.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .ck-editor__editable_inline {
            min-height: 300px !important;
        }
    </style>
    @stack('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('/') }}" class="nav-link" target="_blank">Go To Website</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fas fa-sign-out-alt"></i>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('admin.dashboard')}}" class="brand-link">
            <img src="{{ asset('public/assets/images/nishant-logo.png') }}" alt="Nishant-Logo" class="brand-image img-circle rounded-0">
            <span class="brand-text font-weight-light">Nishant Kapoor</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
                <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">
                        <ul class="nav nav-treeview">
                            @if (Request::is('admin*'))
                            <li class="nav-header">MAIN NAVIGATION</li>
                            <li class="nav-item">
                                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ 'admin/dashboard' == request()->path() ? 'active' : '' }}">
                                    <i class="fas fa-tachometer-alt nav-icon"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('news_add') }}" class="nav-link {{ 'admin/news_add' == request()->path() ? 'active' : '' }}">
                                    <i class="far fa-plus-square nav-icon"></i>
                                    <p>Add Article</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('viewTestimonial') }}" class="nav-link {{ 'admin/viewTestimonial' == request()->path() ? 'active' : '' }}">
                                    <i class="fas fa-user-plus nav-icon"></i>
                                    <p>Add Testimonial</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('images')}}" class="nav-link {{ 'admin/images' == request()->path() ? 'active' : '' }}">
                                    <i class="fas fa-upload nav-icon"></i>
                                    <p>Upload Gallery</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('images-show') }}" class="nav-link {{ 'admin/images-show' == request()->path() ? 'active' : '' }}">
                                    <i class="far fa-images nav-icon"></i>
                                    <p>View Gallery</p>
                                </a>
                            </li>
                            <li class="nav-header">ADMIN SYSTEM</li>
                            <li class="nav-item {{ ('admin/profile' == request()->path() || 'admin/changePassword' == request()->path()) ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-user-cog"></i>
                                    <p>
                                        Admin Settings
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('admin/profile')}}" class="nav-link {{ 'admin/profile' == request()->path() ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User Profile</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('admin/changePassword')}}" class="nav-link {{ 'admin/changePassword' == request()->path() ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Change Password</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <main class="">
            @yield('content')
        </main>
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        Copyright ©&nbsp; {{date('Y')}}
        <strong><a href="{{route('admin.dashboard')}}">NISHANT KAPOOR.</a></strong>
        &nbsp;All Rights Reserved
    </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('public/assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('public/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- Dropzone JS -->
<script src="{{ asset('public/assets/dz/dropzone.min.js') }}"></script>
<script src="{{ asset('public/assets/dz/custom-dz.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/assets/dist/js/adminlte.js') }}"></script>
<!-- CKEDITOR -->
<script src="{{ asset('public/assets/plugins/ckeditor-custom/build/ckeditor.js') }}"></script>
<script src="{{ asset('public/assets/ckfinder/ckfinder.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        Alert
        setTimeout(function() {
            $('.alert').slideUp('slow');
        }, 4000);
    });
</script>


<script>
    toastr.options = {
        "closeButton": true,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "100",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>

@if(session('success'))
    <script>toastr.success("{!! session('success') !!}")</script>
@endif

@if(session('error'))
    <script>toastr.error("{!! session('error') !!}")</script>
@endif

@stack('js')
</body>
</html>
