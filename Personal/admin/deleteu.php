<?php
include "koneksi.php";
$idu=$_GET['idu'];
$query=mysql_query("DELETE FROM user WHERE id_user='$idu'");
if($query){
		?><script language="javascript">document.location.href="tabelu.php";</script><?php
}else{
	echo "<script>window.alert('Gagal hapus data!');window.location=('tabelu.php');</script>";
}
?>