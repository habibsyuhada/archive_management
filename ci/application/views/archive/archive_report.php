<div class="container-fluid">

  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h3>Arhive Report</h3>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <label class="col-sm-3 text-right control-label col-form-label">Dari Tanggal</label>
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
            <label class="col-sm-3 text-right control-label col-form-label">Hingga Tanggal</label>
            <div class="col-sm-9">
              <div class="input-group">
                <input type="text" name="tgl_mulai" id="tgl_mulai" class="form-control mydatepicker" placeholder="yyyy-mm-dd" required>
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <a href="<?php echo base_url() ?>archive/archive_list" class="btn btn-success text-white mx-1 float-right"><i class="fas fa-file-excel"></i> Excel</a>
          <a href="<?php echo base_url() ?>archive/archive_list" class="btn btn-danger text-white mx-1 float-right"><i class="fas fa-file-pdf"></i> PDF</a>
        </div>
      </div>
    </div>
  </div>
  
</div>