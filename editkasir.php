<?php include 'template/headeradmin.php';?>

<div class="col-md-9 mb-2">
<div class="row">

<!-- kasir -->
<div class="col-md-12 mb-2">
        
<?php
include "config.php";
if(isset($_POST['update']))
{
    $id_kasir = $_POST['id_kasir'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];

    $result = mysqli_query($conn, "UPDATE kasir SET user='$user', pass='$pass', alamat='$alamat', telp='$telp' WHERE id_kasir=$id_kasir");
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
$id_kasir = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM kasir WHERE id_kasir=$id_kasir");
while($data = mysqli_fetch_array($result))
{
    $id_kasir = $data['id_kasir'];
    $nama_toko = $data['nama_toko'];
    $user = $data['user'];
    $pass = $data['pass'];
    $alamat = $data['alamat'];
    $telp = $data['telp'];
}
?>
<div class="card">
<div class="card-header bg-purple">
        <div class="card-tittle text-white"><i class="fas fa-user-alt"></i> <b>Update Kasir</b></div>
    </div>
    <div class="card-body">
    
        <form method="POST">
            <div class="form-row">
            <div class="form-group col-md-6">
                <input type="hidden" name="id_kasir" value="<?php echo $_GET['id'] ?>">
                <label><b>Id Kasir</b></label>
                <input type="text" class="form-control" value="<?php echo $id_kasir ?>" readonly>
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
<!-- end kasir -->

</div><!-- end row col-md-9 -->
</div>

<?php include 'template/footer.php';?>
