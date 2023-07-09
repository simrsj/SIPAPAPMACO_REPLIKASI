<?php
//akun dan hak akses 
if (isset($_GET['kep_kompetensi']))	include "_praktikan/kep_kompetensi.php";
//nilai Kedokteran (Co-Ass)
else if (isset($_GET["ked_coass_nilai"])) include "_praktikan/view/v_ked_coass_nilai.php";
//data Log Book Kedokteran Co-Ass
else if (isset($_GET["ked_coass_elogbook"])) {
	//data Log Book Pencapaian Komptensi Keterampilan P3D
	if ($_GET["ked_coass_elogbook"] == "p3d") include "_praktikan/view/v_ked_coass_p3d.php";
	//data Log Book Jadwal Kegiatan Harian
	else if ($_GET["ked_coass_elogbook"] == "jkh") include "_pembimbing/view/v_ked_coass_jkh_input.php";
	//data Log Book Kejadian Yang Ditemukan
	else if ($_GET["ked_coass_elogbook"] == "kyd") include "_pembimbing/view/v_ked_coass_kyd_input.php";
	//data Log Book Pembuatan Status Wajib
	else if ($_GET["ked_coass_elogbook"] == "psw") include "_pembimbing/view/v_ked_coass_psw_input.php";
	//data Log Book materi
	else if ($_GET["ked_coass_elogbook"] == "materi") include "_pembimbing/view/v_ked_coass_materi_input.php";
	//data Log Book lppp
	else if ($_GET["ked_coass_elogbook"] == "lppp") include "_praktikan/view/v_ked_coass_lppp.php";
}
//data dashboard
else {
	include "_praktikan/dashboard_praktikan.php";
}
