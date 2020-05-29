<?php 

include_once 'koneksi.php';
include_once 'models/Member.php';

// tangkap request form
$fullname = $_POST['fullname']; // ? 1
$username = $_POST['username']; // ? 1
$email = $_POST['email']; // ? 1
$password = SHA1($_POST['password'] ); // ? 1
$foto = $_POST['foto']; // ? 1
$role = $_POST['role']; // ? 1

// simpan ke data array
$data = [$fullname, $username, $password, $role, $email, $foto];

// eksekusi tombol
$tombol = $_POST['proses'];
 $model = new Member();
 switch ($tombol) {
     case 'simpan':
         $model->input($data);
         break;
     
         case 'ubah':
            $data[] = $_POST['id']; // tangkap hidden di form u/ ? 2
            $model->ubah($data);
            break;

            case 'hapus':
                unset($data); //hapus ? 2
                $id = [$_POST['id'] ]; //tangkap hidden di form u/ ? 2
                $model->hapus($id);
                break;
     
     default:
         header('location:index.php?hal=member'); //tombol batal
         break;
 }

//  arahkan ke suatu halaman/redirect/landing page
header('location:index.php?hal=member');

?>