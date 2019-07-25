<?php 
include '../koneksi.php';
$id_pelanggan = $_GET['id_pelanggan'];

$query = "DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan'";
mysqli_query($koneksi,$query);
header('Location:../../views/pelanggan/index.php');

 ?>