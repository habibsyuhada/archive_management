<?php
  session_start();
  require_once('../config/config.php');
  $metaTitle = 'Add New User';
  $metaDesc = '';

  if(isset($_POST['submit'])){
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // exit;
    
    $no_arsip = $_POST['no_arsip'];
    $no_surat = $_POST['no_surat'];
    $kode_dokumen = $_POST['kode_dokumen'];
    $perihal = $_POST['perihal'];
    $tanggal_terbit = $_POST['tanggal_terbit'];

    if(!isset($_FILES['files']) ){
      $query = mysqli_query($conn, "UPDATE tbl_dokumen SET kode_dokumen = '$kode_dokumen', perihal = '$perihal', tanggal_terbit = '$tanggal_terbit' WHERE no_arsip = '$no_arsip', no_surat = '$no_surat'") or die("Error description: " . mysqli_error($conn));
    }
    else{
      // get details of the uploaded file
      $fileTmpPath = $_FILES['file']['tmp_name'];
      $fileName = $_FILES['file']['name'];
      $fileSize = $_FILES['file']['size'];
      $fileType = $_FILES['file']['type'];
      $fileNameCmps = explode(".", $fileName);
      $fileExtension = strtolower(end($fileNameCmps));

      $newFileName = $_SESSION['id'].'-'.date('ymdhms').'.'.$fileExtension;

      $allowedfileExtensions = array('pdf');
      if (in_array($fileExtension, $allowedfileExtensions)) {
        if ($fileSize < 2000000) {
          $uploadFileDir = '../upload/dokumen/';
          $dest_path = $uploadFileDir . $newFileName;
            
          if(move_uploaded_file($fileTmpPath, $dest_path)){
            $query = mysqli_query($conn, "UPDATE tbl_dokumen SET kode_dokumen = '$kode_dokumen', perihal = '$perihal', tanggal_terbit = '$tanggal_terbit', file = '$newFileName' WHERE no_arsip = '$no_arsip', no_surat = '$no_surat'") or die("Error description: " . mysqli_error($conn));

            $_SESSION['success'] = 'Your Data Has Been Added';
            // header('Location: archive_list.php');
            // exit;
          }
          else{
            $_SESSION['danger'] = 'Error';
          }
        }
        else{
          $_SESSION['danger'] = 'Your file size is too big. Size ile should be less than 2MB';
        }
      }
      else{
        $_SESSION['danger'] = 'Extension should be .pdf';
      }
    }
  }

  $no_arsip = $_GET['no_arsip'];
  $query = mysqli_query($conn, "SELECT * FROM tbl_dokumen WHERE no_arsip = $no_arsip");
  $dokumen = mysqli_fetch_array($query);

  $query = mysqli_query($conn, "SELECT * FROM tbl_jenis_dokumen");
?>
<?php include('../header.php'); ?>
<?php include('../topbar.php'); ?>
<?php include('../sidebar.php'); ?>
<form method="POST" enctype="multipart/form-data">
  <div class="container-fluid">

    <div class="card">
      <div class="card-body">
        <div class="form-group row">
          <label class="col-sm-3 text-right control-label col-form-label">Nomor Arsip</label>
          <div class="col-sm-9">
            <input type="text" name="no_arsip" class="form-control" placeholder="Nomor Arsip" value="<?php echo $dokumen['no_arsip'] ?>" required readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 text-right control-label col-form-label">Nomor Surat</label>
          <div class="col-sm-9">
            <input type="text" name="no_surat" class="form-control" placeholder="Nomor Surat" value="<?php echo $dokumen['no_surat'] ?>" required readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 text-right control-label col-form-label">Jenis Dokumen</label>
          <div class="col-sm-9">
            <select name="kode_dokumen" class="form-control" required>
              <option value="">---</option>
              <?php while($data = mysqli_fetch_array($query)): ?>
              <option value="<?php echo $data['kode_dokumen'] ?>" <?php echo ($dokumen['kode_dokumen'] == $data['kode_dokumen'] ? 'selected' : '') ?>><?php echo $data['kode_dokumen'] ?> - <?php echo $data['nama_dokumen'] ?></option>
              <?php endwhile; ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 text-right control-label col-form-label">Perihal</label>
          <div class="col-sm-9">
            <input type="text" name="perihal" class="form-control" placeholder="Perihal" value="<?php echo $dokumen['perihal'] ?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 text-right control-label col-form-label">Tanggal Terbit</label>
          <div class="col-sm-9">
            <input type="date" name="tanggal_terbit" class="form-control" placeholder="Tanggal Terbit" value="<?php echo $dokumen['tanggal_terbit'] ?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 text-right control-label col-form-label">Attachment</label>
          <div class="col-sm-9">
            <input type="file" name="file" class="form-control" placeholder="Attachment">
            <a href="../upload/dokumen/<?php echo $data['file']; ?>" target="_blank" class="btn btn-dark text-white"><i class="fas fa-file"></i> File</a>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <a href="archive_list.php" class="btn btn-secondary text-white mx-1 float-right"><i class="fa fa-times"></i> Cancel</a>
        <button name="submit" class="btn btn-success float-right"><i class="fa fa-check"></i> Submit</button>
      </div>
    </div>

  </div>
</form>

<?php include('../footer.php'); ?>