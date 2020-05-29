<?php
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'staff'){ 
?>

<?php
// --------------awal proses edit data-------------------
//yangkap request idedit
$id = $_REQUEST['id'];
$model = new Diklat();
if(!empty($id) ){ //modus edit data lama
  $rs =  $model->getDiklat([$id]);
}
else{ //modus entry data baru
 $rs = [];
}
// --------------akhir proses edit data------------------- 
// --------------master data di radio dan select-------------------
?>
<h3>Input Diklat Pegawai</h3>
<form action="controller_diklat.php" method="POST">
    <div class="form-group row">
        <label for="pegawai" class="col-4 col-form-label">Pegawai</label> 
        <div class="col-8">
        <select id="pegawai" name="pegawai" class="custom-select">
          <option value="">--pilih pegawai--</option>
            <?php
                $model = NEW Pegawai();
                $pegawai = $model->dataPegawai(); 
                foreach($pegawai as $peg){
                $sel = ($peg['id'] == $rs['pegawai_id']) ? 'selected' : '';
                ?>
                <option value="<?= $peg['id'] ?>" <?= $sel ?> ><?= $peg['nama'] ?></option>
                <?php }?>
        </select>    
        </div>
    </div>
    <div class="form-group row">
        <label for="materi" class="col-4 col-form-label">Materi</label> 
        <div class="col-8">
        <select id="materi" name="materi" class="custom-select">
        <option value="">--pilih materi--</option>
            <?php
                $model = NEW Materi();
                $materi = $model->dataMateri(); 
                foreach($materi as $mat){
                $sel = ($mat['id'] == $rs['materi_id']) ? 'selected' : '';
                ?>
                <option value="<?= $mat['id'] ?>" <?= $sel ?> ><?= $mat['nama'] ?></option>
                <?php }?>
        </select>    
        </div>
    </div>
    <div class="form-group row">
        <label for="gapok" class="col-4 col-form-label">Keterangan</label> 
        <div class="col-8">
            <input id="keterangan" name="keterangan" value="<?= $rs['keterangan'] ?>" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="gapok" class="col-4 col-form-label">Tanggal Mulai</label> 
        <div class="col-8">
            <input id="keterangan" name="tgl_mulai" value="<?= $rs['tgl_mulai'] ?>" type="date" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="gapok" class="col-4 col-form-label">Tanggal Akhir</label> 
        <div class="col-8">
            <input id="keterangan" name="tgl_akhir" value="<?= $rs['tgl_mulai'] ?>" type="date" class="form-control">
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
    <input type="hidden" name="idx" value="<?= $rs['id'] ?>">
    <?php } ?>
    <button name="proses" value="batal" type="submit" class="btn btn-info">Batal</button>
    </div>
  </div>
</form>

<?php
}
else{
    include_once 'terlarang.php';
}?>