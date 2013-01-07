<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ARBUN - Arsip Buncit</title>
    <!-- Le styles -->
    <link href="<?php echo base_url();?>public/css/bootstrap.css" rel="stylesheet">
    <!-- <link href="<?php echo base_url();?>public/css/bootstrap-responsive.css" rel="stylesheet"> -->
    <link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet">
	<!-- <link href="style.css" rel="stylesheet"> -->
  <!--<link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet"> -->
  </head>
  <body>
    <?php $this->load->view('theme/functions'); ?>
    <!-- Navbar
    ================================================== -->
    <?php $this->load->view('theme/menu', array('page'=>$page)); ?>

    <?php
    $data['model']=isset($model)?$model:null;
    if (!empty($page)): 
     $this->load->view($page, $data); 
    else: 
     $this->load->view('theme/error_page');
    endif;
    ?>

    <!-- Footer
    ================================================== -->
    <?php $this->load->view('theme/footer'); ?>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php $this->load->view('theme/js'); ?>

  </body>
</html>
