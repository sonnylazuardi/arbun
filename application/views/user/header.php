<div class="container">
	<div class="row">
	  <div class="span6 desk">
	    <h3><?php echo (!empty($title)?$title:'Akun'); ?></h3>
		</div>
		<div class="span6" style="text-align:right; margin-top:30px">
			<div class="row">
				<div class="span5">
					<h4><?php echo $user->nama ?></h4>
					<p><?php echo $user->jurusan->get()->nama ?></p>
				</div>
				<div class="span1">
					<img src="<?php echo $user->get_profpic(); ?>" />
				</div>
						</div>
			</div>
	</div>
</div>