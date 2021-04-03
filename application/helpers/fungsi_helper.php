<?php

function check_login_session()
{
	$ci = &get_instance();
	$session = $ci->session->userdata('userid');
	if (!$session) {
		redirect('auth/login');
	}
}


defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('format_indo')) {
	function format_indo($date)
	{
		date_default_timezone_set('Asia/Jakarta');
		// array hari dan bulan
		$Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
		$Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

		// pemisahan tahun, bulan, hari, dan waktu
		$tahun = substr($date, 0, 4);
		$bulan = substr($date, 5, 2);
		$tgl = substr($date, 8, 2);
		$waktu = substr($date, 11, 5);
		$hari = date("w", strtotime($date));
		$result = $Hari[$hari] . ", " . $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " " . $waktu;

		return $result;
	}

	function indo_date($date)
	{
		$d = substr($date, 8, 2);
		$m = substr($date, 5, 2);
		$y = substr($date, 0, 4);
		return $d . '/' . $m . '/' . $y;
	}

	function indo_currency($value)
	{
		return number_format($value, 0, ',', '.');
	}

	function db_date($date)
	{
		$d = substr($date, 0, 2);
		$m = substr($date, 3, 2);
		$y = substr($date, 6, 4);
		return $y . '-' . $m . '-' . $d;
	}
}
