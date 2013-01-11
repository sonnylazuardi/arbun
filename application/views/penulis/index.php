
<?php $this->load->view('penulis/header'); $this->load->helper('html'); ?>
<div class="container">
	<div class="row">

		<?php $this->load->view('penulis/sidebar') ?>
		<div class="span9 strip box" style = "padding-top:10px">
			<?php 
				$model->get($limit, $offset);
			?>
			<?php foreach($model as $penulis) :?>
			  	<div class="row" style="margin-bottom:10px">
					<div class="span1"><span style="padding-left:10px"><?php echo img($penulis->get_profpic()) ?></span></div>
					<div class="span4">
						<?php echo $penulis->nama ?>
						<br>
						<?php echo $penulis->jurusan->get()->nama ?>
						<?php echo 'Jurnal' ?>
					</div>
					<div class="span2"><?php echo $penulis->buku->count() ?></div>
					<div class="span2"><?php echo '0 Penghargaan'; ?></div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>