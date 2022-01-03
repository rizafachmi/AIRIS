<?php
include "control.inc";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Pemesanan Barang AE</title>
</head>
<body>
 
	<center>
 
		<h2>DATA PERMINTAAN BARANG</h2>
 
	</center>
 
	<?php 
	include_once("config.php");
	?>


		
	<table border="1" style="width: 100%; border-color: black; text-align: center;">
		<tr>
			<th width="30%">Nama Laboratorium</th>
			<th>Disetujui</th>
		</tr>
		<?php 
		$id_pesan = $_GET['id_pesan'];
		$sql2 = mysqli_query($koneksi, "select * from pemesanan inner join alat inner join laboratorium where  pemesanan.id_pesan=alat.id_pesan and pemesanan.id_lab=laboratorium.id_lab and pemesanan.id_pesan='$id_pesan'");
		$data2 = mysqli_fetch_array($sql2);
		?>
		<tr width = "50%">
			<td width="20%"><?php echo $data2['nama_lab'] ?></td>
			<td width="30%"><img width="100" height="100" src="<?php echo "img/ttd/".$data2['ttd_kalab']; ?>"></td>
		</tr>
	</table>
	<table border="1" style="width: 100%; border-color: black; text-align: center;">
		<tr>
			<th width="30%">Nama Jurusan</th>
			<th>Disetujui</th>
		</tr>
		<?php 
		$id_pesan = $_GET['id_pesan'];
		$sql3 = mysqli_query($koneksi, "select * from pemesanan inner join alat inner join laboratorium inner join jurusan where  pemesanan.id_pesan=alat.id_pesan and pemesanan.id_lab=laboratorium.id_lab and pemesanan.id_pesan='$id_pesan' and jurusan.id_kajur=laboratorium.id_kajur");
		$data3 = mysqli_fetch_array($sql3);
		?>
		<tr width = "50%">
			<td width="20%"><?php echo $data3['nama_jurusan'] ?></td>
			<td width="30%"><img width="100" height="100" src="<?php echo "img/ttd/".$data3['ttd_kajur']; ?>"></td>
		</tr>
	</table>
 
	<table border="1" style="width: 100%; border-color: black; text-align: center;">
		<tr>
			<th width="1%">No</th>
			<th width="5%">Jumlah</th>
			<th width="20%">Nama Barang</th>
			<th width="10%">Berat (gram)</th>
			<th width="20%">Total Kisaran Harga</th>
			<th width="20%">Jumlah Kisaran Harga</th>
			<th width="14%">Tanggal Pesan</th>
		</tr>
		<?php 
		$id_pesan = $_GET['id_pesan'];
		$no = 1;
		$sql = mysqli_query($koneksi, "select * from pemesanan inner join alat inner join laboratorium where  pemesanan.id_pesan=alat.id_pesan and pemesanan.id_lab=laboratorium.id_lab and pemesanan.id_pesan='$id_pesan' group by pemesanan.id_pesan");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>			
	        <td><?php echo $data['jumlah_pesan']; ?></td>
	        <td><?php echo $data['nama_alat']; ?></td>	
	        <td><?php echo $data['berat_alat']; ?></td>
	        <td><?php echo $data['total_kisaran_hargapesan']; ?></td>
	        <td><?php echo $data['jml_total_kisaran_hargapesan']; ?></td>
	        <td><?php echo $data['tgl_pesan']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
 
	<script>
		window.print();
	</script>
 
</body>
</html>