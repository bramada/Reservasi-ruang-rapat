<html>
<head>
	<title>INPUT RUANG</title>
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
<center><font size="5" face="arial" color="white">INPUT DATA RUANG</font>
</div>
<form action="prosesr.php" method="post">
<center>
<table class="input">
<tr>
	<td>Nama Ruang</td>
	<td><input type="text" name="nama" size="20"></td>
</tr>
<tr>
	<td>Kapasitas</td>
	<td><input type=text name=kap size=5></td>
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