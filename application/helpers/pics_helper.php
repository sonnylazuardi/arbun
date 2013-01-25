<?php
function resize_pic($filename, $w, $h){
	require_once APPPATH.'libraries/phpthumb/ThumbLib.inc.php';
	$thumb = PhpThumbFactory::create($filename);
	$thumb->adaptiveResize($w, $h);
	$thumb->save($filename, 'jpg');
}

/* End of file pics_helper.php */
/* Location: ./system/application/helpers/pics_helper.php */