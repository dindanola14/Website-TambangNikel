<?php include 'template/headeradmin.php';?>

<div class="col-md-9 mb-2">
  <div class="row">

<!-- driver -->
<div class="col-md-12 mb-2">
        
<?php
include "config.php";
if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $nama_driver = $_POST['nama_driver'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $tgl_datang = $_POST['tgl_datang'];

    $result = mysqli_query($conn, "UPDATE driver SET nama_driver='$nama_driver', no_telp='$no_telp',alamat='$alamat',tgl_datang='$tgl_datang' WHERE id=$id");
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
$result = mysqli_query($conn, "SELECT * FROM driver WHERE id=$id");
while($data = mysqli_fetch_array($result))
{
    $idd = $data['id_driver'];
    $nama_driver = $data['nama_driver'];
    $no_telp = $data['no_telp'];
    $alamat = $data['alamat'];
    $tgl_datang = $data['tgl_datang'];
}
?>
  <div class="card">
  <div class="card-header bg-purple">
    <div class="card-tittle text-white"><i class="fas fa-id-card"></i> <b>Update Driver</b></div>
  </div>
      <div class="card-body">
        <form method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                <label><b>Kode Driver</b></label>
                <input type="text" class="form-control" value="<?php echo $idd ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Nama Driver</b></label>
                <input type="text" name="nama_driver" class="form-control" value="<?php echo $nama_driver; ?>" required>
                </div>
                <div class="form-group col-md-6">
                <label><b>No. Telepon</b></label>
                <input type="text" name="no_telp" class="form-control" value="<?php echo $no_telp; ?>" required>
                </div>
                <div class="form-group col-md-6">
                <label><b>Alamat</b></label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $alamat; ?>" required>
                </div>
                <div class="form-group col-md-6">
                <label><b>Tanggal Datang</b></label>
                  <div class="input-group">
                      <input type="text" name="tgl_datang" class="form-control" value="<?php echo $tgl_datang; ?>" readonly>
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
<!-- end driver -->

</div><!-- end row col-md-9 -->
</div>

<?php include 'template/footer.php';?>
