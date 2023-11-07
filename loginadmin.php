<?php
	@ob_start();
	session_start();
	if(isset($_POST['proses'])){
		require 'config.php';
			
		$user = strip_tags($_POST['user']);
		$pass = strip_tags($_POST['pass']);
        $data = mysqli_query($conn,"SELECT* FROM admin WHERE user='$user'");
        $cek = mysqli_num_rows($data);
        if($cek > 0){
            $_SESSION['user'] = $user;
            $_SESSION['status'] = "login";
            echo '<script>alert("Login Sukses");window.location="indexadmin.php"</script>';
        }else{
            echo '<script>alert("Maaf! data yang anda masukan salah.");history.go(-1);</script>';
        }
	}
    if(isset($_SESSION['status']))
    {header('location: indexadmin.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="cafe.png">
    <link rel="icon" href="icon.ico" type="image/ico">
  <title>Login Admin | Cafe Telkom</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-purple">

<div class="container">
<br><br><br><br><br><br>

<div class="row justify-content-center">

    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="brand-logo">
                <center>
                <img src="cafe.png" height="80" width="max-80" alt="logo">
                </center>
              </div>
              <center>
              <div class="mt-3"></div>
              <h4>Cafe Telkom</h4>
            </center>
            <div class="mt-3"></div>
                <form method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="user" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" name="pass" placeholder="Password">
                    </div>
                    <button class="btn btn-purple form-control-user btn-block"
                    name="proses"  type="submit">Login</button>
                </form>
            </div>
        </div>
        <div class="mt-4 text-white">
                    <td colspan="2"><center><h10>Apakah anda seorang Manajer? Login <a href="loginmanajer.php">disini<h10></a></center></td>
                    <td colspan="2"><center><h10>Apakah anda seorang Kasir? Login <a href="loginkasir.php">disini<h10></a></center></td>
              </div>
    </div>

</div>


</div> <!-- end container fluid -->

    <script src="assets/js/jquery.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 1000);
</script>
</body>
</html>