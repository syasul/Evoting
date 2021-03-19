<?php include "../config/config.php";


if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "SELECT * FROM calon where id ='$id'";
	$result = mysqli_query($conn, $query);

	if (!$result) {
		die("Query Erorr :".mysqli_errno($conn));
	}
	$data = mysqli_fetch_assoc($result);

	if (!count($data)) {
		echo "<script>alert('data tidak ditemukan pada tabel');window.location='../adm1.php';</script>";

	}


} else {

	echo "<script>alert('Masukkan ID yang ingi di update');window.location='../adm1.php';</script>";

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

    <title>Hello, world!</title>
    <style type="text/css">
      body{
        margin-top: 7%;
      }
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: #1F97F6;
      }
    button {
          background-color: #1F97F6;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: salmon;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    </style>
  </head>
  <body>
    
     <center>
        <h1>Edit data <?php echo $data['nama']; ?></h1>
      <center>
      <form method="POST" action="proses_update.php?id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data" >
      <section class="base">
      	<div>
          <label>Foto Calon</label>
          <img src="../image/<?php echo $data['foto']; ?>" style="width: 120px; float: left; margin-bottom: 5px;">
          <input type="file" name="foto" required=""/>
        </div>
        <div>
          <label>Nama</label>
          <input type="text" name="nama" autofocus="" required="" value="<?php echo $data['nama']; ?>" />
        </div>
        <div>
          <label>visi & misi</label>
         <input type="text" name="visimisi" value="<?php echo $data['visimisi']; ?>"/>
        </div>
        <div>
         <button type="submit">Update</button>
        </div>
        </section>
      </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>