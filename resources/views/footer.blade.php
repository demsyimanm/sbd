<footer class="main-footer">
<div class="pull-right hidden-xs">
   &copy;<b>Bilfash </b>&<b> Demsy</b>
</div>
<strong>Supported by <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong><b> Version</b> 2.3.0. All rights reserved.
</footer>
<!-- jQuery 2.1.4 -->
    
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ URL::to('assets/AdminLTE/plugins/jQueryUI/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>

    <script src="{{ URL::to('assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>

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
    
