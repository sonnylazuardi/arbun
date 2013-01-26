<?php $this->load->view('theme/validation'); ?>
<div class="row" style="margin:10px">
	<ul class="nav nav-tabs">
	  <li class="active"><a href="#">Pribadi</a></li>
	  <!-- <li><?php echo anchor('arsip/createlain', 'Orang Lain'); ?></li> -->
	</ul>
	<div class="span4">
		<label>Judul :</label>
		<?php echo form_input('Buku[judul]', $model->judul) ?>
		<label>Abstrak :</label>
		<?php echo form_textarea('Buku[abstrak]', $model->abstrak, 'cols="2" rows="5"') ?>

		<label>Tanggal Terbit :</label>
		<span class="help-block">Format tanggal Tahun-Bulan-Tanggal</span>
		<?php echo form_input('Buku[tgl_terbit]', $model->tgl_terbit) ?>

		<p class="help-block">Kategori, Mata Kuliah dan Bidang dipisahkan dengan koma untuk masing-masing item</p>
		
		<label>Kategori :</label>
		<?php echo form_input('Buku[kategoriku]', $model->kategoriku, 'placeholder="Makalah, Tugas Akhir" id="kategoriku"') ?>

		<label>Mata Kuliah :</label>
		<?php echo form_input('Buku[matkulku]', $model->matkulku, 'placeholder="Struktur Diskrit, Algoritma dan Struktur Data" id="matkulku"') ?>
		<label>Bidang :</label>
		<?php echo form_input('Buku[bidangku]', $model->bidangku, 'placeholder="Stack, Graf, Pohon" id="bidangku"') ?>
		<label>Status :</label>
		<?php if($model->status == 0): ?>
			Diblok
		<?php else: ?>
			<?php $arr = array(1=>'Publik', 2=>'Internal'); ?>
			<?php echo form_dropdown('Buku[status]', $arr, $model->status) ?>
		<?php endif; ?>
	</div>
	<div class="span4">
		<h5>Unggah Arsip</h5>
		<legend></legend>
    <ul id="myTab" class="nav nav-tabs">
      <li class="active"><a href="#filelokal" data-toggle="tab">File Lokal</a></li>
      <li><a href="#publicurl" data-toggle="tab">Tautan Publik</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade active in" id="filelokal">
        <?php echo form_upload('upload_pdf'); ?>
        <p class="help-block">File berupa format PDF dengan ukuran maks 2MB</p>
      </div>
      <div class="tab-pane fade" id="publicurl">
      	<label>Tautan URL :</label>
        <?php echo form_input('Buku[upload_url]', $model->upload_url, 'placeholder="http://example.com/mybook.pdf"'); ?>
      </div>
    </div>

		<h5>Informasi Tambahan</h5>
		<legend></legend>
		<label>Cover Depan :</label>
		<img src="<?php echo $model->get_cover() ?>" width="130px" alt="">
		<?php echo form_upload('upload_cover'); ?>
		 <p class="help-block">File berupa gambar berformat jpg,gif,png dengan ukuran maks 1MB</p>
		<label>Jilid :</label>
		<?php echo form_input('Buku[jilid]', $model->jilid) ?>
		<label>Penerbit :</label>
		<?php echo form_input('Buku[penerbit]', $model->penerbit) ?>
		<label>ISBN :</label>
		<?php echo form_input('Buku[ISBN]', $model->ISBN) ?>
	</div>
</div>
<div class="form-actions">
	<button type="submit" class="btn btn-success">Simpan</button>
</div>

<link href="<?php echo base_url();?>public/css/jquery.autocomplete.css" rel="stylesheet">
<script src="<?php echo base_url() ?>public/js/jquery.js"></script>
<script type="text/javascript">
$(function() {
  $("#kategoriku").autocomplete("<?php echo site_url('token/kategori') ?>", {
    remoteDataType: 'json', minChars: 1, useDelimiter: true
  });
  $("#bidangku").autocomplete("<?php echo site_url('token/bidang') ?>", {
    remoteDataType: 'json', minChars: 1, useDelimiter: true
  });
  $("#matkulku").autocomplete("<?php echo site_url('token/matkul') ?>", {
    remoteDataType: 'json', minChars: 1, useDelimiter: true
  });
});
</script>