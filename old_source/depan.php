<?php
$backurl = './';
require_once($backurl . 'config/conn.php');
$jenisalert = NULL;
$iconalert = NULL;
$headalert = NULL;
$isialert = NULL;

function anti_injection($sasdsa, $data)
{
  $hasilnya = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
  $filter = mysqli_real_escape_string($sasdsa, $hasilnya);
  return $filter;
}

if (isset($_POST["login"])) {
  $username = anti_injection($conn, $_POST["username"]);
  $pass     = anti_injection($conn, md5($_POST["password"]));
  if (!$username or !$pass) { } else {
    $login = mysqli_query($conn, "SELECT * FROM login WHERE username LIKE '$username' AND password LIKE '$pass'");
    $ketemu = mysqli_num_rows($login);
    if ($ketemu > 0) {
      $r = mysqli_fetch_array($login);
      session_start();
      $_SESSION["username"] = $r["username"];
      $_SESSION["password"] = $pass;
      if ($r["akses"] == 'admin') {
        header('location:./admin/');
      } else if ($r["akses"] == 'user') {
        header('location:./user/');
      }
    } else {
      $jenisalert = 'alert-danger';
      $iconalert = 'fa-ban';
      $headalert = 'Warning!';
      $isialert = 'Username / Password Salah!';
    }
  }
}

?>
<!DOCTYPE html>
<html dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="shortcut icon" href="<?= $df['host']; ?>asset/img/ico.png">
  <title>Login - PT PERSERO BATAM</title>
  <!-- Custom CSS -->
  <link href="<?= $df['host']; ?>asset/admin/dist/css/style.min.css" rel="stylesheet">
</head>

<body>
  <div class="main-wrapper">
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
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
      <div class="auth-box bg-dark border-top border-secondary">
        <div id="loginform">
          <div class="text-center p-t-20 p-b-20">
            <span class="db xx">Unit Legal<br><b> PT. PERSERO BATAM</b></span>
          </div>
          <?php if ($jenisalert != NULL && $iconalert != NULL && $headalert != NULL && $isialert != NULL) { ?>
            <div class="alert <?= $jenisalert; ?> alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa <?= $iconalert; ?>"></i> <?= $headalert; ?></h4>
              <?= $isialert; ?>
            </div>
          <?php } ?>
          <form class="form-horizontal m-t-20" id="loginform" method="POST" action="">
            <div class="row p-b-30">
              <div class="col-12">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                  </div>
                  <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required="">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                  </div>
                  <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required="">
                </div>
              </div>
            </div>
            <div class="row border-top border-secondary">
              <div class="col-12">
                <div class="form-group">
                  <div class="p-t-20">
                    <button type="submit" name="login" class="btn btn-success float-right">Login</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
          </form>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- Login box.scss -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper scss in scafholding.scss -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper scss in scafholding.scss -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Right Sidebar -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Right Sidebar -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="<?= $df['host']; ?>asset/admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= $df['host']; ?>asset/admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= $df['host']; ?>asset/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
      $('[data-toggle="tooltip"]').tooltip();
      $(".preloader").fadeOut();
    </script>

</body>

</html>