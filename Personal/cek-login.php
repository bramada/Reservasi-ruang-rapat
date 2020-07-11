<?php
include 'koneksi.php';
if(isset($_POST['log'])) {
	$user = mysql_real_escape_string($_POST['user']);
	$pass = mysql_real_escape_string($_POST['pass']); 
	$sql = mysql_query("SELECT * FROM user where username='$user' and password='$pass'");
	$data = mysql_fetch_array($sql);
	$username = $data['username'];
	$password = $data['password'];
	$level = $data['level'];
	

	if ($user==$username && $pass==$password) {
		session_start();
		$_SESSION['username']=$username;
		$_SESSION['level']=$level;
		if ($level=='admin') {
			echo "<script>alert('Anda login sebagai : $level');</script>";
			echo "<meta http-equiv='refresh' content='0; url=admin/index.php'>";
		}
		else {
			echo "<script>alert('Anda login sebagai : $level');</script>";
			echo "<meta http-equiv='refresh' content='0; url=user/index.php'>";
	
		}
	} else {
			echo "<meta http-equiv='refresh' content='0; url=index.php'>";
			echo "<script>alert('Username dan password salah, Silahkan login ulang !');</script>";
	}
	
	
}

?>