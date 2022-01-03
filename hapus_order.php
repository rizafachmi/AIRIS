<?php 
include_once("config.php");
$id_pesan = $_GET['id_pesan'];

$hapus = mysqli_query($koneksi,"DELETE FROM alat, pemesanan where id_pesan='$id_pesan'");
 
header("location:kajur.php?id_lab=".$data2['id_lab']."");
?>