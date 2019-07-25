<?php 
include '../../controller/koneksi.php';
$id_beli = $_GET['id_beli'];
echo $id_beli;

$query = "DELETE FROM beli WHERE id_beli='$id_beli'";
mysqli_query($koneksi,$query);
header('Location:../../views/beli/index.php');

 ?>