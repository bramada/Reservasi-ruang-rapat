<?php

include('../phpmailer/class.phpmailer.php');
include('../phpmailer/class.smtp.php');
include "koneksi.php";
$idp=$_GET['idp'];
$result = mysql_query("SELECT * FROM pesan_ruang WHERE id_pesan='$idp'");
$row = mysql_fetch_array($result);
$email = $row['email'];
$tanggal1 = $row['tanggal_mulai'];
$tanggal2= $row['tanggal_selesai'];
$mulai = $row['jam_mulai'];
$selesai = $row['jam_selesai'];
$ruang = $row['ruang'];
$status = $row['status'];
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require '../phpmailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "superrootuser13@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "bramada13";

//Set who the message is to be sent from
$mail->setFrom('noreply@gmail.com', 'Solopos');

//Set an alternative reply-to address
$mail->addReplyTo('noreply@gmail.com', 'Solopos');

//Set who the message is to be sent to
$mail->addAddress($email);

//Set the subject line
$mail->Subject = 'Ruang Rapat';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->Body = 'Ruang yang bapak/ibu pesan sudah disetujui.<br>Mohon tidak membalas email ini. Terima kasih.';

//Replace the plain text body with one created manually
$mail->AltBody = 'Disetujui';

//Attach an image file
$mail->addAttachment('../image/solopos.png');

