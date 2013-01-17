<?php $this->load->view('user/header.php'); ?>
<div class="container">
	<?php echo form_open_multipart(); ?>
	<div class="row">
		<?php $this->load->view('user/sidebar.php'); ?>
		<div class="span9 strip box" >
			<h3>Edit Profil</h3>
			<legend></legend>	
			<div class="row" style="margin:10px;">
				<?php $this->load->view('user/_form'); ?>
				<div class="span4">
					<label>Password Baru:</label>
					<?php echo form_password('Akun[password]'); ?>
					<label>Ulangi Password Baru:</label>
					<?php echo form_password('Akun[confirm_password]'); ?>
				</div>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-success">Ganti</button>
			</div>
		</div>
	</div>
</div>