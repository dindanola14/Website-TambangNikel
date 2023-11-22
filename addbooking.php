<?php include 'template/headeradmin.php';?>
<?php 
if(!empty($_POST['add_booking'])){
    $id_booking = $_POST['id_booking'];
    $admin = $_POST['admin'];
    $penyetuju = $_POST['penyetuju'];
    $driver = $_POST['driver'];
    $kendaraan = $_POST['kendaraan'];
    $bbm = $_POST['bbm'];
    $service = $_POST['service'];
    $tgl_booking = $_POST['tgl_booking'];
    $status = $_POST['status'];
    $kembali = $_POST['kembali'];
    
    mysqli_query($conn,"insert into booking values('','$admin','$penyetuju','$driver','$kendaraan','$bbm','$service','$tgl_booking','$status','$kembali')")
    or die(mysqli_error($conn));
    echo '<script>window.location="addbooking.php"</script>';
}
?>

<?php $penyetuju=mysqli_query($conn, "SELECT * FROM penyetuju");
$jsArray = "var user = new Array();";  
 ?>

<?php $kendaraan=mysqli_query($conn, "SELECT * FROM kendaraan");
$jsArray = "var jenis_kendaraan = new Array();";  
 ?>

<?php $driver=mysqli_query($conn, "SELECT * FROM driver");
$jsArray = "var nama_driver = new Array();";  
 ?>

<?php $bbm=mysqli_query($conn, "SELECT * FROM bbm");
$jsArray = "var ongkos_bbm = new Array();";  
 ?>

<?php $status=mysqli_query($conn, "SELECT * FROM status");
$jsArray = "var nama_status = new Array();";  
 ?>

<?php $kembali=mysqli_query($conn, "SELECT * FROM kembali");
$jsArray = "var kembali = new Array();";  
 ?>

<div class="col-md-9 mb-2">
<div class="row">

