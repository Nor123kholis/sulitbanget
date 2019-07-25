<?php 
include '../koneksi.php';
$id_kategori = $_GET['id_kategori'];

$query = "DELETE FROM kategori_produk WHERE id_kategori='$id_kategori'";
mysqli_query($koneksi,$query);
header('Location:../../views/kategori/index.php');

 ?>