<div class="container">
	<div class="row">
		<div class="span6 offset3 strip box">
			<div class="side">
				<h3>Tambah Penghargaan</h3>
				<legend></legend>
				<?php $this->load->view('theme/validation'); ?>
				<?php echo form_open() ?>
				<div>
					Judul Buku :<h4><?php echo $buku->judul;?></h4>
				</div>
				<div>Penulis : <?php echo $buku->akun->get()->nama;?></div>
				<label>Nama Penghargaan :</label>
				<?php echo form_input('data[nama]', $model->nama, 'style="width:95%" placeholder="Makalah TA terbaik tahun 2013"'); ?>
				<input type="submit" name="submit" value="Tambah" class="btn btn-primary btn-large">
				<?php echo anchor('arsip/view/'.$buku->id, 'Batal', 'class="btn"') ?>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>
</div>