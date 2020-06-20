<?php
  session_start();
  require_once('../config/config.php');
  $metaTitle = 'Data Materials';
  $metaDesc = '';

  $query = mysqli_query($conn, "SELECT * FROM t_material");
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

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <!-- <div class="box-header">
              <h3 class="box-title"></h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
              <?php if($_SESSION['role'] == 'Admin'): ?>
              <a href="material_add.php" class="btn btn-flat btn-primary"><i class="fa fa-plus"></i> Add New User</a>
              <?php endif; ?>
              <table class="table table-bordered table-hover dataTables text-center">
                <thead>
                  <tr>
                    <th>Material</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($data = mysqli_fetch_array($query)): ?>
                  <tr>
                    <td><?php echo $data['material'] ?></td>  
                    <td><?php echo $data['material_description'] ?></td>  
                    <td><?php echo $data['qty'] ?></td>  
                    <td><?php echo $data['unit'] ?></td>  
                    <td>
                      <?php if($_SESSION['role'] == 'User'): ?>
                      <a href="order_add.php?id=<?php echo $data['id'] ?>" class="btn btn-flat btn-sm btn-success"><i class="fa fa-book"></i></a>
                      <?php elseif($_SESSION['role'] == 'Staff'): ?>
                      <a href="material_edit.php?id=<?php echo $data['id'] ?>" class="btn btn-flat btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                      <?php elseif($_SESSION['role'] == 'Admin'): ?>
                      <a href="material_edit.php?id=<?php echo $data['id'] ?>" class="btn btn-flat btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                      <a href="material_delete.php?id=<?php echo $data['id'] ?>" onclick="return confirm('Are you sure?')" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                      <?php endif; ?>
                    </td>  
                  </tr>
                  <?php endwhile; ?>
                </tbody>
               </table>

            </div>
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