<?php include 'template/headerpenyetuju.php';?>
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


<!-- table booking -->
<div class="col-md-12 mb-2">
    <div class="card">
    <div class="card-header bg-purple">
        <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Laporan</b></div>
    </div>
        <div class="card-body">
        <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table_laporan" width="100%">
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

