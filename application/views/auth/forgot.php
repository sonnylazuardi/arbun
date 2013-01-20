<div class="container">
  <div style="height:50px"></div>
  <div class="login strip" style="width:330px">
  	<?php if(isset($error)) : ?>
  		<div class="alert alert-danger"><?php echo $error ?></div>
  	<?php endif; ?>
  	<?php echo form_open() ?>
		  <label style="font-size:12px">Tuliskan Email untuk menerima password pengganti</label>
		  <label>Email</label>
		  <?php echo form_input('email', isset($_POST['email'])?$_POST['email']:'') ?>
		  <br/>
		  <button type="submit" class="btn btn-primary" name="submit">Kirim</button>
    <?php echo form_close() ?>
  </div>
</div>