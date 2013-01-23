<?php $this->load->view('admin/header', array('title'=>'List Laporan')) ?>
<div class="container">
	<div class="row sel">
		<?php $this->load->view('admin/sidebar') ?>
		<div class="span9 box strip">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Pengarang</th>
							<th>Judul Buku</th>
							<th>Isi Laporan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody><?php
						$i = 0;
						foreach ($query as $row)
						{
							$i++;
						?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php $row->akun->tulis_profile() ?></td>
								<td><?php echo $row->buku_judul;?></td>
								<td><?php echo $row->isi;?></td>
								<td>
									<?php $approve = array ('<p style="color:red">Belum Aktif</p>','<p style="color:green">Sudah Aktif</p>'); ?>
									<?php echo form_open('admin/CekLapor/'.$row->buku_id) ?>
									<?php echo $approve[$row->buku_status];?>
									<select name="buku" onchange="this.form.submit()">
										<option>Pilih</option>
										<option value="1">Biarkan</option>
										<option value="0">Blok</option>
									</select>
									<?php echo anchor('admin/laporandelete/'.$row->id,'<i class="icon-trash icon-white"></i>', 'onclick="if(!confirm(\'Yakin mau dihapus?\'))return false;" class="btn btn-small btn-danger"'); ?>
									<?php echo form_close() ?>
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
