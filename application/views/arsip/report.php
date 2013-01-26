<div class="container">
	<div class="row">
		<div class="span6 offset3 strip box">
			<div class="side">
				<h4><i class="icon-bullhorn"></i> Lapor Makalah</h4>
				<legend></legend>
				<?php $this->load->view('theme/validation'); ?>
				<p>
					Gunakan form ini untuk hanya untuk melaporkan buku yang terindikasi mengandung Plagiarisme, SARA, dll.
				</p>
				
				<?php echo form_open() ?>
				<div>
					<img src="<?php echo $buku->get_cover() ?>" width="65px" class="sauto" alt="" />
					<strong><?php echo $buku->judul;?></strong>
				</div>
				<div><?php echo $buku->akun->get()->nama;?></div>
				<div>
					<label>Alasan Laporan :</label>
					<?php echo form_textarea('lapor', $model->isi, 'style="width:95%; height:100px" placeholder="Makalah ini mengandung Plagiarisme pada paragraf kedua kalimat pertama"'); ?>
					<input type="submit" name="submit" value="Lapor" class="btn btn-primary btn-large">
					<?php echo anchor('arsip/view/'.$buku->id, 'Batal', 'class="btn"') ?>
					<?php echo form_close() ?>
				</div>
			</div>
		</div>
	</div>
</div>