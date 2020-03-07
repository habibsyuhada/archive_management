<?php

$backurl = '../';
require_once($backurl . 'config/conn.php');
session_start();
include $backurl . './config/kick-admin.php';
$judulhead = 'Input User';
$jenisalert = NULL;
$iconalert = NULL;
$headalert = NULL;
$isialert = NULL;
$isi_nama = '';
$isi_username = '';
$isi_password = '';
$isi_akses = '';
$isi_act = '';
if (isset($_GET['idu'])) {
  $cekdata = mysqli_query($conn, "SELECT * FROM usr where usr = '$_GET[idu]'");
  $ada = mysqli_fetch_array($cekdata);
  //cek kolom pada tabel lebih dari 0 atau tiduk
  if (mysqli_num_rows($cekdata) > 0) {
    $isi_nama = htmlentities($ada['nm_user']);
    $isi_username = htmlentities($ada['usr']);
    $isi_password = htmlentities($ada['pss']);
    $isi_akses = $ada['akses'];
    $isi_act = $ada['act'];

    if (isset($_POST["Simpan"])) {
      $nama = addslashes($_POST['nama']);
      $username = addslashes($_POST['username']);
      $password = addslashes($_POST['password']);
      $query = mysqli_query($conn, "UPDATE usr SET nm_user='$nama', usr='$username', pss='$password', akses='$_POST[akses]', act='$_POST[act]' WHERE usr = '$_GET[idu]'");
      if (!$query) {
        echo "Eror";
      } else {
        header("location:" . $df['host'] . "admin/user/");
      }
    }
  }
} else if (isset($_GET['iduh'])) {
  $cekdata = mysqli_query($conn, "SELECT * FROM usr where usr = '$_GET[iduh]'");
  $ada = mysqli_fetch_array($cekdata);
  if (mysqli_num_rows($cekdata) > 0) {
    $sql = "DELETE FROM usr where usr = '$_GET[iduh]'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
      header("location:" . $df['host'] . "admin/user/");
    } else {
      echo "Data Gagal di Dihapus! <br> Ada kesalahan pada query simpan, Silahkan cek lagi!!";
    }
  }
} else {
  if (isset($_POST["Simpan"])) {
    $nama = addslashes($_POST['nama']);
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
    $query = mysqli_query($conn, "INSERT INTO `usr` (`usr`, `pss`, `nm_user`, `akses`, `act`) VALUES ('$nama', '$username', '$password', '$_POST[akses]', '$_POST[act]')");
    if ($query) {
      header("location:" . $df['host'] . "admin/user/");
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= $df['host']; ?>asset/admin/assets/libs/froala/css/froala_editor.css">
  <link rel="stylesheet" href="<?= $df['host']; ?>asset/admin/assets/libs/froala/css/froala_style.css">
  <link rel="stylesheet" href="<?= $df['host']; ?>asset/admin/assets/libs/froala/css/plugins/code_view.css">
  <link rel="stylesheet" href="<?= $df['host']; ?>asset/admin/assets/libs/froala/css/plugins/draggable.css">
  <link rel="stylesheet" href="<?= $df['host']; ?>asset/admin/assets/libs/froala/css/plugins/colors.css">
  <link rel="stylesheet" href="<?= $df['host']; ?>asset/admin/assets/libs/froala/css/plugins/emoticons.css">
  <link rel="stylesheet" href="<?= $df['host']; ?>asset/admin/assets/libs/froala/css/plugins/image_manager.css">
  <link rel="stylesheet" href="<?= $df['host']; ?>asset/admin/assets/libs/froala/css/plugins/image.css">
  <link rel="stylesheet" href="<?= $df['host']; ?>asset/admin/assets/libs/froala/css/plugins/line_breaker.css">
  <link rel="stylesheet" href="<?= $df['host']; ?>asset/admin/assets/libs/froala/css/plugins/table.css">
  <link rel="stylesheet" href="<?= $df['host']; ?>asset/admin/assets/libs/froala/css/plugins/char_counter.css">
  <link rel="stylesheet" href="<?= $df['host']; ?>asset/admin/assets/libs/froala/css/plugins/video.css">
  <link rel="stylesheet" href="<?= $df['host']; ?>asset/admin/assets/libs/froala/css/plugins/fullscreen.css">
  <link rel="stylesheet" href="<?= $df['host']; ?>asset/admin/assets/libs/froala/css/plugins/file.css">
  <link rel="stylesheet" href="<?= $df['host']; ?>asset/admin/assets/libs/froala/css/plugins/quick_insert.css">
  <link rel="stylesheet" href="<?= $df['host']; ?>asset/admin/assets/libs/froala/css/plugins/help.css">
  <link rel="stylesheet" href="<?= $df['host']; ?>asset/admin/assets/libs/froala/css/third_party/spell_checker.css">
  <link rel="stylesheet" href="<?= $df['host']; ?>asset/admin/assets/libs/froala/css/plugins/special_characters.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">

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
            <form method="POST" action="" class="card">
              <div class="card-body">
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 text-right control-label col-form-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" maxlength="150" autocomplete="off" required value="<?= $isi_nama; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="username" class="col-sm-3 text-right control-label col-form-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" maxlength="150" autocomplete="off" required value="<?= $isi_username; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-sm-3 text-right control-label col-form-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" maxlength="150" autocomplete="off" required value="<?= $isi_password; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="akses" class="col-sm-3 text-right control-label col-form-label">Akses</label>
                  <div class="col-sm-5">
                    <select name="akses" id="akses" class="form-control custom-select">
                      <option <?php if ($isi_akses == 'User') {
                                echo "selected";
                              } ?>>User</option>
                      <option <?php if ($isi_akses == 'Admin') {
                                echo "selected";
                              } ?>>Admin</option>
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <select name="act" id="act" class="form-control custom-select">
                      <option value="Y" <?php if ($isi_act == 'Y') {
                                          echo "selected";
                                        } ?>>Aktif</option>
                      <option value="N" <?php if ($isi_act == 'N') {
                                          echo "selected";
                                        } ?>>Tiduk Aktif</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="card-footer border-top text-right">
                <button type="submit" name="Simpan" class="btn btn-info">Simpan</button>
              </div>
            </form>
          </div>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>user</th>
                        <th>akses</th>
                        <th>Act</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = mysqli_query($conn, "SELECT * FROM usr WHERE usr!='$_SESSION[username]'");
                      for ($i = 1; $Data = mysqli_fetch_array($sql); $i++) { ?>
                        <tr>
                          <td><?= $Data['nm_user']; ?></td>
                          <td><?= $Data['usr']; ?></td>
                          <td><?= $Data['akses']; ?></td>
                          <td>
                            <a href="<?= $df['host'] . 'admin/user/update-' . $Data['usr']; ?>" class="btn btn-sm btn-info">Update</a>
                            <a href="<?= $df['host'] . 'admin/user/delete-' . $Data['usr']; ?>" class="btn btn-sm btn-danger">Delete</a>
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
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/froala_editor.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/align.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/char_counter.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/code_beautifier.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/code_view.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/colors.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/draggable.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/emoticons.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/entities.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/file.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/font_size.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/font_family.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/fullscreen.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/image.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/image_manager.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/line_breaker.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/inline_style.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/link.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/lists.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/paragraph_format.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/paragraph_style.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/quick_insert.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/quote.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/table.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/save.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/url.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/video.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/help.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/print.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/third_party/spell_checker.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/special_characters.min.js"></script>
  <script type="text/javascript" src="<?= $df['host']; ?>asset/admin/assets/libs/froala/js/plugins/word_paste.min.js"></script>
  <script type="text/javascript">
    $(function() {

      new FroalaEditor('#isi', {
        keepFormatOnDelete: true,
        quickInsertTags: []
      });
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