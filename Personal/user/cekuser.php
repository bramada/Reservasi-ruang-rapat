<?php    

if(!isset($_SESSION)) { 
session_start(); 

//cek apakah user sudah login
if(!isset($_SESSION['username'])){
    die("<script>alert('Anda belum login');window.location=('../index.php');</script>");
}

//cek level user
if($_SESSION['level']!="user" and  $_SESSION['level']!="admin")
{
    die("<script>alert('Anda bukan admin user');window.location=('../index.php');</script>");
}
}
?>