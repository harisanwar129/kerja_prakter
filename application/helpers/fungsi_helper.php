<?php

function check_login_session() {
	$ci =& get_instance();
    $session = $ci->session->userdata('userid');
	if(!$session) {
		redirect('auth/login');
	}
}

function indo_date($date) {
	$d = substr($date,8,2);
	$m = substr($date,5,2);
	$y = substr($date,0,4);
	return $d.'/'.$m.'/'.$y;		 
}

function indo_currency($value) {
	return number_format($value, 0, ',', '.');
}

function db_date($date) {
	$d = substr($date,0,2);
	$m = substr($date,3,2);
	$y = substr($date,6,4);
	return $y.'-'.$m.'-'.$d;		 
}