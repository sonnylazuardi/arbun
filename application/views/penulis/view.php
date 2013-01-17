
<?php $this->load->view('penulis/header2.php', array('title'=>'Profil Penulis')); ?>
<div class="container">
  <div class="row">
    <div class="span6">
      <div class="row">
        <div class="span6 strip box">
          <div class="side">
            <?php $this->load->view('penulis/biodata') ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="span6 strip box">
          <div class="side">
            <?php $this->load->view('penulis/penghargaan') ?>
          </div>
        </div>
      </div>
    </div>
    <div class="span6 strip box">
      <div class="side"><h4>Arsip</h4>
        <legend></legend>
        <?php $this->load->view('penulis/buku') ?>
        </div>
    </div>
  </div>
</div>