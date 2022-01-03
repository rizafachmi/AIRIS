<?php 
include_once("config.php");
session_start();
$id_lab = $_SESSION['id_lab'];
$id_jenis = $_POST['id_jenis'];
$kode_nama_alat = explode("-", $_POST['kode_alat']);
$kode_alat = $kode_nama_alat[0];
$nama_alat = $kode_nama_alat[1];
$berat_alat = $_POST['berat_alat'];
$status_alat = "Ada";
$jumlah_pesan = $_POST['jumlah_pesan'];
$tgl_pesan = date('Y-m-d');


$data = mysqli_fetch_array(mysqli_query($koneksi,"select harga_alat from alat where kode_alat=$kode_alat and id_jenis=$id_jenis and id_lab=$id_lab order by created_date desc limit 1"));
$total_kisaran_hargapesan = $data == null? 0 : (int)$data['harga_alat'];
$jml_total_kisaran_hargapesan =  $total_kisaran_hargapesan * (int)$jumlah_pesan;

$pesan = mysqli_query($koneksi,"INSERT INTO pemesanan VALUES('', '$id_lab','$jumlah_pesan','$tgl_pesan','$total_kisaran_hargapesan','$jml_total_kisaran_hargapesan', '0', '0')") or trigger_error("Query Failed! SQL: - Error: ".mysqli_error($koneksi), E_USER_ERROR);

$idpesan = mysqli_fetch_array(mysqli_query($koneksi,"select id_pesan from pemesanan order by id_pesan desc limit 1"));
$idpemesanan = (int)$idpesan['id_pesan'];

$pesan = mysqli_query($koneksi,"SELECT pemesanan.id_pesan from pemesanan inner join simpan where pemesanan.id_pesan=simpan.id_pesan and pemesanan.id_lab=$id_lab");
mysqli_error($koneksi);
$rows = [];
while($row = mysqli_fetch_row($pesan)) {
    $rows[] = $row;
}
$hasil_fetch_id_pesan = $rows;
$id_id_pesan = implode (", ", $hasil_fetch_id_pesan[0]);

// y: itung udah ada berapa alat dengan kode alat ini
$jumlah_alat = mysqli_query($koneksi,"SELECT COUNT(no_alat) AS jumlahAlat FROM alat where id_lab=$id_lab and id_jenis='$id_jenis' and kode_alat='$kode_alat'");
$jml_alat = mysqli_fetch_assoc($jumlah_alat);
$hasil_fetch_x = $jml_alat['jumlahAlat'];

for ($i = 1; $i <= $jumlah_pesan; $i++) {
    $angka_baru = sprintf('%03d', $hasil_fetch_x+$i);
	$format_nomor_alat = "$id_lab."."$id_jenis"."."."$kode_alat"."."."$angka_baru";
	$simpan = mysqli_query($koneksi,"INSERT INTO alat (id_pesan,id_lab, id_jenis, kode_alat, no_alat, nama_alat, berat_alat, harga_alat, status_alat) VALUES('$idpemesanan', '$id_lab', '$id_jenis', '$kode_alat', '$format_nomor_alat','$nama_alat','$berat_alat','0','$status_alat')") or trigger_error("Query Failed! SQL: - Error: ".mysqli_error($koneksi), E_USER_ERROR);
}

 
header("location:order_data.php");
?>