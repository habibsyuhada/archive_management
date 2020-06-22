<?php
  session_start();
  require_once('../config/config.php');
  $metaTitle = 'Data Users';
  $metaDesc = '';

	if(isset($_GET['resetpwd'])){
		$id = $_GET['resetpwd'];
		$password = MD5('12345');
		$query = mysqli_query($conn, "UPDATE tbl_admin SET password = '$password' WHERE id = $id") or die("Error description: " . mysqli_error($conn));

		$_SESSION['success'] = 'This Account Has Been Reset. Now the password is 12345';
		header('Location: user_list.php');
		exit;
	}
	elseif(isset($_GET['deleteuser'])){
		$id = $_GET['deleteuser'];
		$query = mysqli_query($conn, "DELETE FROM tbl_admin WHERE id = $id") or die("Error description: " . mysqli_error($conn));

		$_SESSION['success'] = 'This Account Has Been Deleted';
		header('Location: user_list.php');
		exit;
	}

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
							<a href="user_list.php?resetpwd=<?php echo $data['id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-primary text-white"><i class="fa fa-key"></i> Reset Password</a>
							<a href="user_edit.php?id=<?php echo $data['id']; ?>" class="btn btn-info text-white"><i class="fa fa-edit"></i> Update</a>
							<a href="user_list.php?deleteuser=<?php echo $data['id']; ?>" class="btn btn-danger text-white"><i class="fa fa-trash"></i> Delete</a>
						</td>
          </tr>
          <?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
<?php include('../footer.php'); ?>