<!-- booking -->
<div class="col-md-12 mb-3">
    <div class="card">
    <div class="card-header bg-purple">
            <div class="card-tittle text-white"><i class="fas fa-map-marked-alt"></i> <b>Tambah Booking</b></div>
    </div>
        <div class="card-body">
        <div class="card-body py-4">
            <form method="POST">
            <div class="form-group row mb-0">
                        <label class="col-sm-4 col-form-label col-form-label-sm"><b>Tanggal Booking</b></label>
                        <div class="col-sm-8 mb-2">
                            <input type="date" class="form-control form-control-sm" name="tgl_booking" id="tgl_booking" required>
                        </div>
                        <label class="col-sm-4 col-form-label col-form-label-sm"><b>Admin</b></label>
                        <div class="col-sm-8 mb-2">
                            <input type="text" class="form-control form-control-sm" name="admin" id="admin" value="<?php echo $userr;?>" readonly> 
                        </div>
                        <label class="col-sm-4 col-form-label col-form-label-sm"><b>Kode Penyetuju</b></label>
                        <div class="col-sm-8 mb-2">
                            <div class="input-group">
                            <input type="text" name="kode_penyetuju" class="form-control form-control-sm border-right-0" list="datalist1" onchange="changeValue(this.value)"  aria-describedby="basic-addon2" required>
                            <datalist id="datalist1">
                            <?php if(mysqli_num_rows($penyetuju)) { ?>
                                <?php while($row_stj= mysqli_fetch_array($penyetuju)) { ?>
                                    <option value="<?php echo $row_stj["id_penyetuju"] ?>"> <?php echo $row_stj["id_penyetuju"]; ?>
                                <?php 
                                    $jsArray .= "user['" . $row_stj['id_penyetuju'] . "'] = {user:'" . addslashes($row_stj['user']) . "'};";
                                ?>
                            <?php } } ?>
                                </datalist>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-white border-left-0" id="basic-addon2" style="border-radius:0px 15px 15px 0px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-upc-scan" viewBox="0 0 16 16">
                                        <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5zM3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z"/>
                                        </svg></span>
                                </div>
                                </div>
                        </div>
                        <label class="col-sm-4 col-form-label col-form-label-sm"><b>Nama Penyetuju</b></label>
                        <div class="col-sm-8 mb-2">
                            <input type="text" class="form-control form-control-sm" name="penyetuju" id="user" readonly> 
                        </div>
                        <label class="col-sm-4 col-form-label col-form-label-sm"><b>Kode Driver</b></label>
                        <div class="col-sm-8 mb-2">
                            <div class="input-group">
                            <input type="text" name="kode_driver" class="form-control form-control-sm border-right-0" list="datalist3" onchange="changeValue3(this.value)"  aria-describedby="basic-addon2" required>
                            <datalist id="datalist3">
                            <?php if(mysqli_num_rows($driver)) { ?>
                                <?php while($row_drv= mysqli_fetch_array($driver)) { ?>
                                    <option value="<?php echo $row_drv["id_driver"] ?>"> <?php echo $row_drv["id_driver"]; ?>
                                <?php 
                                    $jsArray .= "nama_driver['" . $row_drv['id_driver'] . "'] = {nama_driver:'" . addslashes($row_drv['nama_driver']) . "'};";
                                ?>
                            <?php } } ?>
                                </datalist>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-white border-left-0" id="basic-addon2" style="border-radius:0px 15px 15px 0px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-upc-scan" viewBox="0 0 16 16">
                                        <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5zM3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z"/>
                                        </svg></span>
                                </div>
                                </div>
                        </div>
                        <label class="col-sm-4 col-form-label col-form-label-sm"><b>Nama Driver</b></label>
                        <div class="col-sm-8 mb-2">
                            <input type="text" class="form-control form-control-sm" name="driver" id="nama_driver" readonly> 
                        </div>
                        <label class="col-sm-4 col-form-label col-form-label-sm"><b>Kode Kendaraan</b></label>
                        <div class="col-sm-8 mb-2">
                            <div class="input-group">
                            <input type="text" name="kode_kendaraan" class="form-control form-control-sm border-right-0" list="datalist2" onchange="changeValue2(this.value)"  aria-describedby="basic-addon2" required>
                            <datalist id="datalist2">
                            <?php if(mysqli_num_rows($kendaraan)) { ?>
                                <?php while($row_kdr= mysqli_fetch_array($kendaraan)) { ?>
                                    <option value="<?php echo $row_kdr["id_kendaraan"] ?>"> <?php echo $row_kdr["id_kendaraan"]; ?>
                                <?php 
                                    $jsArray .= "jenis_kendaraan['" . $row_kdr['id_kendaraan'] . "'] = {jenis_kendaraan:'" . addslashes($row_kdr['jenis_kendaraan']) . "'};";
                                ?>
                            <?php } } ?>
                                </datalist>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-white border-left-0" id="basic-addon2" style="border-radius:0px 15px 15px 0px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-upc-scan" viewBox="0 0 16 16">
                                        <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5zM3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z"/>
                                        </svg></span>
                                </div>
                                </div>
                        </div>
                        <label class="col-sm-4 col-form-label col-form-label-sm"><b>Jenis Kendaraan</b></label>
                        <div class="col-sm-8 mb-2">
                            <input type="text" class="form-control form-control-sm" name="kendaraan" id="jenis_kendaraan" readonly> 
                        </div>
                        <label class="col-sm-4 col-form-label col-form-label-sm"><b>Kode BBM</b></label>
                        <div class="col-sm-8 mb-2">
                            <div class="input-group">
                            <input type="text" name="kode_bbm" class="form-control form-control-sm border-right-0" list="datalist4" onchange="changeValue4(this.value)"  aria-describedby="basic-addon2" required>
                            <datalist id="datalist4">
                            <?php if(mysqli_num_rows($bbm)) { ?>
                                <?php while($row_bbm= mysqli_fetch_array($bbm)) { ?>
                                    <option value="<?php echo $row_bbm["id_bbm"] ?>"> <?php echo $row_bbm["id_bbm"]; ?>
                                <?php 
                                    $jsArray .= "ongkos_bbm['" . $row_bbm['id_bbm'] . "'] = {ongkos_bbm:'" . addslashes($row_bbm['ongkos_bbm']) . "'};";
                                ?>
                            <?php } } ?>
                                </datalist>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-white border-left-0" id="basic-addon2" style="border-radius:0px 15px 15px 0px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-upc-scan" viewBox="0 0 16 16">
                                        <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5zM3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z"/>
                                        </svg></span>
                                </div>
                                </div>
                        </div>
                        <label class="col-sm-4 col-form-label col-form-label-sm"><b>Ongkos BBM</b></label>
                        <div class="col-sm-8 mb-2">
                            <input type="text" class="form-control form-control-sm" name="bbm" id="ongkos_bbm" readonly> 
                        </div>
                        <label class="col-sm-4 col-form-label col-form-label-sm"><b>Service</b></label>
                        <div class="col-sm-8 mb-2">
                            <input type="date" class="form-control form-control-sm" name="service" id="service" required> 
                        </div>
                        <label class="col-sm-4 col-form-label col-form-label-sm"><b>Kode Status</b></label>
                        <div class="col-sm-8 mb-2">
                            <div class="input-group">
                            <input type="text" name="kode_status" class="form-control form-control-sm border-right-0" list="datalist5" onchange="changeValue10(this.value)"  aria-describedby="basic-addon2" required>
                            <datalist id="datalist5">
                            <?php if(mysqli_num_rows($status)) { ?>
                                <?php while($row_sts= mysqli_fetch_array($status)) { ?>
                                    <option value="<?php echo $row_sts["id_status"] ?>"> <?php echo $row_sts["id_status"]; ?>
                                <?php 
                                    $jsArray .= "nama_status['" . $row_sts['id_status'] . "'] = {nama_status:'" . addslashes($row_sts['nama_status']) . "'};";
                                ?>
                            <?php } } ?>
                                </datalist>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-white border-left-0" id="basic-addon2" style="border-radius:0px 15px 15px 0px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-upc-scan" viewBox="0 0 16 16">
                                        <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5zM3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z"/>
                                        </svg></span>
                                </div>
                                </div>
                        </div>
                        <label class="col-sm-4 col-form-label col-form-label-sm"><b>Status</b></label>
                        <div class="col-sm-8 mb-2">
                            <input type="text" class="form-control form-control-sm" name="status" id="nama_status" readonly> 
                        </div>
                        <label class="col-sm-4 col-form-label col-form-label-sm"><b>Kode Kembali</b></label>
                        <div class="col-sm-8 mb-2">
                            <div class="input-group">
                            <input type="text" name="kode_kembali" class="form-control form-control-sm border-right-0" list="datalist6" onchange="changeValue6(this.value)"  aria-describedby="basic-addon2" required>
                            <datalist id="datalist6">
                            <?php if(mysqli_num_rows($kembali)) { ?>
                                <?php while($row_kbl= mysqli_fetch_array($kembali)) { ?>
                                    <option value="<?php echo $row_kbl["id_kembali"] ?>"> <?php echo $row_kbl["id_kembali"]; ?>
                                <?php 
                                    $jsArray .= "kembali['" . $row_kbl['id_kembali'] . "'] = {kembali:'" . addslashes($row_kbl['kembali']) . "'};";
                                ?>
                            <?php } } ?>
                                </datalist>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-white border-left-0" id="basic-addon2" style="border-radius:0px 15px 15px 0px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-upc-scan" viewBox="0 0 16 16">
                                        <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5zM3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z"/>
                                        </svg></span>
                                </div>
                                </div>
                        </div>
                        <label class="col-sm-4 col-form-label col-form-label-sm"><b>Kembali</b></label>
                        <div class="col-sm-8 mb-2">
                            <input type="text" class="form-control form-control-sm" name="kembali" id="kembali" readonly> 
                            <div class="input-group-append">
                                    <button name="add_booking" value="simpan" class="btn btn-purple" type="submit">
                                    <i class="fa fa-plus mr-2"></i>Tambah</button>
                                </div>
                    </div> 
                    </div>
            </form>
        </div>
    </div>
