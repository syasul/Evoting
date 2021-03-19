<?php include "../config/config.php"; 

	$nama = $_GET['nama'];
	$sqlDelete = "DELETE FROM siswa WHERE nama='$nama'";
	mysqli_query($conn, $sqlDelete);

	header("location: ../adm.php");

?>