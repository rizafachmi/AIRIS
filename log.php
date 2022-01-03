<?php
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'config.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
	$_SESSION['login']="OK";
	$data = mysqli_fetch_assoc($login);
	$id_user = $data['id_user'];
	$level = $data['level'];

	$sql2=mysqli_query($koneksi, "select * from laboratorium inner join user where user.id_user=$id_user and user.id_user=laboratorium.id_user");
  	$data2=mysqli_fetch_array($sql2);

  	$sql3=mysqli_query($koneksi, "select * from laboratorium limit 1");
  	$data3=mysqli_fetch_array($sql3);
 
	// cek jika user login sebagai admin
	if($data['level']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:admin.php");
 
	// cek jika user login sebagai kajur
	}else if($data['level']=="kajur"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = $level;
		$_SESSION['id_user'] = $id_user;
		// alihkan ke halaman dashboard kajur
		header("location:kajur.php?id_lab=".$data3['id_lab']."");
 
	// cek jika user login sebagai kalab
	}else if($data['level']=="kalab"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = $level;
		$_SESSION['id_user'] = $id_user;

		// alihkan ke halaman dashboard kalab
		header("location:kalab.php?id_lab=".$data2['id_lab']."");

	}else if($data['level']=="logistik"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "logistik";
		// alihkan ke halaman dashboard logistik
		header("location:logistik.php");
 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
 
?>