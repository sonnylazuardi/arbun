<?php $this->load->view('theme/validation'); ?>

<div class="row" style="margin:10px">
	<div class="span4">
		<label>Judul :</label>
		<?php echo form_input('Buku[judul]', $model->judul) ?>
		<label>Abstrak :</label>
		<?php echo form_input('Buku[abstrak]', $model->abstrak) ?>
		<label>Bidang :</label>
		<?php echo form_input('Buku[bidang]', $model->bidang) ?>
		<label>Status :</label>
		<?php echo form_input('Buku[status]', $model->status) ?>
	</div>
	<div class="span4">
		<h5>Informasi Tambahan</h5>
		<legend></legend>
		<label>Jilid :</label>
		<?php echo form_input('Buku[jilid]', $model->jilid) ?>
		<label>Penerbit :</label>
		<?php echo form_input('Buku[penerbit]', $model->penerbit) ?>
		<label>ISBN :</label>
		<?php echo form_input('Buku[ISBN]', $model->ISBN) ?>
		<label>Tanggal Terbit :</label>
		<?php echo form_input('Buku[tgl_terbit]', $model->tgl_terbit) ?>
	</div>
</div>
<div class="form-actions">
	<button type="submit" class="btn btn-success">Simpan</button>
</div>