<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include_once("config.php");
 
// menangkap data yang dikirim dari form

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = "kalab";


if($nama == ""){
	header("location:tambah_kalab.php?nama=kosong");
}elseif($username == ""){
	header("location:tambah_kalab.php?username=kosong");
}elseif(empty($password)){
	header("location:tambah_kalab.php?password=kosong");
}else{
$tambahkalab = mysqli_query($koneksi,"INSERT INTO user VALUES('','$nama','$username','$password','$level')");
 
header("location:kelas.php");
}
?>