<div class="container">
      <div class="span6 desk" style="margin-top:50px">
        <h3>Portal dokumentasi dan publikasi makalah Informatika Institut Teknologi Bandung.</h3>
    	</div>
    </div>

    <div class="strip">
      <div class="container">
        <div class="row">
          <?php echo form_open('arsip/index', array('method'=>'get')) ?>
          <div class="span6 full-search-bar">
            <ul class="item-stream unstyled search-input-stream">
              <li class="stream-item search-input-item">
                <form class="form-inline search-form" action="/artists/search">
                  <?php echo form_input('_q', '', 'id="search" placeholder="Cari Arsip atau makalah"') ?>
                  <button class="btn btn-large btn-inverse" id="sub" type="submit"><i class="icon-search icon-white"></i></button>
                </form>
              </li>
            </ul>
            <?php echo anchor('arsip/search', 'Pencarian Lanjutan', array('class'=>'btn btn-success')); ?>
            <?php echo anchor('arsip/index', 'Telusuri Arsip', array('class'=>'btn')); ?>
          </div>  
          <div class="span6 bookwrap tabs-below">
            <div id="myTabContent" class="tab-content" style="overflow:inherit">
              <div class="tab-pane fade active in" id="baru">
                <?php $this->load->view('home/baru') ?>
              </div>
              <div class="tab-pane fade" id="favorit">
                <?php $this->load->view('home/favorit') ?>
              </div>
              <div class="tab-pane fade" id="populer">
                <?php $this->load->view('home/populer') ?>
              </div>
            </div>
            <ul id="myTab" class="nav nav-tabs bwh stripb">
              <li class="active"><a href="#baru" data-toggle="tab">Terbaru</a></li>
              <li><a href="#favorit" data-toggle="tab">Terfavorit</a></li>
              <li><a href="#populer" data-toggle="tab">Terpopuler</a></li>
            </ul>
            <script src="<?php echo base_url() ?>public/js/jquery.js"></script>
            <script type="text/javascript">
            $(function(){
              setInterval(function() {
                  var tabs = $('#myTab.nav-tabs > li'),
                      active = tabs.filter('.active'),
                      next = active.next('li'),
                      toClick = next.length ? next.find('a') : tabs.eq(0).find('a');
                  toClick.trigger('click');
              }, 7000);
            });
            </script> 
          </div>
        </div>
      </div>
    </div>

    <div class="kategori container stripb">
      <div class="row">
        <div class="span3">
          <h4>Kategori</h4>
            <?php $u = new Kategori(); echo $u->getLinks(); ?>
        </div>
        <div class="span3">
          <h4>Mata Kuliah</h4>
            <?php $u = new Matkul(); echo $u->getLinks(); ?>
        </div>
      </div>
    </div>
