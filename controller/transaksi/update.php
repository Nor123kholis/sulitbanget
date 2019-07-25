<?php 
	include '../koneksi.php';

	$id_transaksi = $_POST['id_transaksi'];
	$tanggal_transaksi = $_POST['tanggal_transaksi'];
	$total_transaksi = $_POST['total_transaksi'];
	$id_pelanggan = $_POST['id_pelanggan'];
	$id_produk = $_POST['id_produk'];

	$query = mysqli_query($koneksi, "UPDATE transaksi SET tanggal_transaksi = '$tanggal_transaksi', total_transaksi='$total_transaksi', 
	id_pelanggan='$id_pelanggan', id_produk='$id_produk' WHERE id_transaksi = '$id_transaksi'");

	header('location: ../../views/transaksi/index.php');

 ?>