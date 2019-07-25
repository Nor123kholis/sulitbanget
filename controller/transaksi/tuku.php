<?php 
include '../koneksi.php';
$nama_produk = $_POST['nama-produk'];
$kategori_produk = $_POST['kategori-produk'];
$warna_produk = $_POST['warna-produk'];
$merk_produk = $_POST['merk-produk'];
$total_harga = $_POST['jumlah-produk'] * $_POST['harga-produk'];
$pembeli = $_POST['pembeli'];

$query="INSERT INTO beli SET nama_produk='$nama_produk', id_kategori='$kategori_produk', warna='$warna_produk', id_merk= '$merk_produk', total_harga='$total_harga', pembeli='$pembeli'";
// $query ="INSERT INTO beli (nama_produk, id_kategori, warna, id_merk, jumlah_produk, total_harga, pembeli) VALUES ('', '$nama_produk', '$kategori_produk', '$warna_produk', '$merk_produk', '$total_hargal', '$pembeli');"
mysqli_query($koneksi,$query);
header("Location:../../views/beli/index.php");
 ?>