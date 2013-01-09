<div class="container">
      <div class="span6 desk">
        <h3>Portal dokumentasi dan publikasi makalah Informatika Institut Teknologi Bandung.</h3>
    	</div>
    </div>

    <div class="strip">
      <div class="container">
        <div class="row">
          <div class="span6 full-search-bar">
            <ul class="item-stream unstyled search-input-stream">
              <li class="stream-item search-input-item">
                <form class="form-inline search-form" action="/artists/search">
                  <input id="search" name="q" type="text" placeholder="Cari Arsip atau makalah" value="">
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
                    <div class="book"><?php echo anchor('arsip/view', 'Aplikasi Pohon Keputusan dalam Rekrutmen Karyawan') ?></div>
                    <div class="book"><a href="#">Partisi Maksimum pada Poligon</a></div>
                    <div class="book"><a href="">Aplikasi Graf dalam Diagnosis Penyakit Dalam</a></div>
                  </div>
                </div>
                <div class="rows">
                  <div class="loc">
                    <div class="book"><a href="#">Segment Tree for Solving Range Minimum Query Problems</a></div>
                    <div class="book"><a href="#">Penerapan Graf Dan Pohon Dalam Elsword Online</a></div>
                    <div class="book"><a href="#">Graph Theory Applications in Electrical Networks</a></div>
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
          <ul>
            <li><a href="#">Makalah</a></li>
            <li><a href="#">Paper</a></li>
            <li><a href="#">Tugas Akhir</a></li>
          </ul>
        </div>
        <div class="span3">
          <h4>Mata Kuliah</h4>
          <ul>
            <li><a href="">Algoritma</a></li>
            <li><a href="">Grafika</a></li>
            <li><a href="">Basis Data</a></li>
          </ul>
        </div>
      </div>
    </div>
