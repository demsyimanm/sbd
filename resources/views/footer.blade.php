<footer class="main-footer">
<div class="pull-right hidden-xs">
   &copy; <b>Bilfash </b>&<b> Demsy</b> 2014-2015
</div>
<strong>Supported by <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong><b> Version</b> 2.3.0. All rights reserved.
</footer>
<!-- jQuery 2.1.4 -->
    
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
   
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{ URL::to('assets/AdminLTE/plugins/morris/morris.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ URL::to('assets/AdminLTE/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ URL::to('assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ URL::to('assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ URL::to('assets/AdminLTE/plugins/knob/jquery.knob.js') }}"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{ URL::to('assets/AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ URL::to('assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ URL::to('assets/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ URL::to('assets/AdminLTE/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::to('assets/AdminLTE/dist/js/app.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ URL::to('assets/AdminLTE/dist/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ URL::to('assets/AdminLTE/dist/js/demo.js') }}"></script>

    <!-- DataTables -->
    <script src="{{ URL::to('assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::to('assets/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script> 
      $(function () {
        $("#data_table").DataTable();
            });

       /* $('#timepicker1').timepicker();
        $('#timepicker2').timepicker();*/
    </script>
   
