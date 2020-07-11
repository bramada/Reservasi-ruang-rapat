<?php
	include "koneksi.php";
	$idr=$_POST['idr'];
	$n=$_POST['nama'];
	$k=$_POST['kap'];

	$query=mysql_query("UPDATE ruang SET nama_ruang='$n',kapasitas='$k' WHERE id_ruang='$idr'");
	if ($query) {
		echo"<script>window.alert('Berhasil update data');window.location=('tabelr.php');</script>";
	}else{
		echo mysql_error();
	}
?>