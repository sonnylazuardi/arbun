<div class="container">
	<div class="row">
	  <div class="span6 desk">
	    <h3><?php echo (!empty($title)?$title:'Akun'); ?></h3>
		</div>
		<div class="span6" style="text-align:right; margin-top:30px">
			<?php $con =& get_instance(); $myid=$con->login_manager->get_user(); ?>
			<div class="row">
				<div class="span5">
					<h4><?php echo $myid->nama ?></h4>
					<p><?php echo $myid->jurusan->get()->nama ?></p>
				</div>
				<div class="span1">
					<img src="<?php echo $con->login_manager->get_profpic(); ?>" />
				</div>
						</div>
			</div>
	</div>
</div>