<div class="span3">
	<div class="row">
		<div class="span3 strip box">
			<div class="side">
				<h4>Urutan</h4>
				<legend></legend>
				<?php 
					$u = array('populer'=>'Terpopuler', 'favorit'=>'Terfavorit', 'tgl_terbit'=>'Tanggal Terbit', 'tgl_upload'=>'Tanggal Upload', 'judul'=>'Judul', 'penulis'=>'Penulis');
					echo form_dropdown('kat', $u);
				?>
			</div>
		</div>
		<div class="span3 strip box">
			<div class="side"><h4>Filter</h4>
				<legend></legend>
				<label>Kategori :</label>
				<span style="width:100px">
					<?php 
						$u = new Kategori();
						$arr = $u->getArray();
						echo form_dropdown('kat', $arr);
					?>
					</span>
				<label>Mata Kuliah :</label>
					<?php 
						$u = new Matkul();
						$arr = $u->getArray();
						echo form_dropdown('matkul', $arr);
					?>
				<label>Bidang :</label>
					<?php 
						$u = new Bidang();
						$arr = $u->getArray();
						echo form_dropdown('bid', $arr);
					?></div>
		</div>
	</div>
</div>

