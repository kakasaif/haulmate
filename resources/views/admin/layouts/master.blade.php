<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Haulmate</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/fontawesome-free/css/all.min.css')}}">
    {{-- Select 2 --}}
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/select2/css/select2.min.css')}}">
    {{-- Jquery ui --}}
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/jquery-ui/jquery-ui.min.css')}}">
    {{-- Chart.js --}}
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/chart.js/Chart.min.css')}}">
    {{-- Leaflet --}}
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/leaflet/leaflet.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/adminlte.css')}}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/dropzone/dropzone.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-rowreorder/css/rowReorder.bootstrap4.min.css')}}">

    @section('css')
    
    @show
    <link rel="stylesheet" href="{{asset('assets/admin/css/custom.css')}}">
  </head>

  <body class="hold-transition sidebar-mini">
    <div class="wrapper">

      @include('admin._partials.navbar')

      @include('admin._partials.sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @include('admin._partials.header_menu')

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            @section('content')
            content
            @show
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
          <h5>Title</h5>
          <p>Sidebar content</p>
        </div>
      </aside>
      <!-- /.control-sidebar -->

      <!-- Main Footer -->
      {{-- <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
          Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
      </footer> --}}
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <script>
      var base_url = "{{url('')}}";
    </script>

    <!-- jQuery -->
    <script src="{{asset('assets/admin/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <!-- AdminLTE App -->
    <script src="{{asset('assets/admin/js/adminlte.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/leaflet/leaflet.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script> 
    <script src="{{asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-rowreorder/js/dataTables.rowReorder.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-rowreorder/js/rowReorder.bootstrap4.min.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{asset('assets/admin/plugins/dropzone/dropzone.min.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/8101dicw746qowcxyrnkqdvbocuv389bu4kxiyggkysjvrbh/tinymce/5/tinymce.min.js"></script>

    <script src="{{asset('assets/admin/js/main.js')}}"></script>

    <script>
        Dropzone.autoDiscover = false;
        $(document).ready(function(){
//            var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
//            $('ul li a').each(function() {
//                if (path.includes(this.href)) {
//                    $(this).parent().addClass('active');
//                }
//            });

            $('ul li.nav-item').each(function() {
//                if ($(this).data('page') === "{{$cur_page}}" || $(this).data('page') === "{{$cur_parent}}") {
                if ($(this).data('page') === "{{$cur_page}}") {
                    $(this).addClass('active');
                }
                if ($(this).data('page') === "{{$cur_parent}}" && $(this).hasClass('has_items')) {
                    let panel = $(this).data('panel');
                    $('#' + panel).addClass('show');
                }
            });
        });
    </script>
    @section('script')

    @show
  </body>

</html>