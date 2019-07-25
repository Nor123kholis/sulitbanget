<?php 
include '../koneksi.php';

$nama_pelanggan = $_POST['nama_pelanggan'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];




$query = "INSERT INTO pelanggan SET nama_pelanggan='$nama_pelanggan', alamat='$alamat', jenis_kelamin='$jenis_kelamin'";
mysqli_query($koneksi,$query);
header("Location:../../views/pelanggan/index.php");
 ?>