<?php $this->load->view('admin/header', array('title'=>'Moderasi Buku')) ?>
<div class="container">
	<div class="row sel">
		<?php $this->load->view('admin/sidebar') ?>
		<div class="span9 box strip">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Nama Uploader</th>
						<th>Tanggal Terbit</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 0;
					$approve = array ('<p style="color:red">Belum Aktif</p>','<p style="color:green">Sudah Aktif</p>');
					foreach ($query as $row)
					{
						$i++;
					?>
						<tr>
						<td><?php echo $i;?></td>
						<td><img src="<?php echo $row->get_cover() ?>" width="60px" class="sauto" alt="" /><?php echo anchor('arsip/view/'.$row->id, $row->judul) ?></td>
						<td><?php $row->akun->tulis_profile() ?></td>
						<td><?php echo $row->tgl_terbit;?></td>
						<td>
						<?php echo form_open('admin/CekBuku/'.$row->id) ?>
						<?php echo $approve[$row->status];?>
						<select name="buku" onchange="this.form.submit()">
							<option>Pilih</option>
							<option value="1">Setuju</option>
							<option value="0">Tolak</option>
						</select>
						<?php echo anchor('admin/bukudelete/'.$row->id,'<i class="icon-trash icon-white"></i>', 'onclick="if(!confirm(\'Yakin mau dihapus?\'))return false;" class="btn btn-small btn-danger"'); ?>

						<?php echo form_close() ?>
						</td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
			<?php echo $pagination ?>
		</div>
	</div>
</div>
