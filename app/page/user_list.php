<?php
  session_start();
  require_once('../config/config.php');
  $metaTitle = 'Data Users';
  $metaDesc = '';

  $query = mysqli_query($conn, "SELECT * FROM tbl_admin");
?>
<?php include('../header.php'); ?>
<?php include('../topbar.php'); ?>
<?php include('../sidebar.php'); ?>

<div class="container-fluid">
	<div class="card">
		<div class="card-body">
      <!-- <button type="button" class="btn btn-sm btn-flat btn-secondary">Jumlah : 1 User</button> -->
			<a href="user_add.php" class="btn btn-flat btn-success float-right mx-1"><i class="mdi mdi-plus"></i> Tambah User</a>
		</div>
	</div>

	<div class="card">
		<div class="card-body">
			<table class="table table-bordered text-center datatables">
				<thead class="bg-primary-template text-white text-bold">
					<tr>
						<th class="valign-middle"><b>Username</b></th>
						<th class="valign-middle"><b>Name</b></th>
						<th class="valign-middle"><b>NUP</b></th>
						<th class="valign-middle"><b>Role</b></th>
						<th class="valign-middle"><b></th>
					</tr>
				</thead>
				<tbody>
          <?php while($data = mysqli_fetch_array($query)): ?>
					<tr>
						<td class="valign-middle"><?php echo $data['username']; ?></td>
						<td class="valign-middle"><?php echo $data['name']; ?></td>
						<td class="valign-middle"><?php echo $data['nup']; ?></td>
						<td class="valign-middle"><?php echo $data['role']; ?></td>
						<td class="valign-middle text-nowrap">
							<a class="btn btn-primary text-white"><i class="fa fa-key"></i> Reset Password</a>
							<a href="user_edit.php?id=<?php echo $data['role']; ?>" class="btn btn-info text-white"><i class="fa fa-edit"></i> Update</a>
							<a class="btn btn-danger text-white"><i class="fa fa-trash"></i> Delete</a>
						</td>
          </tr>
          <?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
<?php include('../footer.php'); ?>