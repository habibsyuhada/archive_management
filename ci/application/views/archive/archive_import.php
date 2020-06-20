<div class="container-fluid">

	<div class="card">
		<div class="card-body">
			<div class="form-group row">
        <label class="col-sm-3 text-right control-label col-form-label">Template</label>
        <label class="col-sm-9 control-label col-form-label"><a href="#">Template_Import_Arsip.xlsx</a></label>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 text-right control-label col-form-label">Unggah Data</label>
        <div class="col-sm-9">
          <div class="custom-file">
            <input type="file" name="file" class="custom-file-input" id="file">
            <label class="custom-file-label" for="file">Choose file...</label>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 text-right control-label col-form-label">Unggah Dokumen</label>
        <div class="col-sm-9">
          <div class="custom-file">
            <input type="file" name="file" class="custom-file-input" id="file">
            <label class="custom-file-label" for="file">Choose file...</label>
          </div>
        </div>
      </div>
		</div>
		<div class="card-footer">
			<a href="<?php echo base_url() ?>archive/archive_list" class="btn btn-secondary text-white mx-1 float-right"><i class="fa fa-times"></i> Cancel</a>
			<button class="btn btn-success float-right"><i class="fa fa-check"></i> Submit</button>
		</div>
	</div>

</div>