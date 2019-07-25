<?php 
include '../koneksi.php';

$nama_merk = $_POST['nama_merk'];

$query = "INSERT INTO merk SET nama_merk='$nama_merk'";
mysqli_query($koneksi,$query);
header("Location:../../views/merk_produk/index.php");
 ?>