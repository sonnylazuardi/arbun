<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<div class="container">
      <div class="span6 desk">
        <h3>Akun</h3>
    	</div>
    </div>
<div class="container" style="color:black;">
	<div class="row">
		<div class="span3 desk" style="border-radius:10px;background-color:white;padding-top:10px">
			<p onmouseover="this.style.background='#cccccc'" onmouseout="this.style.background='rgb(222,222,222)'" style="padding-left:10px;padding-top:10px;height:35px;background-color:rgb(222,222,222)">Profil</p>
			<p onmouseover="this.style.background='#cccccc'" onmouseout="this.style.background='white'" style="padding-left:10px;padding-top:10px;height:35px;background-color:rgb(255,255,255)"><?php echo anchor('user/arsipku', 'Arsipku') ?></p>
		</div>
		<div class="span9" style="border-radius:10px;background-color:white;">
			<div style="padding:20px">
				<h3>Edit Profil</h3>
				<legend></legend>	
				<div class="row" style="margin-top:10px">
					<div class="span4">
						<p>Nama</p>
						<input type="text" placeholder="Nama" >
						<p>Status</p>
						<input type="text" placeholder="Mahasiswa" >
						<p>Email :</p>
						<input class="span3" type="email" >
						<p>Tanggal Lahir :</p>
						<select class="span1" style="margin-left:10px">
							<option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option>
							<option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option>
							<option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option>
							<option>31</option>
						</select>
						<select style="margin-left:1px; width:100px">
							<option>Januari</option><option>Februari</option><option>Maret</option><option>April</option><option>Mei</option><option>Juni</option>			
							<option>Juli</option><option>Agustus</option><option>September</option><option>Oktober</option><option>November</option><option>Desember</option>
						</select>
						<input class="span1" style="margin-left:2px" type="text" >
					</div>
					<div class="span4">
						<p>NIM/NIP</p>
						<input type="text" placeholder="13511" >
						<p>Fakultas</p>
						<select class="span3">
							<option>STEI</option>
							<option>FTMD</option>
						</select>
						<p>Jurusan</p>
						<select class="span3">
							<option>Teknik Informatika</option>
							<option>Sistem dan Teknologi Informasi</option>
						</select>
					</div>
				</div>
				<legend></legend>
				<button type="submit" class="btn btn-success">Ubah</button>
				<button type="submit" class="btn btn-primary">Batal</button>
			</div>
		</div>
	</div>
</div>