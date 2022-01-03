<?php
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'config.php';
 
// menangkap data yang dikirim dari form login
$nama_lab = $_POST['nama_lab'];
$password = md5($_POST['password']);
 
 
// menyeleksi data user dengan nama_lab dan password yang sesuai
$login = mysqli_query($koneksi,"select * from laboratorium where nama_lab='$nama_lab' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah nama_lab dan password di temukan pada database
if($cek > 0){
 	$_SESSION['login']="OK";
	$data = mysqli_fetch_assoc($login);
	$id_lab = $data['id_lab'];
	$nama_lab = $data['nama_lab'];
 
	// cek jika user login sebagai admin
	if($data['id_lab']==$id_lab){
 
		// buat session login dan username
		$_SESSION['nama_lab'] = $nama_lab;
		$_SESSION['id_lab'] = $id_lab;
		// alihkan ke halaman dashboard admin
		header("location:laboratorium.php");
  
	}else{
 
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
 
?>