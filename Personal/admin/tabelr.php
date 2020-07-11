<html>
<head>
<title>DATA RUANG</title>
<link rel="stylesheet" href="../css/all.css" type="text/css" />
</head>
<body class="bgr">
<div id="header">
</div>
<?php include "menu.php"; ?>
<div id="wrapper">
<div id="content">
<div id="title">
<center><font size="5" face="arial" color="white">TABEL DATA RUANG</font>
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
$query=mysql_query("SELECT * FROM ruang limit $posisi, $batas;");
$jumlah=mysql_num_rows($query);
$no=1+$posisi;
?>
<link rel="stylesheet" href="all.css" type="text/css" />
<table border="1" class="demo-table">
<thead>
<tr>
	<th>No</th><th>Nama Ruang</th><th>Kapasitas</th><th>Aksi</th>
</tr>
</thead>
<?php
while($row=mysql_fetch_array($query)){
?>
<tr>
	<td><?php echo $no;?></td>
	<td><?php echo $row['nama_ruang'];?></td>
	<td><?php echo $row['kapasitas'];?></td>
	<td>
	<a href="deleter.php?idr=<?php echo $row['id_ruang'];?>" onclick="
		return confirm ('Hapus data ruang ?')" class=tombol4>Hapus</a>
	<a href="updater.php?idr=<?php echo $row['id_ruang'];?>" class=tombol2>Edit</a>
	</td>
<?php
$no++;
}
//hitung jumlah data
$jml_data = mysql_num_rows(mysql_query("SELECT * FROM ruang"));
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