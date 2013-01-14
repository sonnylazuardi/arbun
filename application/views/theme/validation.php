<?php if( ! empty($model->error->string)): ?>
<div class="alert alert-danger">
	<?php echo $model->error->string; ?>
</div>
<?php endif; ?>