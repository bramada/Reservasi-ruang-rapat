<?php
	include "koneksi.php";
	$idu=$_POST['idu'];
	$nl=$_POST['nama'];
	$un=$_POST['un'];
	$pass=$_POST['pas'];
	$lev=$_POST['level'];

	$query=mysql_query("UPDATE user SET nama_lengkap='$nl',username='$un',password='$pass',level='$lev' WHERE id_user='$idu'");
	if ($query) {
		echo"<script>window.alert('Berhasil update data');window.location=('tabelu.php');</script>";
	}else{
		echo mysql_error();
	}
?>