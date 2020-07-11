<?php
include "koneksi.php";
$idd="";
$nd=$_POST['nd'];
$np=$_POST['np'];
$un=$_POST['un'];
$pass=$_POST['pas'];
$em=$_POST['email'];
$query=mysql_query("INSERT INTO devisi (id_devisi,nama_devisi,nama_lengkap,username,password,email) VALUES ('$idd','$nd','$np','$un','$pass','$em')");

if (!preg_match("/^[a-zA-Z ]*$/",$np)) {
  echo"<script>window.alert('Nama hanya berisi huruf dan spasi!');self.history.back();</script>";
}else{

if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
  echo"<script>window.alert('Format email tidak sesuai!');self.history.back();</script>";
}else{
if ($query) {
	echo"<script>window.alert('Data berhasil disimpan');window.location=('inputd.php');</script>";
}else{
	echo"<script>window.alert('Gagal input user!');self.history.back();</script>";
	echo mysql_error();
}
}//email
}//nama
?>