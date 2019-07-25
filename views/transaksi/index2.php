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

	<!---strat conten--->
	<div class="container" style="margin-top: 100px;">
		<h1 class="text-center">Transaksi Produk</h1>
		<hr>
		<a href="add.php" class="btn btn-primary mb-2 text-right">Tambah</a>
		<!-- Tabel -->
		<table class="table table-bordered table-striped table-hover text-uppercase text-center">
			<thead class="thead-dark">
				<tr>
					<th>no</th>
					<th>tanggal transaksi</th>
					<th>total transaksi</th>
					<th>nama pelanggan</th>
					<th>nama produk</th>
					<th>opsi</th>
				</tr>
			</thead>
			<tbody>
				<!-- PHP -->
				<?php 
				include '../../controller/koneksi.php';
				$query = "SELECT id_transaksi,tanggal_transaksi, total_transaksi, pelanggan.nama_pelanggan, produk.nama_produk FROM transaksi 
				INNER JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan 
				INNER JOIN produk ON transaksi.id_produk=produk.id_produk"; // join data antara tabel transaksi => pelanggan => produk
				$result = mysqli_query($koneksi, $query);
				$value = mysqli_fetch_assoc($result);
				$no = 1;
				foreach ($result as $value) { ?>
					<!-- PHP End-->
					<!-- Loop Konten -->
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $value['tanggal_transaksi'] ?></td>
						<td><?= $value['total_transaksi'] ?></td>
						<td><?= $value['nama_pelanggan'] ?></td>
						<td><?= $value['nama_produk'] ?></td>
						<td>
							<a href="edit.php?id_transaksi=<?= $value['id_transaksi'] ?>" class="btn btn-warning">Ubah</a>
							<a href="../../controller/transaksi/delete.php?id_transaksi=<?= $value['id_transaksi'] ?>" class="btn btn-danger">Hapus</a>
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