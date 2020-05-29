<?php 
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'staff'){
?>

<?php 
$ar_judul =['No', 'NIP', 'Nama Pegawai', 'Gaji Pokok', 'Action'];

?>
<a href="index.php?hal=form_gaji" type="button" class="btn btn-success">input data</a>
<br><br>
<h3 id="div">Data Gaji</h3>
<table class="table table-sm table-dark">
  <thead>
    <tr>
    <?php 
        foreach($ar_judul as $jdl){
    ?>
      <th scope="col"><?= $jdl ?></th>
    <?php  } ?>
    </tr>
  </thead>
  <tbody>
      <?php
      //ciptakan object
      $model = new Gaji();
      $rs = $model->dataGaji();
      $no = 1;
      foreach($rs as $gaj){
      ?>
        <tr>
          <th scope="row"><?= $no ?></th>
          <td><?= $gaj['nip'] ?></td>
          <td><?= $gaj['nama'] ?></td>
          <td>Rp <?= number_format($gaj['gapok'], 0, ',', '.')?></td>
          <td>
          <a href="index.php?hal=detail_gaji&id=<?= $gaj['id'] ?>" type="button" class="btn btn-info">Detail</a>
          <a href="index.php?hal=form_gaji&id=<?= $gaj['id'] ?>" type="button" class="btn btn-warning">Edit</a>
          </td>
        </tr>
<?php $no++; } ?>
  </tbody>
</table>

      <?php }
      else{
        include_once 'terlarang.php';
      }?>