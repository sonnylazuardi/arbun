<h4>Penghargaan</h4>
<legend style="margin-bottom:10px"></legend>
<div class="row">
	<div class="span5" style="height:70px; overflow:auto; padding-left:15px; padding-right:20px;">
		<div class="row">
		<?php 
		$model->buku->order_by('id', 'desc');
		$model->buku->get_iterated();
		foreach ($model->buku as $bukuku) {
			$bukuku->award->get_iterated();
			foreach ($bukuku->award as $awardku) {
				echo '<div class="span2">'.$awardku->nama.'</div>';
			}
		}
		?>
		</div>
	</div>
</div>