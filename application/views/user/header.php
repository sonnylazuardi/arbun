<div class="container">
	<div class="row">
	  <div class="span6 desk">
	    <h2><?php echo (!empty($title)?$title:'Akun'); ?></h2>
		</div>
		<div class="span6" style="text-align:right; ">
			<div class="row">
				<div class="span5">
					<h4><?php echo $user->nama ?></h4>
					<?php $arr = array('Dosen','Mahasiswa','Staf','Alumni') ?>
					<p><?php echo $arr[$user->status].' - '.$user->jurusan->get()->nama ?></p>
				</div>
				<div class="span1">
					<img src="<?php echo $user->get_profpic(); ?>" />
				</div>
						</div>
			</div>
	</div>
</div>