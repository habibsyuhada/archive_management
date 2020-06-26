<?php
if(!isset($_SESSION['id'])){
  header("location: ../index.php");
}
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'indah';

$conn = mysqli_connect($server,$user,$pass,$db) or die('Connect Error: ' . mysqli_connect_error());
?>