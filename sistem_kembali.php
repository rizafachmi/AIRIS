<?php 
include_once("config.php");

$id_pinjam = $_GET['id_pinjam'];
$sql=mysqli_query($koneksi, "SELECT * FROM alat INNER join peminjaman WHERE id_pinjam='$id_pinjam'");
$data=mysqli_fetch_array($sql);
$no_alat = $data['no_alat'];
$tgl_selesai = date('Y-m-d');
date_default_timezone_set('Asia/Jakarta');
$jam_selesai = date('H:i:s');


$updatepinjam = mysqli_query($koneksi,"UPDATE peminjaman SET tgl_selesai='$tgl_selesai', jam_selesai='$jam_selesai', kembali='1' where id_pinjam='$id_pinjam'") or trigger_error("Query Failed! SQL: - Error: ".mysqli_error($koneksi), E_USER_ERROR);
$updatestatusalat = mysqli_query($koneksi,"UPDATE alat SET status_alat='Ada' where no_alat='$no_alat'") or trigger_error("Query Failed! SQL: - Error: ".mysqli_error($koneksi), E_USER_ERROR);

header("location:pinjam_laboratorium_lab.php");
?>