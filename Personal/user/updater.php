<html>
<head>
<title>EDIT DATA RUANG</title>
<link rel="stylesheet" href="../css/all.css" type="text/css" />
</head>
<body class="bgr">
<div id="header">
</div>
<?php include "menu.php"; ?>
<div id="wrapper">
<div id="content">
<div id="title">
<center><font size="5" face="arial" color="white">EDIT DATA RUANG</font>
</div>
<?php
	include "koneksi.php";
	$idr=$_GET['idr'];
	$query=mysql_query("SELECT * FROM ruang WHERE id_ruang='$idr'");
?>
	<form action=saver.php method=post>
	<center>
	<table class="input">
		<?php
			while ($row=mysql_fetch_array($query)){
		?>
			<input type=hidden name=idr value="<?php echo $idr;?>"/>
			<tr>
				<td>Nama Ruang</td>
				<td><input type=text name=nama value="<?php echo $row['nama_ruang'];?>"/></td>
			</tr>
			<tr>
				<td>Kapasitas</td>
				<td><input type=text name=kap value="<?php echo $row['kapasitas'];?>"/></td>
			</tr>
			
			<?php
			}
			?>
	</table>
	<br>
	<input type=submit value=SIMPAN class="TOMBOL2">  <input type="button" value="BATAL" onClick="self.history.back()" class="TOMBOL3">
	<BR>
</div>
</div>
</form>
</body>
</html>