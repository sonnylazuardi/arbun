<html>
<head>
<title>Halaman Admin </title>
</head>
<body>
<h2>List Akun</h2>
<table border=1>
<tr>
	<th>No</th>
	<th>Nama</th>
	<th>Email</th>
	<th>NIM</th>
	<th>Tanggal Lahir</th>
	<th>Fakultas</th>
	<th>Jurusan</th>
	<th>Jenis Kelamin</th>
	<th>Angkatan</th>
	<th>Status</th>
	<th>Picture</th>
	<th>Aksi</th>
	
</tr>

<?php
$u = array('Dosen','Mahasiswa','Staff','Alumni');

$i = 0;
foreach ($query as $row)
{
	$i++;
?>
	<tr>
	<td><?php echo $i;?></td>
	<td><?php echo $row->nama;?></td>
	<td><?php echo $row->email;?></td>
	<td><?php echo $row->nim;?></td>
	<td><?php echo $row->tgl_lahir;?></td>
	<td><?php echo $row->fakultas_id;?></td>
	<td><?php echo $row->jurusan_id;?></td>
	<td><?php echo $row->jen_kelamin;?></td>
	<td><?php echo $row->angkatan;?></td>
	
	<td><?php echo $u[$row->status];?></td>
	<?php $this->load->helper('html'); ?>
	<td><?php echo img(base_url().'public/img/user/'.$row->picture) ?></td>
	<td><a href="<?php echo base_url();?>index.php/admin/CekAkun/<?php echo $row->id;?>">Cek</a></td>
	</tr>
<?php
}
?>
</table>
</body>
</html>