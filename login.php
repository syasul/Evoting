<?php include "config/config.php"; 
    session_start();
    if (isset($_POST['login'])) {
      $nama = $_POST['nama'];
      $nis = $_POST['nis'];
      $query = "SELECT * FROM  siswa WHERE nama='$nama'";
      $hasil = mysqli_query($conn, $query);
      $data = mysqli_fetch_array($hasil);
      if ($nis == $data['nis']) {

        $_SESSION['nama'] = $data['nama'];
        $_SESSION['nis'] = $data['nis'];

        echo "<script>alert('berhasil login');</script>";
        echo "<script>location = 'index.php';</script>";
      }


    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Login</title>
  </head>
  <body>
    <div class="wrapper">

	<form action="" method="post" class="form-signin">
	  <h2 class="form-signin-heading text-center">Login Form</h2>
	  <input type="text" class="form-control" name="nama" placeholder="Email Address" required autofocus="" />
	  <input type="password" class="form-control" name="nis" placeholder="NIS" required />
	  <button class="btn btn-lg btn-primary btn-block" style="margin-top: -5%; color: #fff;" name="login">Login</button>
	</form>

	</div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>