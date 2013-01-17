<?php $this->load->view('user/header.php', array('title'=>'Arsipku')); ?>
<div class="container">
	<div class="row">
		<?php $this->load->view('user/sidebar.php'); ?>
		<div class="span9 strip box">
			<h3>Arsip Saya</h3>
			<legend></legend>	
			<div style="margin:20px">
				<?php echo anchor('arsip/create', '<i class="icon-plus icon-white"></i> Tambah Arsip', array('class'=>'btn btn-success')) ?>

				<table class="table table-striped">
				  <thead>
				  	<tr>
						  <th>#</th>
						  <th>Judul</th>
						  <th>Waktu Upload</th>
						  <th>Mata Kuliah</th>
						  <th>Menu</th>
				  	</tr>
				  </thead>
				  <tbody>
				  	<?php $ctr = 1; ?>
				  	<?php foreach($model as $buku) :?>
				  	<tr>
				  		<td><?php echo $ctr ?></td>
				  		<td><?php echo $buku->judul ?></td>
				  		<td><?php echo $buku->created ?></td>
				  		<td><?php echo $buku->get_matkulku() ?></td>
				  		<td> 
								<?php echo anchor('arsip/view/'.$buku->id,'<i class="icon-eye-open"></i>', 'class="btn btn-small"'); ?>
								<?php echo anchor('arsip/update/'.$buku->id,'<i class="icon-pencil"></i>', 'class="btn btn-small"'); ?>
								<?php echo anchor('arsip/delete/'.$buku->id,'<i class="icon-trash"></i>', 'onclick="if(!confirm(\'Yakin mau dihapus?\'))return false;" class="btn btn-small"'); ?>
						  </td>
						 </tr>
				  	<?php $ctr++; ?>
				  	<?php endforeach; ?>
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>