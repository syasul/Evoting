<?php include "config/config.php"; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome/css/all.min.css">

    <title>Admin</title>
  </head>
  <body>
    <h1>Hello, world!</h1>
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
    <section class="sec1">
      <div class="container">
        <h3 class="text-primary jud">Hasil Voting</h3>
        <div class="row">
          <!-- card -->
          <?php 

              $query = "SELECT * FROM calon ORDER BY id ASC";

              $result = mysqli_query($conn, $query);

              if (!$result) {
                die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
              }

              while ($row = mysqli_fetch_assoc($result)) {
                
                $result_pilih = mysqli_query($conn, "SELECT * FROM pilih WHERE id_calon = '".$row['id']."' ");
                $jumlah = mysqli_num_rows($result_pilih);
              

             ?>
          <div class="col">
            <div class="card" style="width: 350px; margin-top: 5%;">
                <img class="card-img-top" style="width: auto; height: 250px;" src="image/<?php echo $row['foto']; ?>" alt="Card image cap">
                <div class="card-body">
                  <h2 class="card-title"><?php echo $jumlah ?> <span class="org">orang</span></h2>
                </div>
              </div>
          </div>
          <?php 

        }

           ?>
          <!-- end card -->
        </div>
      </div>
    </section>
    <!-- end section-->

    <!-- table -->
    <section class="sec2">
      <div class="container">
        <h3 class="text-dark jud">Data Calon</h3>
        <table class="table">

          <a type="button" class="btn btn-success" style="margin-bottom: 10px; width: 100%; color: #fff;" href="crud/tambah.php"><i class="fas fa-plus" style="margin-right: 10px;"></i>Tambah Calon  </a>
        
                <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="">
                            <label class="form-label" for="customFile">Masukkan foto</label>
                            <input type="file" class="form-control" id="customFile" />
                          </div>
                        <form>
                           <div class="form-group">
                            <label for="message-text" class="col-form-label">Nama</label>
                            <textarea class="form-control" id="message-text"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Visi</label>
                            <textarea class="form-control" id="message-text"></textarea>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send message</button>
                      </div>
                    </div>
                  </div>
                </div>   -->
          <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">foto</th>
              <th scope="col">Nama</th>
              <th scope="col">visi dan misi</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 

              $query = "SELECT * FROM calon ORDER BY id ASC";
              $result = mysqli_query($conn, $query);

              if (!$result) {
                die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
              }
              $no = 1;

              while ($row = mysqli_fetch_assoc($result)) {
                
              

            ?>
            <tr>
              <th><?php echo $no; ?></th>
              <td><img src="image/<?php echo $row['foto']; ?>" style="width: 150px; height: 150px;"></td>
              <td><?php echo $row['nama']; ?></td>
              <td><?php echo $row['visimisi']; ?></td>
              <td> 
              <a href='crud/edit.php?id=<?php echo $row['id']; ?>'><button type='button' class='btn btn-warning'><i class='fas fa-edit'></i></button></a>
              <a href='crud/proses_hapus.php?id=<?php echo $row['id']; ?>'><button type='button' class='btn btn-danger'><i class='fas fa-trash'></i></button></a>
              </td>
              <?php 

                $no++;
            }

               ?>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
    <!-- endtable -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>