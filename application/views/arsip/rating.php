<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.js"></script>
<script type="text/javascript">
$(function(){
	$('.star').raty({
		path		: '<?php echo base_url() ?>public/img/',
		score   : function() {
	    return $(this).attr('data-rating');
	  },
		cancel	: true,
		click : function(score, evt) {
    	$('#rateform').submit();
	  }
	});
	$('.stard').raty({readOnly:true, half : true, path : '<?php echo base_url() ?>public/img/',
		score   : function() {
	    return $(this).attr('data-rating');
	}});
});
</script>

<?php echo form_open('ratings/create/'.$model->id, array('style'=>"margin:0; text-align:center", 'id'=>'rateform')); ?>
<div class="stard" data-rating="<?php echo $model->rating_count ?>" style="margin-left:10px"></div>
<?php echo number_format($model->rating_count, 2, '.', '');?> oleh <?php echo $model->rating_counts ?> orang
<?php if($user): ?>
	<div class="star" data-rating="<?php echo $model->_my_rating($model->id, $user->id) ?>" style="margin-left:10px"></div>
<?php else: ?>
	<p><?php echo anchor('auth/login','Login untuk memberi rating') ?></p>
<?php endif; ?>
<?php echo form_close(); ?>