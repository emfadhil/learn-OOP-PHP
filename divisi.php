<?php 
if(isset($_SESSION['MEMBER']) ){
?>

<?php 
$ar_judul =['No', 'Nama Divisi', 'Action'];

?>
<a href="index.php?hal=form_divisi#div" type="button" class="btn btn-success">input data</a>


<br><br>
<h3 id="div">Data Divisi</h3>
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
      $model = new Divisi();
      $rs = $model->dataDivisi();
      $no = 1;
      foreach($rs as $div){
      ?>
        <tr>
          <th scope="row"><?= $no ?></th>
          <td><?= $div['nama'] ?></td>
          <td>
          <a href="index.php?hal=form_divisi&idedit=<?= $div['id'] ?>" type="button" class="btn btn-warning">Edit</a>
          </td>
        </tr>
<?php $no++; } ?>
  </tbody>
</table>

      <?php }
       else{
        include_once 'terlarang.php';
       }?>