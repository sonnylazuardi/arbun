<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse" style="margin-top:30px">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand"></a>
      <div class="nav-collapse collapse">
        <ul class="nav pull-right">
          <?php activeMenu('<i class="icon-home icon-white"></i> Home', 'home/index', 'home', $page); ?>

          <?php activeMenu('<i class="icon-book icon-white"></i> Arsip', 'arsip/index', 'arsip/index', $page); ?>

          <?php activeMenu('<i class="icon-pencil icon-white"></i> Penulis', 'penulis/index', 'penulis/index', $page); ?>

          <?php activeMenu('<i class="icon-envelope icon-white"></i> Kontak', 'home/kontak', 'kontak', $page); ?>

          <?php 
            if ($user) $capt = $user->nim; else $capt = 'Login';
            activeMenu('<i class="icon-user icon-white"></i> '.$capt, 'user/arsipku', 'user/arsipku', $page);
          ?>    

        </ul>

      </div>
    </div>
  </div>
</div>