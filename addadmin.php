<?php include 'template/headeradmin.php';?>
<?php 
if(!empty($_POST['add_admin'])){
    $id_admin = $_POST['id_admin'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    
    mysqli_query($conn,"insert into admin values('','$nama_perusahaan','$user','$pass','$alamat','$telp')")
    or die(mysqli_error($conn));
    echo '<script>window.location="addadmin.php"</script>';
}
?>

<div class="col-md-9 mb-2">
<div class="row">

<!-- admin -->
<div class="col-md-12 mb-3">
    <div class="card">
    <div class="card-header bg-purple">
            <div class="card-tittle text-white"><i class="fas fa-user-cog"></i> <b>Tambah Admin</b></div>
    </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label><b>Nama Perusahaan</b></label>
                    <input type="text" name="nama_perusahaan" class="form-control"  value="<?php echo $nama_perusahaan;?>" readonly>
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
                    <label><b>No. Telepon</b></label>
                    <div class="input-group">
                    <input type="text" name="telp" class="form-control" required>
                    <div class="input-group-append">
                        <button name="add_admin" value="simpan" class="btn btn-purple" type="submit">
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
<!-- end admin -->


<!-- table admin -->
<div class="col-md-12 mb-2">
    <div class="card">
    <div class="card-header bg-purple">
        <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data Admin</b></div>
    </div>
        <div class="card-body">
        <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table_admin" width="100%">
            <thead class="thead-purple">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $data_admin = mysqli_query($conn,"select * from admin");
                while($d = mysqli_fetch_array($data_admin)){
                    ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['user']; ?></td>
                    <td><?php echo $d['pass']; ?></td>
                    <td><?php echo $d['alamat']; ?></td>
                    <td><?php echo $d['telp']; ?></td>
                    <td>
                        <a class="btn btn-primary btn-xs" href="editadmin.php?id=<?php echo $d['id_admin']; ?>">
                        <i class="fa fa-pen fa-xs"></i> Edit</a>
                        <a class="btn btn-danger btn-xs" href="?id=<?php echo $d['id_admin']; ?>" 
                        onclick="javascript:return confirm('Hapus Data Admin ?');">
                        <i class="fa fa-trash fa-xs"></i> Hapus</a>
                    </td>
                </tr>
                <?php }?>
        </tbody>
        </table>
        </div>
    </div>
</div>
<!-- end table admin -->

</div><!-- end row col-md-9 -->
</div>
  
<?php 
include 'config.php';
if(!empty($_GET['id'])){
    $id_admin= $_GET['id'];
    $hapus_data = mysqli_query($conn, "DELETE FROM admin WHERE id_admin ='$id_admin'");
    echo '<script>window.location="addadmin.php"</script>';
}
?>
<?php include 'template/footer.php';?>
