<?php
//Kedokteran (Co-Ass)
if (isset($_GET["ked_coass_nilai"])) {
	if (isset($_GET['u'])) include "_pembimbing/update/u_ked_coass_nilai.php";
	else include "_pembimbing/view/v_ked_coass_nilai.php";
}
//data logbook
else if (isset($_GET["logbook"])) {
	if ($_GET['logbook'] == "p3d") include "_pembimbing/update/v_p3d.php";
	else include "_pembimbing/view/v_p3d.php";
}
//data dashboard
else {
	include "_pembimbing/dashboard_pembimbing.php";
}
