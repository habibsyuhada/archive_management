<?php
  session_start();
  require_once('../config/config.php');
  $metaTitle = 'Data Arsip';
	
	if(isset($_GET['deletearchive'])){
		$no_arsip = $_GET['deletearchive'];
		$query = mysqli_query($conn, "DELETE FROM tbl_dokumen WHERE no_arsip = $no_arsip") or die("Error description: " . mysqli_error($conn));

		$_SESSION['success'] = 'This Archive Has Been Deleted';
		header('Location: user_list.php');
		exit;
	}

  $query = mysqli_query($conn, "SELECT dok.*, jen.nama_dokumen FROM tbl_dokumen dok JOIN tbl_jenis_dokumen jen ON dok.kode_dokumen = jen.kode_dokumen");
?>
<?php include('../header.php'); ?>
<?php include('../topbar.php'); ?>
<?php include('../sidebar.php'); ?>

<div class="container-fluid">
	<div class="card">
		<div class="card-body">
      <!-- <button type="button" class="btn btn-sm btn-flat btn-secondary">Jumlah : 1 User</button> -->
			<a href="archive_add.php" class="btn btn-flat btn-success float-right mx-1"><i class="mdi mdi-plus"></i> Tambah Arsip</a>
		</div>
	</div>

	<div class="card">
		<div class="card-body">
			<table class="table table-bordered text-center datatables">
				<thead class="bg-primary-template text-white text-bold">
					<tr>
						<th class="valign-middle"><b>Nomor Arsip</b></th>
						<th class="valign-middle"><b>Nomor Surat</b></th>
						<th class="valign-middle"><b>Jenis Dokumen</b></th>
						<th class="valign-middle"><b>Perihal</b></th>
						<th class="valign-middle"><b>Tanggal Terbit</b></th>
						<th class="valign-middle"><b>Attachment</b></th>
						<th class="valign-middle"><b></th>
					</tr>
				</thead>
				<tbody>
          <?php while($data = mysqli_fetch_array($query)): ?>
					<tr>
						<td class="valign-middle"><?php echo $data['no_arsip']; ?></td>
						<td class="valign-middle"><?php echo $data['no_surat']; ?></td>
						<td class="valign-middle"><?php echo $data['nama_dokumen']; ?></td>
						<td class="valign-middle"><?php echo $data['perihal']; ?></td>
						<td class="valign-middle"><?php echo $data['tanggal_terbit']; ?></td>
						<td class="valign-middle"><a href="../upload/dokumen/<?php echo $data['file']; ?>" target="_blank" class="btn btn-dark text-white"><i class="fas fa-file"></i> File</a></td>
						<td class="valign-middle text-nowrap">
							<a href="archive_edit.php?no_arsip=<?php echo $data['no_arsip']; ?>" class="btn btn-info text-white"><i class="fa fa-edit"></i> Ubah</a>
							<a href="archive_list.php?deletearchive=<?php echo $data['no_arsip']; ?>" class="btn btn-danger text-white"><i class="fa fa-trash"></i> Hapus</a>
						</td>
          </tr>
          <?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
<?php include('../footer.php'); ?>