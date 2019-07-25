<?php 
include '../koneksi.php';
if ( isset($_POST['register'])) {
  $username = strtolower(stripslashes($_POST['username']));
  $password = mysqli_real_escape_string($koneksi,$_POST['password']);
  $password2 = mysqli_real_escape_string($koneksi,$_POST['password2']);

  $result = mysqli_query($koneksi,"SELECT username FROM user WHERE username='$username'");
  if (mysqli_fetch_assoc($result)) {
    echo "<script> alert('username sudah ada !!!')</script>";
    header("Location:register.php");
    return false;
  }

  if ($password == $password2) {
  //create user
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query= "INSERT INTO user (id_user,username, password) VALUES ('','$username','$password')";
    mysqli_query($koneksi,$query);
    echo "<script> alert('registrasi berhasil!!!')</script>";
    header("Location:login.php");
    return false;
  }else{
  //failed
    echo "<script> alert('Konfirmasi password salah!!!')</script>";
  }
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
              <a class="dropdown-item" href="../../views/produk/index.php">Produk</a>
              <a class="dropdown-item" href="../../views/kategori/index.php">Kategori Produk</a>
              <a class="dropdown-item" href="../../views/merk_produk/index.php">Merk Produk</a>
              <div class="dropdown-divider"></div>
            </div>
          </li>
          <li class="nav-item" style="padding-right: 15px;">
            <a class="nav-link" href="../koneksi.php">Cek koneksi</a>

          </li>
        </ul>
      </form>
    </div>
  </nav>
  <!--finish navbar-->
  <div class="container pt-5">
    <h1> <center>Registrasi Sekarang</center></h1>
    <!-- Form Add Merk Produk -->
    <div class="card w-75 mx-auto">
      <div class="card-body">
        <form action="" method="post">
          <center><label for="username"><b>Masukan Username</b></label></center>
          <input type="text" name="username" placeholder="masukan username" class="form-control col-md-6 offset-3" id="username">
          <center><label for="password"><b>Masukan Password</b></label></center>
          <input type="password" name="password" placeholder="masukan Password" class="form-control col-md-6 offset-3" id="password">
          <center><label for="password2"><b>Konfirmasi Password</b></label></center>
          <input type="password" name="password2" placeholder="Konfirmasi Password" class="form-control col-md-6 offset-3" id="password2"><br><br>
          <p>Sudah punya akun Login <a href="login.php">DISINI</a></p>
          <button type="submit" class="w-100 btn btn-sm btn-success" name="register">REGISTRASI</button>
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
