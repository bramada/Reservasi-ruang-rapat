<?php
	include "koneksi.php";
	$idd=$_POST['idd'];
	$nd=$_POST['nd'];
	$np=$_POST['np'];
	$un=$_POST['un'];
	$pass=$_POST['pas'];
	$em=$_POST['email'];

	$query=mysql_query("UPDATE devisi SET nama_devisi='$nd',nama_lengkap='$np',username='$un',password='$pass',email='$em' WHERE id_devisi='$idd'");
	if ($query) {
		echo"<script>window.alert('Berhasil update data');window.location=('tabeld.php');</script>";
	}else{
		echo mysql_error();
	}
?>