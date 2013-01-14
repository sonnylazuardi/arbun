<html>
<head>
<title>Halaman Admin </title>
</head>
<body>
<h2>List Buku</h2>
<table border=1>
<tr>
	<th>No</th>
	<th>Judul</th>
	<th>Nama Uploader</th>
	<th>Jilid</th>
	<th>Penerbit</th>
	<th>ISBN</th>
	<th>Tanggal Terbit</th>
	<th>Link</th>
	<th>Aksi</th>
	
</tr>

<?php
$i = 0;
foreach ($query as $row)
{
	$i++;
?>
	<tr>
	<td><?php echo $i;?></td>
	<td><?php echo $row->judul;?></td>
	<td><?php echo $row->akun->get()->nama;?></td>
	<td><?php echo $row->jilid;?></td>
	<td><?php echo $row->penerbit;?></td>
	<td><?php echo $row->ISBN;?></td>
	<td><?php echo $row->tgl_terbit;?></td>
	<td><a href="<?php echo $row->link;?>">Lihat</a></td>
	<td><a href="<?php echo base_url();?>index.php/admin/CekBuku/<?php echo $row->id;?>">Cek</a></td>
	</tr>
<?php
}
?>
</table>
</body>
</html>