<?php $this->load->view('user/header.php'); ?>
<div class="container">
	<div class="row">
		<?php $this->load->view('user/sidebar.php'); ?>
		<div class="span9 strip box" >
			<h3>Profil</h3>
			<legend></legend>
			<?php echo anchor('user/editprofil', 'Edit Profil', array('class'=>'btn btn-success', 'style'=>'margin-left:20px;')) ?>
			<div class="row" style="margin-top:10px">
				<div class="span5">
					<div style="padding:20px">	
						<p>Nama</p>
						<input type="text" placeholder="Nama" readonly>
						<p>Status</p>
						<input type="text" placeholder="Mahasiswa" readonly>
						<p>Email :</p>
						<input class="span3" type="email" readonly>
						<p>Tanggal Lahir :</p>
						<input type="text" class="span1" readonly>
						<input type="text" style="margin-left:1px; width:100px" readonly>
						<input class="span1" style="margin-left:2px" type="text" readonly>
					</div>
				</div>
				<div class="span4">
					<p>NIM/NIP</p>
					<input type="text" placeholder="13511" readonly>
					<p>Fakultas</p>
					<input type="text" placeholder="STEI" readonly>
					<p>Jurusan</p>
					<input type="text" placeholder="Teknik Informatika" readonly>
				</div>
			</div>
		</div>
	</div>
</div>