<?php 

class Gaji{

    private $koneksi;

    public function __construct() {
        global $dbh;
        $this->koneksi = $dbh;    
    }

    public function dataGaji() {
        $sql = "SELECT gaji.*, pegawai.id as idp, pegawai.nip as nip, pegawai.nama FROM gaji
        INNER JOIN pegawai ON pegawai.id = gaji.pegawai_id";
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
    
    public function tambah($data){
        $sql = "INSERT into gaji (gapok, tunjab, bpjs, lain2, pegawai_id) 
        VALUES (?,?,?,?,?)";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($data); //eksekusi
    }

    public function getGaji($id) {
        $sql = "SELECT g.*, p.id as idp, p.nip as nip, p.nama as pegawai, p.foto, 
        j.nama as jabatan, d.nama as divisi FROM gaji g 
        INNER JOIN pegawai p ON p.id = g.pegawai_id 
        INNER JOIN jabatan j ON j.id = p.jabatan_id 
        INNER JOIN divisi d ON d.id = p.divisi_id 
        WHERE g.id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
        $rs = $ps->fetch();
        return $rs;
    }

    public function ubah($data){
        $sql = "UPDATE gaji SET gapok=?, tunjab=?, bpjs=?, lain2=?, pegawai_id=?
        WHERE id = ?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($data); //eksekusi
    }

    public function hapus($id){
        $sql = "DELETE FROM gaji WHERE id = ?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($id); //eksekusi
    }

}

?>