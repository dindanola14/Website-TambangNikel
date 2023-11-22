</div><!-- end row -->
</div> <!-- end container fluid -->

<footer class="text-center mb-0 py-3">
    <p class="text-muted small mb-0">Copyright &copy; <?php echo  date("Y");?> <a style="text-decoration:none;">
    <b>Dinda Nola</b></a>. All Rights Reserved</p>
</footer>

    <script src="assets/js/jquery.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#table_laporan').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
    $(document).ready(function() {
        $('#table_admin').DataTable( {} );
        $('#table_penyetuju').DataTable( {} );
        $('#table_kendaraan').DataTable( {} );
        $('#table_driver').DataTable( {} );
        $('#table_bbm').DataTable( {} );
        $('#table_booking').DataTable( {} );
        $('#table_status').DataTable( {} );
        $('#table_kembali').DataTable( {} );
    } );
    </script>

</body>
</html>
