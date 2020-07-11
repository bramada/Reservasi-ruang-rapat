<?php
include('cekuser.php');
?>

<div id="cssmenu">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="tabel_ruang.php">Daftar Pemesanan Ruang</a>
    <ul>
    <li><a href="tabel_ruang2.php">Sudah Disetujui</a></li>
    <li><a href="tabel_ruang3.php">Ditolak</a></li>
    </ul>
</li>
<li><a href="inputr.php">TAMBAH RUANG</a>
	<ul>
    <li><a href="tabelr.php">Tabel Data Ruang</a></li>
    </ul>
</li>
<li><a href="../logout.php" onclick="return confirm ('Logout ?')">Log Out</a></li>
<li><a></a></li>
<li><a></a></li>
<li><a></a></li>
<li><a></a></li>
<li><a></a></li>
<li><a></a></li>
<li><a></a></li>
<li><a></a></li>
<li><a></a></li>
<li><a></a></li>
<li><a></a></li>
<li><a></a></li>
<li><a></a></li>
<li><a href="#">
	<?php
	$array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
 	$hr = $array_hr[date('N')];
	$tgl= date('j');
	$array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
	$bln = $array_bln[date('n')];
	$thn = date('Y');
		echo $hr . ", " . $tgl . " " . $bln . " " . $thn . " ";
	?>
</a></li>
</ul>
</div>