<div class="page">
	<?php echo form_open('auth/register'); ?>
	<div class="row">
		<div class="span8 offset5 strip box">
					<h3>Registrasi</h3>
					<legend></legend>
					<div class="row" style="padding:0 20px 20px 20px;">

						<?php $this->load->view('theme/validation', array('model'=>$model)); ?>

						<div class="span4">
							<label>Nama :</label>
							<?php echo form_input('Akun[nama]', cekPost('Akun','nama')) ?>
							<label>NIM :</label>
							<?php echo form_input('Akun[nim]', cekPost('Akun','nim')) ?>
							<label>Email :</label>
							<?php echo form_input('Akun[email]', cekPost('Akun','email')) ?>
							<label>Tanggal Lahir :</label>
							<?php 
								$tgls = array();
								for($i=1;$i<=31;$i++)$tgls[$i]=$i;
								echo form_dropdown('Akun[tgl]', $tgls, cekPost('Akun','tgl'), 'class="span1"');
							?>
							<?php 
								$blns = array('1'=>"Januari", '2'=>"Februari", '3'=>"Maret", '4'=>"April", '5'=>"Mei", '6'=>"Juni", '7'=>"Juli", '8'=>"Agustus", '9'=>"September", '10'=>"Oktober", '11'=>"November", '12'=>"Desember");
								echo form_dropdown('Akun[bln]', $blns, cekPost('Akun','bln'), 'class="span2"');
							?>
							<?php echo form_input('Akun[thn]', cekPost('Akun','thn'), 'class="span1"') ?>
						</div>
						<div class="span3">
							<label>Status :</label>
							<?php 
								$statuses = array('Dosen', 'Mahasiswa', 'Staf', 'Lain-lain');
								echo form_dropdown('Akun[status]', $statuses, cekPost('Akun','status'));
							?>
							<label>Fakultas/Sekolah :</label>
							<?php 
								$ret = new Fakultas();
								$fakultases = $ret->getArray();
								echo form_dropdown('Akun[id_fakultas]', $fakultases, cekPost('Akun','id_fakultas'));
							?>
							<label>Jurusan :</label>
							<?php 
								$ret = new Jurusan();
								$jurusans = $ret->getArray();
								echo form_dropdown('Akun[id_jurusan]', $jurusans, cekPost('Akun','id_jurusan'));
							?>
							<label>Jenis Kelamin :</label>
							<?php 
								$kelamins = array('Laki-laki', 'Perempuan');
								echo form_dropdown('Akun[jen_kelamin]', $kelamins, cekPost('Akun','jen_kelamin'));
							?>
						</div>
						<div class="span4">
							<label>Password :</label>
							<?php echo form_password('Akun[password]'); ?>
							<label>Ulangi Password :</label>
							<?php echo form_password('Akun[confirm_password]'); ?>
							<label>Captcha :</label>
							<button type="submit" class="btn btn-success">Registrasi</button>
						</div>
					</div>
		</div>	
		
	</div>
</div>