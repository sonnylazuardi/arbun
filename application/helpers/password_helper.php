<?php
function create_password($length=6,$use_upper=0,$use_lower=1,$use_number=0,$use_custom=""){
	$seed = '';
	$seed .= ($use_upper ? 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' : '');
	$seed .= ($use_lower ? 'abcdefghijklmnopqrstuvwxyz' : '');
	$seed .= ($use_number ? '0123456789' : '');
	$seed .= ($use_custom ? $use_custom : '');
	$seed_length = strlen($seed);
	$password = '';
	for($x = 0; $x < $length; $x++){
	$password .= $seed[rand(0, $seed_length-1)];
	}
	return $password;
}