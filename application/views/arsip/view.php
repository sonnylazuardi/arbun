<style>
  .pdfpage { position:relative; top: 0; left: 0; border: solid 1px black; margin: 10px;}
  .pdfpage > canvas { position: absolute; top: 0; left: 0; }
  .pdfpage > div { position: absolute; top: 0; left: 0; }
  .inputControl { background: transparent; border: 0px none; position: absolute; margin: auto; }
  .inputControl[type='checkbox'] { margin: 0px; }
  .inputHint { opacity: 0.2; background: #ccc; position: absolute; }
</style>
<div class="container">
  <div class="row">
    <div class="span9 strip box">
      <div class="loader" style="margin:20px"></div>  
      <div id="viewer">
      </div>
    </div>
    <div class="span3">
      <div class="row">
        <div class="span1">
          <img src="<?php echo $model->akun->get()->get_profpic(); ?>" />
        </div>
        <div class="span2" style="margin-bottom:20px">
          <p>
            <?php echo $model->akun->get()->nama ?> <br/>
            <?php echo $model->tgl_terbit ?>
          </p>
        </div>
        <div class="span3 strip box">
          <div class="side">
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
        <div class="span3 strip box">
          <div class="side">
            <?php echo anchor('arsip/download/'.$model->id, 'Unduh', 'class="btn btn-warning"') ?>
            <?php echo anchor('arsip/print/'.$model->id, 'Print', 'class="btn btn-success"') ?>
            <?php echo anchor('arsip/report/'.$model->id, 'Lapor', 'class="btn btn-danger"') ?>
          </div>
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
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/core.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/util.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/api.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/canvas.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/obj.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/function.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/charsets.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/cidmaps.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/colorspace.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/crypto.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/evaluator.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/fonts.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/glyphlist.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/image.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/metrics.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/parser.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/pattern.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/stream.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/worker.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/jpgjs/jpg.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/jpx.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/pdfjs/jbig2.js"></script>

  <script type="text/javascript">
    // Specify the main script used to create a new PDF.JS web worker.
    // In production, change this to point to the combined `pdf.js` file.
    PDFJS.workerSrc = '<?php echo base_url() ?>public/js/pdfjs/worker_loader.js';
    var pdfWithFormsPath = '<?php echo $model->link ?>';
  </script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/tes.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.raty.min.js"></script>