<?php
include "koneksi.php";
$idd=$_GET['idd'];
$query=mysql_query("DELETE FROM devisi WHERE id_devisi='$idd'");
if($query){
		?><script language="javascript">document.location.href="tabeld.php";</script><?php
}else{
	echo "<script>window.alert('Gagal hapus data!');window.location=('tabeld.php');</script>";
}
?>