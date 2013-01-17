<div class="container">
	<div class="row">
	  <div class="span6 desk">
	    <h2><?php echo (!empty($title)?$title:'Arsip'); ?></h2>
		</div>
		<div class="span6 full-search-bar" style="margin:10px">
      <?php $this->load->view('arsip/search') ?>
    </div> 
	</div>
</div>