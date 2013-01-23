<div class="span3">
	<div class="row">
		<div class="span3 strip box">
			<ul id="main-nav" class="nav nav-tabs nav-stacked" style="padding:10px 0 ">
				<?php activeMenu('<i class="icon-book"></i> Arsip', 'user/arsipku', 'user/arsipku', $page) ?>
				<?php activeMenu('<i class="icon-star"></i> Profil', 'user/account', 'user/account', $page) ?>
				<?php activeMenu('<i class="icon-bookmark"></i> Selipan', 'user/selipanku', 'user/selipanku', $page) ?>
				<?php activeMenu('<i class="icon-comment"></i> Komentar', 'user/komentarku', 'user/komentarku', $page) ?>
			</ul>
		</div>
		<div class="span3 strip box">
			<ul id="main-nav" class="nav nav-tabs nav-stacked" style="padding:10px 0 ">
				<?php activeMenu('<i class="icon-plus"></i> Tambah Arsip', 'arsip/create', 'arsip/create', $page) ?>
				<li>
					<?php echo anchor('auth/logout','<i class="icon-lock"></i> Logout') ?>
				</li>
			</ul>
		</div>
	</div>
</div>

