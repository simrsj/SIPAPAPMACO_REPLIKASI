<?php
//akun dan hak akses 
if (isset($_GET['kep_penilaian'])) {
	include "_pembimbing/kep_penilaian.php";
} elseif (isset($_GET['kep_nil_lap_pen'])) {
	include "_pembimbing/kep_nil_lap_pen.php";
}
//data dashboard
else {
	include "_pembimbing/dashboard_pembimbing.php";
}
