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
            <div class="strip bookrak bookshelf">
              <div class="shelf">
                <div class="rows">
                  <div class="loc">
                    <?php
                      $model = new Buku();
                      $model->order_by('tgl_terbit','desc')->get(6);
                      $ctr = 1;
                      foreach ($model as $data) {
                        echo '<div class="book">'.anchor('arsip/view/'.$data->id, $data->judul).'</div>';
                        if($ctr % 3 == 0) {
                          echo '</div></div><div class="rows"><div class="loc">';
                        }
                        $ctr++;
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <ul class="nav nav-tabs bwh stripb">
              <li class="active"><a href="#">Terbaru</a></li>
              <li><a href="#">Terfavorit</a></li>
              <li><a href="#">Terpopuler</a></li>
            </ul>
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
