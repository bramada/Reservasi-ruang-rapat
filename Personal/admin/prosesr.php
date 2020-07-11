<?php
include "koneksi.php";
$idr="";
$n=$_POST['nama'];
$k=$_POST['kap'];
$query=mysql_query("INSERT INTO ruang (id_ruang,nama_ruang,kapasitas) VALUES ('$idr','$n','$k')");
if ($query) {
	echo"<script>window.alert('Data berhasil disimpan');window.location=('inputr.php');</script>";
}else{
	echo"<script>window.alert('Gagal input user!');self.history.back();</script>";
	echo mysql_error();
}
?>