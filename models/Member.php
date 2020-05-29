<?php
class Member{
    //member1 var
    private $koneksi;
    //member2 constructor
    public function __construct(){
        global $dbh; //panggil var instance pdo
        $this->koneksi = $dbh;
    }
    //member3 fungsi2 crud
    public function dataMember(){
        $sql = "SELECT * FROM member";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute(); //eksekusi
        $rs = $ps->fetchAll(); // ambil seluruh baris data
        return $rs;
    }

    public function input($data){
        $sql = "INSERT INTO member (fullname, username, password, role, email, foto) 
        VALUES (?,?,?,?,?,?)";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($data); //eksekusi
    }

    public function infoMember($id){
        $sql = "SELECT * FROM member WHERE id = ?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($id); //eksekusi
        $rs = $ps->fetch(); // ambil satu baris data yg mau diedit
        return $rs;
    }

    public function ubah($data){
        $sql = "UPDATE member SET fullname = ?, username = ?, password = ?, role = ?, email = ?, foto = ? 
        WHERE id = ?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($data); //eksekusi
    }

    public function hapus($id){
        $sql = "DELETE FROM member WHERE id=?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($id); //eksekusi
    }
};

?>