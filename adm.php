<?php include "config/config.php"; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome/css/all.min.css">

    <title>Admin</title>
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
      <div class="container">
        <a class="navbar-brand text-light font-weight-bold" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent ml-auto">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link text-light mr-3 font-weight-bold" href="adm1.php">Data Calon</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link text-light mr-5 font-weight-bold" href="adm.php">Data Siswa</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt lo" style="color:white;"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- end nav -->
    <!-- seciton -->
    
    <!-- table -->
    <section class="sec2">
      <div class="container">
        <h3 class="text-dark jud">Data Siswa</h3>
          <a href="crud/add.php"><button class="btn btn-success" data-toggle="modal" data-target="#form" style="width: 100%; margin-bottom: 10px;" ><i class='fas fa-plus'></i> Tambah</button></a>  
        <table class="table">
           
          <thead class="thead-dark">
            <tr>
              <th scope="col">Nama</th>
              <th scope="col">NIS</th>
              <th scope="col">Action</th>
            </tr>
          </thead>

            <?php 
              $sqlGet = "SELECT * FROM siswa";
              $query = mysqli_query($conn, $sqlGet);

              while ($data = mysqli_fetch_array($query)) {
                echo "

                  <tbody>
                    <tr>
                      <td>$data[nama]</td>
                      <td>$data[nis]</td>
                      <td>
                        <a href='crud/update.php?nama=$data[nama]'><button type='button' class='btn btn-warning'><i class='fas fa-edit'></i></button></a>
                        <a href='crud/delete.php?nama=$data[nama]'><button type='button' class='btn btn-danger'><i class='fas fa-trash'></i></button></a>
                      </td>
                    </tr>
                  </tbody>


                ";
              }
             ?>
             
        </table>
      </div>
    </section>
    <!-- endtable -->
    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>