<?php
//akun dan hak akses 
if (isset($_GET['kep_kompetensi'])) {
	include "_praktikan/kep_kompetensi.php";
}
//data dashboard
else {
	include "_praktikan/dashboard_praktikan.php";
}
