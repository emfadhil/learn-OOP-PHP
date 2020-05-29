<?php
class Pegawai{
    //member1 var
    private $koneksi;
    //member2 constructor
    public function __construct(){
        global $dbh; //panggil var instance pdo
        $this->koneksi = $dbh;
    }
    //member3 fungsi2 crud
    public function dataPegawai(){
            // $sql = "select * from pegawai";
        // join tabel
        $sql = "SELECT pegawai.*, divisi.nama as divisi, jabatan.nama as jabatan FROM pegawai
        INNER JOIN divisi ON divisi.id = pegawai.divisi_id
        INNER JOIN jabatan ON jabatan.id = pegawai.jabatan_id";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute(); //eksekusi
        $rs = $ps->fetchAll(); // ambil seluruh baris data
        return $rs;
    }

    public function detailPegawai($id){
    // join tabel
    $sql = "SELECT pegawai.*, divisi.nama as divisi, jabatan.nama as jabatan FROM pegawai
    INNER JOIN divisi ON divisi.id = pegawai.divisi_id
    INNER JOIN jabatan ON jabatan.id = pegawai.jabatan_id
    WHERE pegawai.id = ?";
    //prepare statement PDO
    $ps = $this->koneksi->prepare($sql); //persiapan
    $ps->execute($id); //eksekusi
    $rs = $ps->fetch(); // ambil seluruh baris data
    return $rs;
}

// searcing di menu search
public function cariPegawai($nama){
    $sql = "SELECT pegawai.*, jabatan.nama AS jabatan, divisi.nama AS divisi
            FROM pegawai 
            INNER JOIN jabatan ON jabatan.id = pegawai.jabatan_id
            INNER JOIN divisi ON divisi.id = pegawai.divisi_id
            WHERE pegawai.nama LIKE  '%$nama%' "; //eksekusi didalam query  
    //prepare statement PDO
    $ps = $this->koneksi->prepare($sql); //persiapan
    $ps->execute(); //tidak di execute disini tapi di query
    $rs = $ps->fetchAll(); // ambil seluruh baris data
    return $rs;
}

// fungsi filter divisi di sidebar
public function filterDivisi($id){
    $sql = "SELECT pegawai.*, jabatan.nama AS jabatan, divisi.nama AS divisi
            FROM pegawai 
            INNER JOIN jabatan ON jabatan.id = pegawai.jabatan_id
            INNER JOIN divisi ON divisi.id = pegawai.divisi_id
            WHERE pegawai.divisi_id = $id "; //eksekusi didalam query  
    //prepare statement PDO
    $ps = $this->koneksi->prepare($sql); //persiapan
    $ps->execute(); //tidak di execute disini tapi di query
    $rs = $ps->fetchAll(); // ambil seluruh baris data
    return $rs;
}

// fungsi filter jabatan di sidebar
public function filterJabatan($idj){
    $sql = "SELECT pegawai.*, jabatan.nama AS jabatan, divisi.nama AS divisi
            FROM pegawai 
            INNER JOIN jabatan ON jabatan.id = pegawai.jabatan_id
            INNER JOIN divisi ON divisi.id = pegawai.divisi_id
            WHERE pegawai.jabatan_id = $idj "; //eksekusi didalam query  
    //prepare statement PDO
    $ps = $this->koneksi->prepare($sql); //persiapan
    $ps->execute(); //tidak di execute disini tapi di query
    $rs = $ps->fetchAll(); // ambil seluruh baris data
    return $rs;
}

    public function simpan($data){
        $sql = "INSERT INTO pegawai (nip, nama, gender, alamat, foto, divisi_id, jabatan_id, email, tempat_lahir, tanggal_lahir) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function ubah($data){
        $sql = "UPDATE pegawai SET nip=?, nama=?, gender=?, alamat=?, foto=?, divisi_id=?, jabatan_id=?, email=?, tempat_lahir=?, tanggal_lahir=?
        WHERE id = ?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($data); //eksekusi
    }

    public function hapus($id){
        $sql = "DELETE FROM pegawai WHERE id = ?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($id); //eksekusi
    }
};

?>