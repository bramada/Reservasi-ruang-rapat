<?php

include('../phpmailer/class.phpmailer.php');
include('../phpmailer/class.smtp.php');
include "koneksi.php";
$idp=$_GET['idp'];
$result = mysql_query("SELECT * FROM pesan_ruang WHERE id_pesan='$idp'");
$row = mysql_fetch_array($result);
$email = $row['email'];
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
$mail->Body = 'Sebelumya kami mohon maaf, dikarenakan suatu alasan yang penting, <br>ruang pemesanan bapak/ibu yang sudah kami setujui terpaksa dibatalkan .<br>Mohon tidak membalas email ini. Terima kasih.';

//Replace the plain text body with one created manually
$mail->AltBody = 'Dibatalkan';

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo"<script>window.alert('Proses gagal, error saat mengirim email!');window.location=('tabel_ruang2.php');</script>";
} else {
    $query=mysql_query("UPDATE pesan_ruang SET status='Ditolak' WHERE id_pesan='$idp'");
    echo"<script>window.alert('Berhasil diproses, email berhasil dikirim');window.location=('tabel_ruang2.php');</script>";
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}

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
