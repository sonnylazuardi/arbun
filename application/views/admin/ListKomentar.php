<?php $this->load->view('admin/header', array('title'=>'Moderasi Komentar')) ?>
<div class="container">
	<div class="row sel">
		<?php $this->load->view('admin/sidebar') ?>
		<div class="span9 box strip">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Akun</th>
							<th>Buku</th>
							<th>Isi</th>
							<th>Dibuat</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody><?php
						$i = 0;
						$approve = array ('<p style="color:red">Belum Aktif</p>','<p style="color:green">Sudah Aktif</p>');
						foreach ($query as $row)
						{
							$i++;
						?>
							<tr>
							<td><?php echo $i;?></td>
							<td><?php $row->akun->tulis_profile() ?></td>
							<td><?php echo $row->buku_judul;?></td>
							<td><?php echo $row->isi;?></td>
							<td><?php echo $row->created;?></td>
							<td>
							<form action="<?php echo base_url();?>index.php/admin/CekKomentar/<?php echo $row->id;?>" method="POST">
							<?php echo $approve[$row->status];?>
							<select name="komentar" onchange="this.form.submit()">
							<option>Pilih</option>
							<option value="1">Setuju</option>
							<option value="0">Tolak</option>
							</select>
							<?php echo anchor('admin/komentarsdelete/'.$row->id,'<i class="icon-trash icon-white"></i>', 'onclick="if(!confirm(\'Yakin mau dihapus?\'))return false;" class="btn btn-small btn-danger"'); ?>
							</form>
							</td>
							</tr>
						<?php
						}
						?></tbody>
					</table>
				<?php echo $pagination ?>
		</div>
	</div>
</div>
