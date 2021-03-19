<?php 
	include "../config/config.php";

	$foto = $_FILES['foto']['name'];
	$nama = $_POST['nama'];
	$visimisi = $_POST['visimisi'];

	if ($foto != "") {
		$ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
		$x = explode('.', $foto);
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['foto']['tmp_name'];
		$angka_acak = rand(1, 999);
		$nama_gambar_baru = $angka_acak.'-'.$foto;

		if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
			move_uploaded_file($file_tmp, '../image/'.$nama_gambar_baru);

			$query = "INSERT INTO calon (foto, nama, visimisi) VALUES ('$nama_gambar_baru', '$nama', '$visimisi')";
			$result = mysqli_query($conn, $query);


              if (!$result) {
                die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));

              } else {
              	echo "<script>alert('Data Berhasil ditambahkan!');window.location='../adm1.php';</script>";

              }



		} else {

			echo "<script>alert('Ekstensi gambar hanya bisa jpg, png, jpeg');window.location='tambah.php';</script>";

		}


	} else {
		$query = "INSERT INTO calon (foto, nama, visimisi) VALUES ('$nama_gambar_baru', '$nama', '$visimisi')";
			$result = mysqli_query($conn, $query);


              if (!$result) {
                die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));

              } else {
              	echo "<script>alert('Data Berhasil ditambahkan!');window.location='../adm1.php';</script>";

              }


		echo "<script>alert('Silahkan Upload Gambar dulu !');window.location='tambah.php';</script>";

	}

 ?>