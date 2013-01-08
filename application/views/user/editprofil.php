<div class="container">
  <div class="span6 desk">
    <h3>Akun</h3>
	</div>
</div>
<div class="container">
	<?php echo form_open('user/editprofil'); ?>
	<div class="row">
		<?php $this->load->view('user/sidebar.php'); ?>
		<div class="span9 strip box" >
			<h3>Edit Profil</h3>
			<legend></legend>	
			<div class="row" style="padding:0 20px 20px 20px;">
				<?php $this->load->view('theme/validation', array('model'=>$model)); ?>
				<div class="span4">
					<label>Nama :</label>
					<?php echo form_input('Akun[nama]', $model->nama) ?>
					<label>NIM :</label>
					<?php echo form_input('Akun[nim]', $model->nim) ?>
					<label>Email :</label>
					<?php echo form_input('Akun[email]', $model->email) ?>
					<label>Tanggal Lahir :</label>
					<?php 
						$tgls = array();
						for($i=1;$i<=31;$i++)$tgls[$i]=$i;
						echo form_dropdown('Akun[tgl]', $tgls, $model->tgl, 'class="span1"');
					?>
					<?php 
						$blns = array('1'=>"Januari", '2'=>"Februari", '3'=>"Maret", '4'=>"April", '5'=>"Mei", '6'=>"Juni", '7'=>"Juli", '8'=>"Agustus", '9'=>"September", '10'=>"Oktober", '11'=>"November", '12'=>"Desember");
						echo form_dropdown('Akun[bln]', $blns, $model->bln, 'class="span2"');
					?>
					<?php echo form_input('Akun[thn]', $model->thn, 'class="span1"') ?>
				</div>
				<div class="span4">
					<label>Status :</label>
					<?php 
						$statuses = array('Dosen', 'Mahasiswa', 'Staf', 'Lain-lain');
						echo form_dropdown('Akun[status]', $statuses, $model->status);
					?>
					<label>Fakultas/Sekolah :</label>
					<?php 
						$ret = new Fakultas();
						$fakultases = $ret->getArray();
						echo form_dropdown('Akun[id_fakultas]', $fakultases, $model->id_fakultas);
					?>
					<label>Jurusan :</label>
					<?php 
						$ret = new Jurusan();
						$jurusans = $ret->getArray();
						echo form_dropdown('Akun[id_jurusan]', $jurusans, $model->id_jurusan);
					?>
					<label>Jenis Kelamin :</label>
					<?php 
						$kelamins = array('Laki-laki', 'Perempuan');
						echo form_dropdown('Akun[jen_kelamin]', $kelamins, $model->jen_kelamin);
					?>
				</div>
				<div class="span4">
					<label>Password Lama:</label>
					<?php echo form_password('Akun[password_old]'); ?>
					<label>Password Baru:</label>
					<?php echo form_password('Akun[password]'); ?>
					<legend></legend>
				<button type="submit" class="btn btn-success">Ubah</button>
				<button type="submit" class="btn btn-primary">Batal</button>
				</div>
				
			</div>
		</div>
	</div>
</div>