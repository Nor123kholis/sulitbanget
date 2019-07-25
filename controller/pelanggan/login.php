<?php
session_start();

include '../koneksi.php';
if (isset($_POST['login']) ) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = mysqli_query($koneksi, "SELECT username,password FROM user WHERE username = '$username'");
    // Cek username
  if (mysqli_num_rows($result) === 1 ) {
  // cek password 
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password']) ) {
      $_SESSION["login"] = true;
      header("Location:../../index.php");
      exit;   
    }

  }
  $error = true;
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Produk</title>
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
</head>
<body>
 <!--start navbar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="../../index.php">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown" style="padding-right: 30px;" >
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Master Data
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../produk/index.php">Produk</a>
              <a class="dropdown-item" href="../kategori/index.php">Kategori Produk</a>
              <a class="dropdown-item" href="../merk_produk/index.php">Merk Produk</a>
              <div class="dropdown-divider"></div>
            </div>
          </li>
          <li class="nav-item" style="padding-right: 15px;">
            <a class="nav-link" href="../../controller/koneksi.php">Cek koneksi</a>
          </li>
        </ul>
      </form>
    </div>
  </nav>
  <!--finish navbar-->
  <div class="container pt-5">
    <h1> <center>Login Sekarang</center></h1>
      <?php if (isset($error) ) : ?>
    <p ><center>USER NAME / PASSWORD SALAH</center></p>
  <?php endif; ?>
    <!-- Form Add Merk Produk -->
    <div class="card w-75 mx-auto">
      <div class="card-body">
        <form action="" method="POST">
          <center><label for="username"><b>Masukan Username</b></label></center>
          <input type="text" name="username" placeholder="masukan username" class="form-control col-md-6 offset-3" id="username">
          <center><label for="password"><b>Masukan Password</b></label></center>
          <input type="password" name="password" placeholder="masukan Password" class="form-control col-md-6 offset-3" id="password"><br><br>
          <p>Belum punya akun registrasi <a href="register.php">DISINI</a></p>
          <button type="submit" class="w-100 btn btn-sm btn-success" name="login">LOGIN</button>
        </form>
      </div>
    </div>
    <!-- End Form Add Merk Produk -->
  </div>
  <script src="../../assets/js/jquery.min.js"></script>
  <script src="../../assets/js/popper.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
</body>
</html>