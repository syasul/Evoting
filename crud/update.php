<?php include "../config/config.php"; 

  $nama = $_GET['nama'];
  $sqlGet = "SELECT * FROM  siswa WHERE nama='$nama'";
  $queryGet = mysqli_query($conn, $sqlGet);
  $data = mysqli_fetch_array($queryGet);

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/fontawesome/css/all.min.css">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="mx-auto w-50 border p-3" style="margin-top: 130px;">
      <a href="../adm.php">kembali ke home  </a>
      <form method="post" action="update.php">
        <label for="nama">Nama</label>
        <input type="text" name="nama" class="form-control" id="nama" readonly value="<?php echo $data['nama']?>">

        <label for="nis">NIS</label>
        <input type="text" name="nis" class="form-control" id="nis" required value="<?php echo $data['nis']?> ">

        <input type="submit" name="tambah" value="Update Data" class="btn btn-success mt-3">
      </form>

    </div>

    <?php 
      if (isset($_POST['tambah'])) {
        $nama = $_POST['nama'];
        $nis = $_POST['nis'];

        $sqlUpdate = "UPDATE siswa 
                      SET nis='$nis'
                      WHERE nama='$nama'";

        $queryUpdate = mysqli_query($conn, $sqlUpdate);

        header("location: ../adm.php");

        }
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>