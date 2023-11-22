<?php include 'template/headeradmin.php';?>
<?php 
if(!empty($_POST['add_bbm'])){
    $id = $_POST['id_bbm'];
    $ongkos_bbm = $_POST['ongkos_bbm'];
    $tgl_input = $_POST['tgl_input'];
    
    mysqli_query($conn,"insert into bbm values('','$id','$ongkos_bbm','$tgl_input')")
    or die(mysqli_error($conn));
    echo '<script>window.location="bbm.php"</script>';
}

$query = mysqli_query($conn, "SELECT max(id_bbm) as kodeTerbesar FROM bbm");
$data = mysqli_fetch_array($query);
$kodeBBM = $data['kodeTerbesar'];
$urutan = (int) substr($kodeBBM, 3, 3);
$urutan++;
$huruf = "BBM";
$kodeBBM = $huruf . sprintf("%03s", $urutan);
?>

  <div class="col-md-9 mb-2">
    <div class="row">

    <!-- BBM -->
    <div class="col-md-12 mb-3">
        <div class="card">
        <div class="card-header bg-purple">
                <div class="card-tittle text-white"><i class="fas fa-gas-pump"></i> <b>Tambah BBM</b></div>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label><b>Kode BBM</b></label>
                        <input type="text" name="id_bbm" class="form-control" value="<?php echo $kodeBBM;?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Ongkos BBM</b></label>
                        <input type="text" name="ongkos_bbm" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Tanggal Input</b></label>
                            <div class="input-group">
                                <input type="date" name="tgl_input" class="form-control" required>
                                <div class="input-group-append">
                                    <button name="add_bbm" value="simpan" class="btn btn-purple" type="submit">
                                    <i class="fa fa-plus mr-2"></i>Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end BBM -->


<!-- table BBM -->
<div class="col-md-12 mb-2">
    <div class="card">
    <div class="card-header bg-purple">
        <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data BBM</b></div>
    </div>
        <div class="card-body">
        <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table_bbm" width="100%">
            <thead class="thead-purple">
                <tr>
                    <th>No</th>
                    <th>Kode BBM</th>
                    <th>Ongkos BBM</th>
                    <th>Tanggal Input</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $data_bbm = mysqli_query($conn,"select * from bbm");
                while($d = mysqli_fetch_array($data_bbm)){
                    ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['id_bbm']; ?></td>
                    <td><?php echo $d['ongkos_bbm']; ?></td>
                    <td><?php echo $d['tgl_input']; ?></td>
                    <td>
                        <a class="btn btn-primary btn-xs" href="editbbm.php?id=<?php echo $d['id']; ?>">
                        <i class="fa fa-pen fa-xs"></i> Edit</a>
                        <a class="btn btn-danger btn-xs" href="?id=<?php echo $d['id_bbm']; ?>" 
                        onclick="javascript:return confirm('Hapus Data BBM ?');">
                        <i class="fa fa-trash fa-xs"></i> Hapus</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end table BBM -->

</div><!-- end row col-md-9 -->
</div>

<?php 
include 'config.php';
if(!empty($_GET['id'])){
    $id= $_GET['id'];
    $hapus_data = mysqli_query($conn, "DELETE FROM bbm WHERE id_bbm ='$id'");
    echo '<script>window.location="bbm.php"</script>';
}
?>
<?php include 'template/footer.php';?>
