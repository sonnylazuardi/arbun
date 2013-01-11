<div class="container">
	<?php echo form_open_multipart('auth/register'); ?>
	<div class="row">
		<div class="span8 offset2 strip box">
					<h3>Registrasi</h3>
					<legend></legend>
					<div class="row" style="margin:10px">

						<?php $this->load->view('user/_form'); ?>

						<div class="span4">
							<label>Password :</label>
							<?php echo form_password('Akun[password]'); ?>
							<label>Ulangi Password :</label>
							<?php echo form_password('Akun[confirm_password]'); ?>
							<label>Captcha :</label>
							<?php echo $captcha ?>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-success">Registrasi</button>
					</div>
		</div>	
		
	</div>
</div>