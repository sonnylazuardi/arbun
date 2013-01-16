<?php echo form_open('arsip/index', array('method'=>'get', 'style'=>'margin:0')) ?>
<div class="container">
	<div class="row">
	  <div class="span6 desk">
	    <h2><?php echo (!empty($title)?$title:'Arsip'); ?></h2>
		</div>
		<div class="span6 full-search-bar" style="margin:10px">
      <ul class="item-stream unstyled search-input-stream">
        <li class="stream-item search-input-item">
          <div class="form-inline search-form" action="/artists/search">
              <?php echo form_input('_q', $v['q'], 'id="search" placeholder="Cari Arsip atau makalah"') ?>
              <button class="btn btn-large btn-inverse" id="sub" type="submit"><i class="icon-search icon-white"></i></button>
          </div>
          <?php echo anchor('arsip/search', 'Pencarian Lanjutan', array('class'=>'btn btn-success btn-small')); ?>
        </li>
      </ul>
    </div> 
	</div>
</div>
<?php echo form_close() ?> 