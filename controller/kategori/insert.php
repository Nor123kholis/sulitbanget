<?php 
include '../koneksi.php';

$nama_kategori = $_POST['nama_kategori'];

$query = "INSERT INTO kategori_produk SET nama_kategori='$nama_kategori'";
mysqli_query($koneksi,$query);
header("Location:../../views/kategori/index.php");
 ?>