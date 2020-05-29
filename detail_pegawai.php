<?php 
if(isset($_SESSION['MEMBER']) ){ //memberikan keamanan
?>

<?php 
// tangkap request id url
$id = $_GET['id'];
$model = new Pegawai();
$peg = $model->detailPegawai([$id]);
if(empty($peg['foto']) ){
    $peg['foto'] ='nophoto.png';
}
?>
<h3>Detail Pegawai</h3>
<div class="card" style="width: 18rem;">
<img src="images/<?= $peg['foto']?>" class="card-img-top" alt="...">
<div class="card-body">
  <h5 class="card-title"> <?= $peg['nama']?> </h5>
  <p class="card-text">
  NIP : <?=$peg['nip'] ?> <br>
  Gender : <?=$peg['gender'] ?> <br>
  Gender : <?=$peg['alamat'] ?> <br>
  jabatan : <?=$peg['email'] ?> <br>
  Tempat Lahir : <?=$peg['tempat_lahir'] ?><br>
  Tanggal Lahir : <?=$peg['tanggal_lahir'] ?><br>
  Divisi : <?=$peg['divisi'] ?><br>
  Jabatan : <?=$peg['jabatan'] ?>
  </p>
  <a href="index.php?hal=pegawai#peg" class="btn btn-primary">Kembali</a>
</div>
</div>

<?php }
      else{
       include_once 'terlarang.php'; 
      }?>

