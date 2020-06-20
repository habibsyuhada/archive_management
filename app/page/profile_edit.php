<?php
  session_start();
  require_once('../config/config.php');
  $metaTitle = 'Data Users';
  $metaDesc = '';

  if(isset($_POST['change_pass'])){
    $old_password = MD5($_POST['old_password']);
    $new_password = MD5($_POST['new_password']);
    $re_password = MD5($_POST['re_password']);
    $username = $_SESSION['username'];

    $query = mysqli_query($conn, "SELECT * FROM t_user WHERE username = '$username' AND password = '$old_password'");
    $num = mysqli_num_rows($query);
    if($num > 0){
      if($new_password == $re_password){
        $query = mysqli_query($conn, "UPDATE t_user SET password = '$new_password'") or die("Error description: " . mysqli_error($conn));
        $_SESSION['success'] = 'Updated';
      }
      else{
        $_SESSION['danger'] = 'New password not same';
      }
    }
    else{
      $_SESSION['danger'] = 'Wrong old password';
    }
  }

  if(isset($_POST['change_pic'])){
    // get details of the uploaded file
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    $newFileName = $_SESSION['id'].'-'.date('ymd hms').'.'.$fileExtension;

    $allowedfileExtensions = array('jpg', 'gif', 'png');
    if (in_array($fileExtension, $allowedfileExtensions)) {
      if ($fileSize < 500000) {
        $uploadFileDir = '../user_pic/';
        $dest_path = $uploadFileDir . $newFileName;
         
        if(move_uploaded_file($fileTmpPath, $dest_path)){
          $query = mysqli_query($conn, "UPDATE t_user SET picture = '$newFileName'") or die("Error description: " . mysqli_error($conn));
          $_SESSION['picture'] = $newFileName;
          $_SESSION['success'] = 'Updated';
        }
        else{
          $_SESSION['danger'] = 'Error';
        }
      }
      else{
        $_SESSION['danger'] = 'Your file size is too big.';
      }
    }
    else{
      $_SESSION['danger'] = 'Extension should be .jpg or .png';
    }
  }
?>
<?php include('../header.php'); ?>
<?php include('../topbar.php'); ?>
<?php include('../sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $metaTitle ?>
        <small><?php echo $metaDesc ?></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <?php if(isset($_SESSION['success'])): ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        Your data have been <?php echo $_SESSION['success'] ?>.
      </div>
    <?php endif; unset($_SESSION['success']); ?>

    <?php if(isset($_SESSION['danger'])): ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        <?php echo $_SESSION['danger'] ?>.
      </div>
    <?php endif; unset($_SESSION['danger']); ?>

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Change Password</h3>
            </div>
            <!-- /.box-header -->
            <form class="form-horizontal" method="POST">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Old Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="old_password" placeholder="Old Password">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">New Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="new_password" placeholder="New Password">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Re-Type New Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="re_password" placeholder="Re-Type New Password">
                </div>
              </div>
            </div>
            <div class="box-footer text-right">
              <a href="user_list.php" class="btn btn-flat btn-default"><i class="fa fa-close"></i> Cancel</a>
              <button type="submit" name="change_pass" class="btn btn-flat btn-success"><i class="fa fa-check"></i> Save</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Change Photo Profile</h3>
            </div>
            <!-- /.box-header -->
            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Old Password</label>
                <div class="col-sm-10">
                  <img src="../user_pic/<?php echo $_SESSION['picture'] ?>" height="100px">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Upload</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="file" placeholder="New Password">
                </div>
              </div>
            </div>
            <div class="box-footer text-right">
              <a href="user_list.php" class="btn btn-flat btn-default"><i class="fa fa-close"></i> Cancel</a>
              <button type="submit" name="change_pic" class="btn btn-flat btn-success"><i class="fa fa-check"></i> Save</button>
            </div>
            </form>
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">Scheneider Electric Manufacturing Batam</a>.</strong> All rights reserved.
  </footer>
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
<?php include('../footer.php'); ?>
</body>
</html>