<table class="table table-striped table-condensed table-view">
	<tbody>
	<tr><td><?php echo 'NIM/NIP : ';?></td> <td><?php  echo $model->nim ?></td></tr>
	<tr><td><?php echo 'Nama Lengkap : ';?></td> <td><?php  echo $model->nama ?></td></tr>
	<tr><td><?php echo 'Status : ';?></td> <td><?php $u = array('Dosen','Mahasiswa','Staf','Alumni'); echo $u[$model->status] ?></td></tr>
	<tr><td><?php echo 'Email : ';?></td> <td><?php  echo $model->email ?></td></tr>
	<tr><td><?php echo 'Fakultas : ';?></td> <td><?php  echo $model->fakultas_nama ?></td></tr>
	<tr><td><?php echo 'Program Studi : ';?></td> <td><?php  echo $model->jurusan_nama ?></td></tr>
	<tr><td><?php echo 'Angkatan : ';?></td> <td><?php  echo $model->angkatan ?></td></tr>

	<?php $arr=array('Laki-laki','Perempuan') ?>
	<tr><td><?php echo 'Jenis Kelamin : ';?></td> <td><?php  echo $arr[$model->jen_kelamin] ?></td></tr>
	<tr><td><?php echo 'Tanggal Lahir : ';?></td> <td><?php  echo $model->tgl_lahir ?></td></tr>

	<tr><td><?php echo 'Profil Dilihat : ';?></td> <td><?php echo $model->view;?></td></tr>
		<tr><td><?php echo 'Selipan Diterima : ';?></td> <td><?php echo $model->_count_bookmark();?></td></tr>
	<tr><td><?php echo 'Arsip Dibuat : ';?></td> <td><?php  echo $model->buku->count() ?></td></tr>
	<?php 
	if($model->buku->count())
		$tglku = date("d M Y", strtotime($model->buku->order_by('created', 'desc')->get(1)->tgl_terbit))
	; else $tglku = ''; ?>
	<tr><td><?php echo 'Arsip Terbaru :';?></td> <td><?php echo $tglku; ?></td></tr>
	<tr><td><?php echo 'Penghargaan Diterima : ';?></td> <td><?php echo $model->_count_award();?></td></tr>
	<tr><td><?php echo 'Penghargaan Terbaru :';?></td> <td><?php echo $model->_newest_award();?></td></tr>

	</tbody>
</table>

