<?php
use Da\QrCode\QrCode;
$qrCode = (new QrCode($_GET['visit_code']))
    ->setSize(500)
    ->setMargin(5)
    ->useForegroundColor(0, 0, 0);
?>
<div class="container">
	<div class="row text-center text-sm">
		<h3>Selamat datang di <strong><?php echo $_GET['destination']; ?></strong></h3>
		<h1><strong><?php echo strtoupper($_GET['guest_name']); ?></strong></h1>
		<hr>
		<p>Kode kunjungan anda</p>
		<img src="<?php echo $qrCode->writeDataUri(); ?>" alt="..." class="img-thumbnail">
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