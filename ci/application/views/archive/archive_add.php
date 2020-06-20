<div class="container-fluid">

	<div class="card">
		<div class="card-body">
			<div class="form-group row">
        <label class="col-sm-3 text-right control-label col-form-label">Nomor Arsip</label>
        <div class="col-sm-9">
          <input type="text" name="nm_kntrk" class="form-control" placeholder="Nomor Arsip" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 text-right control-label col-form-label">Nomor Surat</label>
        <div class="col-sm-9">
          <input type="text" name="nm_kntrk" class="form-control" placeholder="Nomor Surat" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 text-right control-label col-form-label">Jenis Surat</label>
        <div class="col-sm-9">
          <select class="form-control">
          	<option>---</option>
          	<option>Nota Dinas</option>
          	<option>Surat Keluar</option>
          	<option>Surat Keterangan</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 text-right control-label col-form-label">Tanggal Terbit</label>
        <div class="col-sm-9">
          <div class="input-group">
            <input type="text" name="tgl_mulai" id="tgl_mulai" class="form-control mydatepicker" placeholder="yyyy-mm-dd" required>
            <div class="input-group-append">
              <span class="input-group-text"><i class="fa fa-calendar"></i></span>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 text-right control-label col-form-label">Perihal</label>
        <div class="col-sm-9">
          <textarea class="form-control" rows="4"></textarea>
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