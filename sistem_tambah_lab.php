<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include_once("config.php");
 
// menangkap data yang dikirim dari form
$id_lab = $_POST['id_lab'];
$id_user = $_GET['id_user'];
$sql3=mysqli_query($koneksi, "select * from user where level='kalab' and id_user=$id_user");
$data3=mysqli_fetch_array($sql3);
$nama_kalab = $data3['nama'];
$nama_lab = $_POST['nama_lab'];
$nama_plp = $_POST['nama_plp'];
$password = md5($_POST['password']);
$total_anggaran = $_POST['total_anggaran'];

$namafolder="img/ttd/"; //folder tempat menyimpan file
if (!empty($_FILES["ttd_kalab"]["tmp_name"]))
{
$jenis_gambar=$_FILES['ttd_kalab']['type']; //memeriksa format gambar
if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
{
$lampiran = $namafolder . basename($_FILES['ttd_kalab']['name']);
$ttd_kalab = basename($_FILES['ttd_kalab']['name']);

//mengupload gambar dan update row table database dengan path folder dan nama image
if (move_uploaded_file($_FILES['ttd_kalab']['tmp_name'], $lampiran)) {

$query_insert = mysqli_query($koneksi,"INSERT INTO laboratorium (id_lab,id_user,nama_lab,nama_kalab,nama_plp,password,total_anggaran,ttd_kalab)
VALUES ('$id_lab', '1','$id_user','$nama_lab', '$nama_kalab', '$nama_plp', '$password', '$total_anggaran','$ttd_kalab')");

echo "<script>alert('Gambar Berhasil dikirim');window.location.href='data_kalab.php?id_user=<?php echo $id_user; ?>';</script>";

//Jika gagal upload, tampilkan pesan Gagal
} else {
echo "<script>alert('Gambar Gagal dikirim');window.location.href='kelas.php';</script>";
}
} else {
echo "<script>alert('Jenis gambar tidak sesuai');window.location.href='kelas.php';</script>";
}
} else {
echo "<script>alert('Anda belum memilih gambar');window.location.href='kelas.php';</script>";
}
?>