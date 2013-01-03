<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<div class="container">
      <div class="span6 desk">
        <h3>Akun</h3>
    	</div>
    </div>
<div class="container" style="color:black;">
	<div class="row">
		<div class="span3" style="border-radius:10px;background-color:white;padding-top:10px">
			<p onmouseover="this.style.background='#cccccc'" onmouseout="this.style.background='rgb(222,222,222)'" style="padding-left:10px;padding-top:10px;height:35px;background-color:rgb(222,222,222)">Profil</p>
			<p onmouseover="this.style.background='#cccccc'" onmouseout="this.style.background='white'" style="padding-left:10px;padding-top:10px;height:35px;background-color:rgb(255,255,255)"><?php echo anchor('user/arsipku', 'Arsipku') ?></p>
		</div>
		<div class="span9" style="border-radius:10px;background-color:white;padding-bottom:10px">
			<h3 style="margin-left:20px;">Profil</h3>
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