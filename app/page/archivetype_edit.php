<?php
  session_start();
  require_once('../config/config.php');
  $metaTitle = 'Add New User';
  $metaDesc = '';

  if(isset($_POST['submit'])){
    
    $kode_dokumen = $_POST['kode_dokumen'];
    $nama_dokumen = $_POST['nama_dokumen'];
    $adm_penomoran = $_POST['adm_penomoran'];
    $sifat_penomoran = $_POST['sifat_penomoran'];

    $query = mysqli_query($conn, "UPDATE tbl_jenis_dokumen SET nama_dokumen = '$nama_dokumen', adm_penomoran = '$adm_penomoran', sifat_penomoran = '$sifat_penomoran' WHERE kode_dokumen = '$kode_dokumen'") or die("Error description: " . mysqli_error($conn));
  }

  $kode_dokumen = $_GET['kode_dokumen'];
  $query = mysqli_query($conn, "SELECT * FROM tbl_jenis_dokumen WHERE kode_dokumen = $kode_dokumen");
  $jenis = mysqli_fetch_array($query);
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
            <input type="text" name="no_arsip" class="form-control" placeholder="Kode Dokumen" value="<?php echo $jenis['kode_dokumen'] ?>" required readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 text-right control-label col-form-label">Nama Dokumen</label>
          <div class="col-sm-9">
            <input type="text" name="no_surat" class="form-control" placeholder="Nama Dokumen" value="<?php echo $jenis['nama_dokumen'] ?>" required>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 text-right control-label col-form-label">Adm. Penomoran</label>
            <div class="col-sm-9">
              <input type="text" name="perihal" class="form-control" placeholder="Adm. Penomoran" value="<?php echo $jenis['adm_penomoran'] ?>" required>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 text-right control-label col-form-label">Sifat Penomoran</label>
          <div class="col-sm-9">
            <select name="sifat_penomoran" class="form-control" required>
              <option value="">---</option>
              <option value="Biasa" <?php echo ($jenis['sifat_penomoran'] == "Biasa" ? 'selected' : '') ?>>Biasa</option>
              <option value="Khusus" <?php echo ($jenis['sifat_penomoran'] == "Khusus" ? 'selected' : '') ?>>Khusus</option>
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