<?php include 'template/headeradmin.php';?>

<div class="col-md-9 mb-2">
  <div class="row">

<!-- kendaraan -->
<div class="col-md-12 mb-2">
        
<?php
include "config.php";
if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $jenis_kendaraan = $_POST['jenis_kendaraan'];
    $tgl_operasi = $_POST['tgl_operasi'];

    $result = mysqli_query($conn, "UPDATE kendaraan SET jenis_kendaraan='$jenis_kendaraan',tgl_operasi='$tgl_operasi' WHERE id=$id");
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
$result = mysqli_query($conn, "SELECT * FROM kendaraan WHERE id=$id");
while($data = mysqli_fetch_array($result))
{
    $idk = $data['id_kendaraan'];
    $jenis_kendaraan = $data['jenis_kendaraan'];
    $tgl_operasi = $data['tgl_operasi'];
}
?>
  <div class="card">
  <div class="card-header bg-purple">
    <div class="card-tittle text-white"><i class="fas fa-truck"></i> <b>Update Kendaraan</b></div>
  </div>
      <div class="card-body">
        <form method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                <label><b>Kode Kendaraan</b></label>
                <input type="text" class="form-control" value="<?php echo $idk ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Jenis Kendaraan</b></label>
                <input type="text" name="jenis_kendaraan" class="form-control" value="<?php echo $jenis_kendaraan; ?>" required>
                </div>
                <div class="form-group col-md-6">
                <label><b>Tanggal Operasi</b></label>
                  <div class="input-group">
                      <input type="text" name="tgl_operasi" class="form-control" value="<?php echo $tgl_operasi; ?>" readonly>
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
<!-- end kendaraan -->

</div><!-- end row col-md-9 -->
</div>

<?php include 'template/footer.php';?>
