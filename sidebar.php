<?php
$obj1 = NEW Divisi();
$ar_divisi = $obj1->dataDivisi();

$obj2 = NEW Jabatan();
$ar_jabatan= $obj2->dataJabatan();
?>

				<?php 
					if(isset($_SESSION['MEMBER']) ){
				?>
<div class="col-md-3">
			<div class="list-group">
				 <a href="#" class="list-group-item list-group-item-action active">Divisi</a>
		
				<?php
				foreach($ar_divisi as $div){
				?>

				<div class="list-group-item">
					<a href="index.php?hal=pegawai&id=<?= $div['id'] ?>"><?= $div['nama'] ?></a>
				</div>

				<?php } ?>
			</div>
			<br><br>
			<div class="list-group">
				 <a href="#" class="list-group-item list-group-item-action active">Jabatan</a>

				 <?php
				foreach($ar_jabatan as $jab){
				?>

				<div class="list-group-item">
					<a href="index.php?hal=pegawai&idj=<?= $jab['id'] ?>"><?= $jab['nama'] ?></a>
				</div>

				<?php } ?>
			</div>
				<?php } //akhir otoritas
				else{ ?>
<div class="col-md-3">
	<div class="list-group">
		<a class="list-group-item list-group-item-action active">Login</a>
		<div class="list-group-item">
			<?php 
			include_once 'login.php';
			?>
		</div>	
	</div>				
	<?php }?>
</div>
</div>