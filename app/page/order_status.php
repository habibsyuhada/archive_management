<?php
  session_start();
  require_once('../config/config.php');
  $metaTitle = 'Data Users';
  $metaDesc = '';

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $status = $_GET['s'];
    date_default_timezone_set('Asia/Jakarta');

    if($status == 'Booking'){
      $date = 'date_booking';
      $link = 'order_list.php?pending';

      $query = mysqli_query($conn, "UPDATE t_order SET status = '$status', notif = 1, $date='".date('Y-m-d H:i:s')."'  WHERE id = '$id'") or die("Error description: " . mysqli_error($conn));

      $_SESSION['success'] = $status;
    }
    elseif($status == 'Pending'){
      $date = 'date_pending';
      $link = 'order_list.php?booking';

      $query = mysqli_query($conn, "UPDATE t_order SET status = '$status', notif = 1, $date='".date('Y-m-d H:i:s')."'  WHERE id = '$id'") or die("Error description: " . mysqli_error($conn));

      $_SESSION['success'] = $status;
    }
    elseif($status == 'Received'){
      $material_id = $_GET['m'];
      $qty = $_GET['q'];
      $date = 'date_receive';
      $link = 'order_list.php?booking';

      $query = mysqli_query($conn, "SELECT * FROM t_material WHERE id = '$material_id'") or die("Error description: " . mysqli_error($conn));
      $material = mysqli_fetch_array($query);
      if($material['qty'] > $qty){
        $qty_mat = $material['qty'] - $qty;
        $query = mysqli_query($conn, "UPDATE t_material SET qty = $qty_mat WHERE id = '$material_id'") or die("Error description: " . mysqli_error($conn));
        $query = mysqli_query($conn, "UPDATE t_order SET status = '$status', $date='".date('Y-m-d H:i:s')."'  WHERE id = '$id'") or die("Error description: " . mysqli_error($conn));
        $_SESSION['success'] = $status;
      }
      else{
        $_SESSION['error'] = 'Qty Material Not Enough For This Order.';
      }
      return false;
      
    }
    
    header('Location: '.(isset($link) ? $link : 'order_list.php'));
  }
  else{
    header('Location: order_list.php');
  }
?>