<?php 

include_once 'koneksi.php';
include_once 'models/Gaji.php';

// tangkap request form
$gapok = $_POST['gapok']; // ? 2
$tunjab = $_POST['tunjab']; // ? 3
$bpjs = $_POST['bpjs']; // ? 4
$lain = $_POST['lain']; // ? 5
$pegawai = $_POST['pegawai']; // ? 1

// simpan ke data array
$data = [
    $gapok,
    $tunjab,
    $bpjs,
    $lain,
    $pegawai
];
// $data2 = [
//     $gapok,
//     $tunjab,
//     $lain
// ];

// eksekusi tombol
$tombol = $_POST['proses'];
 $model = new Gaji();
 switch ($tombol) {
     case 'simpan':
         $model->tambah($data);
         break;

         case 'ubah':
            $data[] = $_POST['idx']; // tangkap hidden di form u/ ? 2
            $model->ubah($data);
            break;

            case 'hapus':
                unset($data); //hapus ? 
                $id = [$_POST['idx'] ]; //tangkap hidden di form u/ ? 2
                $model->hapus($id);
                break;
     
     default:
         header('location:index.php?hal=gaji'); //tombol batal
         break;
 }

//  arahkan ke suatu halaman/redirect/landing page
header('location:index.php?hal=gaji');

?>