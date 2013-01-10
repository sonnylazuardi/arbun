<?php $this->load->view('user/header.php', array('title'=>'Tambah Arsip')); ?>
<div class="container">
  <div class="row">
    <?php $this->load->view('user/sidebar.php'); ?>
    <div class="span9 strip box">
      <h3>Tambah Arsip</h3>
      <legend></legend> 
      <?php echo form_open_multipart('arsip/create'); ?>
      <?php $this->load->view('arsip/_form') ?>
    </div>
  </div>
</div>