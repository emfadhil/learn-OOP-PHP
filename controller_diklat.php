<?php
include_once 'koneksi.php';
include_once 'models/Diklat.php';
//1. tangkap request form
$materi = $_POST['materi'];
$pegawai = $_POST['pegawai'];
$t_mulai = $_POST['tgl_mulai'];
$t_akhir = $_POST['tgl_akhir'];
$ket = $_POST['keterangan'];


//2. simpan ke sebuah data array
$data = [$pegawai, $materi, $t_mulai, $t_akhir, $ket]; // ? 1
//3. eksekusi tombol
$tombol = $_POST['proses'];
$model = new Diklat(); //ciptakan object dari Model
switch ($tombol) {
    case 'simpan': $model->input($data); break;
    case 'ubah': 
        $data[] = $_POST['idx']; // tangkap hidden field u/ ? 2
        $model->ubah($data); break;
    case 'hapus':
        unset($data); //hapus ? di atas
        $id = [$_POST['idx']]; // tangkap hidden field di form u/ WHERE id = ? 
        $model->hapus($id); break;   
    default: header('location:index.php?hal=diklat'); // tombol batal 
}
//4.arahkan ke suatu halaman/redirect/landing page
header('location:index.php?hal=diklat');
