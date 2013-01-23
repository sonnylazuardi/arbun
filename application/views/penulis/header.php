<?php echo form_open('penulis/index', array('method'=>'get', 'style'=>'margin:0')) ?>
<div class="container">
  <div class="row">
    <div class="span6 desk">
      <h2><?php echo (!empty($title)?$title:'Penulis'); ?></h2>
    </div>
    <div class="span6 full-search-bar" style="margin:10px">
      <div id="biasa">
      <ul class="item-stream unstyled search-input-stream">
        <li class="stream-item search-input-item">
          <div class="form-inline search-form" action="/artists/search">
              <?php echo form_input('_q', $model->_q, 'id="search" placeholder="Cari Penulis"') ?>
              <button class="btn btn-large btn-inverse" id="sub" type="submit"><i class="icon-search icon-white"></i></button>
          </div>
        </li>
      </ul>
      </div>
    </div> 
  </div>
</div>
<?php echo form_close() ?> 

<link href="<?php echo base_url();?>public/css/jquery.autocomplete.css" rel="stylesheet">
<script src="<?php echo base_url() ?>public/js/jquery.js"></script>
<script type="text/javascript">
$(function() {
  $("#search").autocomplete("<?php echo site_url('token/search_penulis') ?>", {
    remoteDataType: 'json', minChars: 2,
    showResult: function(value, data) {
      return "<img src=\"" + data[0] + "\" width=\"50px\"/> " + value;
    },
    onItemSelect: function(item) {
      window.location = "<?php echo site_url('penulis/view') ?>/" + item.data[1];
    },
  });
});
</script>