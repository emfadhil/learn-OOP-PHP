<?php
class Otentikasi{
    //member1 var
    private $koneksi;
    //member2 constructor
    public function __construct(){
        global $dbh; //panggil var instance pdo
        $this->koneksi = $dbh;
    }
    //member3 fungsi2 otentikasi user
    public function loginOtentikasi($data)
    {
        $sql = "SELECT * FROM member WHERE username = ? AND password = SHA1(?)"; //SAH1 itu enskripsi
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
        $rs = $ps->fetch();
        return $rs;
    }
};

?>