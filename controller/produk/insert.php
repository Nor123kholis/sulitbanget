<?php 
include '../koneksi.php';

$nama = htmlspecialchars($_POST['nama-produk']);
$kategori = htmlspecialchars($_POST['kategori-produk']);
$warna = htmlspecialchars($_POST['warna-produk']);
$merk = htmlspecialchars($_POST['merk-produk']);
$jumlah = htmlspecialchars($_POST['jumlah-produk']);
$harga = htmlspecialchars($_POST['harga-produk']);

$query = "INSERT INTO `produk` (`nama_produk`, `warna`, `jumlah`, `harga`, `id_merk`, `id_kategori`) VALUES ('$nama', '$warna', '$jumlah', '$harga', '$merk', '$kategori')";
mysqli_query ($koneksi, $query);


header('location: ../../views/produk/index.php');

?>