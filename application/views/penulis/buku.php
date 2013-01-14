<div class="row">
<div class="span5" style="height:400px; overflow:auto; padding-left:15px; padding-right:40px;">
<?php 
$model->buku->get_iterated();
foreach($model->buku as $buku) :?>
	<div class="span5" style="margin-bottom:20px">
		<div class="row">
			<div class="span1">
				<div class="book" style="margin-left:-20px;"><?php echo anchor('arsip/view/'.$buku->id, $buku->judul) ?></div>
			</div>
			<div class="span4">
	  		<div >
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
</div>