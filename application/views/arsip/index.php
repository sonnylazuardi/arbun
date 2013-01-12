<?php echo form_open('', array('method'=>'get')) ?>
<?php $this->load->view('arsip/header') ?>
<div class="container">
	<div class="row">
		<?php $this->load->view('arsip/sidebar') ?>
		<div class="span9 strip box">
			<h3>Arsip</h3>
			<legend></legend>
		  <div class="row" style="margin:10px">
	  		<?php foreach($model as $buku) :?>
	  		<div class="span8" style="margin-bottom:20px">
	  			<div class="row">
	  				<div class="span1">
	  					<div class="book" style="margin:0"><?php echo anchor('arsip/view/'.$buku->id, $buku->judul) ?></div>
	  				</div>
	  				<div class="span7">
				  		<div style="margin: 0 -18px 0 25px">
				  		<p style="font-weight:bold"><?php echo anchor('arsip/view/'.$buku->id, $buku->judul) ?></p>
				  		<span style="font-size:.9em">
				  			<?php $buku->akun->get(); echo $buku->akun->nama ?> <br>
					  		<?php echo $buku->tgl_terbit ?> <br>
					  		<?php echo $buku->get_matkulku() ?> <br>
					  		<?php echo $buku->get_bidangku() ?> <br>
				  		</span>
						  </div>
						</div>
	  			</div>
	  		</div>
		  	<?php endforeach; ?>
		  </div>
		  <div style="margin:20px">
				<?php echo $pagination ?>
			</div>
	  </div>
	</div>
</div>