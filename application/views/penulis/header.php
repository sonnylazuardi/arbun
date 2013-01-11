<div class="container">
	<div class="row">
	  <div class="span6 desk">
	    <h2><?php echo (!empty($title)?$title:'Penulis'); ?></h2>
		</div>
		<div class="span6 full-search-bar">
      <ul class="item-stream unstyled search-input-stream">
        <li class="stream-item search-input-item">
          <form class="form-inline search-form" action="/artists/search">
            <input id="search" name="q" type="text" placeholder="Cari Penulis" value="">
            <button class="btn btn-large btn-inverse" id="sub" type="submit"><i class="icon-search icon-white"></i></button>
          </form>
        </li>
      </ul>
    </div>  
	</div>
</div>