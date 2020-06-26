<?php
  session_start();
  require_once('../config/config.php');
  $metaTitle = 'Ubah Data User';

  if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $name = $_POST['name'];
    $nup = $_POST['nup'];
    $role = $_POST['role'];
    $id = $_GET['id'];

    $query = mysqli_query($conn, "UPDATE tbl_admin SET username = '$username', name = '$name', nup = '$nup', role = '$role' WHERE id = $id") or die("Error description: " . mysqli_error($conn));

    $_SESSION['success'] = 'Your Data Has Been Updated';
    // header('Location: user_list.php');
    // exit;
  }

  $id = $_GET['id'];
  $query = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE id = $id");
  $data = mysqli_fetch_array($query);
?>
<?php include('../header.php'); ?>
<?php include('../topbar.php'); ?>
<?php include('../sidebar.php'); ?>
<form method="POST">
  <div class="container-fluid">

    <div class="card">
      <div class="card-body">
        <div class="form-group row">
          <label class="col-sm-3 text-right control-label col-form-label">Name</label>
          <div class="col-sm-9">
            <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $data['name'] ?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 text-right control-label col-form-label">Username</label>
          <div class="col-sm-9">
            <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $data['username'] ?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 text-right control-label col-form-label">NUP</label>
          <div class="col-sm-9">
            <input type="text" name="nup" class="form-control" placeholder="NUP" value="<?php echo $data['nup'] ?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 text-right control-label col-form-label">NUP</label>
          <div class="col-sm-9">
            <select name="role" class="form-control" required>
              <option value="">---</option>
              <option value="Admin" <?php echo ($data['role'] == 'Admin' ? 'selected': '') ?>>Admin</option>
              <option value="Super Admin" <?php echo ($data['role'] == 'Super Admin' ? 'selected': '') ?>>Super Admin</option>
            </select>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <a href="user_list.php" class="btn btn-secondary text-white mx-1 float-right"><i class="fa fa-times"></i> Cancel</a>
        <button name="submit" class="btn btn-success float-right"><i class="fa fa-check"></i> Submit</button>
      </div>
    </div>

  </div>
</form>

<?php include('../footer.php'); ?>