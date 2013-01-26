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
	<label>Angkatan :</label>
	<?php echo form_input('Akun[angkatan]', $model->angkatan) ?>
</div>

<div class="span3">
	<label>Status :</label>
	<?php 
		$statuses = array('Dosen', 'Mahasiswa', 'Staf', 'Alumni');
		echo form_dropdown('Akun[status]', $statuses, $model->status);
	?>
	<label>Fakultas/Sekolah :</label>
	<div id="fakultas">
	<?php 
		$ret = new Fakultas();
		$fakultases = $ret->getArray();
		$fakultases = array(''=>'Pilih Fakultas') + $fakultases;
		echo form_dropdown('Akun[fakultas_id]', $fakultases, $model->fakultas_id, 'id="fakultas_id"');
	?>
	</div>
	<label>Jurusan :</label>
	<div id="jurusan">
	<?php 
		if(!empty($model->jurusan_id)) {
			echo form_dropdown('Akun[jurusan_id]', array($model->jurusan_id=>$model->jurusan->get()->nama), $model->jurusan_id);
		} else {
			echo form_dropdown('Akun[jurusan_id]', array(''=>'Pilih Fakultas'), '');
		}
	?>
	</div>
	<label>Jenis Kelamin :</label>
	<?php 
		$kelamins = array('Laki-laki', 'Perempuan');
		echo form_dropdown('Akun[jen_kelamin]', $kelamins, $model->jen_kelamin);
	?>
	<label>Gambar Profil :</label>
	<img src="<?php echo $model->get_profpic(); ?>" alt="" width="80px">
	<?php 
		echo form_upload('user_file');
	?>
	<p class="help-block">Gambar berupa file jpg,gif,png maks 1200kb, berukuran 200x200px</p>
</div>
<script src="<?php echo base_url() ?>public/js/jquery.js"></script>
<script type="text/javascript">
	$(function(){
		$('#fakultas_id').change(function(){
			var fakultas_id = {fakultas_id:$("#fakultas_id").val()};
			$(this).addClass('loadings');
      $.ajax({
	      type: "POST",
	      url : "<?php echo site_url('token/jurusan')?>",
	      data: fakultas_id,
	      success: function(msg){
	        $('#jurusan').html(msg);
	        $("#fakultas_id").removeClass('loadings');
	      }
		  });
		});
	});
</script>