//send the message, check for errors
$sql0 = mysql_query("SELECT * FROM pesan_ruang WHERE status = 'Disetujui'") or die(mysql_error());
$jml_diterima = mysql_num_rows($sql0); 
    if ($jml_diterima > 0) {
//fungsi ruang
    $sql1 = mysql_query("SELECT * FROM pesan_ruang WHERE ruang = '$ruang' AND status = 'Disetujui'") or die(mysql_error());
    $jml_ruang = mysql_num_rows($sql1); 
        if ($jml_ruang > 0) {

            //fungsi tanggal jika di awal
            $sql2 = mysql_query("SELECT * FROM pesan_ruang WHERE tanggal_mulai >= '$tanggal1' AND tanggal_mulai < '$tanggal2' AND ruang = '$ruang' AND status = 'Disetujui'") or die(mysql_error());
            $jml_tgl = mysql_num_rows($sql2); 
                if ($jml_tgl > 0) {

                    //fungsi jam jika di awal
                    $sqlj1 = mysql_query("SELECT * FROM pesan_ruang WHERE jam_mulai >= '$mulai' AND jam_mulai < '$selesai' AND ruang = '$ruang' AND status = 'Disetujui'") or die(mysql_error());
                    $jml_j1 = mysql_num_rows($sqlj1); 
                        if ($jml_j1 > 0) {
                            echo"<script>window.alert('1$ruang pada tanggal $tanggal1 s/d $tanggal2 jam $mulai s/d $selesai sudah dipesan oleh divisi lain!');self.history.back();</script>";
                        }else{

                            //fungsi jam jika di akhir
                            $sqlj2 = mysql_query("SELECT * FROM pesan_ruang WHERE jam_selesai > '$mulai' AND jam_selesai <= '$selesai'AND ruang = '$ruang' AND status = 'Disetujui'") or die(mysql_error());
                            $jml_j2 = mysql_num_rows($sqlj2); 
                                if ($jml_j2 > 0) {
                                    echo"<script>window.alert('2$ruang pada tanggal $tanggal1 s/d $tanggal2 jam $mulai s/d $selesai sudah dipesan oleh divisi lain!');self.history.back();</script>";
                                }else{

                                    //fungsi jam jika di tengah
                                    $sqlj3 = mysql_query("SELECT * FROM pesan_ruang WHERE jam_mulai < '$mulai' AND jam_selesai > '$selesai'AND ruang = '$ruang' AND status = 'Disetujui'") or die(mysql_error());
                                    $jml_j3 = mysql_num_rows($sqlj3); 
                                        if ($jml_j3 > 0) {
                                            echo"<script>window.alert('3$ruang pada tanggal $tanggal1 s/d $tanggal2 jam $mulai s/d $selesai sudah dipesan oleh divisi lain!');self.history.back();</script>";
                                        }else{

                                            //simpan ke DB jika ruang & tanggal sudah dipesan tapi jam belum dipesan
                                            if (!$mail->send()) {
                                                echo"<script>window.alert('Proses gagal, error saat mengirim email!');window.location=('tabel_ruang.php');</script>";
                                            } else {
                                            $query=mysql_query("UPDATE pesan_ruang SET status='Disetujui' WHERE id_pesan='$idp'");
                                                echo"<script>window.alert('Berhasil diproses, email berhasil dikirim');window.location=('tabel_ruang.php');</script>";
                                            }
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
                                    echo"<script>window.alert('4$ruang pada tanggal $tanggal1 s/d $tanggal2 jam $mulai s/d $selesai sudah dipesan oleh divisi lain!');self.history.back();</script>";
                                }else{

                                    //fungsi jam jika di akhir
                                    $sqlj2 = mysql_query("SELECT * FROM pesan_ruang WHERE jam_selesai > '$mulai' AND jam_selesai <= '$selesai'AND ruang = '$ruang' AND status = 'Disetujui'") or die(mysql_error());
                                    $jml_j2 = mysql_num_rows($sqlj2); 
                                        if ($jml_j2 > 0) {
                                            echo"<script>window.alert('5$ruang pada tanggal $tanggal1 s/d $tanggal2 jam $mulai s/d $selesai sudah dipesan oleh divisi lain!');self.history.back();</script>";
                                        }else{

                                            //fungsi jam jika di tengah
                                            $sqlj3 = mysql_query("SELECT * FROM pesan_ruang WHERE jam_mulai < '$mulai' AND jam_selesai > '$selesai'AND ruang = '$ruang' AND status = 'Disetujui'") or die(mysql_error());
                                            $jml_j3 = mysql_num_rows($sqlj3); 
                                                if ($jml_j3 > 0) {
                                                    echo"<script>window.alert('6$ruang pada tanggal $tanggal1 s/d $tanggal2 jam $mulai s/d $selesai sudah dipesan oleh divisi lain!');self.history.back();</script>";
                                                }else{

                                                    //simpan ke DB jika ruang & tanggal sudah dipesan tapi jam belum dipesan
                                                    if (!$mail->send()) {
                                                        echo"<script>window.alert('Proses gagal, error saat mengirim email!');window.location=('tabel_ruang.php');</script>";
                                                    } else {
                                                        $query=mysql_query("UPDATE pesan_ruang SET status='Disetujui' WHERE id_pesan='$idp'");
                                                        echo"<script>window.alert('Berhasil diproses, email berhasil dikirim');window.location=('tabel_ruang.php');</script>";
                                                    }
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
                                            echo"<script>window.alert('7$ruang pada tanggal $tanggal1 s/d $tanggal2 jam $mulai s/d $selesai sudah dipesan oleh divisi lain!');self.history.back();</script>";
                                        }else{

                                            //fungsi jam jika di akhir
                                            $sqlj2 = mysql_query("SELECT * FROM pesan_ruang WHERE jam_selesai > '$mulai' AND jam_selesai <= '$selesai'AND ruang = '$ruang' AND status = 'Disetujui'") or die(mysql_error());
                                            $jml_j2 = mysql_num_rows($sqlj2); 
                                                if ($jml_j2 > 0) {
                                                    echo"<script>window.alert('8$ruang pada tanggal $tanggal1 s/d $tanggal2 jam $mulai s/d $selesai sudah dipesan oleh divisi lain!');self.history.back();</script>";
                                                }else{

                                                    //fungsi jam jika di tengah
                                                    $sqlj3 = mysql_query("SELECT * FROM pesan_ruang WHERE jam_mulai < '$mulai' AND jam_selesai > '$selesai'AND ruang = '$ruang' AND status = 'Disetujui'") or die(mysql_error());
                                                    $jml_j3 = mysql_num_rows($sqlj3); 
                                                        if ($jml_j3 > 0) {
                                                            echo"<script>window.alert('9$ruang pada tanggal $tanggal1 s/d $tanggal2 jam $mulai s/d $selesai sudah dipesan oleh divisi lain!');self.history.back();</script>";
                                                        }else{

                                                            //simpan ke DB jika ruang & tanggal sudah dipesan tapi jam belum dipesan
                                                            if (!$mail->send()) {
                                                                echo"<script>window.alert('Proses gagal, error saat mengirim email!');window.location=('tabel_ruang.php');</script>";
                                                            } else {
                                                                $query=mysql_query("UPDATE pesan_ruang SET status='Disetujui' WHERE id_pesan='$idp'");
                                                                echo"<script>window.alert('Berhasil diproses, email berhasil dikirim');window.location=('tabel_ruang.php');</script>";
                                                            }
                                                        }
                                                }

                                        }
                                }else{

                                    //simpan ke DB jika ruang sudah dipesan tapi tanggal belum dipesan
                                    if (!$mail->send()) {
                                        echo"<script>window.alert('Proses gagal, error saat mengirim email!');window.location=('tabel_ruang.php');</script>";
                                    } else {
                                        $query=mysql_query("UPDATE pesan_ruang SET status='Disetujui' WHERE id_pesan='$idp'");
                                        echo"<script>window.alert('Berhasil diproses, email berhasil dikirim');window.location=('tabel_ruang.php');</script>";
                                    }
                                }
                        }

                }

        //Simpan ke DB jika ruang belum dipesan
        }else{
            if (!$mail->send()) {
                echo"<script>window.alert('Proses gagal, error saat mengirim email!');window.location=('tabel_ruang.php');</script>";
            } else {
                $query=mysql_query("UPDATE pesan_ruang SET status='Disetujui' WHERE id_pesan='$idp'");
                    echo"<script>window.alert('Berhasil diproses, email berhasil dikirim');window.location=('tabel_ruang.php');</script>";
                }
        }  
}else{
    if (!$mail->send()) {
        echo"<script>window.alert('Proses gagal, error saat mengirim email!');window.location=('tabel_ruang.php');</script>";
    } else {
        $query=mysql_query("UPDATE pesan_ruang SET status='Disetujui' WHERE id_pesan='$idp'");
            echo"<script>window.alert('Berhasil diproses, email berhasil dikirim');window.location=('tabel_ruang.php');</script>";
        }
}
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}

//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
function save_mail($mail) {
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}
