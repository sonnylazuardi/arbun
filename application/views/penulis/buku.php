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
$model->buku->_include_komentar_count();
$model->buku->_include_akun();
$model->buku->select('*');
$model->buku->get_iterated();
foreach($model->buku as $buku) :?>
	<div class="span5" style="margin-bottom:20px">
		<div class="row">
			<div class="span1">
				<?php $this->load->helper('search'); ?>
				<a href="<?php echo site_url('arsip/view/'.$buku->id, $buku->judul) ?>" class="book" style="margin-left:-20px" rel="popover" title="<?php echo $buku->judul ?>" data-content="<?php echo limit_words($buku->abstrak, 20) ?>">
          <img src="<?php echo $buku->get_cover() ?>" alt="" />
        </a>
			</div>
			<div class="span4">
				<p style="font-weight:bold"><?php echo anchor('arsip/view/'.$buku->id, $buku->judul) ?></p>
	  		<div class="row">
  				<div class="span4">
  					<?php echo anchor('penulis/view/'.$buku->akun_id, $buku->akun_nama) ?> <br>
  					<?php echo $buku->get_matkulku(true) ?> <br>
  					<?php echo $buku->get_bidangku(true) ?>
  					<div class="stard" data-rating="<?php echo $buku->rating_count ?>"></div>
  					<i class="icon-eye-open"></i> <?php echo $buku->view ?> <i class="icon-comment"></i> <?php echo $buku->komentar_count ?><br>
  					<?php $tglku = date("d M Y", strtotime($buku->tgl_terbit)); ?>
  					<i class="icon-calendar"></i> <?php echo $tglku ?>
  				</div>
  			</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>
</div>
<script src="<?php echo base_url() ?>public/js/jquery.js"></script>
<script type="text/javascript">
  $(function () {
      $("[rel='popover']").popover({
        trigger: 'hover',
        placement: 'bottom'
      });
  });
</script>