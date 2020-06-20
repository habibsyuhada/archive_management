<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<button type="button" class="btn btn-sm btn-flat btn-secondary">Jumlah : 1 User</button>
			<a href="<?php echo base_url() ?>user/user_add" class="btn btn-sm btn-flat btn-success float-right mx-1"><i class="mdi mdi-plus"></i> Tambah User</a>
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
						<th class="valign-middle"><b></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="valign-middle">habib</td>
						<td class="valign-middle">Habib Syuhada</td>
						<td class="valign-middle">10039315</td>
						<td class="valign-middle text-nowrap">
							<a class="btn btn-primary text-white"><i class="fa fa-key"></i> Reset Password</a>
							<a class="btn btn-info text-white"><i class="fa fa-edit"></i> Update</a>
							<a class="btn btn-danger text-white"><i class="fa fa-trash"></i> Delete</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

</div>