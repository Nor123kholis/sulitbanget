<?php
session_start();
if (!isset($_SESSION["login"])) {
  header('Location:../../controller/pelanggan/login.php');
  exit;
};
 include '../../controller/koneksi.php';; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Produk</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../../assets/js/jquery-2.2.1.js"></script>
	<script src="../../assets/js/bootstrap.min.js"></script>
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
				</ul>
			</form>
		</div>
	</nav>
	<!--finish navbar-->
	<!-- Konten -->
	<div class="container" style="margin-top: 100px;">
		<h1 class="text-center">Daftar Produk</h1>
		<hr>
		<a href="add.php" class="btn btn-primary mb-2 text-right">Tambah</a>
		<!-- Tabel -->
		<table class="table table-bordered table-striped table-hover text-center">
			<thead class="thead-dark text-uppercase">
				<tr>
					<th>no</th>
					<th>nama produk</th>
					<th>warna</th>
					<th>jumlah</th>
					<th>harga</th>
					<th>merk</th>
					<th>kategori</th>
					<th>opsi</th>
				</tr>
			</thead>
			<tbody class="text-capitalize">
			<!-- PHP -->
			<?php 
				$no = 1;
				$query = "SELECT id_produk, nama_produk, warna, jumlah, harga,merk.nama_merk, kategori_produk.nama_kategori, merk.id_merk, kategori_produk.id_kategori FROM produk 
					INNER JOIN merk ON produk.id_merk = merk.id_merk 
					INNER JOIN kategori_produk ON produk.id_kategori = kategori_produk.id_kategori";
				$result = mysqli_query($koneksi, $query);
			?>
			<?php if (mysqli_num_rows($result) > 0) { ?>
				<?php foreach ($result as $value) { ?>
				<!-- Loop Konten -->
				<tr>
					<td><?= $no; ?></td>
					<td><?= $value['nama_produk'] ?></td>
					<td><?= $value['warna'] ?></td>
					<td><?= $value['jumlah'] ?></td>
					<td><?= $value['harga'] ?></td>
					<td><?= $value['nama_merk'] ?></td>
					<td><?= $value['nama_kategori'] ?></td>
					<td>
						<a href="edit.php?id_produk=<?= $value['id_produk'] ?>" class="btn btn-warning">Ubah</a>
						<a href="../../controller/produk/delete.php?id_produk=<?= $value['id_produk'] ?>" class="btn btn-danger">Hapus</a>
					</td>
				</tr>
				<!-- Loop Konten End -->
				<?php $no++; } ?>
			<?php }else{ ?>
				<tr>
					<td colspan="8"><h4 class="text-center">Tidak Ada Produk!</h4></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<!-- Tabel End -->
	</div>
	<!-- Konten End -->
</body>
</html>