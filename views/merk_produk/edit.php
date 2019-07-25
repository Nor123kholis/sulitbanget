<?php 
session_start();
if (!isset($_SESSION["login"])) {
  header('Location:../../controller/pelanggan/login.php');
  exit;
};

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Merk</title>
  <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">
  <script type="text/javascript" src="../../assets/js/jquery-2.2.1.js"></script>
  <script type="text/javascript" src="../../assets/js/bootstrap.js"></script>
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
            <a class="dropdown-item" href="index.php">Merk Produk</a>
          </div>
        </li>
        <li class="nav-item" style="padding-right: 15px;">
          <a class="nav-link" href="../../controller/koneksi.php">Cek koneksi</a>
        </li>
        <a class="btn btn-primary" href="../../controller/pelanggan/logout.php">Logout</a>
      </ul>
    </form>
  </div>
</nav>
<!--finish navbar-->

<!---strat conten--->
<div class="container" style="padding-top: 30px; ">
 <h1><center>Ubah Merk Produk</center></h1>
 <hr>
 <br>
 <!-- strat form insert -->
 <?php 

include '../../controller/koneksi.php';
$id_merk = $_GET['id_merk'];

$query = "SELECT * FROM merk WHERE id_merk='$id_merk'";
$result = mysqli_query($koneksi,$query);
$row = mysqli_fetch_assoc($result);
  ?>
 <form action="../../controller/merk_produk/update.php" method="post">
  <div class="form-group row">
    <label class="col-sm-2">Nama Merk </label>
    <input type="hidden" name="id_merk" value="<?= $row['id_merk'] ?>">
    <input type="text" name="nama_merk" class="form-control col-sm-10" value=" <?= $row['nama_merk'] ?>">
  </div>
  <button type="sumbit" name="submit" class="btn btn-success">SIMPAN</button>
</form>
<!-- finish form insert -->
<!-- finish conten -->
</body>
</html>