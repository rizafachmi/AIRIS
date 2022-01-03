<?php 
include_once("config.php");

$id_lab = $_POST['id_lab'];
$no_alat = $_POST['no_alat'];
$nama_alat = $_POST['nama_alat'];
$nim = $_POST['nim'];
$tgl_pinjam = date('Y-m-d');
$tgl_seharusnya = date('Y-m-d', strtotime($tgl_pinjam. ' + 5 days'));
date_default_timezone_set('Asia/Jakarta');
$jam_pinjam = date('H:i:s');
$nama_keperluan = $_POST['nama_keperluan'];


$pinjam = mysqli_query($koneksi,"INSERT INTO peminjaman VALUES('', '$id_lab', '$no_alat', '$nim', '$nama_keperluan', '$tgl_pinjam', '$jam_pinjam', '$tgl_seharusnya', '', '', '0')") or trigger_error("Query Failed! SQL: - Error: ".mysqli_error($koneksi), E_USER_ERROR);
$updatestatusalat = mysqli_query($koneksi,"UPDATE alat SET status_alat='Dipinjam' where no_alat='$no_alat'") or trigger_error("Query Failed! SQL: - Error: ".mysqli_error($koneksi), E_USER_ERROR);

header("location:pinjam_laboratorium.php?id_lab=<?php echo $id_lab; ?>&nama_alat=<?php echo $nama_alat; ?>");
?>