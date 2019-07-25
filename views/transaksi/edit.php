<?php include '../../controller/koneksi.php'; 
$query1 = "SELECT * FROM pelanggan"; // untuk menampilkan data dari tabel pelanggan
$query2 = "SELECT * FROM produk"; // untuk menampilkan data dari tabel produk
$pelanggan = mysqli_query($koneksi, $query1);
$produk = mysqli_query($koneksi, $query2);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Transaksi</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
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
	<!--  -->
	<div class="container" style="padding-top: 30px";>
		<h1 class="text-center">Ubah Form Transaksi Produk</h1>
		<hr>
		<br>
		<!-- Start Form Insert -->
		<?php 
			include "../../controller/koneksi.php";
			$id_transaksi=$_GET['id_transaksi'];
			$query="SELECT * FROM transaksi where id_transaksi='$id_transaksi'";
			$result=mysqli_query($koneksi, $query);
			$row=mysqli_fetch_array($result);				
	?>
		<form action="../../controller/transaksi/update.php" method="post">
			<div class="form-group col-md-6 mx-auto border p-5 rounded">
				<label class="font-weight-bold">Tanggal Transaksi</label>
				<input type="hidden" name="id_transaksi" value="<?=$row['id_transaksi'];?>">
				<input type="date" name="tanggal_transaksi" value="<?=$row['tanggal_transaksi']; ?>" class="form-control" autocomplete="off" autofocus="on" required><br>
				<label class="font-weight-bold">Total Transaksi</label>
				<input type="text" name="total_transaksi" value="<?=$row['total_transaksi']; ?>" class="form-control" autocomplete="off" autofocus="on" required><br>
				<div class="form-group">
					<label>Id Kategori</label>
					<select class="custom-select" name="id_pelanggan">
						<!-- <option selected>Open this select menu</option> -->
						<?php foreach($pelanggan as $kat) : ?>
							<option require><?= $kat['nama_pelanggan'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label>Id Merk</label>
					<select class="custom-select" name="id_produk">
						<!-- <option selected>Open this select menu</option> -->
						<?php foreach($produk as $mrk) : ?>
						<option require><?= $mrk['nama_produk']?></option>
						<?php endforeach ?>
					</select>
				</div>
				<button type="submit" class="btn btn-success mt-2">Simpan</button>
			</div>
		</form>
	</div>
</body>
</html>