<?php 
if(isset($_SESSION['MEMBER']) ){ //memberikan keamanan
?>

<?php 
$arr_judul = ['No', 'NIP', 'Nama', 'Gender', 'Alamat', 'Divisi','Jabatan','Foto', 'Action'];
?>

<a href="index.php?hal=form_pegawai#peg" type="button" class="btn btn-success">input data</a>
<h3 id="peg">Data Pegawai</h3>
<table class="table table-sm table-dark">
  <thead>
    <tr>
      <?php 
      foreach($arr_judul as $judul){
      ?>
      <th scope="col"><?= $judul ?></th>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
  <?php
    //ciptakan object
    $model = new Pegawai();

    // fitur searching dan filter
    $nama = $_GET['nama']; //ambil dari hidden field di menu.php
    $id = $_GET['id']; //ambil filter divisi di url dari sidebar.php
    $idj = $_GET['idj']; //ambil filter Jabatan di url dari sidebar.php
    if(!empty($nama) ){ //filtering
      $rs = $model->cariPegawai($nama);
    }
    elseif(!empty($id) ){
      $rs = $model->filterDivisi($id);
    }
    elseif(!empty($idj) ){
      $rs = $model->filterJabatan($idj);
    }
    else{ //jika user tidak searching
    $rs = $model->dataPegawai();
    }
    
      $no = 1;
      foreach($rs as $peg){
        if(empty($peg['foto']) ){
          $peg['foto'] ='nophoto.png';
        } 
      ?>
        <tr>
          <th scope="row"><?= $no ?></th>
          <td><?=$peg['nip']?></td>
          <td><?=$peg['nama']?></td>
          <td><?=$peg['gender']?></td>
          <td><?=$peg['alamat']?></td>
          <td><?=$peg['divisi']?></td>
          <td><?=$peg['jabatan']?></td>
          <td>
            <img src="images/<?= $peg['foto'] ?>" width="20%"/>
          </td>
          <td>
          <a href="index.php?hal=detail_pegawai&id=<?=$peg['id']?>" type="button" class="btn btn-primary">Detail</a>
          <a href="index.php?hal=form_pegawai&idedit=<?=$peg['id']?>" type="button" class="btn btn-warning">Edit</a>
          </td>
        </tr>
<?php $no++; } ?>
  </tbody>
</table>
      <?php }
      else{
       include_once 'terlarang.php'; 
      }?>