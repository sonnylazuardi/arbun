<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<div class="container">
      <div class="span6 desk">
        <h3>Arsipku</h3>
    	</div>
    </div>
<div class="container" style="color:black;">
	<div class="row">
		<div class="span3" style="border-radius:10px;background-color:white;padding-top:10px">
			<p onmouseover="this.style.background='#cccccc'" onmouseout="this.style.background='white'" style="padding-left:10px;padding-top:10px;height:35px;background-color:rgb(255,255,255)"><?php echo anchor('user/account', 'Profil') ?></p>
			<p onmouseover="this.style.background='#cccccc'" onmouseout="this.style.background='rgb(222,222,222)'" style="padding-left:10px;padding-top:10px;height:35px;background-color:rgb(222,222,222)">Arsipku</p>
		</div>
		<div class="span8" style="border-radius:10px;background-color:white;padding-left:10px;padding-bottom:10px">
			<br/>
			<label>Pilih file yang akan diunggah. maks 50MB</label>
			<input type="text" name="browse" class="span5">
			<button type="submit" class="btn">Pilih File</button>
			<br/>
			<button type="submit" class="btn btn-primary">Unggah</button>
			<?php echo anchor('user/arsipku', 'Batal', array('class'=>'btn btn-success')) ?>
		</div>
	</div>
</div>