</div>
                                </div>
                                </div>
<!-- end booking -->


<!-- table booking -->
<div class="col-md-12 mb-2">
    <div class="card">
    <div class="card-header bg-purple">
        <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data booking</b></div>
    </div>
        <div class="card-body">
        <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table_booking" width="100%">
            <thead class="thead-purple">
                <tr>
                    <th>No</th>
                    <th>Admin</th>
                    <th>Penyetuju</th>
                    <th>Driver</th>
                    <th>Kendaraan</th>
                    <th>BBM</th>
                    <th>Service</th>
                    <th>Tanggal Booking</th>
                    <th>Status</th>
                    <th>Kembali</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $data_booking = mysqli_query($conn,"select * from booking");
                while($d = mysqli_fetch_array($data_booking)){
                    ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['admin']; ?></td>
                    <td><?php echo $d['penyetuju']; ?></td>
                    <td><?php echo $d['driver']; ?></td>
                    <td><?php echo $d['kendaraan']; ?></td>
                    <td><?php echo $d['bbm']; ?></td>
                    <td><?php echo $d['service']; ?></td>
                    <td><?php echo $d['tgl_booking']; ?></td>
                    <td><?php if($d['status'] == "Belum Diizinkan"){ ?>
                        <font style="color: darkred; font-weight: bold;">Belum Diizinkan</font>
                    <?php }else if($d['status'] == "Masih Dikomunikasikan"){ ?>
                        <font style="color: darkblue; font-weight: bold;">Masih Dikomunikasikan</font>
                    <?php }else if($d['status'] == "Sudah Diizinkan"){ ?> 
                      <font style="color: darkgreen; font-weight: bold;">Sudah Diizinkan</font>
                    <?php } ?> </td>
                    <td><?php if($d['kembali'] == "Masih Dipakai"){ ?>
                        <font style="color: darkred; font-weight: bold;">Masih Dipakai</font>
                    <?php }else if($d['kembali'] == "Sudah Dikembalikan"){ ?>
                        <font style="color: darkgreen; font-weight: bold;">Sudah Dikembalikan</font>
                    <?php }else if($d['kembali'] == "Proses Persetujuan"){ ?> 
                      <font style="color: darkblue; font-weight: bold;">Proses Persetujuan</font>
                    <?php } ?> </td>
                    <td>
                        <a class="btn btn-primary btn-xs" href="editbooking.php?id=<?php echo $d['id_booking']; ?>">
                        <i class="fa fa-pen fa-xs"></i> Edit</a>
                        <a class="btn btn-danger btn-xs" href="?id=<?php echo $d['id_booking']; ?>" 
                        onclick="javascript:return confirm('Hapus Data Booking ?');">
                        <i class="fa fa-trash fa-xs"></i> Hapus</a>
                    </td>
                </tr>
                <?php }?>
        </tbody>
        </table>
        </div>
    </div>
