<?php
//akun dan hak akses 
if (isset($_GET['kep_penilaian'])) {
	include "_pembimbing/view/v_kep_penilaian.php";
}
//Nilai Keperawatan Laporan Pendahuluan
elseif (isset($_GET['kep_nil_lap_pen'])) {
	$exp_arr_data = explode("*sm*", base64_decode(urldecode(hex2bin($_GET['data']))));
	$data = $exp_arr_data[1];
	if ($data == "i") include "_pembimbing/insert/i_kep_nil_lap_pen.php";
	else if ($data == "i_x") include "_pembimbing/exc/x_i_kep_nil_lap_pen.php";
	else if ($data == "u") include "_pembimbing/update/u_kep_nil_lap_pen.php";
	else if ($data == "u_x") include "_pembimbing/exc/x_u_kep_nil_lap_pen.php";
	else include "_pembimbing/insert/i_kep_nil_lap_pen.php";
}
//data dashboard
else {
	include "_pembimbing/dashboard_pembimbing.php";
}
