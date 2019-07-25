<?php 
	include '../koneksi.php';

$nama = ($_POST['nama-produk']);
	$kategori = ($_POST['kategori-produk']);
	$warna = ($_POST['warna-produk']);
	$merk = ($_POST['merk-produk']);
	$jumlah = ($_POST['jumlah-produk']);
	$harga = ($_POST['harga-produk']);
	$id = ($_POST['id']);

	$query = "UPDATE `produk` SET `nama_produk` = '$nama', `warna` = '$warna', `jumlah` = '$jumlah', `harga` = '$harga', `id_merk` = '$merk', `id_kategori` = '$kategori' WHERE `produk`.`id_produk` = $id";
	
	mysqli_query($koneksi, $query);

	header('location: ../../views/produk/index.php');

 ?>