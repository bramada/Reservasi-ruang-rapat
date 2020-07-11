<?php
include "koneksi.php";
$idp=$_GET['idp'];
$query=mysql_query("DELETE FROM pesan_ruang WHERE id_pesan='$idp'");
if($query){
		?><script language="javascript">document.location.href="tabel_ruang3.php";</script><?php
}else{
	echo "<script>window.alert('Gagal hapus data!');window.location=('tabel_ruang3.php');</script>";
}
?>