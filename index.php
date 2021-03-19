<?php 

session_start();
include "config/config.php"; 

$result_pilih = mysqli_query($conn, "SELECT * FROM pilih WHERE nis = '".$_SESSION['nis']."' ");
$data_pilih = mysqli_fetch_assoc($result_pilih);

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome/css/all.min.css">
    <link rel="shortcut icon" href="image/lo.ico">
    <title>E-Voting</title>
  </head>
  <body>
    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-light shadow p-3 mb-5 bg-white rounded fixed-top">
      <div class="container">
        <a class="navbar-brand text-primary font-weight-bold" href="#sec2">E-VOTING</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link nav-active active" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-active" href="#sec2">Voting</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['nama'] ?>
              </a>
              <div class="dropdown-menu bg-danger" aria-labelledby="navbarDropdown">
                <a class="dropdown-item bg-danger" href="logout.php">logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- end nav -->
    <!-- section -->
    <section class="sec1" id="sec1">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2 class="display-4 text-primary font-weight-bold mt-5 h2-sec1">Selamat Datang <br> di E-Voting</h2>
            <p class="text-secondary p-sec1">Silahkan gunakan hak pilih suara kalian untuk <br>menentukan ketua dan wakil osis yang baru</p><br>
            <a href="" class="btn btn-primary a-sec1">Voting <i class="fas fa-arrow-right arrow"></i></a>
          </div>
          <div class="col-md-6">
            <img src="image/ban3.jpeg" class="img">
          </div>
        </div>
      </div>
    </section>
    <!-- end -->
    <!-- card -->
    <section class="sec2" id="sec2">
      <div class="container">
        <p class="font-weight-bold">Calon Ketua Osis</p><br>
          <div class="row">
            <!-- card1 -->
            <?php 

              $query = "SELECT * FROM calon ORDER BY id ASC";

              $result = mysqli_query($conn, $query);

              if (!$result) {
                die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
              }

              while ($row = mysqli_fetch_assoc($result)) {
                # code...
              

             ?>
            <div class="col">
              <div class="card" style="width: 350px; margin-top: 5%;">
                <img class="card-img-top" style="width: auto; height: 250px;" src="image/<?php echo $row['foto']; ?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row['nama']; ?></h5>
                  <h5 class="card-title">Visimisi</h5>
                  <h5 class="card-text"><?php echo $row['visimisi']; ?></h5>

                  <?php 

                  if ($data_pilih['nis'] == $_SESSION['nis']) { ?>
                    
                    <a href="pilih.php?calon=<?php echo $row['id'] ?>">

                      <button type="button" class="btn btn-secondary btn-lg" disabled>Pilih</button>

                    </a>

                  <?php }else{ ?>

                    <a href="pilih.php?calon=<?php echo $row['id'] ?>">

                      <button type="button" class="btn btn-warning btn-lg" >Pilih</button>

                    </a>

                  <?php } ?>

                </div>
              </div>
            </div>

            <?php 

              }

             ?>
            <!-- endcard1 -->
            
          </div>
      </div>
    </section>
    <!-- end card -->
    <!-- footer -->
    <footer>
        <p>Copyright &copy; 2021  All Rights Reserved.</p>
    </footer>
    <!-- end footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, theten Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script src="js/scroll.js"></script>
    
  </body>
</html>