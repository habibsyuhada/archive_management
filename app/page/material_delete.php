<?php
  session_start();
  require_once('../config/config.php');
  $metaTitle = 'Data Materials';
  $metaDesc = '';

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = mysqli_query($conn, "DELETE FROM t_material WHERE id = '$id'") or die("Error description: " . mysqli_error($conn));
    
    $_SESSION['success'] = 'Deleted';
    header('Location: material_list.php');
  }
  else{
    header('Location: material_list.php');
  }
?>