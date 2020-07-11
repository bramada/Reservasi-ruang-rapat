<html>
<head>
<title>Dartar Pemesanan Ruangan</title>
<link rel="stylesheet" href="../css/all.css" type="text/css" />
</head>
<body class="bgr">
<div id="header">
</div>
<?php include "menu.php"; ?>
<div id="wrapper2">
<div id="content2">
<div id="title2">
<center><font size="5" face="arial" color="white">PEMESANAN RUANG DITOLAK</font>
</div>
<?php
include "koneksi.php";

$batas = 10;
$pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";
 
if ( empty( $pg ) ) {
$posisi = 0;
$pg = 1;
} else {
$posisi = ( $pg - 1 ) * $batas;
}

$query=mysql_query("SELECT * FROM pesan_ruang WHERE status='Ditolak' ORDER BY tanggal_mulai DESC, jam_mulai DESC limit $posisi, $batas; ");

function ubahTanggal($tgl1){
	$pisah = explode('-',$tgl1);
	$array = array($pisah[2],$pisah[1],$pisah[0]);
	$satukan = implode('-',$array);
	return $satukan;
}	
function ubahTanggal2($tgl2){
	$pisah = explode('-',$tgl2);
	$array = array($pisah[2],$pisah[1],$pisah[0]);
	$satukan = implode('-',$array);
	return $satukan;
}	


?>
<center>
<table border="1" class="demo-table">
<thead>
<tr>
	<th>No</th><th>Nama</th><th>Divisi</th><th>Tanggal</th><th>Waktu</th><th>Ruang</th><th>Keperluan</th><th>Peserta</th><th>Catatan</th><th>Status</th><th></th>
</tr>
</thead>
<?php
$no=1+$posisi;
while($row=mysql_fetch_array($query)){
	$tgl1=$row['tanggal_mulai'];
	$tgl2=$row['tanggal_selesai'];
	$tanggal1 = ubahTanggal($tgl1);
	$tanggal2 = ubahTanggal2($tgl2);
?>
<tr>
	<td><?php echo $no; $row['id_pesan'];?></td>
	<td><?php echo $row['nama'];?></td>
	<td><?php echo $row['divisi'];?></td>
	<td><?php echo $tanggal1;?> <b>s/d</b> <?php echo $tanggal2;?></td>
	<td><?php echo $row['jam_mulai'];?> <b>s/d</b> <?php echo $row['jam_selesai'];?></td>
	<td><?php echo $row['ruang'];?></td>
	<td><?php echo $row['keperluan'];?></td>
	<td><?php echo $row['jumlah_peserta'];?></td>
	<td><?php echo $row['catatan'];?></td>
	<td><?php echo $row['status'];?></td>
	<td>
	<a href="del.php?idp=<?php echo $row['id_pesan'];?>" onclick="return confirm ('Hapus data ?')" class="tombol4">Hapus</a>
	</td>
</tr>
<?php
$no++;
}

//hitung jumlah data
$jml_data = mysql_num_rows(mysql_query("SELECT * FROM pesan_ruang WHERE status='Ditolak'"));
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