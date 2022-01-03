<?php
  require_once("config.php");
  include "controllab.inc";
  $id_lab = $_SESSION['id_lab'];
  $id_jenis = $_POST["id_jenis"];

  if(!empty($id_jenis)) {
    $sql = mysqli_query($koneksi,"SELECT * FROM masteralat WHERE id_jenis = $id_jenis AND id_lab=$id_lab");

    echo '<option>Pilih Nama Alat</option>';
    
    while($data=mysqli_fetch_array($sql)) {
      echo '<option value="'.$data['kode_alat'].'-'.$data['nama_alat'].'">'.$data['nama_alat'].'</option>';
    }
  }
?>

