<?php 

include_once 'koneksi.php';
include_once 'models/Materi.php';

// tangkap request form
$nama = $_POST['nama']; // ? 1

// simpan ke data array
$data = [$nama];

// eksekusi tombol
$tombol = $_POST['proses'];
 $model = new Materi();
 switch ($tombol) {
     case 'simpan':
         $model->input($data);
         break;

         case 'ubah':
            $data[] = $_POST['idx']; // tangkap hidden di form u/ ? 2
            $model->ubah($data);
            break;

            case 'hapus':
                unset($data); //hapus ? 2
                $id = [$_POST['idx'] ]; //tangkap hidden di form u/ ? 2
                $model->hapus($id);
                break;
     
     default:
         header('location:index.php?hal=materi'); //tombol batal
         break;
 }

//  arahkan ke suatu halaman/redirect/landing page
header('location:index.php?hal=materi');

?>