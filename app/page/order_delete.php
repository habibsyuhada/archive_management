<?php
  session_start();
  require_once('../config/config.php');
  $metaTitle = 'Data Users';
  $metaDesc = '';
  date_default_timezone_set('Asia/Jakarta');

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = mysqli_query($conn, "UPDATE t_order SET deleted = 1, date_deleted = '".date('Y-m-d H:i:s')."', notif = 1 WHERE id = '$id'") or die("Error description: " . mysqli_error($conn));
    
    $_SESSION['success'] = 'Deleted';
    header('Location: order_list.php');
  }
  else{
    header('Location: order_list.php');
  }
?>