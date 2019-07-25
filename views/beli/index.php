<!DOCTYPE html>
<html>
<head>
	<title>Transaksi</title>
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

	<!---strat conten--->
	<div class="container" style="margin-top: 100px;">
		<h1 class="text-center">Hasil Transaksi</h1>
		<hr>
		<a href="../../index.php" class="btn btn-primary mb-2 text-right">Belanja Lagi</a>
		<!-- Tabel -->
		<table class="table table-bordered table-hover text-uppercase text-center">
			<thead class="thead-dark">
				<tr>
					<th>no</th>
					<th>Nama Produk</th>
					<th>Nama Kategori</th>
					<th>Warna</th>
					<th>Nama Merk</th>
					<th>Total Harga</th>
					<th>Pembeli</th>
					<th>Status</th>
					<th>Option</th>
				</tr>
			</thead>
			<tbody>
				<!-- PHP -->
				<?php 
				include '../../controller/koneksi.php';
				$query = "SELECT id_beli, nama_produk, warna, total_harga, pembeli, merk.nama_merk, kategori_produk.nama_kategori, merk.id_merk, kategori_produk.id_kategori FROM beli 
					INNER JOIN merk ON beli.id_merk = merk.id_merk 
					INNER JOIN kategori_produk ON beli.id_kategori = kategori_produk.id_kategori"; // join data antara tabel transaksi => pelanggan => produk
				$result = mysqli_query($koneksi, $query);
				$value = mysqli_fetch_assoc($result);
				$no = 1;
				foreach ($result as $value) { ?>
					<!-- PHP End-->
					<!-- Loop Konten -->
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $value['nama_produk'] ?></td>
						<td><?= $value['nama_kategori'] ?></td>
						<td><?= $value['warna'] ?></td>
						<td><?= $value['nama_merk'] ?></td>
						<td><?= $value['total_harga'] ?></td>
						<td><?= $value['pembeli'] ?></td>
						<td><div class="badge badge-success p-2">Dipesan</div></td>
						<td>
							<a href="editpsn.php?id_beli=<?= $value['id_beli'] ?>" class="btn btn-warning btn-sm">Ubah</a>
							<a href="delete.php?id_beli=<?= $value['id_beli'] ?>" class="btn btn-danger btn-sm">Hapus</a>
						</td>
					</tr>
					<!-- Loop Konten End -->
					<!-- PHP -->
				<?php } ?>
				<!-- PHP End -->
			</tbody>
		</table>
		<!-- Tabel End -->
		<!-- finish conten -->
	</body>
	</html>