<div class="container">
	<div class="row">
	  <div class="span6 desk">
	    <h2><?php echo (!empty($title)?$title:'Arsip'); ?></h2>
		</div>
		<div class="span6 full-search-bar">
      <ul class="item-stream unstyled search-input-stream">
        <li class="stream-item search-input-item">
          <form class="form-inline search-form" action="/artists/search">
            <input id="search" name="q" type="text" placeholder="Cari Arsip atau makalah" value="">
            <button class="btn btn-large btn-inverse" id="sub" type="submit"><i class="icon-search icon-white"></i></button>
          </form>
          <?php echo anchor('arsip/search', 'Pencarian Lanjutan', array('class'=>'btn btn-success btn-small')); ?>
        </li>
      </ul>
    </div>  
	</div>
</div>