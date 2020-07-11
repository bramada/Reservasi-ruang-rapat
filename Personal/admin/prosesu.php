<?php
include "koneksi.php";
$idu="";
$nl=$_POST['nl'];
$un=$_POST['un'];
$pass=$_POST['pas'];
$lev=$_POST['level'];
$query=mysql_query("INSERT INTO user (id_user,nama_lengkap,username,password,level) VALUES ('$idu','$nl','$un','$pass','$lev')");
if ($query) {
	echo"<script>window.alert('Data berhasil disimpan');window.location=('inputu.php');</script>";
}else{
	echo"<script>window.alert('Gagal input user!');self.history.back();</script>";
	echo mysql_error();
}
?>