<html>
<head>
<title>Halaman Admin </title>
</head>
<body>
<h2>List Buku</h2>
<table border=1>
<tr>
	<th>No</th>
	<th>Akun</th>
	<th>Buku</th>
	<th>Isi</th>
	<th>Dibuat</th>
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
	<td><?php echo $row->akun_id;?></td>
	<td><?php echo $row->buku_id;?></td>
	<td><?php echo $row->isi;?></td>
	<td><?php echo $row->created;?></td>
	<td><a href="<?php echo base_url();?>index.php/admin/CekKomentar/<?php echo $row->id;?>">Cek</a></td>
	</tr>
<?php
}
?>
</table>
</body>
</html>