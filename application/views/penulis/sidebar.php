<div class="span3">
	<div class="row">
		<div class="span3 strip box">
			<div class="side">
				<h4>Urutan</h4>
				<legend></legend>

				<?php 
					$u = array('abjad'=>'Sesuai Abjad', 'jurnal'=>'Jurnal Terbanyak', 'penghargaan'=>'Penghargaan Terbanyak');
					echo form_dropdown('_urut', $u, 'abjad');
				?>
			</div>
		</div>
		<div class="span3 strip box">
			<div class="side"><h4>Filter</h4>
				<legend></legend>
				<label>Penulis</label>
					<?php 
						$u = array('all' => 'Semua', 'alumni'=>'Alumni', 'dosen'=>'Dosen', 'mahasiswa'=>'Mahasiswa');
						echo form_dropdown('_penulis', $u, 'all');
					?>
				<br>
				<label>Program Studi</label>
					<?php
						$u = array('all'=>'Semua', 'if'=>'Teknik Informatika', 'sti'=>'Sistem Teknologi Informasi', 'lain' => 'Lainnya');
						echo form_dropdown('_penulis', $u, 'abjad');
					?>
				</div>
		</div>
	</div>
</div>

