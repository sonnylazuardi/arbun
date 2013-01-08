<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="brand"></a>
      <div class="nav-collapse collapse">
        <ul class="nav pull-right">
          <?php activeMenu('<i class="icon-home icon-white"></i> Home', 'home/index', 'home', $page); ?>

          <?php activeMenu('<i class="icon-book icon-white"></i> Arsip', 'arsip/index', 'arsip/arsip', $page); ?>

          <?php activeMenu('<i class="icon-pencil icon-white"></i> Penulis', 'penulis/index', 'penulis/index', $page); ?>

          <?php activeMenu('<i class="icon-envelope icon-white"></i> Kontak', 'home/kontak', 'kontak', $page); ?>

          <?php if(!IsLogged()): ?>
            <?php activeMenu('<i class="icon-user icon-white"></i> Login', 'auth/login', 'auth/login', $page); ?>          
          <?php endif; ?>

          <?php if(IsLogged()): ?>
            <?php activeMenu('<i class="icon-user icon-white"></i> Akun', 'user/account', 'user/account', $page); ?>    
          <?php endif; ?>

        </ul>

      </div>
    </div>
  </div>
</div>