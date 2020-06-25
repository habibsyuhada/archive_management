<?php
  session_start();
  require_once('../config/config.php');
  $metaTitle = 'Data Users';
	$metaDesc = '';
	
	if(isset($_GET['deletearchivetype'])){
		$kode_dokumen = $_GET['deletearchivetype'];
		$query = mysqli_query($conn, "DELETE FROM tbl_jenis_dokumen WHERE kode_dokumen = $kode_dokumen") or die("Error description: " . mysqli_error($conn));

		$_SESSION['success'] = 'This Data Has Been Deleted';
		header('Location: archivetype_list.php');
		exit;
	}

  $query = mysqli_query($conn, "SELECT * FROM tbl_jenis_dokumen");
?>
<?php include('../header.php'); ?>
<?php include('../topbar.php'); ?>
<?php include('../sidebar.php'); ?>

<div class="container-fluid">
	<div class="card">
		<div class="card-body">
      <!-- <button type="button" class="btn btn-sm btn-flat btn-secondary">Jumlah : 1 User</button> -->
			<a href="archivetype_add.php" class="btn btn-flat btn-success float-right mx-1"><i class="mdi mdi-plus"></i> Tambah Jenis Dokumen</a>
		</div>
	</div>

	<div class="card">
		<div class="card-body">
			<table class="table table-bordered text-center datatables">
				<thead class="bg-primary-template text-white text-bold">
					<tr>
						<th class="valign-middle"><b>Kode Dokumen</b></th>
						<th class="valign-middle"><b>Nama Dokumen</b></th>
						<th class="valign-middle"><b>Adm. Penomoran</b></th>
						<th class="valign-middle"><b>Sifat Penomoran</b></th>
						<th class="valign-middle"><b>Tanggal Input</b></th>
						<th class="valign-middle"><b></th>
					</tr>
				</thead>
				<tbody>
          <?php while($data = mysqli_fetch_array($query)): ?>
					<tr>
						<td class="valign-middle"><?php echo $data['kode_dokumen']; ?></td>
						<td class="valign-middle"><?php echo $data['nama_dokumen']; ?></td>
						<td class="valign-middle"><?php echo $data['adm_penomoran']; ?></td>
						<td class="valign-middle"><?php echo $data['sifat_penomoran']; ?></td>
						<td class="valign-middle"><?php echo $data['tanggal_input']; ?></td>
						<td class="valign-middle text-nowrap">
							<a href="archivetype_edit.php?kode_dokumen=<?php echo $data['kode_dokumen']; ?>" class="btn btn-info text-white"><i class="fa fa-edit"></i> Update</a>
							<a href="archivetype_list.php?deletearchivetype=<?php echo $data['kode_dokumen']; ?>" class="btn btn-danger text-white"><i class="fa fa-trash"></i> Delete</a>
						</td>
          </tr>
          <?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
<?php include('../footer.php'); ?>