<!DOCTYPE html>
<html>
<html lang="{{session('locale')}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/assets/images/favicon.ico')}}">
    <link rel="apple-touch-icon" href="{{asset('public/assets/images/favicon.ico')}}">
    <title>Nishant Kapoor | SuperAdmin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <!-- Toggle Switch -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- MyStyle -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/mystyle.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
            <a href="{{ url('/') }}" target="_blank" class="nav-link">Home</a>
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
        <a href="{{url('superadmin/dashboard')}}" class="brand-link">
            <img src="{{ asset('public/assets/images/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Nishant Kapoor</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                        Dashboard
                        <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{ url('superadmin/dashboard') }}" class="nav-link {{ 'superadmin/dashboard' == request()->path() ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>User Details</p>
                        </a>
                        </li>
                        {{-- <li class="nav-item">
                        <a href="{{ url('admin/hi') }}" class="nav-link {{ 'admin/hi' == request()->path() ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>डेशबोर्ड <span class="right badge badge-success">Hindi</span></p>
                        </a>
                        </li> --}}
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
        <strong><a href="{{url('superadmin/dashboard')}}">NISHANT KAPOOR</a></strong>
        ©&nbsp;All Rights Reserved
    </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('public/assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('public/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('public/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/assets/dist/js/adminlte.js') }}"></script>
<!-- Toggle Switch -->
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
    // For Alerts
    $(document).ready(function(){
        //Alert
        setTimeout(function () {
            $('.alert').slideUp('slow');
        }, 4000);
    });

    $(function () {
        $('#myTable').DataTable({
            "responsive": false,
            "autoWidth": false,
        });
    });

    toastr.options = {
        "closeButton": true,
        "newestOnTop": false,
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

    // Toggle Switch
    $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 0 : 1;
            var user_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: 'changeuserstatus',
                data: {'status': status, 'user_id': user_id},
                success: function(data){
                    if(status == 0)
                    {
                        toastr['success'](data.message);
                    //   $('#myAlert').append('<div class="alert alert-success alert-dismissible fade show text-style" role="alert">'+ data.message +
                    //     '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                    //     '<span aria-hidden="true">&times;</span>'+
                    //     '</button>'+
                    //   '</div>');
                    }
                    else if(status == 1)
                    {
                        toastr['error'](data.message);
                    //   $('#myAlert').append('<div class="alert alert-danger alert-dismissible fade show text-style" role="alert">'+ data.message +
                    //     '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                    //     '<span aria-hidden="true">&times;</span>'+
                    //     '</button>'+
                    //   '</div>');
                    }
                    else
                    {
                        toastr['warning'](data.message);
                    //   $('#myAlert').append('<div class="alert alert-warning alert-dismissible fade show text-style" role="alert">'+ data.message +
                    //     '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                    //     '<span aria-hidden="true">&times;</span>'+
                    //     '</button>'+
                    //   '</div>');
                    }
                }
            });
            //Alert
            setTimeout(function () {
                $('.alert').slideUp('slow');
            }, 4000);
        });
    })
</script>

<script>
var uid, element;
$(document).on("click", "#del-modal", function(){
    uid = $(this).attr('data-id');
    element = this;
    $('#delModal').modal('show');
});

$(document).on("click", "#del-user", function(){
    $.ajax({
        url: 'role-delete/'+uid,
        type: "GET",
        dataType: "json",
        beforeSend:function(){
            $('#del-user').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Deleting.....').prop('disabled', true);
        },
        success: function(data)
        {
            setTimeout(function(){
            $('#delModal').modal('hide');
            $(element).closest('tr').fadeOut('slow');
                toastr["success"](data.message);
            // $('#myAlert').append('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+ data.message +
            //     '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
            //     '<span aria-hidden="true">&times;</span>'+
            //     '</button>'+
            // '</div>');
            }, 2000);

        }
    });
    //Alert
    setTimeout(function () {
        $('.alert').slideUp('slow');
    }, 6000);
});

</script>
<!-- Ckeditor -->
<script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>

@if(session('success'))
    <script>toastr.success("{!! session('success') !!}")</script>
@endif
</body>
</html>
