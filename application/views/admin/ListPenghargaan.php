<?php $this->load->view('admin/header', array('title'=>'Moderasi Penghargaan')) ?>
<div class="container">
	<div class="row sel">
		<?php $this->load->view('admin/sidebar') ?>
		<div class="span9 box strip">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Buku</th>
							<th>Penghargaan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody><?php
						$i = 0;
						foreach ($model as $row) : ?>
						<?php
							$i++;
						?>
							<tr>
							<td><?php echo $i;?></td>
							<td><?php echo anchor('arsip/view/'.$row->buku_id, $row->buku_judul);?></td>
							<td><?php echo $row->nama;?></td>
							<td>
								<?php echo anchor('admin/awardsdelete/'.$row->id,'<i class="icon-trash icon-white"></i>', 'onclick="if(!confirm(\'Yakin mau dihapus?\'))return false;" class="btn btn-small btn-danger"'); ?>
							</td>
							</tr>
						<?php
						endforeach;
						?></tbody>
					</table>
		</div>
	</div>
</div>
