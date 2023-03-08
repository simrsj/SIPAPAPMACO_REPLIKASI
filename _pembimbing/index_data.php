<?php
//akun dan hak akses 
if (isset($_GET['kep_penilaian'])) {
	include "_pembimbing/view/v_kep_penilaian.php";
} elseif (isset($_GET['kep_nil_lap_pen'])) {
	include "_pembimbing/view/v_kep_nil_lap_pen.php";
} elseif (isset($_GET['x_kep_nil_lap_pen_s'])) {
	include "_pembimbing/exc/x_kep_nil_lap_pen_s.php";
}
//data dashboard
else {
	include "_pembimbing/dashboard_pembimbing.php";
}
