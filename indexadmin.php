<?php include 'template/headeradmin.php';?>
<?php $barang=mysqli_query($conn, "SELECT * FROM barang");
$jsArray = "var harga_barang = new Array();";
$jsArray1 = "var nama_barang = new Array();";  
 ?>
  <div class="col-md-9 mb-2">
    <div class="row">

    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Selamat Datang <b><?php echo $userr ?></b> !</h3>
        <h8 class="font-weight-normal mb-0">Admin <span class="text-primary">Cafe Telkom</span></h8>
    </div>
    

