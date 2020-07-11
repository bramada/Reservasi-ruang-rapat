<html>
<head>
	<title>Meeting Room</title>

  <link rel="stylesheet" href="css/all.css" type="text/css" />
  <link href="jquery-ui-1.11.4/smoothness/jquery-ui.css" rel="stylesheet" />
  <link rel="stylesheet" href="jquery-ui-1.11.4/jquery-ui.theme.css">
  <link rel="stylesheet" href="css/jquery.ui.timepicker.css?v=0.3.3" type="text/css" />
  <script src="jquery-ui-1.11.4/external/jquery/jquery.js"></script>
  <script src="jquery-ui-1.11.4/jquery-ui.min.js"></script>
  <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui.js"></script> 
  <script type="text/javascript" src="js/jquery.ui.timepicker.js?v=0.3.3"></script>
  <script type="text/javascript">
   $(document).ready(function(){
     $("#tanggal").datepicker({
     })
   })   
   $(document).ready(function(){
     $("#tanggal2").datepicker({
     })
   })  
   $(document).ready(function(){
      $('#jam1').timepicker({
        showPeriodLabels: false
      });
   });
   $(document).ready(function(){
      $('#jam2').timepicker({
        showPeriodLabels: false
      });
   });
</script>
</head>
<body class="bgr">
<div id="header">
</div>
  <?php include "menu.php";?>
<div id="wrapper">
<div id="content">
<div id="title">
<center><font size="5" face="arial" color="white">INPUT PENGGUNAAN RUANGAN RAPAT</font>
</div>
<form action="proses_ruang.php" method="post">
<center>
 <table >
  <tr>
     <td>Nama</td> 
     <td colspan="3"><input type="text" readonly name="nama" value="<?=$_SESSION['nama'];?>" required="" size="30"/></td>
  </tr>
  <tr>
     <td>Bagian/Divisi</td> 
     <td colspan="3"><input type="text" readonly name="div" value="<?=$_SESSION['devisi'];?>" required="" size="30"/></td>
  </tr>
  <tr>
     <td>E-Mail</td> 
     <td colspan="3"><input type="text" readonly name="email" value="<?=$_SESSION['email'];?>" required="" size="30"/></td>
    </tr>
  <tr>
     <td>Tanggal Mulai</td> 
     <td colspan="3"><input type="text" name="tanggal" required="" id="tanggal" /></td>
  </tr>
  <tr>
     <td>Tanggal Selesai</td> 
     <td colspan="3"><input type="text" name="tanggal2" required="" id="tanggal2" /></td>
  </tr>
  <tr>
   <td>Waktu Penggunaan</td> 
   <td><input type="text" name="mulai" required="" style="width: 100px;" id="jam1" /></td><td>s/d</td>
   <td><input type="text" name="selesai" required="" style="width: 100px;" id="jam2" />
  </tr>
  <tr>
   <td>Ruangan Rapat</td> 
   <td colspan="3">
      <?php   
      mysql_connect("localhost","root","");   
      mysql_select_db("solopos");  
      ?>
      <select name="ruang" required="">
        <?php
        $result = mysql_query("select * from ruang"); 
          while ($row = mysql_fetch_array($result)) {   
          echo '<option value="' . $row['nama_ruang'] . '">' . $row['nama_ruang'] . '</option>';     
        }     
        ?>   
      </select>
   </td>
  </tr>
  <tr>
   <td>Keperluan</td> 
   <td colspan="3"><textarea name="keperluan" required="" cols="30" rows="6"></textarea></td>
  </tr>
  <tr>
   <td>Jumlah Peserta</td> 
   <td colspan="3"><input type="text" name="jp" required="" size="4"/></td>
  </tr>
  <tr>
   <td>Catatan</td> 
   <td colspan="3"><textarea name="catatan" cols="30" rows="6"></textarea></td>
  </tr>
    </table>
<br>
<input type="submit" name="submit" value="Proses" class="tombol2">  <input type="reset" value="Reset" class="tombol3">
<Br>
</div>
</div>
</form>
</body>
</html>