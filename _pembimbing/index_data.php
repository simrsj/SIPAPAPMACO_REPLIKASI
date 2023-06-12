<?php
//Kedokteran (Co-Ass)
if ($_GET['menu'] == md5(date("Ymd") . "*sm*" . "ked_coass_nilai")) {
	if ($submenu == "i") include "_pembimbing/insert/i_kep_nil_lap_pen.php";
	else include "_pembimbing/view/v_ked_coass_nilai.php";
}
//data dashboard
else {
	include "_pembimbing/dashboard_pembimbing.php";
}
