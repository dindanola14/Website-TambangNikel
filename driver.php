<?php include 'template/headeradmin.php';?>
<?php 
if(!empty($_POST['add_driver'])){
    $id = $_POST['id_driver'];
    $nama_driver = $_POST['nama_driver'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $tgl_datang = $_POST['tgl_datang'];
    
    mysqli_query($conn,"insert into driver values('','$id','$nama_driver','$no_telp','$alamat','$tgl_datang')")
    or die(mysqli_error($conn));
    echo '<script>window.location="driver.php"</script>';
}

$query = mysqli_query($conn, "SELECT max(id_driver) as kodeTerbesar FROM driver");
$data = mysqli_fetch_array($query);
$kodedriver = $data['kodeTerbesar'];
$urutan = (int) substr($kodedriver, 3, 3);
$urutan++;
$huruf = "DRV";
$kodedriver = $huruf . sprintf("%03s", $urutan);
?>

  <div class="col-md-9 mb-2">
    <div class="row">

    <!-- driver -->
    <div class="col-md-12 mb-3">
        <div class="card">
        <div class="card-header bg-purple">
                <div class="card-tittle text-white"><i class="fas fa-id-card"></i> <b>Tambah Driver</b></div>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label><b>Kode Driver</b></label>
                        <input type="text" name="id_driver" class="form-control" value="<?php echo $kodedriver;?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Nama Driver</b></label>
                        <input type="text" name="nama_driver" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>No. Telepon</b></label>
                        <input type="text" name="no_telp" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Alamat</b></label>
                        <input type="text" name="alamat" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Tanggal Datang</b></label>
                            <div class="input-group">
                                <input type="date" name="tgl_datang" class="form-control" required>
                                <div class="input-group-append">
                                    <button name="add_driver" value="simpan" class="btn btn-purple" type="submit">
                                    <i class="fa fa-plus mr-2"></i>Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end driver -->


<!-- table driver -->
<div class="col-md-12 mb-2">
    <div class="card">
    <div class="card-header bg-purple">
        <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data Driver</b></div>
    </div>
        <div class="card-body">
        <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table_driver" width="100%">
            <thead class="thead-purple">
                <tr>
                    <th>No</th>
                    <th>Kode Driver</th>
                    <th>Nama Driver</th>
                    <th>No. Telepon</th>
                    <th>Alamat</th>
                    <th>Tanggal Datang</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $data_driver = mysqli_query($conn,"select * from driver");
                while($d = mysqli_fetch_array($data_driver)){
                    ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['id_driver']; ?></td>
                    <td><?php echo $d['nama_driver']; ?></td>
                    <td><?php echo $d['no_telp']; ?></td>
                    <td><?php echo $d['alamat']; ?></td>
                    <td><?php echo $d['tgl_datang']; ?></td>
                    <td>
                        <a class="btn btn-primary btn-xs" href="editdriver.php?id=<?php echo $d['id']; ?>">
                        <i class="fa fa-pen fa-xs"></i> Edit</a>
                        <a class="btn btn-danger btn-xs" href="?id=<?php echo $d['id_driver']; ?>" 
                        onclick="javascript:return confirm('Hapus Data Driver ?');">
                        <i class="fa fa-trash fa-xs"></i> Hapus</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end table driver -->

</div><!-- end row col-md-9 -->
</div>

<?php 
include 'config.php';
if(!empty($_GET['id'])){
    $id= $_GET['id'];
    $hapus_data = mysqli_query($conn, "DELETE FROM driver WHERE id_driver ='$id'");
    echo '<script>window.location="driver.php"</script>';
}
?>
<?php include 'template/footer.php';?>
