<html>
<head>
<title>DATA USER</title>
<link rel="stylesheet" href="../css/all.css" type="text/css" />
</head>
<body class="bgr">
<div id="header">
</div>
<?php include "menu.php"; ?>
<div id="wrapper">
<div id="content">
<div id="title">
<center><font size="5" face="arial" color="white">TABEL DATA USER</font>
</div>
<?php
$batas = 5;
$pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";
 
if ( empty( $pg ) ) {
$posisi = 0;
$pg = 1;
} else {
$posisi = ( $pg - 1 ) * $batas;
}
include 'koneksi.php';
echo "<center>";
$query=mysql_query("SELECT * FROM user limit $posisi, $batas;");
$jumlah=mysql_num_rows($query);
$no=1+$posisi;
?>
<link rel="stylesheet" href="all.css" type="text/css" />
<table border="1" class="demo-table">
<thead>
<tr>
	<th>No</th><th>Nama</th>
	<th>Username</th><th>Password</th><th>Grup User</th>
	<th>Aksi</th>
</tr>
</thead>
<?php
while($row=mysql_fetch_array($query)){
?>
<tr>
	<td><?php echo $no;?></td>
	<td><?php echo $row['nama_lengkap'];?></td>
	<td><?php echo $row['username'];?></td>
	<td><?php echo $row['password'];?></td>
	<td><?php echo $row['level'];?></td>
	<td>
	<a href="deleteu.php?idu=<?php echo $row['id_user'];?>" onclick="
		return confirm ('Hapus data user ?')" class=tombol4>Hapus</a>
	<a href="updateu.php?idu=<?php echo $row['id_user'];?>" class=tombol2>Edit</a>
	</td>
<?php
$no++;
}
//hitung jumlah data
$jml_data = mysql_num_rows(mysql_query("SELECT * FROM user"));
//Jumlah halaman
$JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas
 
//Navigasi ke sebelumnya
if ( $pg > 1 ) {
$link = $pg-1;
$prev = "<a href='?pg=$link' class=tombol0 ><</a> ";
} else {
$prev = "<a href='#' class=tombol0 ><</a> ";
}

//Navigasi ke selanjutnya
if ( $pg < $JmlHalaman ) {
$link = $pg + 1;
$next = " <a href='?pg=$link' class=tombol0 >></a>";
} else {
$next = "<a href='#' class=tombol0 >></a> ";
}

//Navigasi ke awal
$awal = "<a href='?pg=1' class=tombol0 >|<</a> ";

//Navigasi ke akhir
$akhir = " <a href='?pg=$JmlHalaman' class=tombol0 >>|</a>";

 
//Navigasi nomor
$nmr = '';
for ( $i = 1; $i<= $JmlHalaman; $i++ ){
 
if ( $i == $pg ) {
$nmr .= $i . " ";
} else {
$nmr .= " <a href='?pg=$i' class=tombol0 >$i</a> ";
}
}
 
?>
</table>
<br>
<b><?php echo $awal . $prev . $nmr . $next . $akhir;?></b>
<br><br>
Jumlah data : <b> <?php echo $jml_data; ?> </b>
</div>
</div>
</body>
</html>