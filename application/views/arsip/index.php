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
	  					<a href="<?php echo site_url('arsip/view/'.$buku->id, $buku->judul) ?>" class="book" style="margin:0" rel="tooltip" title="<?php echo $buku->judul ?>">
	  						<img src="<?php echo $buku->get_cover() ?>" alt="" />
	  					</a>
	  					<script src="<?php echo base_url() ?>public/js/jquery.js"></script>
	  					<script type="text/javascript">
						    $(function () {
						        $("[rel='tooltip']").tooltip();
						    });
							</script>
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
				  			<div class="row">
				  				<div class="span4">
				  					<?php echo anchor('penulis/view/'.$buku->akun_id, $buku->akun_nama) ?> <br>
				  					<?php echo $buku->get_matkulku(true) ?> <br>
				  					<?php echo $buku->get_bidangku(true) ?>
				  				</div>
				  				<div class="span2">
				  					<div class="stard" data-rating="<?php echo $buku->rating_count ?>"></div>
				  					<i class="icon-eye-open"></i> <?php echo $buku->view ?> 
				  					<i class="icon-comment"></i> <?php echo $buku->komentar_count ?><br>
				  					<?php $tglku = date("d M Y", strtotime($buku->tgl_terbit)); ?>
				  					<i class="icon-calendar"></i> <?php echo $tglku ?>
				  				</div>
				  			</div>
					  		
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