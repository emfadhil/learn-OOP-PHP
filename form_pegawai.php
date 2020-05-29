<?php 
if(isset($_SESSION['MEMBER']) ){
?>

<?php
// --------------awal proses edit data-------------------
//yangkap request idedit
$idedit = $_REQUEST['idedit'];
$model = new Pegawai();
if(!empty($idedit) ){ //modus edit data lama
  $rs =  $model->detailPegawai([$idedit]);
}
else{ //modus entry data baru
 $rs = [];
}
// --------------akhir proses edit data------------------- 
// --------------master data di radio dan select-------------------
$arr_gender = ['Laki-Laki'=>'L','Perempuan'=>'P']; //arr skalar
$obj1 = new Jabatan();
$obj2 = new Divisi();
$arr_jabatan = $obj1->dataJabatan(); //arr assoc
$arr_divisi = $obj2->dataDivisi();
?>

<h3 id="peg"> Form Pegawai</h3>
<form method="POST" action="controller_pegawai.php">
  <div class="form-group row">
    <label for="nip" class="col-4 col-form-label">NIP</label> 
    <div class="col-8">
      <input id="nip" name="nip" value="<?= $rs['nip'] ?>" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama</label> 
    <div class="col-8">
      <input id="nama" name="nama" value="<?= $rs['nama'] ?>"type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Jenis Kelamin</label> 
    <div class="col-8">

    <?php 
    // $label untuk menagkap 'Laki-Laki', $jk u/ menagkap 'L'
    foreach($arr_gender as $label => $jk){
      //tampilkan data lama
      $cek = ($jk == $rs['gender']) ? 'checked' : '';
      ?>
      <div class="form-check form-check-inline">
        <input name="gender" type="radio" <?= $cek ?> class="form-check-input" value="<?= $jk ?>"> 
        <label for="gender_0" class="form-check-input"><?= $label ?></label>
      </div>
    <?php }?>

    </div>
  </div>
  <div class="form-group row">
    <label for="alamat" class="col-4 col-form-label">Alamat</label> 
    <div class="col-8">
      <textarea id="alamat" name="alamat" cols="40" rows="5" class="form-control"><?= $rs['alamat'] ?></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="foto" class="col-4 col-form-label">Foto</label> 
    <div class="col-8">
      <input id="foto" name="foto" value="<?= $rs['foto'] ?>" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <input id="email" name="email" value="<?= $rs['email'] ?>" type="email" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="tempat" class="col-4 col-form-label">Tempat Lahir</label> 
    <div class="col-8">
      <input id="tempat" name="tempat" value="<?= $rs['tempat_lahir'] ?>" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="tanggal_lahir" class="col-4 col-form-label">Tanggal Lahir</label> 
    <div class="col-8">
      <input id="tanggal_lahir" name="tanggal_lahir" value="<?= $rs['tanggal_lahir'] ?>" type="date" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="divisi" class="col-4 col-form-label">Divisi</label> 
    <div class="col-8">
      <select id="divisi" name="divisi" class="custom-select">
        <option value="">--Pilih divisi--</option>
        
        <?php 
        foreach($arr_divisi as $div){
          //tampilkan data lama
          $sel = ($div['id'] == $rs['divisi_id']) ? 'selected' : '';
        ?>
        <option value="<?= $div['id'] ?>" <?= $sel ?>><?= $div['nama'] ?></option>
        <?php } ?>
      
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="jabatan" class="col-4 col-form-label">Jabatan</label> 
    <div class="col-8">
      <select id="jabatan" name="jabatan" class="custom-select">
      <option value="">--Pilih jabatan--</option>
      
      <?php 
        foreach($arr_jabatan as $jab){
          //tamplkan data lama
          $sel = ($jab['id'] == $rs['jabatan_id']) ? 'selected' : '';
        ?>
        <option value="<?= $jab['id'] ?>" <?= $sel ?>><?= $jab['nama'] ?></option>
        <?php } ?>

      </select>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
    <?php 
    
    if(empty($idedit) ){ //modus entry data baru
  ?>
    <button name="proses" value="simpan" type="submit" class="btn btn-primary">Simpan</button>
    <?php 
    }
    else{ //modus edit data lama
      ?>
    <button name="proses" value="hapus" type="submit" onclick="return confirm('yakin hapus?')" class="btn btn-danger">Hapus</button>
    <button name="proses" value="ubah" type="submit" class="btn btn-warning">Ubah</button>
    <!-- hidden field untuk melempar idedit ke controller -->
    <input type="hidden" name="idx" value="<?= $idedit ?>">
    <?php } ?>
    <button name="proses" value="batal" type="submit" class="btn btn-info">Batal</button>
    </div>
  </div>
</form>

    <?php }
    else{
      include_once 'terlarang.php';
    }?>