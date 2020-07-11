<html>
<head>
	<title>INPUT DEVISI</title>
<link rel="stylesheet" href="../css/all.css" type="text/css" />
</head>
</head>
<body class="bgr">
<div id="header">
</div>
<?php include "menu.php"; ?>
<div id="wrapper">
<div id="content">
<div id="title">
<center><font size="5" face="arial" color="white">INPUT DATA DEVISI</font>
</div>
<form action="prosesd.php" method="post">
<center>
<table class="input">
<tr>
	<td>Nama Devisi</td>
	<td><input type="text" name="nd" size="30"></td>
</tr>
<tr>
	<td>Nama Pimpian</td>
	<td><input type="text" name="np" size="30"></td>
</tr>
<tr>
	<td>Username</td>
	<td><input type=text name=un size=15></td>
</tr>
<tr>
	<td>Password</td>
	<td><input type=text name=pas size=8></td>
</tr>
<tr>
	<td>Email</td>
	<td><input type=text name=email size=30></td>
</tr>
</table>
<br>
<input type="submit" name="proses" value="PROSES" class="TOMBOL2">  <input type="reset" value="RESET" class="TOMBOL3">
<Br>
</div>
</div>
</form>
</body>
</html>