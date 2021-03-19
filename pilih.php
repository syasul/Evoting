<?php 

session_start();
include "config/config.php"; 


$nama_siswa = $_SESSION['nama'];
$nis = $_SESSION['nis'];
$id_calon = $_GET['calon'];

mysqli_query($conn, "INSERT INTO pilih VALUES('$nama_siswa', '$nis', '$id_calon')");

 echo "<script>
            alert('Terima kasih telah melakukan voting');
            document.location.href = 'index.php';
          </script>";

 ?>