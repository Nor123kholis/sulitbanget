<?php 
	include '../koneksi.php';

	$tanggal_transaksi = $_POST['tanggal_transaksi'];
	$total_transaksi = $_POST['total_transaksi'];
	$id_pelanggan = $_POST['id_pelanggan'];
	$id_produk = $_POST['id_produk'];
	$query = "INSERT INTO `transaksi` (`tanggal_transaksi`, `total_transaksi`, `id_pelanggan`, `id_produk`) VALUES ('2019-07-24', '12', '1', '1')";

	$result= mysqli_query($koneksi, $query);
	if($result)
		header('location: ../../views/transaksi/index.php');
	else
		echo "error";
