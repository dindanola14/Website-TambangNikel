<?php include 'template/headeradmin.php';?>

<div class="col-md-9 mb-2">
<div class="row">

<!-- booking -->
<div class="col-md-12 mb-2">
        
<?php
include "config.php";
if(isset($_POST['update']))
{
    $id_booking = $_POST['id_booking'];
    $status = $_POST['status'];
    $kembali = $_POST['kembali'];

    $result = mysqli_query($conn, "UPDATE booking SET status='$status', kembali='$kembali'");
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
$id_booking = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM booking WHERE id_booking=$id_booking");
while($data = mysqli_fetch_array($result))
{
    $id_booking = $data['id_booking'];
    $admin = $data['admin'];
    $penyetuju = $data['penyetuju'];
    $driver = $data['driver'];
    $kendaraan = $data['kendaraan'];
    $bbm = $data['bbm'];
    $service = $data['service'];
    $tgl_booking = $data['tgl_booking'];
    $status = $data['status'];
    $kembali = $data['kembali'];
}
?>
<div class="card">
<div class="card-header bg-purple">
        <div class="card-tittle text-white"><i class="fas fa-user-cog"></i> <b>Update Booking</b></div>
    </div>
    <div class="card-body">
    
        <form method="POST">
            <div class="form-row">
            <div class="form-group col-md-6">
                <input type="hidden" name="id_booking" value="<?php echo $_GET['id'] ?>">
                <label><b>ID Booking</b></label>
                <input type="text" class="form-control" value="<?php echo $id_booking ?>" readonly>
                </div>
            <div class="form-group col-md-6">
                <label><b>Admin</b></label>
                <input type="text" name="admin" class="form-control"  value="<?php echo $admin;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Penyetuju</b></label>
                <input type="text" name="penyetuju" class="form-control" value="<?php echo $penyetuju;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Driver</b></label>
                <input type="text" name="driver" class="form-control" value="<?php echo $driver;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Kendaraan</b></label>
                <input type="text" name="kendaraan" class="form-control" value="<?php echo $kendaraan;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>BBM</b></label>
                <input type="text" name="bbm" class="form-control"  value="<?php echo $bbm;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Service</b></label>
                <input type="date" name="service" class="form-control" value="<?php echo $service;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Tanggal Booking</b></label>
                <input type="date" name="tgl_booking" class="form-control" value="<?php echo $tgl_booking;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                <label><b>Status</b></label>
                <input type="text" name="status" class="form-control" value="<?php echo $status;?>" required>
                </div>
                <div class="form-group col-md-6">
                <label><b>Kembali</b></label>
                    <div class="input-group">
                        <input type="text" name="kembali" class="form-control" value="<?php echo $kembali;?>" required>
                        <div class="input-group-append">
                            <button class="btn btn-purple ml-3" name="update" type="submit">
                            <i class="fa fa-check mr-2"></i>Update</button>
                        </div>
                    </div>
                </div>
            </div>
            </div
        </form>
    </div>
</div>
</div>
<!-- end booking -->

</div><!-- end row col-md-9 -->
</div>

<?php include 'template/footer.php';?>
