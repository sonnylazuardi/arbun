<div class="container">
	<div class="row">
		<div class="span6 offset3 strip box">
			<div class="side">
				<h4><i class="icon-pencil"></i> Tambah Penghargaan</h4>
				<legend></legend>
				<?php $this->load->view('theme/validation'); ?>
				<?php echo form_open() ?>
				<div>
					<img src="<?php echo $buku->get_cover() ?>" width="65px" class="sauto" alt="" />
					<strong><?php echo $buku->judul;?></strong>
				</div>
				<div><?php echo $buku->akun->get()->nama;?></div>
				<div>
					<label>Nama Penghargaan :</label>
					<?php echo form_input('data[nama]', $model->nama, 'style="width:95%" placeholder="Makalah TA terbaik tahun 2013"'); ?>
					<input type="submit" name="submit" value="Tambah" class="btn btn-primary btn-large">
					<?php echo anchor('arsip/view/'.$buku->id, 'Batal', 'class="btn"') ?>
					<?php echo form_close() ?>
				</div>
			</div>
		</div>
	</div>
</div>