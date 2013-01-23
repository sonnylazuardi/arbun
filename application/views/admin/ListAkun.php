<?php $this->load->view('admin/header', array('title'=>'Moderasi Akun')) ?>
<div class="container">
	<div class="row sel">
		<?php $this->load->view('admin/sidebar') ?>
		<div class="span9 box strip">
		<table class="table table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>NIM</th>
				<th>Fakultas</th>
				<th>Jurusan</th>
				<th>Angkatan</th>
				<th>Status</th>
				<th>Aktivasi</th>	
			</tr>
		</thead>
		<tbody>
				<?php
				$u = array('Dosen','Mahasiswa','Staff','Alumni');
				$approve = array ('<p style="color:red">Belum Aktif</p>','<p style="color:green">Sudah Aktif</p>');
				$i = 0;
				foreach ($query as $row)
				{
					$i++;
				?>
					<tr>
					<td><?php echo $i;?></td>
					<td><?php $row->tulis_profile() ?></td>
					<td><?php echo $row->nim;?></td>
					<td><?php echo $row->fakultas_singkat;?></td>
					<td><?php echo $row->jurusan_nama;?></td>
					<td><?php echo $row->angkatan;?></td>
					
					<td><?php echo $u[$row->status];?></td>
					<td>
					<form action="<?php echo base_url();?>index.php/admin/CekAkun/<?php echo $row->id;?>" method="POST">
					<?php echo $approve[$row->approved];?>
					<select name="akun" onchange="this.form.submit()">
					<option>Pilih</option>
					<option value="1">Setuju</option>
					<option value="0">Tolak</option>
					</select>
					<?php echo anchor('admin/akundelete/'.$row->id,'<i class="icon-trash icon-white"></i>', 'onclick="if(!confirm(\'Yakin mau dihapus?\'))return false;" class="btn btn-small btn-danger"'); ?>

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
