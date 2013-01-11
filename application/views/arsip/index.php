<?php $this->load->view('arsip/header') ?>
<div class="container">
	<div class="row">
		<?php $this->load->view('arsip/sidebar') ?>
		<div class="span9 strip box">
			<div style="margin:20px">
				<table class="table table-striped">
				  <thead>
				  	<tr>
	  				  <th>#</th>
	  				  <th>Judul</th>
	  				  <th>Pengarang</th>
	  				  <th>Tgl Terbit</th>
	  				  <th>Mata Kuliah</th>
	  				  <th>Bidang</th>
	  				  <th>Menu</th>
				  	</tr>
				  </thead>
				  
				  <tbody>
				  	<?php $ctr = $offset; $model->get($limit, $offset); ?>
				  	<?php foreach($model as $buku) :?>
				  	<tr>
				  		<td><?php echo $ctr ?></td>
				  		<td><?php echo $buku->judul ?></td>
				  		<td><?php $buku->akun->get(); echo $buku->akun->nama ?></td>
				  		<td><?php echo $buku->tgl_terbit ?></td>
				  		<td><?php echo $buku->get_matkulku() ?></td>
				  		<td><?php echo $buku->get_bidangku() ?></td>
				  		<td> 
								<?php echo anchor($buku->link,'<i class="icon-eye-open"></i>', 'class="btn btn-small"'); ?>
						  </td>
						 </tr>
				  	<?php $ctr++; ?>
				  	<?php endforeach; ?>
				  </tbody>
				</table>
				<?php 
					$this->load->library('pagination');
					$config['base_url'] = site_url().'/arsip/index/';
					$config['total_rows'] = $count;
					$config['per_page'] = $limit; 

					$this->pagination->initialize($config); 

					echo $this->pagination->create_links();
				?>
					<!-- <div class="pagination">
				    <ul>
				      <li><a href="#">«</a></li>
				      <li><a href="#">1</a></li>
				      <li><a href="#">2</a></li>
				      <li><a href="#">3</a></li>
				      <li><a href="#">4</a></li>
				      <li><a href="#">5</a></li>
				      <li><a href="#">»</a></li>
				    </ul> -->
			</div>
		  </div>
		</div>
	</div>
</div>