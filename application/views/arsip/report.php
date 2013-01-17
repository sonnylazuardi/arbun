<div class="container">
	<div class="row">
		<div class="span6 offset3 strip box">
			<div class="side">
				<h3>Lapor Makalah</h3>
				<legend></legend>
				<?php $this->load->view('theme/validation'); ?>
				<p>
					Gunakan form ini untuk hanya untuk melaporkan buku yang terindikasi mengandung Plagiarisme, SARA, dll.
				</p>
				
				<?php echo form_open() ?>
				<div>
					Judul Buku :<h4><?php echo $buku->judul;?></h4>
				</div>
				<div>Penulis : <?php echo $buku->akun->get()->nama;?></div>
				<label>Alasan Laporan :</label>
				<?php echo form_textarea('lapor', $model->isi, 'style="width:95%" placeholder="Makalah ini mengandung SARA pada paragraf kedua kalimat pertama"'); ?>
				<input type="submit" name="submit" value="Lapor" class="btn btn-primary btn-large">
				<?php echo anchor('arsip/view/'.$buku->id, 'Batal', 'class="btn"') ?>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>
</div>