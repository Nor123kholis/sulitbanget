<!DOCTYPE html>
<html>
<head>
	<title>Home </title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script type="text/javascript" src="assets/js/jquery-2.2.1.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
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
					<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="views/pelanggan/index.php">Pelanggan <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="views/beli/index.php">Transaksi <span class="sr-only">(current)</span></a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item dropdown" style="padding-right: 30px;" >
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Master Data
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="views/produk/index.php">Produk</a>
							<a class="dropdown-item" href="views/kategori/index.php">Kategori Produk</a>
							<a class="dropdown-item" href="views/merk_produk/index.php">Merk Produk</a>
							<div class="dropdown-divider"></div>
						</div>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">


						</li>
						<li class="nav-item" style="padding-right: 15px;">
							<a class="nav-link" href="controller/koneksi.php">Cek koneksi</a>
						</li>
						<a class="btn btn-primary" href="controller/pelanggan/login.php">LOGIN</a>
					</ul>
				</form>
			</div>
		</nav>
		<!--finish navbar-->

		<!-- Konten -->
		<div class="container" style="margin-top: 100px;">
			<h1 class="text-center">Daftar Produk</h1>
			<hr>
			<!-- Tabel -->
			<table class="table table-bordered table-striped table-hover text-center">
				<thead class="thead-dark text-uppercase">
					<tr>
						<th>no</th>
						<th>nama produk</th>
						<th>warna</th>
						<th>Stok</th>
						<th>harga</th>
						<th>nama merk</th>
						<th>nama kategori</th>
						<th>opsi</th>
					</tr>
				</thead>
				<tbody class="text-capitalize">
					<!-- PHP -->
					<?php 
					include 'controller/koneksi.php';
					$query = "SELECT id_produk, nama_produk, warna, jumlah, harga,merk.nama_merk, kategori_produk.nama_kategori, merk.id_merk, kategori_produk.id_kategori FROM produk 
					INNER JOIN merk ON produk.id_merk = merk.id_merk 
					INNER JOIN kategori_produk ON produk.id_kategori = kategori_produk.id_kategori";
					$result = mysqli_query($koneksi, $query);
					foreach ($result as $value) { ?>
						<!-- PHP End-->

						<!-- Loop Konten -->
						<tr>
							<td><?= $value['id_produk'] ?></td>
							<td><?= $value['nama_produk'] ?></td>
							<td><?= $value['warna'] ?></td>
							<td><?= $value['jumlah'] ?></td>
							<td><?= $value['harga'] ?></td>
							<td><?= $value['nama_merk'] ?></td>
							<td><?= $value['nama_kategori'] ?></td>
							<td>
								<a href="views/beli/beli.php?id_produk=<?= $value['id_produk'] ?>" class="btn btn-success">Pesan</a>
							</td>
						</tr>
						<!-- Loop Konten End -->
						<!-- PHP -->
					<?php } ?>
					<!-- PHP End -->
				</tbody>
			</table>
			<!-- Tabel End -->
		</div>
		<!-- Konten End -->
	</body>
	</html>