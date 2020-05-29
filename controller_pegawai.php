<?php 

include_once 'koneksi.php';
include_once 'models/Pegawai.php';

// tangkap request element form
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$gender = $_POST['gender'];
$alamat = $_POST['alamat'];
$foto = $_POST['foto'];
$divisi = $_POST['divisi'];
$jabatan = $_POST['jabatan'];
$email = $_POST['email'];
$tempat = $_POST['tempat'];
$ttl = $_POST['tanggal_lahir'];

// simpan ke sebuah array
$data = [$nip, 
         strtoupper($nama), 
         $gender, 
         strtoupper($alamat), 
         $foto, 
         $divisi, 
         $jabatan,
         $email,
         strtoupper($tempat),
         $ttl
     ];

// eksekusi tombol
$tombol = $_POST['proses'];
$model = new Pegawai();
if($tombol == 'simpan'){
    $model->simpan($data);
}
elseif($tombol == 'ubah'){
    $data[] = $_POST['idx'];
    $model->ubah($data);
}
elseif($tombol == 'hapus'){
    unset($data); //menghapus 10 data array diatas
    $id = [$_POST['idx'] ]; 
    $model->hapus($id);
}else{
    header('location:index.php?hal=pegawai#peg');
}

// setelah selesai proses arahkan ke suatu halaman/redirect/landing page
header('location:index.php?hal=pegawai#peg');

?>