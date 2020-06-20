<?php
  session_start();
  require_once('../config/config.php');
  $metaTitle = 'Data Materials';
  $metaDesc = '';
  $query = mysqli_query($conn, "SELECT * FROM t_material") or die("Error description: " . mysqli_error($conn));

  if(isset($_POST['submit'])){
    $material = $_POST['material'];
    $qty = $_POST['qty'];
    $order_by = $_SESSION['id'];
    $status = 'Pending';

    $query = mysqli_query($conn, "INSERT INTO t_order(order_by, material, qty, status) VALUES('$order_by', '$material', '$qty', '$status')") or die("Error description: " . mysqli_error($conn));
    print_r($query);

    $_SESSION['success'] = 'Added';
    header('Location: order_list.php');
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
                  <select class="select2 form-control" name="material" onChange="get_data_material(this)">
                    <option>Choose One</option>
                    <?php
                      if(isset($_GET['id'])):
                        $material = $_GET['id'];
                    ?>
                    <?php 
                      while($data = mysqli_fetch_array($query)): 
                        $text = '';
                        if($material == $data['id']){
                          $material = $data;
                          $text = 'selected';
                        }
                    ?>
                      <option <?php echo $text; ?> data-desc="<?php echo $data['material_description'] ?>" data-unit="<?php echo $data['unit'] ?>" value="<?php echo $data['id'] ?>"><?php echo $data['material'] ?></option>
                    <?php endwhile; ?>
                    <?php else: ?>
                    <?php while($data = mysqli_fetch_array($query)): ?>
                      <option data-desc="<?php echo $data['material_description'] ?>" data-unit="<?php echo $data['unit'] ?>" value="<?php echo $data['id'] ?>"><?php echo $data['material'] ?></option>
                    <?php endwhile; ?>
                    <?php endif; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Material Description</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="material_description" placeholder="Material Description" value="<?php echo(isset($material) ? $material['material_description'] : '') ?>" readonly>
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
                  <input type="text" class="form-control" name="unit" placeholder="Unit" value="<?php echo(isset($material) ? $material['unit'] : '') ?>" readonly>
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
<script type="text/javascript">
  function get_data_material(btn){
    console.log($(btn).val());
    console.log($(btn).find(':selected').data('desc'));
    console.log($(btn).find(':selected').data('unit'));

    var desc = $(btn).find(':selected').data('desc')
    var unit = $(btn).find(':selected').data('unit')
    $('input[name=material_description]').val(desc);
    $('input[name=unit]').val(unit);
  }
</script>
</body>
</html>