<?php include 'template/headeradmin.php';?>
  <div class="col-md-9 mb-2">
    <div class="row">

    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Selamat Datang <b><?php echo $userr ?></b> !</h3>
        <h8 class="font-weight-normal mb-0">Admin <span class="text-primary">PT. Tambang Nikel</span></h8>
    </div>
    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold"></h3>
    </div>

    <div class="col-md-5 mb-10">
    <div class="card">
    <div class="card-header bg-purple">
            <div class="card-tittle text-white"><i class="fas fa-map-marked-alt"></i> <b>Jumlah Booking</b></div>
    </div>

    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Document</title>
</head>
<body>

<?php 
  $con = new mysqli('localhost','root','','tambang_nikel');
  $query = $con->query("
  SELECT kendaraan, COUNT(*) as jumlah FROM `booking` GROUP BY kendaraan
  ");

  $kendaraan = [];
  foreach($query as $data)
  {
    $kendaraan[] = $data['kendaraan'];
    $jumlah[] = $data['jumlah'];
    // $kendaraan[] = $data['kendaraan']  ;
    // $bbm[] = $data['bbm'];
  }

?>


<div style="width: 500px;">
  <canvas id="myChart"></canvas>
</div>
 
<script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($kendaraan) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Booking',
      data: <?php echo json_encode($jumlah) ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'pie',
    data: data,
    options: {
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

</body>
</html>