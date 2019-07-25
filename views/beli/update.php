<?php 
include '../../controller/koneksi.php';
$id_beli = $_POST['id'];
$nama_produk = $_POST['nama-produk'];
$kategori_produk = $_POST['kategori-produk'];
$warna_produk = $_POST['warna-produk'];
$merk_produk = $_POST['merk-produk'];
$total_harga = $_POST['jumlah-produk'] * $_POST['harga-produk'];
$pembeli = $_POST['pembeli'];

$query="UPDATE beli SET nama_produk='$nama_produk', id_kategori='$kategori_produk', warna='$warna_produk', id_merk= '$merk_produk', pembeli='$pembeli' WHERE id_beli ='$id_beli'";
mysqli_query($koneksi,$query);
header("Location:../../views/beli/index.php");
 ?>