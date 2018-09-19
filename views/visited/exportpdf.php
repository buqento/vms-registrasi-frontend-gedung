<div class="container">
	<div class="row text-center text-sm">
		<h3>Selamat datang di <strong><?php echo $_GET['destination']; ?></strong></h3>
		<h1><strong><?php echo strtoupper($_GET['guest_name']); ?></strong></h1>
		<hr>
		<p>Kode kunjungan anda</p>
		<img width="600" src="<?php echo '../../yiibase/qrcode/'.$_GET['visit_code'].'.png';?>">
		<h1><?php echo $_GET['visit_code']; ?></h1>
		<hr>
	</div>

	<div>
		
		<p><small>Ketentuan:</small></p>
		
		<ol>
			<li><small>Kode unik ini bersifat rahasia.</small></li>
			<li><small>Kode unik ini hanya berlaku untuk 1 (satu) hari.</small></li>
			<li><small>Kode unik ini mengikat ke identitas pribadi anda dan tidak dapat dipindah tangankan.</small></li>
			<li><small>Segala bentuk penyalahgunaan kode unik diatas akan diproses secara hukum yang berlaku di Indonesia.</small></li>
		</ol>
		

	</div>	

</div>