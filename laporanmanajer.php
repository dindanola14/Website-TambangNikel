<?php include 'template/headermanajer.php';?>
<?php
            function format_ribuan ($nilai){
                return number_format ($nilai, 0, ',', '.');
            }
                $query = mysqli_query($conn, "SELECT * FROM laporanku");
                $total = 0;
                $tot_bayar = 0;
                $no = 1;
                while ($r = $query->fetch_assoc()) {
                $total = $r['harga_barang'] * $r['quantity'];
                $tot_bayar += $total; }
                ?>
  <div class="col-md-9 mb-2">
    <div class="row">

    <!-- table barang -->
    <div class="col-md-12 mb-2">
        <div class="card">
        <div class="card-header bg-purple">
                <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data Laporan</b></div>
            </div>
            <br>
            <div class="card-body">
                <div class="col-md-9 mb-2">
                    <form method="post" class="form-inline">
                        <input type="date" name="tgl_mulai" class="form-control">
                        <input type="date" name="tgl_selesai" class="form-control ml-3">
                        <button type="submit" name="filter_tgl" class="btn btn-purple ml-3">Filter</button>
                </form>
                </div>
                </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table" width="100%">
                        <thead class="thead-purple">
                            <tr>
                            <th>No</th>
                            <th>Kasir</th>
                            <th>Kode Transaksi</th>
                            <th>Tgl Input</th>
                            <th>Nama Barang</th>
                            <th>Quantity</th>
                            <th>Harga</th>
                            <th>Sub-Total</th>
                            <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        if(isset($_POST['filter_tgl'])){
                            $mulai = $_POST['tgl_mulai'];
                            $selesai = $_POST['tgl_selesai'];

                            if($mulai!=null || $selesai!=null){
                                $data_barang = mysqli_query($conn,"SELECT * FROM laporanku where tgl_input BETWEEN '$mulai' and '$selesai'");
                            }else{
                                $data_barang = mysqli_query($conn,"SELECT * FROM laporanku ");
                            }
                        }else {
                            $data_barang = mysqli_query($conn,"SELECT * FROM laporanku ");

                        }
                        $no = 1;
                        while($d = mysqli_fetch_array($data_barang)){
                            ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['kasir']; ?></td>
                            <td><?php echo $d['no_transaksi']; ?></td>
                            <td><?php echo $d['tgl_input']; ?></td>
                            <td><?php echo $d['nama_barang']; ?></td>
                            <td><?php echo $d['quantity']; ?></td>
                            <td>Rp. <?php echo $d['harga_barang']; ?>,-</td>
                            <td>Rp. <?php echo $d['subtotal']; ?>,-</td>
                            <td>
                            <a class="btn btn-danger btn-xs" href="?id=<?php echo $d['id_cart']; ?>" 
                                onclick="javascript:return confirm('Hapus Data Barang ?');">
                                <i class="fa fa-trash fa-xs"></i> Hapus</a>
                            </td>
						</tr>
                        <?php }?>
					</tbody>
                    <!-- <tfoot>
                        <tr>
                        <th colspan="6" class="text-right"><b>TOTAL :</b></th>
                        <th><b>Rp. <?php echo format_ribuan($tot_bayar); ?>,-</b></th>
                        <th></th>
                        </tr>
                    </tfoot> -->
                </table>
            </div>
        </div>
    </div>
    <!-- end table barang -->

    </div><!-- end row col-md-9 -->
  </div>
  <?php 
	include 'config.php';
	if(!empty($_GET['id'])){
		$id= $_GET['id'];
		$hapus_data = mysqli_query($conn, "DELETE FROM laporanku WHERE id_cart ='$id'");
		echo '<script>window.location="laporanmanajer.php"</script>';
	}

?>
<?php include 'template/footer.php';?>
