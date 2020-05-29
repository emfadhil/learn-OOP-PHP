<?php
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'staff'){ 
?>

<?php
// --------------awal proses edit data-------------------
//yangkap request idedit
$id = $_REQUEST['id'];
$model = new Gaji();
if(!empty($id) ){ //modus edit data lama
  $rs =  $model->getGaji([$id]);
}
else{ //modus entry data baru
 $rs = [];
}
// --------------akhir proses edit data------------------- 
// --------------master data di radio dan select-------------------
?>
<h3>Input Gaji Pegawai</h3>
<form action="controller_gaji.php" method="POST">
    <div class="form-group row">
        <label for="pegawai" class="col-4 col-form-label">Pegawai</label> 
        <div class="col-8">
        <select id="pegawai" name="pegawai" class="custom-select">
            
            <?php
            $model = new Gaji();
            if(empty($rs) ){ //input data baru
            ?>
            <option value="">--Pilih pegawai--</option>
            <?php
            $pegawai = $model->dataBelumDigaji(); 
            foreach($pegawai as $peg){
            ?>
            <option value="<?= $peg['idp'] ?>"><?= $peg['nama'] ?></option>
            <?php }
             }else{ //tampil data lama
              ?>
            <?php
                $pegawai = $model->dataGaji(); 
                foreach($pegawai as $peg){
                $sel = ($peg['idp'] == $rs['pegawai_id']) ? 'selected' : '';
                ?>
                <option value="<?= $peg['idp'] ?>" <?= $sel ?> ><?= $peg['nama'] ?></option>
                <?php } }?>
        </select>    
        </div>
    </div>

    <div class="form-group row">
        <label for="gapok" class="col-4 col-form-label">Gaji Pokok</label> 
        <div class="col-8">
            <input id="gapok" name="gapok" value="<?= $rs['gapok'] ?>" type="number" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="tunjab" class="col-4 col-form-label">Tunangan Jabatan</label> 
        <div class="col-8">
            <input id="tunjab" name="tunjab" value="<?= $rs['tunjab'] ?>" type="number" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="bpjs" class="col-4 col-form-label">BPJS</label> 
        <div class="col-8">
            <input id="bpjs" name="bpjs" value="<?= $rs['bpjs'] ?>" type="number" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="lain" class="col-4 col-form-label">Lain</label> 
        <div class="col-8">
            <input id="lain" name="lain" value="<?= $rs['lain2'] ?>" type="number" class="form-control">
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