<?php 
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'staff'){
?>

<?php 
// tangkap request id url
$id = $_GET['id'];
$model = new Gaji();
$peg = $model->getGaji([$id]);
if(empty($peg['foto']) ){
    $peg['foto'] ='nophoto.png';
}
?>
<h3>Detail Pegawai</h3>
<div class="card center" style="width: 18rem;">
<img src="images/<?= $peg['foto']?>" class="card-img-top" alt="...">
<div class="card-body">
  <h5 class="card-title"> <?= $peg['pegawai']?> </h5>
  <p class="card-text">
    <table>
      <tr>
        <th>NIP</th>
        <td><?=$peg['nip'] ?></td>
      </tr>
      <tr>
        <th>Jabatan</th>
        <td><?=$peg['jabatan'] ?></td>
      </tr>
      <tr>
        <th>Divisi</th>
        <td><?=$peg['divisi'] ?></td>
      </tr>
      <tr>
        <th>Gaji Pokok</th>
        <td><?=$peg['gapok'] ?></td>
      </tr>
      <tr>
        <th>Tunjangan Jabatan</th>
        <td><?=$peg['tunjab'] ?></td>
      </tr>
      <tr>
        <th>BPJS</th>
        <td><?=$peg['bpjs'] ?></td>
      </tr>
      <tr>
        <th>Lain-Lain</th>
        <td><?=$peg['lain2'] ?></td>
      </tr> 
    </table>
  </p>
  <a href="index.php?hal=gaji" class="btn btn-primary">Kembali</a>
</div>
</div>

<?php }
      else{
        include_once 'terlarang.php';
      }?>