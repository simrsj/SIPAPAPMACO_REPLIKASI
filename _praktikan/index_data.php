<?php
//akun dan hak akses 
if (isset($_GET['kep_kompetensi'])) {
	include "_praktikan/kep_kompetensi.php";
} else if (isset($_GET['aku'])) {
	include "_admin/view/v_akun.php";
}
//data dashboard
else {
	include "_praktikan/dashboard_praktikan.php";
}
