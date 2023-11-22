<?php include 'template/headeradmin.php';?>

<div class="col-md-9 mb-2">
  <div class="row">

<!-- bbm -->
<div class="col-md-12 mb-2">
        
<?php
include "config.php";
if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $ongkos_bbm = $_POST['ongkos_bbm'];
    $tgl_input = $_POST['tgl_input'];

    $result = mysqli_query($conn, "UPDATE bbm SET ongkos_bbm='$ongkos_bbm',tgl_input='$tgl_input' WHERE id=$id");
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
$result = mysqli_query($conn, "SELECT * FROM bbm WHERE id=$id");
while($data = mysqli_fetch_array($result))
{
    $idk = $data['id_bbm'];
    $ongkos_bbm = $data['ongkos_bbm'];
    $tgl_input = $data['tgl_input'];
}
?>
  <div class="card">
  <div class="card-header bg-purple">
    <div class="card-tittle text-white"><i class="fas fa-gas-pump"></i> <b>Update BBM</b></div>
  </div>
      <div class="card-body">
        <form method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                <label><b>Kode BBM</b></label>
                <input type="text" class="form-control" value="<?php echo $idk ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Ongkos BBM</b></label>
                <input type="text" name="ongkos_bbm" class="form-control" value="<?php echo $ongkos_bbm; ?>" required>
                </div>
                <div class="form-group col-md-6">
                <label><b>Tanggal Input</b></label>
                  <div class="input-group">
                      <input type="text" name="tgl_input" class="form-control" value="<?php echo $tgl_input; ?>" readonly>
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
<!-- end bbm -->

</div><!-- end row col-md-9 -->
</div>

<?php include 'template/footer.php';?>
