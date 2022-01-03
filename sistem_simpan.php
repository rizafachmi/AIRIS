<?php 
include_once("config.php");

$id_pesan = $_GET['id_pesan'];
$tgl_simpan = date('Y-m-d');

$sql2=mysqli_query($koneksi, "select * from pemesanan where id_pesan=$id_pesan");
$data2=mysqli_fetch_array($sql2);
$id_lab = $data2['id_lab'];

// simpan alat dan update harga dan anggaran

$simpan = mysqli_query($koneksi,"INSERT INTO simpan VALUES('', '$id_lab', '$id_pesan', '$tgl_simpan')") or trigger_error("Query Failed! SQL: - Error: ".mysqli_error($koneksi), E_USER_ERROR);

$harga = mysqli_query($koneksi,"select * from alat where id_pesan='$id_pesan'") or trigger_error("Query Failed! SQL: - Error: ".mysqli_error($koneksi), E_USER_ERROR);

$harga2=mysqli_fetch_array($harga);

$jumlah = mysqli_query($koneksi,"select * from pemesanan where id_pesan='$id_pesan'") or trigger_error("Query Failed! SQL: - Error: ".mysqli_error($koneksi), E_USER_ERROR);

$jumlah2=mysqli_fetch_array($jumlah);

$hargatotal = $harga2['harga_alat'] * $jumlah2['jumlah_pesan'];

$anggaran = mysqli_query($koneksi,"SELECT * from laboratorium where id_lab='$id_lab'") or trigger_error("Query Failed! SQL: - Error: ".mysqli_error($koneksi), E_USER_ERROR);
$anggaran2=mysqli_fetch_array($anggaran);

$sisa = $anggaran2['total_anggaran'] - $hargatotal;

$hasil = mysqli_query($koneksi,"UPDATE laboratorium SET total_anggaran='$sisa' where id_lab='$id_lab' ") or trigger_error("Query Failed! SQL: - Error: ".mysqli_error($koneksi), E_USER_ERROR);
 
header("location:laboratorium.php");
?>