</div>
<!-- end table booking -->

</div><!-- end row col-md-9 -->
</div>
  
<script type="text/javascript">
    <?php echo $jsArray; ?>
    function changeValue(id_penyetuju) {
      document.getElementById("user").value = user[id_penyetuju].user;
    };
    function changeValue2(id_kendaraan) {
      document.getElementById("jenis_kendaraan").value = jenis_kendaraan[id_kendaraan].jenis_kendaraan;
    };
    function changeValue3(id_driver) {
      document.getElementById("nama_driver").value = nama_driver[id_driver].nama_driver;
    };
    function changeValue4(id_bbm) {
      document.getElementById("ongkos_bbm").value = ongkos_bbm[id_bbm].ongkos_bbm;
    };
    function changeValue6(id_kembali) {
      document.getElementById("kembali").value = kembali[id_kembali].kembali;
    };
    function changeValue10(id_status) {
      document.getElementById("nama_status").value = nama_status[id_status].nama_status;
    };
    </script>


    
    
<?php 
include 'config.php';
if(!empty($_GET['id'])){
    $id_booking= $_GET['id'];
    $hapus_data = mysqli_query($conn, "DELETE FROM booking WHERE id_booking ='$id_booking'");
    echo '<script>window.location="addbooking.php"</script>';
}
?>
<?php include 'template/footer.php';?>

