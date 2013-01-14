<div class="container">
	<div class="row">
	  <div class="span6 desk">
	    <h2><?php echo (!empty($title)?$title:'Profil Penulis'); ?></h2>
		</div>
		<div class="span6" style="text-align:right; ">
			<div class="row">
				<div class="span5">
					<h4><?php echo $model->nama ?></h4>
					<p><?php echo $model->jurusan->get()->nama ?></p>
				</div>
				<div class="span1">
					<img src="<?php echo $model->get_profpic(); ?>" />
				</div>
						</div>
			</div>
	</div>
</div>