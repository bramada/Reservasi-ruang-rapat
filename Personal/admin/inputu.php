<html>
<head>
	<title>INPUT USER</title>
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
<center><font size="5" face="arial" color="white">INPUT DATA USER</font>
</div>
<form action="prosesu.php" method="post">
<center>
<table class="input">
<tr>
	<td>Nama Lengkap User</td>
	<td><input type="text" name="nl" size="20"></td>
</tr>
<tr>
	<td>Username</td>
	<td><input type=text name=un size=20></td>
</tr>
<tr>
	<td>Password</td>
	<td><input type=text name=pas size=10></td>
<tr>
<tr>
	<td>Group User</td>
     <td><select name="level">
      <option></option>
      <option value="admin">Administrator</option>
      <option value="user">User</option>                    
      </select>
    </td>
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