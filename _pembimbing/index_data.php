<?php
//akun dan hak akses 
if (isset($_GET['kep_penilaian'])) {
	include "_pembimbing/view/v_kep_penilaian.php";
} elseif (isset($_GET['kep_nil_lap_pen'])) {
	include "_pembimbing/insert/i_kep_nil_lap_pen.php";
} elseif (isset($_GET['x_i_kep_nil_lap_pen'])) {
	include "_pembimbing/exc/x_i_kep_nil_lap_pen.php";
} elseif (isset($_GET['u_kep_nil_lap_pen'])) {
	include "_pembimbing/exc/x_u_kep_nil_lap_pen.php";
}
//data dashboard
else {
	include "_pembimbing/dashboard_pembimbing.php";
}
