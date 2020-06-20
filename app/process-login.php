<?php
require_once('config/config.php');

if(isset($_POST['submit'])){
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, md5($_POST['password']));

	$query = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'");
	$num = mysqli_num_rows($query);
	if($num > 0){
		session_start();
		$data = mysqli_fetch_array($query);
		$_SESSION['id'] = $data['id'];
		$_SESSION['username'] = $data['username'];
		$_SESSION['name'] = $data['name'];
		$_SESSION['nup'] = $data['nup'];
		$_SESSION['role'] = $data['role'];

		header("location: page/index.php");
	}else{
		header("location: index.php?msg=error");
	}
}else{
	header("location: index.php?nosubmit");

}

?>