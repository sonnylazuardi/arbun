<?php echo form_open('arsip/index', array('method'=>'get', 'style'=>'margin:0')) ?>
<?php echo form_hidden('_q', $model->_q) ?>
<?php 
if (!empty($_GET['adv'])) {
	echo form_hidden('adv', 'adv');
}
foreach (array('_akun_nama', '_judul', '_tahun', '_abstrak') as $rel) {
	if (!empty($model->{$rel})) {
		echo form_hidden($rel, $model->{$rel});
	}
}
?>
<div class="span3">
	<div class="row">
		<div class="span3 strip box">
			<div class="side">
				<h4>Urutan</h4>
				<legend></legend>
				<?php 
					$u = array(''=>'Pilih', 'view'=>'Terpopuler', 'rating_count'=>'Terfavorit', 'komentar_count'=>'Tebanyak Diskusi', 'tgl_terbit'=>'Tanggal Terbit', 'created'=>'Tanggal Upload', 'judul'=>'Judul', 'akun_nama'=>'Penulis');
					echo form_dropdown('_urut', $u, $model->_urut, 'onchange="this.form.submit()"');
				?>
			</div>
		</div>
		<div class="span3 strip box">
			<div class="side"><h4>Filter</h4>
				<legend></legend>
				<label>Kategori :</label>
					<?php 
						$u = new Kategori();
						$arr = array(''=>'Semua') + $u->getArray();
						echo form_dropdown('_kategori', $arr, $model->_kategori, 'onchange="this.form.submit()"');
					?>
				<br>
				<label>M. Kuliah :</label>
					<?php 
						$u = new Matkul();
						$arr = array(''=>'Semua') + $u->getArray();
						echo form_dropdown('_matkul', $arr, $model->_matkul, 'onchange="this.form.submit()"');
					?>
				<br>
				<label>Bidang :</label>
					<?php 
						$u = new Bidang();
						$arr = array(''=>'Semua') + $u->getArray();
						echo form_dropdown('_bidang', $arr, $model->_bidang, 'onchange="this.form.submit()"');
					?></div>
		</div>
	</div>
</div>
<?php echo form_close() ?>
