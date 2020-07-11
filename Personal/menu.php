<?php
include('cekdevisi.php');
?>


<div id="cssmenu">
<ul>
<li><a href="home.php">Home</a></li>
<li><a href="pesan_ruang.php">Pesan Ruang</a></li>
<li><a href="login.php">Login Admin</a></li>
<li><a href="logout0.php" onclick="return confirm ('Logout ?')">Log Out</a></li>
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