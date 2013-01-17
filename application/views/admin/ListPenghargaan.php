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
						foreach ($model as $rows) : ?>
						<?php
							$i++;
						?>
							<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $rows->buku_id;?></td>
							<td><?php echo $rows->nama;?></td>
							<td><?php echo anchor('admin/DeleteAward/'.$i,'<i class="icon-trash"></i>', 'class="btn btn-small"'); ?>
							</td>
							</tr>
						<?php
						endforeach;
						?></tbody>
					</table>
		</div>
	</div>
</div>
