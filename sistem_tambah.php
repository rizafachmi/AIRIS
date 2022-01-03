<?php 

include_once("config.php");
session_start();
$id_lab = $_SESSION['id_lab'];
$id_jenis = $_POST['id_jenis'];
$nama_alat = $_POST['nama_alat'];
$warna = $_POST['warna'];
$ukuran = $_POST['ukuran'];

$namafolder="img/upload/"; //folder tempat menyimpan file
if (!empty($_FILES["gambar"]["tmp_name"]))
{
$jenis_gambar=$_FILES['gambar']['type']; //memeriksa format gambar
if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
{
$lampiran = $namafolder . basename($_FILES['gambar']['name']);
$gambar = basename($_FILES['gambar']['name']);

//mengupload gambar dan update row table database dengan path folder dan nama image
if (move_uploaded_file($_FILES['gambar']['tmp_name'], $lampiran)) {
//nomer
$idmaster = mysqli_fetch_array(mysqli_query($koneksi,"select kode_alat from masteralat where id_jenis=$id_jenis and id_lab=$id_lab order by id_master desc limit 1"));
$idmaster2 = (int)$idmaster['kode_alat'];
$idmaster2++;

$kode_alat = sprintf('%02d', $idmaster2);
echo $kode_alat;
$query_insert = mysqli_query($koneksi,"INSERT INTO masteralat VALUES('', '$id_lab', '$id_jenis', '$kode_alat', '$nama_alat', '$warna', '$ukuran','$gambar')");

echo "<script>alert('Gambar Berhasil dikirim');window.location.href='tambah_barang.php';</script>";

//Jika gagal upload, tampilkan pesan Gagal
} else {
echo "<script>alert('Gambar Gagal dikirim');window.location.href='tambah_barang.php';</script>";
}
} else {
echo "<script>alert('Jenis gambar tidak sesuai');window.location.href='tambah.php';</script>";
}
} else {
echo "<script>alert('Anda belum memilih gambar');window.location.href='tambah_barang.php';</script>";
}
?>