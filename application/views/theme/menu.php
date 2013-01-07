<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="brand"></a>
      <div class="nav-collapse collapse">
        <ul class="nav pull-right">
          <li <?php echo ($page=='home')?'class="active"':''; ?>><?php echo anchor('home/index', 'Home');?></li>
          <li <?php echo ($page=='arsip/arsip')?'class="active"':''; ?>><?php echo anchor('arsip/index', 'Arsip');?></li>
          <li <?php echo ($page=='kontak')?'class="active"':''; ?>><?php echo anchor('home/kontak', 'Kontak');?></li>
          <?php if(!$this->session->userdata('logged_in_id')): ?>
          <li <?php echo ($page=='auth/login')?'class="active"':''; ?>><?php echo anchor('auth/login', 'Login');?></li>
          <?php endif; ?>
          <?php if($this->session->userdata('logged_in_id')): ?>
            <li> <?php echo anchor('auth/logout', 'Logout');?></li>
          <?php endif; ?>
        </ul>

      </div>
    </div>
  </div>
</div>