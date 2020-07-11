<?php    

if(!isset($_SESSION)) { 
session_start(); 

//cek apakah user sudah login
if(!isset($_SESSION['username0'])){
    die("<script>alert('Anda belum login devisi');window.location=('index.php');</script>");
}

}
?>