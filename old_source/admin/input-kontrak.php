<?php

$backurl = '../';
require_once($backurl . 'config/conn.php');
session_start();
include $backurl . './config/kick-admin.php';
$judulhead = 'Input Kontrak';
$jenisalert = NULL;
$iconalert = NULL;
$headalert = NULL;
$isialert = NULL;
$isi_nm_pt = '';
$isi_nm_kntrk = '';
$isi_pt = '';
$isi_tgl_mulai = '';
$isi_tgl_exp = '';
$isi_tgl_acc = '';
$isi_ket = '';
$isi_file = '';
$isi_text = '';
$diss = '';
$req = 'required';
if (isset($_GET['idktrk'])) {
  $cekdata = mysqli_query($conn, "SELECT * FROM kntrk where nmkntrk = '$_GET[idktrk]'");
  $ada = mysqli_fetch_array($cekdata);
  //cek kolom pada tabel lebih dari 0 atau tidak
  if (mysqli_num_rows($cekdata) > 0) {
    $diss = 'disabled';
    $isi_nm_kntrk = htmlentities($ada['nmkntrk']);
    $isi_pt = $ada['kdpt'];
    $isi_tgl_mulai = $ada['tglm'];
    $isi_tgl_exp = $ada['tglex'];
    $isi_tgl_acc = $ada['tglacc'];
    $isi_ket = $ada['ket'];
    $isi_draft = $ada['draftkntrk'];
    $isi_file = $ada['fkntrk'];
    $isi_text = 'masukan Foto untuk Mengganti Foto';
    $req = '';

    if (isset($_POST["Simpan"])) {

      $ekstensi_diperbolehkan = array('pdf', 'doc', 'docx', 'xls', 'rar', 'txt', 'ppt', 'pptx', 'png', 'jpeg');


      if (!empty($_FILES['draft']['name'])) {
        $nama = $_FILES['draft']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['draft']['tmp_name'];
        $newnameis = "DRAFT - " . judul_seo($isi_nm_kntrk) . " - " . $nama;
        $lokasi =  $backurl . 'uploads/files/' . $newnameis;
        $cekekstensi = in_array($ekstensi, $ekstensi_diperbolehkan) === true;
      } else {
        $newnameis = $isi_draft;
        $cekekstensi = true;
      }

      if (!empty($_FILES['file']['name'])) {
        $nama1 = $_FILES['file']['name'];
        $x1 = explode('.', $nama1);
        $ekstensi1 = strtolower(end($x1));
        $file_tmp1 = $_FILES['file']['tmp_name'];
        $newnameis1 = judul_seo($isi_nm_kntrk) . " - " . $nama1;
        $newlokasi =  $backurl . 'uploads/files/' . $newnameis1;
        $cekekstensi1 = in_array($ekstensi1, $ekstensi_diperbolehkan) === true;
      } else {
        $newnameis1 = $isi_file;
        $cekekstensi1 = true;
      }

      if ($cekekstensi && $cekekstensi1) {
        if (!empty($_FILES['draft']['name'])) {
          move_uploaded_file($file_tmp, $lokasi);
          if (file_exists($backurl . 'uploads/files/' . $isi_draft)) {
            unlink($backurl . 'uploads/files/' . $isi_draft);
          }
          if (!empty($_FILES['file']['name'])) {
            move_uploaded_file($file_tmp1, $newlokasi);
            if (file_exists($backurl . 'uploads/files/' . $isi_file)) {
              unlink($backurl . 'uploads/files/' . $isi_file);
            }
          }
        }

        $ada = addslashes($_POST['nm_kntrk']);
        $ket = addslashes($_POST['ket']);
        $query = mysqli_query($conn, "UPDATE kntrk SET nmkntrk='$ada', kdpt='$_POST[pt]', tglm='$_POST[tgl_mulai]', tglex='$_POST[tgl_exp]', tglacc='$_POST[tgl_acc]', ket='$ket', draftkntrk='$newnameis', fkntrk='$newnameis1' WHERE nmkntrk = '$_GET[idktrk]'");
        if (!$query) {
          $jenisalert = 'alert-danger';
          $iconalert = 'fa-warning';
          $headalert = 'Data Gagal di Input!';
          $isialert = 'Ada kesalahan pada query simpan, Silahkan cek lagi!!';
        } else {
          header("location:" . $df['host'] . "admin/kontrak/");
        }
      } else {
        $jenisalert = 'alert-danger';
        $iconalert = 'fa-warning';
        $headalert = 'Warning!';
        $isialert = 'Esktensi File Tidak diperbolehkan!!';
      }
    }
  }
} else if (isset($_GET['idktrkh'])) {
  $cekdata = mysqli_query($conn, "SELECT * FROM kntrk where nmkntrk = '$_GET[idktrkh]'");
  $ada = mysqli_fetch_array($cekdata);
  if (mysqli_num_rows($cekdata) > 0) {
    $sql = "DELETE FROM kntrk where nmkntrk = '$_GET[idktrkh]'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
      if (file_exists($backurl . 'uploads/files/' . $ada['draftkntrk'])) {
        unlink($backurl . 'uploads/files/' . $ada['draftkntrk']);
        if (file_exists($backurl . 'uploads/files/' . $ada['file'])) {
          unlink($backurl . 'uploads/files/' . $ada['file']);
        }
      }
      header("location:" . $df['host'] . "admin/kontrak/");
    } else {
      echo "Data Gagal di Dihapus! <br> Ada kesalahan pada query simpan, Silahkan cek lagi!!";
    }
  }
} else {
  if (isset($_POST["Simpan"])) {
    $ekstensi_diperbolehkan = array('pdf', 'doc', 'docx', 'xls', 'rar', 'txt', 'ppt', 'pptx', 'png', 'jpeg');


    $nama = $_FILES['draft']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['draft']['tmp_name'];
    $newnameis = "DRAFT - " . judul_seo($_POST['nm_kntrk']) . " - " . $nama;
    $lokasi =  $backurl . 'uploads/files/' . $newnameis;
    $cekekstensi = in_array($ekstensi, $ekstensi_diperbolehkan) === true;


    if (!empty($_FILES['file']['name'])) {

      $nama1 = $_FILES['file']['name'];
      $x1 = explode('.', $nama1);
      $ekstensi1 = strtolower(end($x1));
      $file_tmp1 = $_FILES['file']['tmp_name'];
      $newnameis1 = judul_seo($_POST['nm_kntrk']) . " - " . $nama1;
      $newlokasi =  $backurl . 'uploads/files/' . $newnameis1;


      $cekekstensi1 = in_array($ekstensi1, $ekstensi_diperbolehkan) === true;
    } else {
      $newnameis1 = '';
      $cekekstensi1 = true;
    }


    if ($cekekstensi && $cekekstensi1) {
      if (move_uploaded_file($file_tmp, $lokasi)) {
        if (!empty($_FILES['file']['name'])) {
          move_uploaded_file($file_tmp1, $newlokasi);
        }
        $nm_kntrk = addslashes($_POST['nm_kntrk']);
        $ket = addslashes($_POST['ket']);
        $query = mysqli_query($conn, "INSERT INTO `kntrk` (`nmkntrk`, `kdpt`, `tglm`, `tglex`, `tglacc`, `ket`, `draftkntrk`, `fkntrk`) VALUES ('$nm_kntrk', '$_POST[pt]', '$_POST[tgl_mulai]', '$_POST[tgl_exp]', '$_POST[tgl_acc]', '$ket', '$newnameis', '$newnameis1')");
        if ($query) {
          header("location:" . $df['host'] . "admin/kontrak/");
        } else {
          echo "Eror";
        }
      } else {
        echo "upload gagal";
      }
    } else {
      echo "Esktensi File Tidak diperbolehkan!!";
    }
  }
}





