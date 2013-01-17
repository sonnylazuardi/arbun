<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.js"></script>
<script type="text/javascript">
$(function(){
	$('.stard').raty({readOnly:true, half : true, path : '<?php echo base_url() ?>public/img/',
		score   : function() {
	    return $(this).attr('data-rating');
	  }});
});
</script>

<div class="row">
<div class="span5" style="height:500px; overflow:auto; padding-left:15px; padding-right:40px;">
<?php 
$model->buku->_include_rating_count();
$model->buku->_include_akun();
$model->buku->select('*');
$model->buku->get_iterated();
foreach($model->buku as $buku) :?>
	<div class="span5" style="margin-bottom:20px">
		<div class="row">
			<div class="span1">
				<div class="book" style="margin-left:-20px;"><?php echo anchor('arsip/view/'.$buku->id, $buku->judul) ?></div>
			</div>
			<div class="span4">
	  		<div >
	  		<p style="font-weight:bold"><?php echo anchor('arsip/view/'.$buku->id, $buku->judul) ?></p>
	  		<span style="font-size:.9em">
	  			<div class="stard" data-rating="<?php echo $buku->rating_count ?>"></div>
	  			<?php echo $buku->view. ' kali dilihat' ?> <br>
	  			<?php echo $buku->akun_nama ?> <br>
		  		<?php echo $buku->tgl_terbit ?> <br>
		  		<?php echo $buku->get_matkulku() ?> <br>
		  		<?php echo $buku->get_bidangku() ?> <br>
	  		</span>
			  </div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>
</div>