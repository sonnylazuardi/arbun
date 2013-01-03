<div class="container">
  <div class="span6 desk">
    <h3>Pencarian Arsip</h3>
	</div>
</div>
<script src="<?php echo base_url() ?>public/js/jquery.js"></script>
<script>
	$(function()
	{
		$("#advsearch").hide();
		
		$("#adv").click(function()
		{
			$("#simple").hide(500);
			$("#advsearch").show(500);
		});
		
		$("#sim").click(function()
		{
			$("#simple").show(500);
			$("#advsearch").hide(500);
		});
	});
</script>
<div class="strip">
<div class="container">
	<div class="row">
	<div class="span3">
		<div id="simple">
		<form action = "link?" method="POST">
		<fieldset>
		<legend>Simple Search</legend>
		
		<span class="help-block" id="adv">atau <a href = "#">Advanced Search</a></span>	
		
		<label> <b>Judul</b> </label>
		<input type = "text" placeholder ="Judul Makalah" name="judul">
		<span class="help-block">Masukkan Judul makalah yang dicari</span>	
		
		<button type="submit" class="btn btn-primary">Cari</button>
		</fieldset>
		</form>
		</div>
		<div id="advsearch">
		<form action = "link?" method="POST">
		<fieldset>
		<legend>Advanced Search</legend>
		
		<span class="help-block" id="sim">atau <a href = "#">Simple Search</a></span>	
		
		<label> <b>Nama pengarang</b> </label>
		<input type = "text" placeholder ="Nama pengarang" name="nama">
		<span class="help-block">Masukkan Nama pengarang dari makalah yang dicari</span>	
		
		<label> <b>Judul</b> </label>
		<input type = "text" placeholder ="Judul Makalah" name="judul">
		<span class="help-block">Masukkan Judul makalah yang dicari</span>	
		
		<label> <b>Tahun</b> </label>
		<input type = "text" placeholder ="Tahun terbit" name="tahun">
		<span class="help-block">Masukkan Tahun terbit dari makalah yang dicari</span>	
		
		<label> <b>Bidang</b> </label>
		<input type = "text" placeholder ="Bidang makalah" name="bidang">
		<span class="help-block">Masukkan bidang makalah yang dicari</span>	
		
		<label> <b>Mata Kuliah </b> </label>
		<input type = "text" placeholder ="Mata kuliah" name="matkul">
		<span class="help-block">Masukkan mata kuliah dari makalah yang dicari</span>	
		
		<button type="submit" class="btn btn-primary">Cari</button>
		</fieldset>
		</form>
		
		</div>
		
	</div>
	<div class="span9">
		<table class="table table-striped">
	  <tr>
		  <th> No </th>
		  <th> Judul </th>
		  <th> Pengarang </th>
		  <th> Tahun Terbit </th>
		  <th> Mata Kuliah </th>
		  <th> Bidang </th>
		  <th> Link </th>
	  </tr>
	  
	  <tr>
		  <td> 1 </td>
		  <td> Aplikasi Induksi matematik dalam kehidupan sehari-hari </td>
		  <td> Anonim </td>
		  <td> 2011 </td>
		  <td> Struktur Diskrit </td>
		  <td> Induksi Matematik </td>
		  <td> <a href = "?">Lihat</a> </td>
	  </tr>
	  
	  <tr>
		  <td> 2 </td>
		  <td> Aplikasi algoritma greedy dalam menyusun salad pizza hut </td>
		  <td> Alexander Sadiku </td>
		  <td> 2012 </td>
		  <td> Strategi Algoritma </td>
		  <td> Algoritma </td>
		  <td> <a href = "?">Lihat</a> </td>
	  </tr>

		</table>

		<div class="pagination">
	    <ul>
	      <li><a href="#">«</a></li>
	      <li><a href="#">1</a></li>
	      <li><a href="#">2</a></li>
	      <li><a href="#">3</a></li>
	      <li><a href="#">4</a></li>
	      <li><a href="#">5</a></li>
	      <li><a href="#">»</a></li>
	    </ul>
	  </div>
	</div>
	</div>
</div>	
</div>