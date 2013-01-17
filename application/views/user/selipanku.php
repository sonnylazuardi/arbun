<?php $this->load->view('user/header.php', array('title'=>'Selipanku')); ?>
<div class="container">
	<div class="row">
		<?php $this->load->view('user/sidebar.php'); ?>
		<div class="span9 strip box">
			<h3>Selipan Saya</h3>
			<legend></legend>	
			<div style="margin:20px">
				<?php if($model->count() > 0) : ?>
					<table class="table table-striped">
					  <thead>
						<tr>
							  <th>#</th>
							  <th>Judul Arsip</th>
						</tr>
					  </thead>
					  <tbody>
						<?php $ctr = 1; $data = 1?>
						<?php foreach($model as $selip) :?>
						<tr>
							<td><?php echo $ctr ?></td>
							<td><?php echo anchor('arsip/view/'.$selip->buku_id, $selip->buku_judul) ?></td>
							<td> 
									<?php echo anchor('bookmarks/delete/'.$selip->id.'/'.$selip->buku_id,'<i class="icon-trash"></i>', 'onclick="if(!confirm(\'Yakin mau dihapus?\'))return false;" class="btn btn-small" '); ?>
							  </td>
							 </tr>
						<?php $ctr++; ?>
						<?php endforeach; ?>
					  </tbody>
					</table>
				<?php else: echo "Tidak ada selipan"; endif; ?>
			</div>
			<?php echo $pagination ?>
		</div>
	</div>
</div>