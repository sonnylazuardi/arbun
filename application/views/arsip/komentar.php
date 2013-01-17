<?php echo form_open('komentars/create/'.$model->id);
$model->komentar->order_by("id", "desc")->where('status', 1)->get_iterated();

echo '<div class="row" style="overflow-y:scroll;margin-left:0px;max-height:450px">';
foreach($model->komentar as $data){
	echo $data->isi;
	echo '<p style="font-size:10px;color:#999;">'.$data->created.'</p>';
	if($user and $data->akun_id==$user->id)
		echo '<p>'.anchor('komentars/delete/'.$data->id.'/'.$model->id,'Hapus').'</p>';
	echo '<div class="span1" style="margin-left:0px"><img src="'.$data->akun->get()->get_profpic().'" width=35px/></div>';
	echo '<div style="margin-left:-10px;line-height:15px;font-size:12px;width:100px;float:left">'.$data->akun->get()->nama.'</div>';
	echo "<br/><br/><legend></legend>";
}
echo '</div>';

if($user){
	echo '<p style="margin-top:5px">Tulis komentar :</p>';
	echo form_textarea('isikomentar', '', 'style="width:180px; height:70px"');
	echo '<button class="btn" type="submit" style="margin-top:5px">kirim</button>';
}
else{
	echo anchor('auth/login', 'Login untuk mengakses');
}
?>

<?php echo form_close(); ?>