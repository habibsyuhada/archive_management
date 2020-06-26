<?php
	session_start();
  require_once('../config/config.php');
 	header("Content-type: application/vnd-ms-excel");
 	header("Content-Disposition: attachment; filename=Report-".date('YmdHis').".xls");
 	header("Pragma: no-cache");
	header("Expires: 0");

	$from_date = $_POST['from_date'];
	$to_date = $_POST['to_date'];
	$query = mysqli_query($conn, "SELECT dok.*, jen.nama_dokumen FROM tbl_dokumen dok JOIN tbl_jenis_dokumen jen ON dok.kode_dokumen = jen.kode_dokumen WHERE dok.tanggal_input BETWEEN '$from_date' AND '$to_date'");
?>
<table border="1">
	<thead>
		<tr>
			<th style="text-align: center;"><b>Nomor Arsip</b></th>
			<th style="text-align: center;"><b>Nomor Surat</b></th>
			<th style="text-align: center;"><b>Jenis Dokumen</b></th>
			<th style="text-align: center;"><b>Perihal</b></th>
			<th style="text-align: center;"><b>Tanggal Terbit</b></th>
			<th style="text-align: center;"><b>Tanggal Input</b></th>
		</tr>
	</thead>
	<tbody>
		<?php while($data = mysqli_fetch_array($query)): ?>
		<tr>
			<td style="text-align: center;"><?php echo $data['no_arsip']; ?></td>
			<td style="text-align: center;"><?php echo $data['no_surat']; ?></td>
			<td style="text-align: center;"><?php echo $data['nama_dokumen']; ?></td>
			<td style="text-align: center;"><?php echo $data['perihal']; ?></td>
			<td style="text-align: center;"><?php echo $data['tanggal_terbit']; ?></td>
			<td style="text-align: center;"><?php echo $data['tanggal_input']; ?></td>
		</tr>
		<?php endwhile; ?>
	</tbody>
</table>