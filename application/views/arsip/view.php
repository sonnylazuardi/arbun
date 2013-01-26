<div class="container">
  <div class="row">
    <div class="span9">
      <div class="row">
        <div class="span9">
          <img src="<?php echo $model->get_cover() ?>" width="65px" class="sauto" alt="" /><h4><?php echo $model->judul ?></h4>
        </div>
      </div>
      <div class="strip box">
        <div style="margin:10px">
          <iframe src="http://docs.google.com/viewer?url=<?php echo $model->link ?>&embedded=true" width="680" height="800" style="border: none;"></iframe>
        </div>
      </div>
    </div>
    <div class="span3">
      <div class="row">
        <div class="span1">
          <img src="<?php echo $model->akun->get()->get_profpic(); ?>" />
        </div>
        <div class="span2" style="margin-bottom:20px">
          <p>
            <?php echo anchor('penulis/view/'.$model->akun_id, $model->akun_nama) ?> <br/>
            <?php $tglku = date("d M Y", strtotime($model->tgl_terbit)); ?>
            <i class="icon-calendar icon-white"></i> <?php echo $tglku ?> <br>
            <i class="icon-eye-open icon-white"></i> <?php echo $model->view ?> 
            <i class="icon-comment icon-white"></i> <?php echo $model->komentar_count ?>
          </p>
        </div>
        <div class="span3 strip box">
          <div class="side" style="text-align:center">
            <?php $this->load->view('arsip/rating') ?>
          </div>
        </div>
        <div class="span3 strip box">
          <div class="side">
            <p><?php echo $model->get_kategoriku(true) ?></p>
            <p><?php echo $model->get_matkulku(true) ?></p>
            <p><?php echo $model->get_bidangku(true) ?></p>
          </div>
        </div>
        <?php if($this->session->userdata('admin')): ?>
        <div class="span3 box">
            <?php echo anchor('admin/TambahAward/'.$model->id, '<i class="icon-plus"></i> Penghargaan', 'class="btn"') ?>
        </div>  
        <?php endif; ?>
        <?php if($user): ?>
        <div class="span3 box">
            <?php $this->load->view('arsip/bookmark') ?> 
            <?php echo anchor('reports/create/'.$model->id, '<i class="icon-bullhorn icon-white"></i> Lapor', 'class="btn btn-danger"') ?>
        </div>
        <?php endif; ?>
        <div class="span3 box">
            <?php echo anchor('arsip/download/'.$model->id, '<i class="icon-download icon-white"></i> Unduh', 'class="btn btn-primary"') ?>
            <?php echo anchor('arsip/print/'.$model->id, '<i class="icon-print icon-white"></i> Print', 'class="btn btn-success" onclick="window.print();return false"') ?>
        </div>
        <div class="span3 strip box">
          <div class="side">
            <ul id="myBuku" class="nav nav-tabs">
              <li class="active"><a href="#hubungan" data-toggle="tab">Berelasi</a></li>
              <li><a href="#tulisan" data-toggle="tab">Penulis</a></li>
            </ul>
            <div id="myBukuContent" class="tab-content">
              <div class="tab-pane fade active in" id="hubungan">
                <?php 
                  $u = new Buku();
                  $arr = $model->get_array_bidang();
                  if($arr):
                    $u->where_in_related('bidang', 'id', $arr)->get_iterated(5);
                    foreach ($u as $data) {
                      if($data->id != $model->id)
                        echo '<li>'.anchor('arsip/view/'.$data->id, $data->judul).'</li>';
                    }
                  endif;
                ?>
              </div>
              <div class="tab-pane fade" id="tulisan">
                <?php 
                  $u = new Buku();
                  $u->limit(5)->get_by_related($model->akun->get());
                  foreach ($u as $data) {
                    if($data->id != $model->id)
                      echo '<li>'.anchor('arsip/view/'.$data->id, $data->judul).'</li>';
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
        <div class="span3 strip box">
          <div class="side">
            <h5>Komentar</h5>
            <legend></legend>
            <?php $this->load->view('arsip/komentar') ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <script src="<?php echo base_url() ?>public/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.raty.min.js"></script>