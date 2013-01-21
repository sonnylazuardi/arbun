<?php $this->load->view('penulis/header'); $this->load->helper('html'); ?>
<div class="container">
	<div class="row">

		<?php $this->load->view('penulis/sidebar') ?>
		<div class="span9 strip box" style = "padding-top:10px">
			<h3>Penulis</h3>
			<legend></legend>
			<?php foreach($model as $penulis) :?>
			  	<div class="row" style="margin-bottom:10px">
					<div class="span1"><span style="padding-left:20px"><?php echo img($penulis->get_profpic()) ?></span></div>
					<div class="span4">
						<span style="padding-left:10px"><?php echo anchor('penulis/view/'.$penulis->id, $penulis->nama) ?>
						<br>
						<span style="padding-left:10px"><?php echo $penulis->jurusan->get()->nama ?>
					</div>
					<div class="span2"><?php echo $penulis->buku->count() ?> Arsip</div>
					<div class="span2"><?php echo $penulis->_count_award() ?> Penghargaan</div>
				</div>
			<?php endforeach; ?>
			<br>
			<?php echo $pagination ?>
		</div>
	</div>
</div>