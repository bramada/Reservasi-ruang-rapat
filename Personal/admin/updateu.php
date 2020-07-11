<html>
<head>
<title>EDIT DATA USER</title>
<link rel="stylesheet" href="../css/all.css" type="text/css" />
</head>
<body class="bgr">
<div id="header">
</div>
<?php include "menu.php"; ?>
<div id="wrapper">
<div id="content">
<div id="title">
<center><font size="5" face="arial" color="white">EDIT DATA USER</font>
</div>
<?php
	include "koneksi.php";
	$idu=$_GET['idu'];
	$query=mysql_query("SELECT * FROM user WHERE id_user='$idu'");
?>
	<form action=saveu.php method=post>
	<center>
	<table class="input">
		<?php
			while ($row=mysql_fetch_array($query)){
		?>
			<input type=hidden name=idu value="<?php echo $idu;?>"/>
			<tr>
				<td>Nama</td>
				<td><input type=text name=nama value="<?php echo $row['nama_lengkap'];?>"/></td>
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
				<td>Group User</td>
				<td>
				<select name="level">
     			<option value="<?php echo $row['level'];?>"></option>
      			<option value="admin">Administrator</option>
      			<option value="user">User</option>                    
     			</select>
    		</td>
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