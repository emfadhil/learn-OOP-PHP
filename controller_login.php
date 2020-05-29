<?php 
session_start();
include_once 'koneksi.php';
include_once 'models/Otentikasi.php';

// tangkap request form
$username = $_POST['username']; // ? 1
$password = $_POST['password']; // ? 2

// simpan ke data array
$data = [$username, $password];

// eksekusi tombol
$model = new Otentikasi();
$rs = $model->loginOtentikasi($data);
if(!empty($rs) ){
    $_SESSION['MEMBER'] = $rs;
    header('location:index.php');
}
else{
echo '<script> alert("Hmm..Username atau Password salah"); history.go(-1);</script>';
//  arahkan ke suatu halaman sebelumnya
}
?>