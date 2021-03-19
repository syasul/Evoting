<?php 
	include "../config/config.php";
 
	$id = $_GET['id'];
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

			$query = "UPDATE calon SET nama = '$nama',foto = '$nama_gambar_baru',visimisi = '$visimisi' WHERE id = '$id'";
			$result = mysqli_query($conn, $query);


              if (!$result) {
                die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));

              } else {
              	echo "<script>alert('Data Berhasil diupdate!');window.location='../adm1.php';</script>";

              }



		} else {

			echo "<script>alert('Ekstensi gambar hanya bisa jpg, png, jpeg');window.location='edit.php';</script>";

		}


	} else {
			$query = "UPDATE calon SET nama = '$nama',foto = '$nama_gambar_baru',visimisi = '$visimisi'";
			$query .= "WHERE id = '$id'";
			$result = mysqli_query($conn, $query);


              if (!$result) {
                die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));

              } else {
              	echo "<script>alert('Data Berhasil diupdate!');window.location='../adm1.php';</script>";

              }

	}

 ?>