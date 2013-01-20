<?php echo form_open('penulis/index', array('method'=>'get', 'style'=>'margin:0')) ?>
<?php echo form_hidden('_q', isset($_GET['_q'])?$_GET['_q']:'') ?>
<div class="span3">
	<div class="row">
		<div class="span3 strip box">
			<div class="side">
				<h4>Urutan</h4>
				<legend></legend>
				<?php 
					$u = array(''=>'Pilih','id'=>'Waktu Bergabung', 'buku_view_count'=>'Terpopuler', 'nama'=>'Sesuai Abjad', 'buku_count'=>'Arsip Terbanyak');
					echo form_dropdown('_urut', $u, $model->_urut, 'onchange="this.form.submit()"');
				?>
			</div>
		</div>
		<div class="span3 strip box">
			<div class="side"><h4>Filter</h4>
				<legend></legend>
				<label>Status</label>
					<?php 
						$u = array('' => 'Semua', 1=>'Dosen', 2=>'Mahasiswa', 3=>'Staf', 4=>'Alumni');
						echo form_dropdown('_status', $u, $model->_status, 'onchange="this.form.submit()"');
					?>
				<br>
				<label>Fakultas</label>
					<?php
						$a = new Fakultas();
						$u = array(''=>'Semua') + $a->getArray();
						echo form_dropdown('_fakultas_id', $u, $model->_fakultas_id, 'onchange="this.form.submit()"');
					?>
				<label>Program Studi</label>
					<?php
						$a = new Jurusan();
						$u = array(''=>'Semua') + $a->getArray();
						echo form_dropdown('_jurusan_id', $u, $model->_jurusan_id, 'onchange="this.form.submit()"');
					?>
			</div>
		</div>
	</div>
</div>
<?php echo form_close() ?>