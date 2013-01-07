<?php if( ! empty($model->error->all)): ?>
<div class="alert alert-danger">
	<ul><?php foreach($model->error->all as $k => $err): ?>
		<li><?php echo $err; ?></li>
		<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>