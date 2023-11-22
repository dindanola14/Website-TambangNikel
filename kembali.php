<?php include 'template/headeradmin.php';?>
<?php 
if(!empty($_POST['add_kembali'])){
    $id = $_POST['id_kembali'];
    $kembali = $_POST['kembali'];
    
    mysqli_query($conn,"insert into kembali values('','$id','$kembali')")
    or die(mysqli_error($conn));
    echo '<script>window.location="kembali.php"</script>';
}

$query = mysqli_query($conn, "SELECT max(id_kembali) as kodeTerbesar FROM kembali");
$data = mysqli_fetch_array($query);
$kodekembali = $data['kodeTerbesar'];
$urutan = (int) substr($kodekembali, 3, 3);
$urutan++;
$huruf = "KBL";
$kodekembali = $huruf . sprintf("%03s", $urutan);
?>

  <div class="col-md-9 mb-2">
    <div class="row">

    <!-- kembali -->
    <div class="col-md-12 mb-3">
        <div class="card">
        <div class="card-header bg-purple">
                <div class="card-tittle text-white"><i class="fas fa-ban"></i> <b>Tambah Kembali</b></div>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label><b>Kode Kembali</b></label>
                        <input type="text" name="id_kembali" class="form-control" value="<?php echo $kodekembali;?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Kembali</b></label>
                            <div class="input-group">
                                <input type="text" name="kembali" class="form-control" required>
                                <div class="input-group-append">
                                    <button name="add_kembali" value="simpan" class="btn btn-purple" type="submit">
                                    <i class="fa fa-plus mr-2"></i>Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end kembali -->


<!-- table kembali -->
<div class="col-md-12 mb-2">
    <div class="card">
    <div class="card-header bg-purple">
        <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data Kembali</b></div>
    </div>
        <div class="card-body">
        <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table_kembali" width="100%">
            <thead class="thead-purple">
                <tr>
                    <th>No</th>
                    <th>Kode Kembali</th>
                    <th>Kembali</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $data_kembali = mysqli_query($conn,"select * from kembali");
                while($d = mysqli_fetch_array($data_kembali)){
                    ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['id_kembali']; ?></td>
                    <td><?php echo $d['kembali']; ?></td>
                    <td>
                        <a class="btn btn-danger btn-xs" href="?id=<?php echo $d['id_kembali']; ?>" 
                        onclick="javascript:return confirm('Hapus Data Kembali ?');">
                        <i class="fa fa-trash fa-xs"></i> Hapus</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end table kembali -->

</div><!-- end row col-md-9 -->
</div>

<?php 
include 'config.php';
if(!empty($_GET['id'])){
    $id= $_GET['id'];
    $hapus_data = mysqli_query($conn, "DELETE FROM kembali WHERE id_kembali ='$id'");
    echo '<script>window.location="kembali.php"</script>';
}
?>
<?php include 'template/footer.php';?>
