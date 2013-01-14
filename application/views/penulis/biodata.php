
	<div class="span6 strip box">
		<div class="side">
			<h4>Biodata</h4>
			<legend></legend>
			<table class="table table-striped table-condensed">
				<tbody>
				<tr><td style="text-align:right"><?php echo 'NIM/NIP : ';?></td> <td><?php  echo $model->nim ?></td></tr>
				<tr><td style="text-align:right"><?php echo 'Nama Lengkap : ';?></td> <td><?php  echo $model->nama ?></td></tr>
				<tr><td style="text-align:right"><?php echo 'Status : ';?></td> <td><?php $u = array('Dosen','Mahasiswa','Staf','Alumni'); echo $u[$model->status] ?></td></tr>
				<tr><td style="text-align:right"><?php echo 'Email : ';?></td> <td><?php  echo $model->email ?></td></tr>
				<tr><td style="text-align:right"><?php echo 'Program Studi : ';?></td> <td><?php  echo $model->jurusan->get()->nama ?></td></tr>
				<tr><td style="text-align:right"><?php echo 'Profil Dilihat : ';?></td> <td><?php echo '0';?></td></tr>
				<tr><td style="text-align:right"><?php echo 'Bookmark Diterima : ';?></td> <td><?php echo '0';?></td></tr>
				<tr><td style="text-align:right"><?php echo 'Arsip Dibuat : ';?></td> <td><?php  echo $model->buku->count() ?></td></tr>
				<tr><td style="text-align:right"><?php echo 'Arsip Terbaru :';?></td> <td><?php echo $model->buku->order_by('created', 'desc')->get(1)->tgl_terbit; ?></td></tr>
				<tr><td style="text-align:right"><?php echo 'Penghargaan Diterima : ';?></td> <td><?php echo '0';?></td></tr>
				<tr><td style="text-align:right"><?php echo 'Penghargaan Terbaru :';?></td> <td><?php echo '-';?></td></tr>
				</tbody>
			</table>
		</div>
	</div>

