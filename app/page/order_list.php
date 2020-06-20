<?php
  session_start();
  require_once('../config/config.php');
  $metaTitle = 'Data Order List';
  $metaDesc = '';

  if(isset($_GET['notif'])){
    mysqli_query($conn, "UPDATE v_order_list SET notif = 0 WHERE order_by = '".$_SESSION['id']."'") or die("Error description: " . mysqli_error($conn));
    if(key($_GET) == 'rejected' || key($_GET) == 'pending' || key($_GET) == 'booking'){
      header("Location: order_list.php?".key($_GET));
    }
    else{
      header("Location: order_list.php");
    }
  }
  if($_SESSION['role'] == 'User'){
    $query0 = mysqli_query($conn, "SELECT * FROM v_order_list WHERE deleted = '1' AND order_by = '".$_SESSION['id']."' ORDER BY date_deleted ASC") or die("Error description: " . mysqli_error($conn));
    $query1 = mysqli_query($conn, "SELECT * FROM v_order_list WHERE status = 'Pending' AND order_by = '".$_SESSION['id']."' AND deleted = 0 ORDER BY date_pending ASC") or die("Error description: " . mysqli_error($conn));
    $query2 = mysqli_query($conn, "SELECT * FROM v_order_list WHERE status = 'Booking' AND order_by = '".$_SESSION['id']."' AND deleted = 0 ORDER BY date_booking ASC") or die("Error description: " . mysqli_error($conn));
    $query3 = mysqli_query($conn, "SELECT * FROM v_order_list WHERE status = 'Received' AND order_by = '".$_SESSION['id']."' AND deleted = 0 ORDER BY date_receive DESC LIMIT 100") or die("Error description: " . mysqli_error($conn));
  }
  else{
    $query0 = mysqli_query($conn, "SELECT * FROM v_order_list WHERE deleted = '1' ORDER BY date_deleted ASC") or die("Error description: " . mysqli_error($conn));
    $query1 = mysqli_query($conn, "SELECT * FROM v_order_list WHERE status = 'Pending' AND deleted = 0 ORDER BY date_pending ASC") or die("Error description: " . mysqli_error($conn));
    $query2 = mysqli_query($conn, "SELECT * FROM v_order_list WHERE status = 'Booking' AND deleted = 0 ORDER BY date_booking ASC") or die("Error description: " . mysqli_error($conn));
    $query3 = mysqli_query($conn, "SELECT * FROM v_order_list WHERE status = 'Received' AND deleted = 0 ORDER BY date_receive DESC LIMIT 100") or die("Error description: " . mysqli_error($conn));
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

    <?php if(isset($_SESSION['error'])): ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h4><i class="icon fa fa-times"></i> Error!</h4>
        <?php echo $_SESSION['error'] ?>.
      </div>
    <?php endif; unset($_SESSION['success']); ?>

      <div class="btn-group btn-group-justified" role="group" aria-label="..." style="background: white">
        <div class="btn-group" role="group" data-target="#myCarousel" data-slide-to="0">
          <button type="button" class="btn bg-black">Order Rejected or Canceled</button>
        </div>
        <div class="btn-group" role="group" data-target="#myCarousel" data-slide-to="1">
          <button type="button" class="btn btn-danger">Order Pending</button>
        </div>
        <div class="btn-group" role="group" data-target="#myCarousel" data-slide-to="2">  
          <button type="button" class="btn btn-warning" >Order Booking</button>
        </div>
        <div class="btn-group" role="group" data-target="#myCarousel" data-slide-to="3">
          <button type="button" class="btn btn-success">Order Received</button>
        </div>
      </div>
      <br>

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <!-- <div class="box-header">
              <h3 class="box-title"></h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
              <div id="myCarousel" class="carousel slide">
                <div class="carousel-inner">

                  <div class="item <?php echo (isset($_GET['rejected']) ? 'active' : '') ?>">
                    <table class="table table-bordered table-hover dataTables text-center">
                      <thead>
                        <tr>
                          <th>Order By</th>
                          <th>Material</th>
                          <th>Material Description</th>
                          <th>Qty</th>
                          <th>Unit</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php while($data = mysqli_fetch_array($query0)): ?>
                        <tr>
                          <td><?php echo $data['name'] ?></td>  
                          <td><?php echo $data['material'] ?></td>  
                          <td><?php echo $data['material_description'] ?></td>  
                          <td><?php echo $data['qty'] ?></td>  
                          <td><?php echo $data['unit'] ?></td>  
                          <td><?php echo $data['date_deleted'] ?></td>  
                        </tr>
                        <?php endwhile; ?>
                      </tbody>
                     </table>
                  </div>

                  <div class="item <?php echo (isset($_GET['pending']) || (!isset($_GET['booking']) && !isset($_GET['received'])) ? 'active' : '') ?>">
                    <table class="table table-bordered table-hover dataTables text-center">
                      <thead>
                        <tr>
                          <th>Order By</th>
                          <th>Material</th>
                          <th>Material Description</th>
                          <th>Qty</th>
                          <th>Unit</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php while($data = mysqli_fetch_array($query1)): ?>
                        <tr>
                          <td><?php echo $data['name'] ?></td>  
                          <td><?php echo $data['material'] ?></td>  
                          <td><?php echo $data['material_description'] ?></td>  
                          <td><?php echo $data['qty'] ?></td>  
                          <td><?php echo $data['unit'] ?></td>  
                          <td><?php echo $data['date_pending'] ?></td>  
                          <td>
                            <?php if($_SESSION['role'] != 'User'): ?>
                              <a href="order_delete.php?id=<?php echo $data['id'] ?>" onclick="return confirm('Are you sure?')" class="btn btn-flat btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                              <a href="order_status.php?id=<?php echo $data['id'] ?>&s=Booking" class="btn btn-flat btn-sm btn-success" title="Booking"><i class="fa fa-book"></i></a>
                            <?php else: ?>
                              <a href="order_delete.php?id=<?php echo $data['id'] ?>" onclick="return confirm('Are you sure?')" class="btn btn-flat btn-sm btn-danger" title="Delete"><i class="fa fa-times"></i></a>
                            <?php endif; ?>
                          </td>  
                        </tr>
                        <?php endwhile; ?>
                      </tbody>
                     </table>
                  </div>

                  <div class="item <?php echo (isset($_GET['booking']) ? 'active' : '') ?>">
                    <table class="table table-bordered table-hover dataTables text-center">
                      <thead>
                        <tr>
                          <th>Order By</th>
                          <th>Material</th>
                          <th>Material Description</th>
                          <th>Qty</th>
                          <th>Unit</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php while($data = mysqli_fetch_array($query2)): ?>
                        <tr>
                          <td><?php echo $data['name'] ?></td>  
                          <td><?php echo $data['material'] ?></td>  
                          <td><?php echo $data['material_description'] ?></td>  
                          <td><?php echo $data['qty'] ?></td>  
                          <td><?php echo $data['unit'] ?></td>  
                          <td><?php echo $data['date_booking'] ?></td>  
                          <td>
                            <?php if($_SESSION['role'] != 'User'): ?>
                            <a href="order_status.php?id=<?php echo $data['id'] ?>&s=Pending" onclick="return confirm('Are you sure?')" class="btn btn-flat btn-sm btn-danger" title="Pending"><i class="fa fa-close"></i></a>
                            <a href="order_status.php?id=<?php echo $data['id'] ?>&s=Received&m=<?php echo $data['material_id'] ?>&q=<?php echo $data['qty'] ?>" class="btn btn-flat btn-sm btn-success" title="Received"><i class="fa fa-check"></i></a>
                            <?php else: ?>
                            <a href="order_delete.php?id=<?php echo $data['id'] ?>" onclick="return confirm('Are you sure?')" class="btn btn-flat btn-sm btn-danger" title="Delete"><i class="fa fa-times"></i></a>
                            <?php endif; ?>
                          </td>  
                        </tr>
                        <?php endwhile; ?>
                      </tbody>
                     </table>
                  </div>

                  <div class="item <?php echo (isset($_GET['received']) ? 'active' : '') ?>">
                    <table class="table table-bordered table-hover dataTables text-center">
                      <thead>
                        <tr>
                          <th>Order By</th>
                          <th>Material</th>
                          <th>Material Description</th>
                          <th>Qty</th>
                          <th>Unit</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php while($data = mysqli_fetch_array($query3)): ?>
                        <tr>
                          <td><?php echo $data['name'] ?></td>  
                          <td><?php echo $data['material'] ?></td>  
                          <td><?php echo $data['material_description'] ?></td>  
                          <td><?php echo $data['qty'] ?></td>  
                          <td><?php echo $data['unit'] ?></td>  
                          <td><?php echo $data['date_receive'] ?></td>   
                        </tr>
                        <?php endwhile; ?>
                      </tbody>
                     </table>
                  </div>
                </div>
              </div>
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