<?php
  session_start();
  require_once('../config/config.php');
  $metaTitle = 'Add New User';
  $metaDesc = '';

  if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $name = $_POST['name'];
    $nup = $_POST['nup'];
    $role = $_POST['role'];
    $password = MD5('12345');

    $query = mysqli_query($conn, "INSERT INTO tbl_admin(username, name, role, nup, password) VALUES('$username', '$name', '$role', '$nup', '$password')") or die("Error description: " . mysqli_error($conn));

    $_SESSION['success'] = 'Added';
    header('Location: user_list.php');
  }

  
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
            <input type="text" name="name" class="form-control" placeholder="Name" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 text-right control-label col-form-label">Username</label>
          <div class="col-sm-9">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 text-right control-label col-form-label">NUP</label>
          <div class="col-sm-9">
            <input type="text" name="nup" class="form-control" placeholder="NUP" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 text-right control-label col-form-label">NUP</label>
          <div class="col-sm-9">
            <select name="role" class="form-control" required>
              <option value="">---</option>
              <option value="Admin">Admin</option>
              <option value="Super Admin">Super Admin</option>
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