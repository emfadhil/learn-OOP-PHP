<?php
class Jabatan {
    //member1 var
    private $koneksi;
    //member2 constructor
    public function __construct(){
        global $dbh; //panggil var instance pdo
        $this->koneksi = $dbh;
    }
    //member3 fungsi2 crud
    public function dataJabatan(){
        $sql = "SELECT * FROM jabatan";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute(); //eksekusi
        $rs = $ps->fetchAll(); // ambil seluruh baris data
        return $rs;
    }

    public function input($data){
        $sql = "INSERT INTO jabatan (nama) 
        values (?)";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($data); //eksekusi
    }

    public function getJabatan($id){
        $sql = "SELECT * FROM jabatan WHERE id = ?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($id); //eksekusi
        $rs = $ps->fetch(); // ambil satu baris data yg mau diedit
        return $rs;
    }

    public function ubah($data){
        $sql = "UPDATE jabatan SET nama=? WHERE id=?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($data); //eksekusi
    }

    public function hapus($id){
        $sql = "DELETE FROM jabatan WHERE id=?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($id); //eksekusi
    }
};

?>