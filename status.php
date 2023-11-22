<?php include 'template/headeradmin.php';?>
<?php 
if(!empty($_POST['add_status'])){
    $id = $_POST['id_status'];
    $nama_status = $_POST['nama_status'];
    
    mysqli_query($conn,"insert into status values('','$id','$nama_status')")
    or die(mysqli_error($conn));
    echo '<script>window.location="status.php"</script>';
}

$query = mysqli_query($conn, "SELECT max(id_status) as kodeTerbesar FROM status");
$data = mysqli_fetch_array($query);
$kodeStatus = $data['kodeTerbesar'];
$urutan = (int) substr($kodeStatus, 3, 3);
$urutan++;
$huruf = "STS";
$kodeStatus = $huruf . sprintf("%03s", $urutan);
?>

  <div class="col-md-9 mb-2">
    <div class="row">

    <!-- status -->
    <div class="col-md-12 mb-3">
        <div class="card">
        <div class="card-header bg-purple">
                <div class="card-tittle text-white"><i class="far fa-frown"></i> <b>Tambah Status</b></div>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label><b>Kode Status</b></label>
                        <input type="text" name="id_status" class="form-control" value="<?php echo $kodeStatus;?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Status</b></label>
                            <div class="input-group">
                                <input type="text" name="nama_status" class="form-control" required>
                                <div class="input-group-append">
                                    <button name="add_status" value="simpan" class="btn btn-purple" type="submit">
                                    <i class="fa fa-plus mr-2"></i>Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end status -->


<!-- table status -->
<div class="col-md-12 mb-2">
    <div class="card">
    <div class="card-header bg-purple">
        <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data status</b></div>
    </div>
        <div class="card-body">
        <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table_status" width="100%">
            <thead class="thead-purple">
                <tr>
                    <th>No</th>
                    <th>Kode Status</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $data_status = mysqli_query($conn,"select * from status");
                while($d = mysqli_fetch_array($data_status)){
                    ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['id_status']; ?></td>
                    <td><?php echo $d['nama_status']; ?></td>
                    <td>
                        <a class="btn btn-danger btn-xs" href="?id=<?php echo $d['id_status']; ?>" 
                        onclick="javascript:return confirm('Hapus Data Status ?');">
                        <i class="fa fa-trash fa-xs"></i> Hapus</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end table status -->

</div><!-- end row col-md-9 -->
</div>

<?php 
include 'config.php';
if(!empty($_GET['id'])){
    $id= $_GET['id'];
    $hapus_data = mysqli_query($conn, "DELETE FROM status WHERE id_status ='$id'");
    echo '<script>window.location="status.php"</script>';
}
?>
<?php include 'template/footer.php';?>
