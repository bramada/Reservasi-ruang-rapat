<?php
include "koneksi.php";
$id="";
$nama = $_POST['nama'];
$div = $_POST['div'];
$email = $_POST['email'];
$tgl1 = $_POST['tanggal'];
$tgl2= $_POST['tanggal2'];
$mulai = $_POST['mulai'];
$selesai = $_POST['selesai'];
$ruang = $_POST['ruang'];
$kep = $_POST['keperluan'];
$jp = $_POST['jp'];
$catatan = $_POST['catatan'];
$status = "Menunggu";
$submit = $_POST['submit'];

function ubahTanggal($tgl1){
  $pisah = explode('/',$tgl1);
  $array = array($pisah[2],$pisah[1],$pisah[0]);
  $satukan = implode('-',$array);
  return $satukan;
}
function ubahTanggal2($tgl2){
  $pisah = explode('/',$tgl2);
  $array = array($pisah[2],$pisah[1],$pisah[0]);
  $satukan = implode('-',$array);
  return $satukan;
}

$tanggal1 = ubahTanggal($tgl1);
$tanggal2 = ubahTanggal2($tgl2);

if(empty($nama) or empty($div) or empty($email) or empty($tgl1) or empty($tgl2) or empty($mulai) or empty($selesai) or empty($ruang) or empty($kep) or empty($jp)){
	echo"<script>window.alert('Form tidak boleh kosong!');self.history.back();</script>";
}else{

if($tanggal1>$tanggal2){
	echo"<script>window.alert('Tanggal penggunaan tidak sesuai!');self.history.back();</script>";
}else{

if($mulai>=$selesai){
  echo"<script>window.alert('Waktu penggunaan tidak sesuai!');self.history.back();</script>";
}else{

if(!is_numeric($_POST['jp'])) {
  echo"<script>window.alert('Jumlah peserta harus berformat angka/nomor!');self.history.back();</script>";
}else{

if ((isset($_POST['submit']))) {
	$sql0 = mysql_query("SELECT * FROM pesan_ruang WHERE status = 'Disetujui'") or die(mysql_error());
	$jml_diterima = mysql_num_rows($sql0); 
  		if ($jml_diterima > 0) {

//fungsi ruang
if ((isset($_POST['submit']))) {
	$sql1 = mysql_query("SELECT * FROM pesan_ruang WHERE ruang = '$ruang' AND status = 'Disetujui'") or die(mysql_error());
	$jml_ruang = mysql_num_rows($sql1); 
  		if ($jml_ruang > 0) {

  			//fungsi tanggal jika di awal
  			$sql2 = mysql_query("SELECT * FROM pesan_ruang WHERE tanggal_mulai >= '$tanggal1' AND tanggal_mulai < '$tanggal2'AND ruang = '$ruang' AND status = 'Disetujui'") or die(mysql_error());
  			$jml_tgl = mysql_num_rows($sql2); 
  				if ($jml_tgl > 0) {

					//fungsi jam jika di awal
  					$sqlj1 = mysql_query("SELECT * FROM pesan_ruang WHERE jam_mulai >= '$mulai' AND jam_mulai < '$selesai'AND ruang = '$ruang' AND status = 'Disetujui'") or die(mysql_error());
  					$jml_j1 = mysql_num_rows($sqlj1); 
  						if ($jml_j1 > 0) {
							echo"<script>window.alert('$ruang pada tanggal $tgl1 s/d $tgl2 jam $mulai s/d $selesai sudah dipesan oleh divisi lain!');self.history.back();</script>";
  						}else{

  							//fungsi jam jika di akhir
  							$sqlj2 = mysql_query("SELECT * FROM pesan_ruang WHERE jam_selesai > '$mulai' AND jam_selesai <= '$selesai'AND ruang = '$ruang' AND status = 'Disetujui'") or die(mysql_error());
  							$jml_j2 = mysql_num_rows($sqlj2); 
  								if ($jml_j2 > 0) {
									echo"<script>window.alert('$ruang pada tanggal $tgl1 s/d $tgl2 jam $mulai s/d $selesai sudah dipesan oleh divisi lain!');self.history.back();</script>";
  								}else{

  									//fungsi jam jika di tengah
  									$sqlj3 = mysql_query("SELECT * FROM pesan_ruang WHERE jam_mulai < '$mulai' AND jam_selesai > '$selesai'AND ruang = '$ruang' AND status = 'Disetujui'") or die(mysql_error());
  									$jml_j3 = mysql_num_rows($sqlj3); 
  										if ($jml_j3 > 0) {
											echo"<script>window.alert('$ruang pada tanggal $tgl1 s/d $tgl2 jam $mulai s/d $selesai sudah dipesan oleh divisi lain!');self.history.back();</script>";
										}else{

  											//simpan ke DB jika ruang & tanggal sudah dipesan tapi jam belum dipesan
											$query=mysql_query("INSERT INTO pesan_ruang (id_pesan,nama,divisi,email,tanggal_mulai,tanggal_selesai,jam_mulai,jam_selesai,ruang,keperluan,jumlah_peserta,status,catatan) VALUES ('$id','$nama','$div','$email','$tanggal1','$tanggal2','$mulai','$selesai','$ruang','$kep','$jp','$status','$catatan')");
											 echo"<script>window.alert('Data berhasil disimpan');window.location=('pesan_ruang.php');</script>";
										}
								}

        				}
  				}else{

  					//fungsi tanggal jika di akhir
  					$sql3 = mysql_query("SELECT * FROM pesan_ruang WHERE tanggal_selesai > '$tanggal1' AND tanggal_selesai <= '$tanggal2'AND ruang = '$ruang' AND status = 'Disetujui'") or die(mysql_error());
  					$jml_tgl2 = mysql_num_rows($sql3); 
  						if ($jml_tgl2 > 0) {

							//fungsi jam jika di awal
  							$sqlj1 = mysql_query("SELECT * FROM pesan_ruang WHERE jam_mulai >= '$mulai' AND jam_mulai < '$selesai'AND ruang = '$ruang' AND status = 'Disetujui'") or die(mysql_error());
  							$jml_j1 = mysql_num_rows($sqlj1); 
  								if ($jml_j1 > 0) {
									echo"<script>window.alert('$ruang pada tanggal $tgl1 s/d $tgl2 jam $mulai s/d $selesai sudah dipesan oleh divisi lain!');self.history.back();</script>";
  								}else{

  									//fungsi jam jika di akhir
  									$sqlj2 = mysql_query("SELECT * FROM pesan_ruang WHERE jam_selesai > '$mulai' AND jam_selesai <= '$selesai'AND ruang = '$ruang' AND status = 'Disetujui'") or die(mysql_error());
  									$jml_j2 = mysql_num_rows($sqlj2); 
  										if ($jml_j2 > 0) {
											echo"<script>window.alert('$ruang pada tanggal $tgl1 s/d $tgl2 jam $mulai s/d $selesai sudah dipesan oleh divisi lain!');self.history.back();</script>";
  										}else{

  											//fungsi jam jika di tengah
  											$sqlj3 = mysql_query("SELECT * FROM pesan_ruang WHERE jam_mulai < '$mulai' AND jam_selesai > '$selesai'AND ruang = '$ruang' AND status = 'Disetujui'") or die(mysql_error());
  											$jml_j3 = mysql_num_rows($sqlj3); 
  												if ($jml_j3 > 0) {
													echo"<script>window.alert('$ruang pada tanggal $tgl1 s/d $tgl2 jam $mulai s/d $selesai sudah dipesan oleh divisi lain!');self.history.back();</script>";
												}else{

  													//simpan ke DB jika ruang & tanggal sudah dipesan tapi jam belum dipesan
													$query=mysql_query("INSERT INTO pesan_ruang (id_pesan,nama,divisi,email,tanggal_mulai,tanggal_selesai,jam_mulai,jam_selesai,ruang,keperluan,jumlah_peserta,status,catatan) VALUES ('$id','$nama','$div','$email','$tanggal1','$tanggal2','$mulai','$selesai','$ruang','$kep','$jp','$status','$catatan')");
													 echo"<script>window.alert('Data berhasil disimpan');window.location=('pesan_ruang.php');</script>";
												}
										}

        						}
  						}else{

  							//fungsi tanggal jika di tengah
  							$sql4 = mysql_query("SELECT * FROM pesan_ruang WHERE tanggal_mulai < '$tanggal1' AND tanggal_selesai > '$tanggal2'AND ruang = '$ruang' AND status = 'Disetujui'") or die(mysql_error());
  							$jml_tgl3 = mysql_num_rows($sql4); 
  								if ($jml_tgl3 > 0) {

									 //fungsi jam jika di awal
  									$sqlj1 = mysql_query("SELECT * FROM pesan_ruang WHERE jam_mulai >= '$mulai' AND jam_mulai < '$selesai'AND ruang = '$ruang' AND status = 'Disetujui'") or die(mysql_error());
  									$jml_j1 = mysql_num_rows($sqlj1); 
  										if ($jml_j1 > 0) {
											echo"<script>window.alert('$ruang pada tanggal $tgl1 s/d $tgl2 jam $mulai s/d $selesai sudah dipesan oleh divisi lain!');self.history.back();</script>";
  										}else{

  											//fungsi jam jika di akhir
  											$sqlj2 = mysql_query("SELECT * FROM pesan_ruang WHERE jam_selesai > '$mulai' AND jam_selesai <= '$selesai'AND ruang = '$ruang' AND status = 'Disetujui'") or die(mysql_error());
  											$jml_j2 = mysql_num_rows($sqlj2); 
  												if ($jml_j2 > 0) {
													echo"<script>window.alert('$ruang pada tanggal $tgl1 s/d $tgl2 jam $mulai s/d $selesai sudah dipesan oleh divisi lain!');self.history.back();</script>";
  												}else{

  													//fungsi jam jika di tengah
  													$sqlj3 = mysql_query("SELECT * FROM pesan_ruang WHERE jam_mulai < '$mulai' AND jam_selesai > '$selesai'AND ruang = '$ruang' AND status = 'Disetujui'") or die(mysql_error());
  													$jml_j3 = mysql_num_rows($sqlj3); 
  														if ($jml_j3 > 0) {
															echo"<script>window.alert('$ruang pada tanggal $tgl1 s/d $tgl2 jam $mulai s/d $selesai sudah dipesan oleh divisi lain!');self.history.back();</script>";
														}else{

  															//simpan ke DB jika ruang & tanggal sudah dipesan tapi jam belum dipesan
															$query=mysql_query("INSERT INTO pesan_ruang (id_pesan,nama,divisi,email,tanggal_mulai,tanggal_selesai,jam_mulai,jam_selesai,ruang,keperluan,jumlah_peserta,status,catatan) VALUES ('$id','$nama','$div','$email','$tanggal1','$tanggal2','$mulai','$selesai','$ruang','$kep','$jp','$status','$catatan')");
															 echo"<script>window.alert('Data berhasil disimpan');window.location=('pesan_ruang.php');</script>";
														}
												}

        								}
								}else{

  									//simpan ke DB jika ruang sudah dipesan tapi tanggal belum dipesan
									$query=mysql_query("INSERT INTO pesan_ruang (id_pesan,nama,divisi,email,tanggal_mulai,tanggal_selesai,jam_mulai,jam_selesai,ruang,keperluan,jumlah_peserta,status,catatan) VALUES ('$id','$nama','$div','$email','$tanggal1','$tanggal2','$mulai','$selesai','$ruang','$kep','$jp','$status','$catatan')");
									 echo"<script>window.alert('Data berhasil disimpan');window.location=('pesan_ruang.php');</script>";
								}
						}

 	       		}

		//Simpan ke DB jika ruang belum dipesan
  		}else{
			$query=mysql_query("INSERT INTO pesan_ruang (id_pesan,nama,divisi,email,tanggal_mulai,tanggal_selesai,jam_mulai,jam_selesai,ruang,keperluan,jumlah_peserta,status,catatan) VALUES ('$id','$nama','$div','$email','$tanggal1','$tanggal2','$mulai','$selesai','$ruang','$kep','$jp','$status','$catatan')");
			 echo"<script>window.alert('Data berhasil disimpan');window.location=('pesan_ruang.php');</script>";
  		}  
}//error ruang

		}else{
			$query=mysql_query("INSERT INTO pesan_ruang (id_pesan,nama,divisi,email,tanggal_mulai,tanggal_selesai,jam_mulai,jam_selesai,ruang,keperluan,jumlah_peserta,status,catatan) VALUES ('$id','$nama','$div','$email','$tanggal1','$tanggal2','$mulai','$selesai','$ruang','$kep','$jp','$status','$catatan')");
			 echo"<script>window.alert('Data berhasil disimpan');window.location=('pesan_ruang.php');</script>";
  		}
}//error status

}//error jumlah peserta
}//error waktu
}//error tanggal
}//error form kosong

?>