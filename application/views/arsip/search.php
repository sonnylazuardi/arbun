<div id="biasa">
	<?php echo form_open('arsip/index', array('method'=>'get', 'style'=>'margin:0')) ?>
	<ul class="item-stream unstyled search-input-stream">
	  <li class="stream-item search-input-item">
	    <form class="form-inline search-form" action="/artists/search">
	      <?php echo form_input('_q', $model->_q, 'id="search" placeholder="Cari Arsip atau makalah"') ?>
	      <button class="btn btn-large btn-inverse" id="sub" type="submit"><i class="icon-search icon-white"></i></button>
	    </form>
	  </li>
	</ul>
	<?php echo form_close() ?>
</div>
<div id="advance" style="display:none">
	<?php echo form_open('arsip/index', array('method'=>'get', 'style'=>'margin:0')) ?>
		<div class="row">
			<div class="span3">
				<label>Nama Penulis</label>
				<?php echo form_input('_akun_nama', $model->_akun_nama) ?>
				<label>Judul Makalah</label>
				<?php echo form_input('_judul', $model->_judul) ?>
			</div>
			<div class="span3">
				<label>Tahun</label>
				<?php echo form_input('_tahun', $model->_tahun) ?>
				<label>Abstrak</label>
				<?php echo form_input('_abstrak', $model->_abstrak) ?>
			</div>
		</div>
		<button class="btn btn-inverse" type="submit" name="adv" value="adv">Cari</button>
	<?php echo form_close() ?>
</div>

<a href="#" id="search-con" class="btn btn-success btn-small">Pencarian Lanjutan</a>

<script src="<?php echo base_url() ?>public/js/jquery.js"></script>
<script type="text/javascript">
$(function(){
  $('#search-con').on('click',function(){
     $('#biasa').toggle(500);
     $('#advance').toggle(500);
     var text = $('#search-con').text();
	   $('#search-con').text( text == "Pencarian Lanjutan" ? "Pencarian Biasa" : "Pencarian Lanjutan");
  });
  <?php if(!empty($_GET['adv'])): ?>
  	$('#search-con').trigger('click');
  <?php endif; ?>
});
</script>

<link href="<?php echo base_url();?>public/css/jquery.autocomplete.css" rel="stylesheet">
<script src="<?php echo base_url() ?>public/js/jquery.js"></script>
<script type="text/javascript">
$(function() {
  $("#search").autocomplete("<?php echo site_url('token/search_arsip') ?>", {
    remoteDataType: 'json', minChars: 2,
    showResult: function(value, data) {
      return "<img src=\"" + data[2] + "\" width=\"50px\" class=\"sauto\"/> <b>" + value + "</b> <br>" + data[1];
    },
    onItemSelect: function(item) {
      window.location = "<?php echo site_url('arsip/view') ?>/" + item.data[0];
    },
  });
});
</script>