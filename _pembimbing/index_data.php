<?php
//Nilai Keperawatan 
if (isset($_GET['kep_nilai'])) {
	if ($data == "i") include "_pembimbing/insert/i_kep_nil_lap_pen.php";
	else include "_pembimbing/view/v_kep_nilai.php";
}
//data dashboard
else {
	include "_pembimbing/dashboard_pembimbing.php";
}
