<?php 
	include '../koneksi.php';

	$id_transaksi = $_GET['id_transaksi'];

	$query = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'");

	header('location: ../../views/transaksi/index.php');

 ?>