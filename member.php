<?php 
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] == 'admininstrator'){
  ?>

<?php 
$ar_judul =['No', 'Fullname', 'Username', 'Email', 'Role', 'Foto', 'Action'];

?>
<a href="index.php?hal=form_member" type="button" class="btn btn-success">input data</a>
<br><br>
<h3 id="div">Data Member</h3>
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
      $model = new Member();
      $rs = $model->dataMember();
      $no = 1;
      foreach($rs as $mem){
      ?>
        <tr>
          <th scope="row"><?= $no ?></th>
          <td><?= $mem['fullname'] ?></td>
          <td><?= $mem['username'] ?></td>
          <td><?= $mem['email'] ?></td>
          <td><?= $mem['role'] ?></td>
          <td><?= $mem['foto'] ?></td>
          <td>
          <a href="index.php?hal=form_member&id=<?= $mem['id'] ?>" type="button" class="btn btn-warning">Edit</a>
          </td>
        </tr>
<?php $no++; } ?>
  </tbody>
</table>
      <?php }
      else{
        include_once 'terlarang.php';
      }?>