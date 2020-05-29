<?php 

class Diklat{

    private $koneksi;

    public function __construct() {
        global $dbh;
        $this->koneksi = $dbh;    
    }

    public function dataDiklat() {
        $sql = "SELECT diklat.*, pegawai.nama as nama, materi.nama as materi
        FROM diklat
        INNER JOIN pegawai ON pegawai.id = diklat.pegawai_id
        INNER JOIN materi ON materi.id = diklat.materi_id";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function dataBelumDigaji() {
        $sql = "SELECT pegawai.id as idp, pegawai.nama FROM pegawai LEFT JOIN gaji
        ON pegawai.id = gaji.pegawai_id WHERE gaji.pegawai_id IS NULL";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
    
    public function input($data){
        $sql = "INSERT into diklat (pegawai_id, materi_id, tgl_mulai, tgl_akhir, keterangan) 
        VALUES (?,?,?,?,?)";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($data); //eksekusi
    }

    public function getDiklat($id) {
        $sql = "SELECT d.*, p.id as idp, p.nip as nip, p.nama as pegawai, 
        m.nama as materi FROM diklat d 
        INNER JOIN pegawai p ON p.id = d.pegawai_id 
        INNER JOIN materi m ON m.id = d.materi_id  
        WHERE d.id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
        $rs = $ps->fetch();
        return $rs;
    }

    public function ubah($data){
        $sql = "UPDATE diklat SET pegawai_id=?, materi_id=?, tgl_mulai=?, tgl_akhir=?, keterangan=?
        WHERE id = ?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($data); //eksekusi
    }

    public function hapus($id){
        $sql = "DELETE FROM diklat WHERE id = ?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($id); //eksekusi
    }

}

?>