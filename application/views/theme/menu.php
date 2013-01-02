<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="brand"></a>
      <div class="nav-collapse collapse">
        <ul class="nav pull-right">
          <li <?php echo ($page=='home')?'class="active"':''; ?>><?php echo anchor('home/index', 'Home');?></li>
          <li <?php echo ($page=='arsip')?'class="active"':''; ?>><?php echo anchor('arsip/index', 'Arsip');?></li>
          <li <?php echo ($page=='kontak')?'class="active"':''; ?>><?php echo anchor('home/kontak', 'Kontak');?></li>
          <li <?php echo ($page=='login')?'class="active"':''; ?>><?php echo anchor('user/login', 'Login');?></li>
        </ul>

      </div>
    </div>
  </div>
</div>