<?php
//akun dan hak akses 
if (isset($_GET['aku']) && $d_prvl['r_akun'] == 'Y') {
	if (isset($_GET['ha']) && $_SESSION['level_user'] == 1)
		include "_admin/view/v_akun_hak_akses.php";
	else
		include "_admin/view/v_akun.php";
}
//data dashboard
else {
	include "_praktikan/dashboard_praktikan.php";
}
