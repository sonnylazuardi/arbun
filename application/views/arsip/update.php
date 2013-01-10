<?php $this->load->view('user/header.php', array('title'=>'Edit Arsip')); ?>
<div class="container">
  <div class="row">
    <?php $this->load->view('user/sidebar.php'); ?>
    <div class="span9 strip box">
      <h3>Edit Arsip</h3>
      <legend></legend> 
      <?php echo form_open(); ?>
      <?php $this->load->view('arsip/_form') ?>
    </div>
  </div>
</div>