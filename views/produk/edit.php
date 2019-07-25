<?php
session_start();
if (!isset($_SESSION["login"])) {
  header('Location:../../controller/pelanggan/login.php');
  exit;
};

 include '../../controller/koneksi.php';
$id =($_GET['id_produk']);
$categoriQuery = "SELECT * FROM kategori_produk;";
	$merkQuery = "SELECT * FROM merk;";
	$query = "SELECT nama_produk, warna, jumlah, harga, p.id_merk, nama_merk, p.id_kategori, nama_kategori FROM produk p INNER JOIN merk m ON p.id_merk=m.id_merk INNER JOIN kategori_produk kp ON p.id_kategori=kp.id_kategori WHERE p.id_produk=$id";
	$result = mysqli_fetch_array(mysqli_query($koneksi, $query));
	$categories = mysqli_query($koneksi, $categoriQuery);
	$merk = mysqli_query($koneksi, $merkQuery);
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
	<div class="container pt-5">
		<h1> <center>Ubah Produk</center></h1>
		<hr /> <br />
		<!-- Form Add Merk Produk -->
		<div class="card">
			<div class="card-body">
				<form action="../../controller/produk/update.php" method="POST">
					<input type="hidden" name="id" value="<?= $id; ?>">
				  <div class="form-group">
				    <label for="nama-produk">Nama Produk</label>
				    <input type="text" class="form-control form-control-sm" name="nama-produk" placeholder="Masukkan Nama Produk" value="<?= $result['nama_produk'] ?>">
				  </div>
				  <div class="form-group">
				    <label for="nama-kategori">Nama Kategori</label>
					  <select class="custom-select custom-select-sm" name="kategori-produk">
					    <option>-- Pilih Kategori --</option>
					  	<?php foreach ($categories as $categori) { ?>
						    <option value="<?= $categori['id_kategori']; ?>" <?= ($result['id_kategori'] === $categori['id_kategori']) ? 'selected' : ''; ?>> <?= $categori['nama_kategori']; ?> </option>
					  	<?php } ?>
					  </select>
				  </div>
				  <div class="form-group">
				    <label for="warna-produk">Warna Produk</label>
				    <input type="text" class="form-control form-control-sm" name="warna-produk" placeholder="Masukkan Warna Produk" value="<?= $result['warna'] ?>">
				  </div>
				  <div class="form-group">
				    <label for="nama-merk">Nama Merk</label>				  	
					  <select class="custom-select custom-select-sm" name="merk-produk">
					    <option>-- Pilih Merk --</option>
					  	<?php foreach ($merk as $v) { ?>
						    <option value="<?= $v['id_merk']; ?>" <?= ($result['id_merk'] === $v['id_merk']) ? 'selected' : ''; ?>> <?= $v['nama_merk']; ?> </option>
					  	<?php } ?>
					  </select>
				  </div>
				  <div class="form-group">
				    <label for="jumlah-produk">Jumlah Produk</label>
				    <input type="text" class="form-control form-control-sm" name="jumlah-produk" placeholder="Masukkan Jumlah Produk" value="<?= $result['jumlah'] ?>">
				  </div>
				  <div class="form-group">
				    <label for="harga-produk">Harga Produk</label>
				    <input type="text" class="form-control form-control-sm" name="harga-produk" placeholder="Masukkan Harga Produk" value="<?= $result['harga'] ?>">
				  </div>
				  <button type="submit" class="w-100 btn btn-sm btn-success">Simpan</button>
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