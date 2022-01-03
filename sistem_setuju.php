<?php 
include_once("config.php");
$id_pesan = $_GET['id_pesan'];

$setuju = mysqli_query($koneksi,"UPDATE pemesanan SET disetujui='1' WHERE id_pesan='$id_pesan'");

$sql2=mysqli_query($koneksi, "select * from pemesanan where id_pesan=$id_pesan");
$data2=mysqli_fetch_array($sql2);
 
header("location:kalab.php?id_lab=".$data2['id_lab']."");
?>