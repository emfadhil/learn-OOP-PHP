<?php 
session_start();
// session_destroy(); akan menghapus semua session yang ada
unset($_SESSION['MEMBER']); //aman menggunakan unset
header('location:index.php');
?>