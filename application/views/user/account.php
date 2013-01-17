<?php $this->load->view('user/header.php'); ?>
<div class="container">
	<div class="row">
		<?php $this->load->view('user/sidebar.php'); ?>
		<div class="span9 strip box" >
			<h3>Profil</h3>
			<legend></legend>
			<?php echo anchor('user/editprofil', 'Edit Profil', array('class'=>'btn btn-success', 'style'=>'margin-left:20px;')) ?>
			<?php $this->load->view('user/biodata'); ?>
		</div>
	</div>
</div>