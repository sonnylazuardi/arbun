<?php echo form_open('arsip/index', array('method'=>'get', 'style'=>'margin:0')) ?>
<?php echo form_hidden('_q', isset($_GET['_q'])?$_GET['_q']:'') ?>
<div class="span3">
	<div class="row">
		<div class="span3 strip box">
			<div class="side">
				<h4>Urutan</h4>
				<legend></legend>
				<?php 
					$u = array('view'=>'Terpopuler', 'rating_count'=>'Terfavorit', 'komentar_count'=>'Tebanyak Diskusi', 'tgl_terbit'=>'Tanggal Terbit', 'created'=>'Tanggal Upload', 'judul'=>'Judul', 'akun_nama'=>'Penulis');
					echo form_dropdown('_urut', $u, $v['urut'], 'onchange="this.form.submit()"');
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
						echo form_dropdown('_kategori', $arr, $v['kategori'], 'onchange="this.form.submit()"');
					?>
				<br>
				<label>M. Kuliah :</label>
					<?php 
						$u = new Matkul();
						$arr = array(''=>'Semua') + $u->getArray();
						echo form_dropdown('_matkul', $arr, $v['matkul'], 'onchange="this.form.submit()"');
					?>
				<br>
				<label>Bidang :</label>
					<?php 
						$u = new Bidang();
						$arr = array(''=>'Semua') + $u->getArray();
						echo form_dropdown('_bidang', $arr, $v['bidang'], 'onchange="this.form.submit()"');
					?></div>
		</div>
	</div>
</div>
<?php echo form_close() ?>