if (isset($_GET['idpt'])) {
  $cekdata = mysqli_query($conn, "SELECT * FROM pt where kdpt = '$_GET[idpt]'");
  $ada = mysqli_fetch_array($cekdata);
  //cek kolom pada tabel lebih dari 0 atau tidak
  if (mysqli_num_rows($cekdata) > 0) {
    $isi_nm_pt = htmlentities($ada['nmpt']);

    if (isset($_POST["SimpanPT"])) {
      $nm_pt = addslashes($_POST['nm_pt']);
      $query = mysqli_query($conn, "UPDATE pt SET nmpt='$nm_pt' WHERE kdpt = '$_GET[idpt]'");
      if (!$query) {
        $jenisalert = 'alert-danger';
        $iconalert = 'fa-warning';
        $headalert = 'Data Gagal di Input!';
        $isialert = 'Ada kesalahan pada query simpan, Silahkan cek lagi!!';
      } else {
        header("location:" . $df['host'] . "admin/kontrak/");
      }
    }
  }
} else if (isset($_GET['idpth'])) {
  $cekdata = mysqli_query($conn, "SELECT * FROM pt where kdpt = '$_GET[idpth]'");
  $ada = mysqli_fetch_array($cekdata);
  if (mysqli_num_rows($cekdata) > 0) {
    $sql = "DELETE FROM pt where kdpt = '$_GET[idpth]'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
      header("location:" . $df['host'] . "admin/kontrak/");
    } else {
      echo "Data Gagal di Dihapus! <br> Ada kesalahan pada query simpan, Silahkan cek lagi!!";
    }
  }
} else {
  if (isset($_POST["SimpanPT"])) {
    $nm_pt = addslashes($_POST['nm_pt']);
    $query = mysqli_query($conn, "INSERT INTO `pt` (`kdpt`, `nmpt`) VALUES (NULL, '$nm_pt')");
    if ($query) {
      header("location:" . $df['host'] . "admin/kontrak/");
    } else {
      echo "Eror";
    }
  }
}





