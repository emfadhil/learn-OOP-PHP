<?php 
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'staff'){
?>

<?php 
$ar_judul =['No', 'Materi', 'Nama Pegawai', 'Keterangan', 'Action'];

?>
<a href="index.php?hal=form_diklat" type="button" class="btn btn-success">input data</a>
<br><br>
<h3 id="div">Data Pelatihan</h3>
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
      $model = new Diklat();
      $rs = $model->dataDiklat();
      $no = 1;
      foreach($rs as $dik){
      ?>
        <tr>
          <th scope="row"><?= $no ?></th>
          <td><?= $dik['nama'] ?></td>
          <td><?= $dik['materi'] ?></td>
          <td><?= $dik['keterangan'] ?></td>
          <td>
          <a href="index.php?hal=form_diklat&id=<?= $dik['id'] ?>" type="button" class="btn btn-warning">Edit</a>
          </td>
        </tr>
<?php $no++; } ?>
  </tbody>
</table>

      <?php }
      else{
        include_once 'terlarang.php';
      }?>