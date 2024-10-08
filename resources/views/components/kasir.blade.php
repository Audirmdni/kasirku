<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KASIR | KASIRKU</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('public')}}/admin-asset/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{url('public')}}/admin-asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('public')}}/admin-asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url('public')}}/admin-asset/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('public')}}/admin-asset/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('public')}}/admin-asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('public')}}/admin-asset/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('public')}}/admin-asset/plugins/summernote/summernote-bs4.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('public')}}/admin-asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{url('public')}}/admin-asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @stack('style')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  
  <div class="wrapper">
    <!-- Navbar -->
    <x-layout.kasir.header />
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <x-layout.kasir.sidebar />

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @foreach (['success', 'warning', 'danger'] as $status)
        @if (session($status))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "{{ ucfirst($status) }}!",
                    text: "{{ session($status) }}",
                    icon: "{{ $status }}",
                    showConfirmButton: true,
                    timer: 2000
                });
            });
        </script>
        @endif
        @endforeach
        {{$slot}}
    </div>
    <!-- /.content-wrapper -->

    <!--Main footer -->
    <x-layout.kasir.footer />

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>

  <!-- jQuery -->
  <script src="{{url('public')}}/admin-asset/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.12.1 -->
  <script src="{{url('public')}}/admin-asset/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{url('public')}}/admin-asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="{{url('public')}}/admin-asset/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="{{url('public')}}/admin-asset/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="{{url('public')}}/admin-asset/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="{{url('public')}}/admin-asset/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{url('public')}}/admin-asset/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="{{url('public')}}/admin-asset/plugins/moment/moment.min.js"></script>
  <script src="{{url('public')}}/admin-asset/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{url('public')}}/admin-asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="{{url('public')}}/admin-asset/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="{{url('public')}}/admin-asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- DataTables -->
  <script src="{{url('public')}}/admin-asset/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{url('public')}}/admin-asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{url('public')}}/admin-asset/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="{{url('public')}}/admin-asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{url('public')}}/admin-asset/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{url('public')}}/admin-asset/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{url('public')}}/admin-asset/dist/js/demo.js"></script>
  <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    });
  </script>

  @stack('script')
</body>

</html>
