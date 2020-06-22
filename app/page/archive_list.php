<?php
  session_start();
  require_once('../config/config.php');
  $metaTitle = 'Data Users';
  $metaDesc = '';

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
						<td class="valign-middle"><?php echo $data['file']; ?></td>
						<td class="valign-middle text-nowrap">
							<a href="archive_edit.php?id=<?php echo $data['id']; ?>" class="btn btn-info text-white"><i class="fa fa-edit"></i> Update</a>
							<a href="archive_list.php?deletearchive=<?php echo $data['id']; ?>" class="btn btn-danger text-white"><i class="fa fa-trash"></i> Delete</a>
						</td>
          </tr>
          <?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
<?php include('../footer.php'); ?>