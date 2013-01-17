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
						<th>Link</th>
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
						<td><?php echo $row->judul;?></td>
						<td><?php echo $row->akun->get()->nama;?></td>
						<td><?php echo $row->tgl_terbit;?></td>
						<td><a href="<?php echo $row->link;?>">Lihat</a></td>
						<td>
						<form action="<?php echo base_url();?>index.php/admin/CekBuku/<?php echo $row->id;?>" method="POST">
						<?php echo $approve[$row->status];?>
						<select name="buku" onchange="this.form.submit()">
						<option>Pilih</option>
						<option value="1">Setuju</option>
						<option value="0">Tolak</option>
						</select>
						</form>
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
