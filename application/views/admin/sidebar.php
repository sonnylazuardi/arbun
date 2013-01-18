<div class="span3">
	<div class="row">
		<div class="span3 strip box">
			<ul id="main-nav" class="nav nav-tabs nav-stacked" style="padding:10px 0 ">
				<?php activeMenu('<i class="icon-user"></i> Moderasi Akun', 'admin/ListAkun', 'admin/ListAkun', $page) ?>
				<?php activeMenu('<i class="icon-book"></i> Moderasi Buku', '
				admin/ListBuku', 'admin/ListBuku', $page) ?>
				<?php activeMenu('<i class="icon-comment"></i> Moderasi Komentar', 
				'admin/ListKomentar', 'admin/ListKomentar', $page) ?>
				<?php activeMenu('<i class="icon-bullhorn"></i> Moderasi Laporan', 'admin/ListLaporan', 'admin/ListLaporan', $page) ?>
				<?php activeMenu('<i class="icon-star"></i> Moderasi Penghargaan', 'admin/ListPenghargaan', 'admin/ListPenghargaan', $page) ?>
				<li><?php echo anchor('admin/logs','<i class="icon-lock"></i> Logs') ?></li>
				<li><?php echo anchor('home/adminlogout','Logout') ?> </li>
			</ul>
		</div>
	</div>
</div>

