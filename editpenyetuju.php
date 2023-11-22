<?php include 'template/headeradmin.php';?>

<div class="col-md-9 mb-2">
  <div class="row">

<!-- penyetuju -->
<div class="col-md-12 mb-2">
        
<?php
include "config.php";
if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $pihak = $_POST['pihak'];

    $result = mysqli_query($conn, "UPDATE penyetuju SET nama_perusahaan='$nama_perusahaan',user='$user',pass='$pass',alamat='$alamat',telp='$telp',pihak='$pihak' WHERE id=$id");
    if(!$result){
        echo "
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>NOOO!</strong> Data gagal di update.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>
        ";
        } else{
        echo "
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>YESSS!</strong> Data berhasil di update.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>
        ";
        }
}
?>
<?php
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM penyetuju WHERE id=$id");
while($data = mysqli_fetch_array($result))
{
    $ids = $data['id_penyetuju'];
    $nama_perusahaan = $data['nama_perusahaan'];
    $user = $data['user'];
    $pass = $data['pass'];
    $alamat = $data['alamat'];
    $telp = $data['telp'];
    $pihak = $data['pihak'];
}
?>
  <div class="card">
  <div class="card-header bg-purple">
    <div class="card-tittle text-white"><i class="fas fa-user-alt"></i> <b>Update Penyetuju</b></div>
  </div>
      <div class="card-body">
        <form method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                <label><b>Kode Penyetuju</b></label>
                <input type="text" class="form-control" value="<?php echo $ids ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Nama Perusahaan</b></label>
                <input type="text" name="nama_perusahaan" class="form-control" value="<?php echo $nama_perusahaan; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Username</b></label>
                <input type="text" name="user" class="form-control" value="<?php echo $user; ?>" required>
                </div>
                <div class="form-group col-md-6">
                <label><b>Password</b></label>
                <input type="text" name="pass" class="form-control" value="<?php echo $pass; ?>" required>
                </div>
                <div class="form-group col-md-6">
                <label><b>Alamat</b></label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $alamat; ?>" required>
                </div>
                <div class="form-group col-md-6">
                <label><b>No. Telepon</b></label>
                <input type="text" name="telp" class="form-control" value="<?php echo $telp; ?>" required>
                </div>
                <div class="form-group col-md-6">
                <label><b>Pihak</b></label>
                  <div class="input-group">
                      <input type="text" name="pihak" class="form-control" value="<?php echo $pihak; ?>" required>
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
<!-- end penyetuju -->

</div><!-- end row col-md-9 -->
</div>

<?php include 'template/footer.php';?>
