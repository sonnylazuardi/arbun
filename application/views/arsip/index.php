<?php $this->load->view('arsip/header') ?>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.js"></script>
<script type="text/javascript">
$(function(){
	$('.stard').raty({readOnly:true, half : true, path : '<?php echo base_url() ?>public/img/',
		score   : function() {
	    return $(this).attr('data-rating');
	  }});
});
</script>
<div class="container">
	<div class="row">
		<?php $this->load->view('arsip/sidebar') ?>
		<div class="span9 strip box">
			<h3>Arsip</h3>
			<legend></legend>
		  <div class="row" style="margin:10px">
	  		<?php foreach($model as $buku) :?>
	  		<div class="span8" style="margin-bottom:20px">
	  			<div class="row">
	  				<div class="span1">
	  					<div class="book" style="margin:0"><?php echo anchor('arsip/view/'.$buku->id, $buku->judul) ?></div>
	  				</div>
	  				<div class="span7">
				  		<div style="margin: 0 -18px 0 25px">
				  		<?php $this->load->helper('search'); ?>
				  		<p style="font-weight:bold"><?php echo anchor('arsip/view/'.$buku->id, $buku->judul) ?></p>
				  		<span style="font-size:.9em">
				  			<?php
				  				if (!empty($model->_q)) :
				  					echo search_extract($buku->abstrak, $model->_q); 
				  				elseif (!empty($model->_abstrak)) :
				  					echo search_extract($buku->abstrak, $model->_abstrak); 
				  				else :
				  					echo limit_words($buku->abstrak, 40);
				  				endif;
				  			?>
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
		  <div style="margin:20px">
				<?php echo $pagination ?>
			</div>
	  </div>
	</div>
</div>