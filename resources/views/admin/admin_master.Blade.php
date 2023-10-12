<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Academia</title>


    <link rel="icon" type="image/png" href="{{ asset('backend/assets/dist/img/logo.gif') }}" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->


    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('backend/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/summernote/summernote-bs4.min.css') }}">

    <!-- datatable PLUGING 
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">

    <!-- TOASTR PLUGING -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <!-- PARA JAVASCRIPT  -->

    <!-- SWEET ALERT 2 -->
    <!-- https://sweetalert2.github.io/ -->
    <script src="{{ asset('backend/assets/plugins/sweetalert2.all.js') }}"></script>
</head>

<body class="hold-transition sidebar-collapse sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader 
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('backend/assets/dist/img/logo.gif') }}" alt="AdminLTELogo" height="90" width="90">
  </div>-->

        <!-- Navbar -->
        @include('admin.body.header')
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        @include('admin.body.sidebar')
        <!-- Content Wrapper. Contains page content -->
        @yield('admin')
        <!-- /.content-wrapper -->


    </div>
    <!-- ./wrapper -->


    <!-- jQuery 
<script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script src="{{ asset('backend/assets/plugins/jquery-1.12.4.min.js') }}"></script>
-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('backend/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('backend/assets/plugins/chart.js/Chart.min.js') }}"></script>

    <!-- SWEET ALERT 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('backend/assets/js/code/code.js') }}"></script>

    <!-- Sparkline -->
    <script src="{{ asset('backend/assets/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('backend/assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('backend/assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('backend/assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('backend/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('backend/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('backend/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backend/assets/dist/js/adminlte.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch (type) {
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('backend/assets/js/code/code.js') }}">
    < /scri



    <
    !--datatable PLUGING-- >
    <
    script src = "https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" >
    </script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>


</body>

</html>