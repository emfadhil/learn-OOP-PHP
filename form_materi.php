<?php 
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'staff'){
?>

<?php 
  // tangkap request di url (id)
  $id = $_GET['idedit'];
  if(!empty($id) ){ // modus edit data lama
    $model = new Materi();
    $rs = $model->getMateri([$id]);
  }
  else{ //modus entry data baru
    $rs = [];
  }

?>

<h3 id="div"> Form Materi</h3>
<form method="POST" action="controller_materi.php">
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama Materi</label> 
    <div class="col-8">
      <input id="nama" name="nama" value="<?= $rs['nama'] ?>" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
    <?php 
    
      if(empty($id) ){ //modus entry data baru
    ?>
      <button name="proses" value="simpan" type="submit" class="btn btn-primary">Simpan</button>
      <?php 
      }
      else{ //modus edit data lama
        ?>
      <button name="proses" value="hapus" type="submit" onclick="return confirm('yakin hapus?')" class="btn btn-danger">Hapus</button>
      <button name="proses" value="ubah" type="submit" class="btn btn-warning">Ubah</button>
      <!-- hidden field untuk melempar idedit ke controller -->
      <input type="hidden" name="idx" value="<?= $id ?>">
      <?php } ?>
      <button name="proses" value="batal" type="submit" class="btn btn-info">Batal</button>
    </div>
  </div>
</form>

      <?php }
       else{
        include_once 'terlarang.php';
       }?>