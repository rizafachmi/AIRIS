<?php 
include_once("config.php");
$nim = $_POST['nim'];
$nama_mhs = $_POST['nama_mhs'];
$no_koin = $_POST['no_koin'];
$kelas = $_POST['kelas'];
$status = $_POST['status'];

$tambah = mysqli_query($koneksi,"INSERT INTO mahasiswa VALUES('$nim','$nama_mhs','$no_koin','$kelas','$status')");
 
header("location:kelas.php");
?>