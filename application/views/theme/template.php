<?php
  if ($this->session->userdata('logged_in_id')) {
    $u = new Akun();
    $user = $u->get_by_id($this->session->userdata('logged_in_id')); 
  } else $user = FALSE;
  $data['user'] = $user;
  if( ! isset($pesan))
  {
    $pesan = $this->session->flashdata('pesan');
  }
?>
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
    <?php $this->load->view('theme/menu', $data); ?>

    <?php if( ! empty($pesan)): ?>
      <!-- Form Result pesan -->
      <div class="container alert"><?php echo htmlspecialchars($pesan); ?></div>
    <?php endif; ?>

    <?php
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
