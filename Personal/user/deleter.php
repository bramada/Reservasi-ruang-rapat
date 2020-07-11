<?php
include "koneksi.php";
$idr=$_GET['idr'];
$query=mysql_query("DELETE FROM ruang WHERE id_ruang='$idr'");
if($query){
		?><script language="javascript">document.location.href="tabelr.php";</script><?php
}else{
	echo "<script>window.alert('Gagal hapus data!');window.location=('tabelr.php');</script>";
}
?>