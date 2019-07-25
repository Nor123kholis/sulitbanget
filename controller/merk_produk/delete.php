<?php 
include '../koneksi.php';
$id_merk = $_GET['id_merk'];

$query = "DELETE FROM merk WHERE id_merk='$id_merk'";
mysqli_query($koneksi,$query);
header('Location:../../views/merk_produk/index.php');

 ?>