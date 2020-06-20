<?php
  session_start();
  require_once('../config/config.php');
  $metaTitle = 'Data Materials';
  $metaDesc = '';

  if(isset($_POST['submit'])){
    $material = $_POST['material'];
    $material_description = $_POST['material_description'];
    $qty = $_POST['qty'];
    $unit = $_POST['unit'];

    $query = mysqli_query($conn, "INSERT INTO t_material(material, material_description, qty, unit) VALUES('$material', '$material_description', '$qty', '$unit')") or die("Error description: " . mysqli_error($conn));

    $_SESSION['success'] = 'Added';
    header('Location: material_list.php');
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

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <!-- <div class="box-header">
              <h3 class="box-title"></h3>
            </div> -->
            <!-- /.box-header -->
            <form class="form-horizontal" method="POST">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Material</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="material" placeholder="Material">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Material Description</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="material_description" placeholder="Material Description">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Qty</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="qty" placeholder="Qty">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Unit</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="unit" placeholder="Unit">
                </div>
              </div>
            </div>
            <div class="box-footer text-right">
              <a href="material_list.php" class="btn btn-flat btn-default"><i class="fa fa-close"></i> Cancel</a>
              <button type="submit" name="submit" class="btn btn-flat btn-success"><i class="fa fa-check"></i> Save</button>
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