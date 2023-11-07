<?php include 'template/headeradmin.php';?>
<?php 
if(!empty($_POST['add_kasir'])){
    $id_kasir = $_POST['id_kasir'];
    $nama_toko = $_POST['nama_toko'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    
    mysqli_query($conn,"insert into kasir values('','$nama_toko','$user','$pass','$alamat','$telp')")
    or die(mysqli_error($conn));
    echo '<script>window.location="addkasir.php"</script>';
}
?>

<div class="col-md-9 mb-2">
<div class="row">

<!-- kasir -->
<div class="col-md-12 mb-3">
    <div class="card">
    <div class="card-header bg-purple">
            <div class="card-tittle text-white"><i class="fas fa-user-alt"></i> <b>Tambah Kasir</b></div>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label><b>Nama Toko</b></label>
                    <input type="text" name="nama_toko" class="form-control"  value="<?php echo $nama_toko;?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>Username</b></label>
                    <input type="text" name="user" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>Password</b></label>
                    <input type="text" name="pass" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>Alamat</b></label>
                    <input type="text" name="alamat" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label><b>Telp</b></label>
                    <div class="input-group">
                    <input type="text" name="telp" class="form-control" required>
                    <div class="input-group-append">
                                <button name="add_kasir" value="simpan" class="btn btn-purple" type="submit">
                                <i class="fa fa-plus mr-2"></i>Tambah</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end kasir -->


<!-- table kasir -->
<div class="col-md-12 mb-2">
    <div class="card">
    <div class="card-header bg-purple">
        <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data Kasir</b></div>
    </div>
        <div class="card-body">
        <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table_kasir" width="100%">
            <thead class="thead-purple">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $data_kasir = mysqli_query($conn,"select * from kasir");
                while($d = mysqli_fetch_array($data_kasir)){
                    ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['user']; ?></td>
                    <td><?php echo $d['pass']; ?></td>
                    <td><?php echo $d['alamat']; ?></td>
                    <td><?php echo $d['telp']; ?></td>
                    <td>
                        <a class="btn btn-primary btn-xs" href="editkasir.php?id=<?php echo $d['id_kasir']; ?>">
                        <i class="fa fa-pen fa-xs"></i> Edit</a>
                        <a class="btn btn-danger btn-xs" href="?id=<?php echo $d['id_kasir']; ?>" 
                        onclick="javascript:return confirm('Hapus Data Kasir ?');">
                        <i class="fa fa-trash fa-xs"></i> Hapus</a>
                    </td>
                </tr>
                <?php }?>
        </tbody>
        </table>
        </div>
    </div>
</div>
<!-- end table kasir -->

</div><!-- end row col-md-9 -->
</div>

<?php 
include 'config.php';
if(!empty($_GET['id'])){
    $id_kasir= $_GET['id'];
    $hapus_data = mysqli_query($conn, "DELETE FROM kasir WHERE id_kasir ='$id_kasir'");
    echo '<script>window.location="addkasir.php"</script>';
}
?>
<?php include 'template/footer.php';?>
