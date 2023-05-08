<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Develop By - </b><a href="https://www.linkedin.com/in/patelbhavik021299/">Bhavik Patel</a>
    </div>
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 0.1 &nbsp; &nbsp; &nbsp; &nbsp;
    </div>
    <strong>Copyright &copy; 2023 <a href="#">Ticket Management System</a>.</strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?=base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script>
$(function() {
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>
<script>
$(function() {
    $('#example_task').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>
</body>

</html>