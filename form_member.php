<?php 
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] == 'admininstrator'){
  ?>
<?php
// --------------awal proses edit data-------------------
//yangkap request idedit
$id = $_REQUEST['id'];
$arr_role = ['admininstrator'=>'admininstrator', 'manager'=>'manager', 'staff'=>'staff'];
$model = new Member();
if(!empty($id) ){ //modus edit data lama
  $rs =  $model->infoMember([$id]);
}
else{ //modus entry data baru
 $rs = [];
}
// --------------akhir proses edit data------------------- 
// --------------master data di radio dan select-------------------
?>
<h3>Input Member</h3>
<form action="controller_member.php" method="POST">
    <div class="form-group row">
        <label class="col-4 col-form-label">Fullname</label> 
        <div class="col-8">
        <input name="fullname" value="<?= $rs['fullname'] ?>" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="gapok" class="col-4 col-form-label">Username</label> 
        <div class="col-8">
            <input id="gapok" name="username" value="<?= $rs['username'] ?>" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="tunjab" class="col-4 col-form-label">Email</label> 
        <div class="col-8">
            <input id="tunjab" name="email" value="<?= $rs['email'] ?>" type="email" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="lain" class="col-4 col-form-label">Password</label> 
        <div class="col-8">
            <input id="lain" name="password" value="<?= $rs['password'] ?>" type="password" class="form-control">
        </div>
    </div>
    <div class="form-group row">
    <label class="col-4">Role</label> 
    <div class="col-8">

    <?php 
    foreach($arr_role as $label => $role){
      //tampilkan data lama
      $cek = ( $label == $rs['role'] ) ? 'checked' : '';
      ?>
      <div class="form-check form-check-inline">
        <input name="role" type="radio" <?= $cek ?> class="form-check-input" value="<?= $role ?>"> 
        <label for="role" class="form-check-input"><?= $label ?></label>
      </div>
    <?php }?>

    </div>
  </div>
    <div class="form-group row">
        <label for="lain" class="col-4 col-form-label">Foto</label> 
        <div class="col-8">
            <input id="lain" name="foto" value="<?= $rs['foto'] ?>" type="text" class="form-control">
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
    <!-- hidden field untuk melempar id ke controller -->
    <input type="hidden" name="id" value="<?= $rs['id'] ?>">
    <?php } ?>
    <button name="proses" value="batal" type="submit" class="btn btn-info">Batal</button>
    </div>
  </div>
</form>

      <?php }
      else{
        include_once 'terlarang.php';
      }?>