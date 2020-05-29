<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
				 
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="navbar-toggler-icon"></span>
				</button> <a class="navbar-brand" href="#">Tech Muda 4</a>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="navbar-nav">
						<li class="nav-item active">
							 <a class="nav-link" href="index.php?hal=home#home">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							 <a class="nav-link" href="index.php?hal=about#about">About Us</a>
						</li>
						<!--<li class="nav-item">-->
						<!--	 <a class="nav-link" href="index.php?hal=test">cek Lokasi</a>-->
						<!--</li>-->
						<?php if(isset($_SESSION['MEMBER']) ){?>
						<li class="nav-item dropdown">
							 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Master Data</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								 <a class="dropdown-item" href="index.php?hal=pegawai#peg">Pegawai</a> 
								 <a class="dropdown-item" href="index.php?hal=divisi#div">Divisi</a> 
								 <a class="dropdown-item" href="index.php?hal=jabatan#jab">Jabatan</a>
								<?php if($_SESSION['MEMBER']['role'] != 'staff'){
								?>
								<div class="dropdown-divider">
								</div> <a class="dropdown-item" href="index.php?hal=gaji">Gaji</a>
								<?php } ?>
							</div>
						</li>
						<?php }?>

						<?php 
						if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'staff'){
						?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Pelatihan</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								 <a class="dropdown-item" href="index.php?hal=materi">Materi</a> 
								 <a class="dropdown-item" href="index.php?hal=diklat">Diklat</a>
							</div>	 
						</li>
						<?php }?>
					</ul>

					<?php
					if(isset($_SESSION['MEMBER']) ) {
					?>
					<form class="form-inline">
						<input class="form-control mr-sm-2" type="text" name="nama">
						<!-- hidden field kirim u/ data -->
						<input class="form-control mr-sm-2" type="hidden" name="hal" value="pegawai">  
						<button class="btn btn-primary my-2 my-sm-0" type="submit">
							Cari
						</button>
					</form>
					<?php } ?>

					<?php
					if(isset($_SESSION['MEMBER']) ) {
					?>
					<ul class="navbar-nav ml-md-auto">
						<li class="nav-item dropdown">
							 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Halo, <?= $_SESSION['MEMBER']['fullname']?></a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
								 <a class="dropdown-item" href="index.php?hal=profilku&id=<?= $_SESSION['MEMBER']['id']?> ">Profil ku</a>  
								 <?php 
								 if( $_SESSION['MEMBER']['role'] == 'admininstrator' ){
								 ?>
								 <a class="dropdown-item" href="index.php?hal=member">Kelola Member</a>
								 <?php } ?>
								<div class="dropdown-divider">
								</div> <a class="dropdown-item" href="logout.php">Logout</a>
							</div>
						</li>
						<?php }
						else{
							// kosong
						}?>
					</ul>
				</div>
			</nav>
		</div>
	</div>