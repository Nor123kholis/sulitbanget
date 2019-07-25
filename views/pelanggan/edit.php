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
  <title>Pelanggan</title>
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
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <ul class="navbar-nav mr-auto">
         <li class="nav-item dropdown" style="padding-right: 30px;" >
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Master Data
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Produk</a>
            <a class="dropdown-item" href="#">Kategori Produk</a>
            <a class="dropdown-item" href="views/merk_produk/index.php">Merk Produk</a>
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
 <h1><center>Ubah Data Pelanggan</center></h1>
 <hr>
 <br>
 <!-- strat form insert -->
 <?php 

include '../../controller/koneksi.php';
$id_pelanggan = $_GET['id_pelanggan'];

$query = "SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'";
$result = mysqli_query($koneksi,$query);
$row = mysqli_fetch_assoc($result);
  ?>
 <form action="../../controller/pelanggan/update.php" method="post">
  <input type="hidden" name="id_pelanggan" value="<?= $row['id_pelanggan'] ?>">
  <div class="form-group">
    <label for="nama_pelanggan">Nama Pelanggan</label>
    <input type="text" name="nama_pelanggan" class="form-control" placeholder="masukkan Nama"  value=" <?= $row['nama_pelanggan'] ?>">
  </div>
  <div class="form-group">
    <label for="alamat">Alamat</label>
    <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" value="<?= $row['alamat'] ?>">
  </div>
  <div class="form-group">
    <label for="jenis_kelamin">Jenis Kelamin</label>
    <select class="custom-select" name="jenis_kelamin">
      <option selected>-- Pilih Jenis Kelamin --</option>
      <option value="L" value="L" <?= ($row['jenis_kelamin'] == 'L') ?  "selected" : "" ;  ?>>Laki - Laki</option>
      <option value="P"  <?= ($row['jenis_kelamin']== 'P') ?  "selected" : "" ;  ?>>Perempuan</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary w-100">Simpan</button>
</form>
<!-- finish form insert -->
<!-- finish conten -->
</body>
</html>