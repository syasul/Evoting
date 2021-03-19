<?php include "../config/config.php";

$id = $_GET['id'];

$query = "DELETE FROM calon where id = '$id'";

$result = mysqli_query($conn, $query);

if (!$result) {
                die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));

              } else {
              	echo "
              	<script>location='../adm1.php';</script>";

              }

 ?>