?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <?php include $backurl . 'config/admin/head.php'; ?>

  <style type="text/css">
    .flot .flot-base,
    .flot .flot-overlay {
      width: 100% !important;
    }

    .fr-wrapper>div:first-child {
      visibility: hidden;
      display: none;
    }

    .fr-placeholder {
      margin-top: 0 !important;
    }
  </style>
</head>

<body>
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <?php include $backurl . 'config/admin/headside.php'; ?>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="ml-auto text-right">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- End Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Container fluid  -->
      <!-- ============================================================== -->
      <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Sales Cards  -->
        <!-- ============================================================== -->
        <div class="row">
          <!-- small box -->
          <div class="col-lg-6">
            <div class="row">
              <div class="col-lg-12">
                <form method="POST" action="" class="card" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="nm_kntrk" class="col-sm-3 text-right control-label col-form-label">Nomor Kontrak</label>
                      <div class="col-sm-9">
                        <input type="text" name="nm_kntrk" class="form-control" id="nm_kntrk" placeholder="Nomor Kontrak" maxlength="150" autocomplete="off" required value="<?= $isi_nm_kntrk; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="url_partner" class="col-sm-3 text-right control-label col-form-label">PT</label>
                      <div class="col-sm-9">
                        <select class="select2 custom-select form-control" name="pt" id="pt" style="width:100%;">
                          <?php
                          $sql = mysqli_query($conn, "SELECT * FROM pt");
                          for ($i = 1; $Data = mysqli_fetch_array($sql); $i++) { ?>
                            <option value="<?= $Data['kdpt']; ?>" <?php if ($isi_pt == $Data['kdpt']) {
                                                                      echo "selected";
                                                                    } ?>><?= $Data['nmpt']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="tgl_mulai" class="col-sm-3 text-right control-label col-form-label">Tanggal Mulai</label>
                      <div class="col-sm-9">
                        <div class="input-group">
                          <input type="text" name="tgl_mulai" id="tgl_mulai" class="form-control mydatepicker" placeholder="yyyy-mm-dd" autocomplete="off" required value="<?= $isi_tgl_mulai; ?>">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="tgl_exp" class="col-sm-3 text-right control-label col-form-label">Tanggal Exp</label>
                      <div class="col-sm-9">
                        <div class="input-group">
                          <input type="text" name="tgl_exp" id="tgl_exp" class="form-control mydatepicker" placeholder="yyyy-mm-dd" autocomplete="off" required value="<?= $isi_tgl_exp; ?>">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="tgl_acc" class="col-sm-3 text-right control-label col-form-label">Tanggal ACC</label>
                      <div class="col-sm-9">
                        <div class="input-group">
                          <input type="text" name="tgl_acc" id="tgl_acc" class="form-control mydatepicker" placeholder="yyyy-mm-dd" autocomplete="off" value="<?= $isi_tgl_acc; ?>">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="ket" class="col-sm-3 text-right control-label col-form-label">Kerja Sama</label>
                      <div class="col-sm-9">
                        <textarea name="ket" id="ket" class="form-control"><?= $isi_ket; ?></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="draft" class="col-sm-3 text-right control-label col-form-label">Draft</label>
                      <div class="col-sm-9">
                        <div class="custom-file">
                          <input type="file" name="draft" class="custom-file-input" id="draft" <?= $req; ?>>
                          <label class="custom-file-label" for="draft">Choose file...</label>
                          <div class="invalid-feedback">Example invalid custom file feedback</div>
                          <p><?= $isi_text; ?></p>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="file" class="col-sm-3 text-right control-label col-form-label">File</label>
                      <div class="col-sm-9">
                        <div class="custom-file">
                          <input type="file" name="file" class="custom-file-input" id="file">
                          <label class="custom-file-label" for="file">Choose file...</label>
                          <div class="invalid-feedback">Example invalid custom file feedback</div>
                          <p><?= $isi_text; ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer border-top text-right">
                    <button type="submit" name="Simpan" class="btn btn-info">Simpan</button>
                  </div>
                </form>
              </div>
              <div class="col-lg-12">
                <form method="POST" action="" class="card" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="nm_pt" class="col-sm-3 text-right control-label col-form-label">Nama PT</label>
                      <div class="col-sm-9">
                        <input type="text" name="nm_pt" class="form-control" id="nm_pt" placeholder="Nama PT" maxlength="150" autocomplete="off" required value="<?= $isi_nm_pt; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer border-top text-right">
                    <button type="submit" name="SimpanPT" class="btn btn-info">Simpan</button>
                  </div>
                </form>
              </div>
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="zero_configPT" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Nama PT</th>
                            <th>Act</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sql = mysqli_query($conn, "SELECT * FROM PT");
                          for ($i = 1; $Data = mysqli_fetch_array($sql); $i++) { ?>
                            <tr>
                              <td><?= $Data['nmpt']; ?></td>
                              <td>
                                <a href="<?= $df['host'] . 'admin/kontrak/updatePT-' . $Data['kdpt']; ?>" class="btn btn-sm btn-info">Update</a>
                                <a href="<?= $df['host'] . 'admin/kontrak/deletePT-' . $Data['kdpt']; ?>" class="btn btn-sm btn-danger">Delete</a>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>No Kontrak</th>
                        <th>PT</th>
                        <th>Tgl</th>
                        <th>File</th>
                        <th>Act</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = mysqli_query($conn, "SELECT * FROM kontrak");
                      for ($i = 1; $Data = mysqli_fetch_array($sql); $i++) { ?>
                        <tr>
                          <td><?= $i; ?></td>
                          <td><?= $Data['nmkntrk']; ?></td>
                          <td><?= $Data['nmpt']; ?></td>
                          <td><?= $Data['tglm']; ?> - <?= $Data['tglex']; ?></td>
                          <td>
                            <a href="<?= $df['host'] . 'uploads/files/' . $Data['draftkntrk']; ?>" class="btn btn-sm btn-info" target="_blank">Draft</a>
                            <?php
                              if ($Data['fkntrk'] != '' || $Data['fkntrk'] != NULL) { ?>
                              <a href="<?= $df['host'] . 'uploads/files/' . $Data['fkntrk']; ?>" class="btn btn-sm btn-success" target="_blank">File</a>
                            <?php } ?>

                          </td>
                          <td>
                            <a href="<?= $df['host'] . 'admin/kontrak/update-' . $Data['nmkntrk']; ?>" class="btn btn-sm btn-info">Update</a>
                            <a href="<?= $df['host'] . 'admin/kontrak/delete-' . $Data['nmkntrk']; ?>" class="btn btn-sm btn-danger">Delete</a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
        <!-- column -->
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Container fluid  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== -->
      <footer class="footer text-center">
        <strong>Copyright &copy; 2020 <a href="#">Pemasaran</a>.</strong>
      </footer>
      <!-- ============================================================== -->
      <!-- End footer -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Wrapper -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- All Jquery -->
  <!-- ============================================================== -->
  <?php include $backurl . 'config/admin/js.php'; ?>
  <script type="text/javascript">
    $(function() {
      var table = $('#zero_config').DataTable({
        'paging': true,
        'lengthChange': false,
        "pageLength": 5,
        'info': false,
        'searching': true,
        'ordering': true,
        "language": {
          "paginate": {
            "previous": "<",
            "next": ">"
          }
        }
      })
      $('#zero_config_filter').hide()
      var table = $('#zero_configPT').DataTable({
        'paging': true,
        'lengthChange': false,
        "pageLength": 5,
        'info': false,
        'searching': true,
        'ordering': true,
        "language": {
          "paginate": {
            "previous": "<",
            "next": ">"
          }
        }
      })
      $('#zero_configPT_filter').hide()

      $(".select2").select2();

      $('.mydatepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
        endDate: Infinity,
        orientation: 'bottom'
      })
    })
  </script>
</body>

</html>