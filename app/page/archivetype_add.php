<?php
  session_start();
  require_once('../config/config.php');
  $metaTitle = 'Tambah Jenis Dokumen';

  if(isset($_POST['submit'])){
    
    $kode_dokumen = $_POST['kode_dokumen'];
    $nama_dokumen = $_POST['nama_dokumen'];
    $adm_penomoran = $_POST['adm_penomoran'];
    $sifat_penomoran = $_POST['sifat_penomoran'];

    $query = mysqli_query($conn, "INSERT INTO tbl_jenis_dokumen (kode_dokumen, nama_dokumen, adm_penomoran, sifat_penomoran) VALUES ('$kode_dokumen', '$nama_dokumen', '$adm_penomoran', '$sifat_penomoran')") or die("Error description: " . mysqli_error($conn));
  }
?>
<?php include('../header.php'); ?>
<?php include('../topbar.php'); ?>
<?php include('../sidebar.php'); ?>
<form method="POST" enctype="multipart/form-data">
  <div class="container-fluid">

    <div class="card">
      <div class="card-body">
        <div class="form-group row">
          <label class="col-sm-3 text-right control-label col-form-label">Kode Dokumen</label>
          <div class="col-sm-9">
            <input type="text" name="no_arsip" class="form-control" placeholder="Kode Dokumen" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 text-right control-label col-form-label">Nama Dokumen</label>
          <div class="col-sm-9">
            <input type="text" name="no_surat" class="form-control" placeholder="Nama Dokumen" required>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 text-right control-label col-form-label">Adm. Penomoran</label>
            <div class="col-sm-9">
              <input type="text" name="perihal" class="form-control" placeholder="Adm. Penomoran" required>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 text-right control-label col-form-label">Sifat Penomoran</label>
          <div class="col-sm-9">
            <select name="sifat_penomoran" class="form-control" required>
              <option value="">---</option>
              <option value="Biasa">Biasa</option>
              <option value="Khusus">Khusus</option>
            </select>
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