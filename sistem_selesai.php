<?php 
include_once("config.php");

$id_pesan = $_POST['id_pesan'];
$nama_penerima = $_POST['nama_penerima'];
$tgl_terima = date('Y-m-d');
$tgl_pelaporan = date('Y-m-d');
$harga_alat = $_POST['harga_alat'];


$simpan = mysqli_query($koneksi,"INSERT INTO terima VALUES('', '$id_pesan', '$nama_penerima', '$tgl_terima', '$tgl_pelaporan')") or trigger_error("Query Failed! SQL: - Error: ".mysqli_error($koneksi), E_USER_ERROR);
$harga = mysqli_query($koneksi,"UPDATE alat SET harga_alat='$harga_alat' WHERE id_pesan='$id_pesan'") or trigger_error("Query Failed! SQL: - Error: ".mysqli_error($koneksi), E_USER_ERROR);
 
header("location:logistik_sebelumnya.php");
?>