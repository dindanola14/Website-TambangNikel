<?php include 'template/headeradmin.php';?>
<?php 
if(!empty($_POST['add_kendaraan'])){
    $id = $_POST['id_kendaraan'];
    $jenis_kendaraan = $_POST['jenis_kendaraan'];
    $tgl_operasi = $_POST['tgl_operasi'];
    
    mysqli_query($conn,"insert into kendaraan values('','$id','$jenis_kendaraan','$tgl_operasi')")
    or die(mysqli_error($conn));
    echo '<script>window.location="kendaraan.php"</script>';
}

$query = mysqli_query($conn, "SELECT max(id_kendaraan) as kodeTerbesar FROM kendaraan");
$data = mysqli_fetch_array($query);
$kodeKendaraan = $data['kodeTerbesar'];
$urutan = (int) substr($kodeKendaraan, 3, 3);
$urutan++;
$huruf = "KDR";
$kodeKendaraan = $huruf . sprintf("%03s", $urutan);
?>

  <div class="col-md-9 mb-2">
    <div class="row">

    <!-- barang -->
    <div class="col-md-12 mb-3">
        <div class="card">
        <div class="card-header bg-purple">
                <div class="card-tittle text-white"><i class="fas fa-truck"></i> <b>Tambah Kendaraan</b></div>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label><b>Kode Kendaraan</b></label>
                        <input type="text" name="id_kendaraan" class="form-control" value="<?php echo $kodeKendaraan;?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Jenis Kendaraan</b></label>
                        <input type="text" name="jenis_kendaraan" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Tanggal Operasi</b></label>
                            <div class="input-group">
                                <input type="date" name="tgl_operasi" class="form-control" required>
                                <div class="input-group-append">
                                    <button name="add_kendaraan" value="simpan" class="btn btn-purple" type="submit">
                                    <i class="fa fa-plus mr-2"></i>Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end barang -->


<!-- table barang -->
<div class="col-md-12 mb-2">
    <div class="card">
    <div class="card-header bg-purple">
        <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data Kendaraan</b></div>
    </div>
        <div class="card-body">
        <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table_kendaraan" width="100%">
            <thead class="thead-purple">
                <tr>
                    <th>No</th>
                    <th>Kode Kendaraan</th>
                    <th>Jenis Kendaraan</th>
                    <th>Tanggal Input</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $data_kendaraan = mysqli_query($conn,"select * from kendaraan");
                while($d = mysqli_fetch_array($data_kendaraan)){
                    ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['id_kendaraan']; ?></td>
                    <td><?php echo $d['jenis_kendaraan']; ?></td>
                    <td><?php echo $d['tgl_operasi']; ?></td>
                    <td>
                        <a class="btn btn-primary btn-xs" href="editkendaraan.php?id=<?php echo $d['id']; ?>">
                        <i class="fa fa-pen fa-xs"></i> Edit</a>
                        <a class="btn btn-danger btn-xs" href="?id=<?php echo $d['id_kendaraan']; ?>" 
                        onclick="javascript:return confirm('Hapus Data Kendaraan ?');">
                        <i class="fa fa-trash fa-xs"></i> Hapus</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end table barang -->

</div><!-- end row col-md-9 -->
</div>

<?php 
include 'config.php';
if(!empty($_GET['id'])){
    $id= $_GET['id'];
    $hapus_data = mysqli_query($conn, "DELETE FROM kendaraan WHERE id_kendaraan ='$id'");
    echo '<script>window.location="kendaraan.php"</script>';
}
?>
<?php include 'template/footer.php';?>
