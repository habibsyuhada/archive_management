<?php
  session_start();
  require_once('../config/config.php');
  $metaTitle = 'Download Laporan';
?>
<?php include('../header.php'); ?>
<?php include('../topbar.php'); ?>
<?php include('../sidebar.php'); ?>
<form method="POST" action="archive_excel.php">
  <div class="container-fluid">

    <div class="card">
      <div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-2 text-right control-label col-form-label">Dari Date</label>
							<div class="col-sm-9">
								<input type="date" name="from_date" class="form-control" value="<?php echo date('Y-m-d') ?>" required>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-2 text-right control-label col-form-label">Hingga Date</label>
							<div class="col-sm-9">
								<input type="date" name="to_date" class="form-control" value="<?php echo date('Y-m-d') ?>" required>
							</div>
						</div>
					</div>
				</div>
      </div>
      <div class="card-footer">
        <a href="archivetype_list.php" class="btn btn-secondary text-white mx-1 float-right"><i class="fa fa-times"></i> Cancel</a>
        <button name="submit" class="btn btn-success float-right"><i class="fa fa-check"></i> Submit</button>
      </div>
    </div>

  </div>
</form>

<?php include('../footer.php'); ?>