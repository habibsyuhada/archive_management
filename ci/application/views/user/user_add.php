<div class="container-fluid">

	<div class="card">
		<div class="card-body">
			<div class="form-group row">
        <label class="col-sm-3 text-right control-label col-form-label">Name</label>
        <div class="col-sm-9">
          <input type="text" name="name" class="form-control" placeholder="Name" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 text-right control-label col-form-label">Username</label>
        <div class="col-sm-9">
          <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 text-right control-label col-form-label">NUP</label>
        <div class="col-sm-9">
          <input type="text" name="nup" class="form-control" placeholder="NUP" required>
        </div>
      </div>
		</div>
		<div class="card-footer">
      <a href="<?php echo base_url() ?>user/user_list" class="btn btn-secondary text-white mx-1 float-right"><i class="fa fa-times"></i> Cancel</a>
			<button class="btn btn-success float-right"><i class="fa fa-check"></i> Submit</button>
		</div>
	</div>

</div>