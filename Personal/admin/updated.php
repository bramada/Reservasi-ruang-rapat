<html>
<head>
<title>EDIT DATA DEVISI</title>
<link rel="stylesheet" href="../css/all.css" type="text/css" />
</head>
<body class="bgr">
<div id="header">
</div>
<?php include "menu.php"; ?>
<div id="wrapper">
<div id="content">
<div id="title">
<center><font size="5" face="arial" color="white">EDIT DATA DEVISI</font>
</div>
<?php
	include "koneksi.php";
	$idd=$_GET['idd'];
	$query=mysql_query("SELECT * FROM devisi WHERE id_devisi='$idd'");
?>
	<form action=saved.php method=post>
	<center>
	<table class="input">
		<?php
			while ($row=mysql_fetch_array($query)){
		?>
			<input type=hidden name=idd value="<?php echo $idd;?>"/>
			<tr>
				<td>Nama Devisi</td>
				<td><input type=text name=nd value="<?php echo $row['nama_devisi'];?>"/></td>
			</tr>
			<tr>
				<td>Nama Pimpinan</td>
				<td><input type=text name=np value="<?php echo $row['nama_lengkap'];?>"/></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type=text name=un value="<?php echo $row['username'];?>"/></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type=text name=pas value="<?php echo $row['password'];?>"/></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type=text name=email value="<?php echo $row['email'];?>"/></td>
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