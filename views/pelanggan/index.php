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
	<div class="container" style="padding-top: 30px; ">
		<h1><center>Daftar Pelanggan</center></h1>
		<hr>
		<br>
		<a class="btn btn-primary" href="add.php">Tambah Data</a>
		<br><br>
	</div>
	<!-- start tabel -->
	<table class="table table-striped">
		<tr>
			<th>NO</th>
			<th>NAMA</th>
			<th>Alamat</th>
			<th>Jenis Kelamin</th>
			<th>AKSI</th>
		</tr>
		<?php 
		include '../../controller/koneksi.php';
		$query ="SELECT * FROM pelanggan";
		$result = mysqli_query($koneksi,$query);
		$row = mysqli_fetch_assoc($result);
		$no=1;
		foreach ($result as $row ) { ?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $row['nama_pelanggan']; ?></td>
				<td><?= $row['alamat']; ?></td>
				<td><?= $row['jenis_kelamin']; ?></td>
				<td>
					<a  href="edit.php?id_pelanggan=<?= $row['id_pelanggan']  ?>" class="btn btn-warning">Ubah</a>
					<a  href="../../controller/pelanggan/delete.php?id_pelanggan=<?= $row['id_pelanggan']  ?>" class="btn btn-danger">DELETE</a>

				</td>
			</tr>
		<?php } ?>

	</table>
	<!-- finish table -->
	<!-- finish conten -->
</body>
</html>