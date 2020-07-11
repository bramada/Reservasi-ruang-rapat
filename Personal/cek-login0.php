<?php
include 'koneksi.php';
if(isset($_POST['log0'])) {
	$user0 = mysql_real_escape_string($_POST['user0']);
	$pass0 = mysql_real_escape_string($_POST['pass0']); 
	$sql = mysql_query("SELECT * FROM devisi where username='$user0' and password='$pass0'");
	$data = mysql_fetch_array($sql);
	$username0 = $data['username'];
	$password0 = $data['password'];
	$nama = $data['nama_lengkap'];
	$devisi = $data['nama_devisi'];
	$email = $data['email'];
	
	if ($user0==$username0 && $pass0==$password0) {
		session_start();
		$_SESSION['username0']=$username0;
		$_SESSION['nama'] = $nama;
		$_SESSION['devisi'] = $devisi;
		$_SESSION['email'] = $email;

		echo "<script>alert('Anda login sebagai : $username0');</script>";
		echo "<meta http-equiv='refresh' content='0; url=home.php'>";
		
	} else {
			echo "<meta http-equiv='refresh' content='0; url=index.php'>";
			echo "<script>alert('Username dan password salah, Silahkan login ulang !');</script>";
	}
	
	
}

?>