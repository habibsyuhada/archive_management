<?php
$cekdata = mysqli_query($conn, "SELECT * FROM login WHERE username LIKE '$_SESSION[username]' AND password LIKE '$_SESSION[password]' AND akses LIKE 'user'");
if (mysqli_num_rows($cekdata) <= 0) {
  header("location:" . $df['host'] . "user/logout.php");
}
