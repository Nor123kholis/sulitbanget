<?php 
include '../koneksi.php';

$id_pelanggan = $_POST['id_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$query = "UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', jenis_kelamin='$jenis_kelamin' WHERE id_pelanggan='$id_pelanggan'";
mysqli_query($koneksi,$query);

header("Location:../../views/pelanggan/index.php");



 ?>