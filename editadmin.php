<?php include 'template/headeradmin.php';?>

<div class="col-md-9 mb-2">
<div class="row">

<!-- admin -->
<div class="col-md-12 mb-2">
        
<?php
include "config.php";
if(isset($_POST['update']))
{
    $id_admin = $_POST['id_admin'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];

    $result = mysqli_query($conn, "UPDATE admin SET user='$user', pass='$pass', alamat='$alamat', telp='$telp' WHERE id_admin=$id_admin");
    if(!$result){
        echo "
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>NOOO!</strong> data gagal di update.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>
        ";
        } else{
        echo "
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>YESSS!</strong> data berhasil di update.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>
        ";
        }
}
?>
<?php
$id_admin = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin=$id_admin");
while($data = mysqli_fetch_array($result))
{
    $id_admin = $data['id_admin'];
    $nama_toko = $data['nama_toko'];
    $user = $data['user'];
    $pass = $data['pass'];
    $alamat = $data['alamat'];
    $telp = $data['telp'];
}
?>
<div class="card">
<div class="card-header bg-purple">
        <div class="card-tittle text-white"><i class="fas fa-user-cog"></i> <b>Update Admin</b></div>
    </div>
    <div class="card-body">
    
        <form method="POST">
            <div class="form-row">
            <div class="form-group col-md-6">
                <input type="hidden" name="id_admin" value="<?php echo $_GET['id'] ?>">
                <label><b>Id Admin</b></label>
                <input type="text" class="form-control" value="<?php echo $id_admin ?>" readonly>
                </div>
            <div class="form-group col-md-6">
                <label><b>Nama Toko</b></label>
                <input type="text" name="nama_toko" class="form-control"  value="<?php echo $nama_toko;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Username</b></label>
                <input type="text" name="user" class="form-control" value="<?php echo $user;?>" required>
                </div>
                <div class="form-group col-md-6">
                <label><b>Password</b></label>
                <input type="text" name="pass" class="form-control" value="<?php echo $pass;?>" required>
                </div>
                <div class="form-group col-md-6">
                <label><b>Alamat</b></label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $alamat;?>" required>
                </div>
                <div class="form-group col-md-6">
                <label><b>Telepon</b></label>
                    <div class="input-group">
                        <input type="text" name="telp" class="form-control" value="<?php echo $telp;?>" required>
                        <div class="input-group-append">
                            <button class="btn btn-purple ml-3" name="update" type="submit">
                            <i class="fa fa-check mr-2"></i>Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<!-- end admin -->

</div><!-- end row col-md-9 -->
</div>

<?php include 'template/footer.php';?>
