<?php
//Nilai Keperawatan 
$exp_arr_menu = explode("*sm*", base64_decode(urldecode(hex2bin($_GET['menu']))));
$menu = $exp_arr_menu[1];
if ($menu == 'ked_coass_nilai') {
	if ($submenu == "i") include "_pembimbing/insert/i_kep_nil_lap_pen.php";
	else include "_pembimbing/view/v_ked_coass_nilai.php";
}
if (isset($_GET['ked_coass_nilai'])) {
	if ($data == "i") include "_pembimbing/insert/i_kep_coass_nilai.php";
	else include "_pembimbing/view/v_kep_nilai.php";
}
//data dashboard
else {
	include "_pembimbing/dashboard_pembimbing.php";
}
