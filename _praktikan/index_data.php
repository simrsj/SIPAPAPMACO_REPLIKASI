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
	else if ($_GET["ked_coass_elogbook"] == "jkh") {
		if (isset($_GET['data'])) include "_pembimbing/view/v_ked_coass_jkh_input.php";
		else include "_pembimbing/view/v_ked_coass_jkh.php";
	}
	//data Log Book Kejadian Yang Ditemukan
	else if ($_GET["ked_coass_elogbook"] == "kyd") {
		if (isset($_GET['data'])) include "_pembimbing/view/v_ked_coass_kyd_input.php";
		else include "_pembimbing/view/v_ked_coass_kyd.php";
	}
	//data Log Book Pembuatan Status Wajib
	else if ($_GET["ked_coass_elogbook"] == "psw") {
		if (isset($_GET['data'])) include "_pembimbing/view/v_ked_coass_psw_input.php";
		else include "_pembimbing/view/v_ked_coass_psw.php";
	}
	//data Log Book materi
	else if ($_GET["ked_coass_elogbook"] == "materi") {
		if (isset($_GET['data'])) include "_pembimbing/view/v_ked_coass_materi_input.php";
		else include "_pembimbing/view/v_ked_coass_materi.php";
	}
	//data Log Book materi
	else if ($_GET["ked_coass_elogbook"] == "lppp") {
		if (isset($_GET['u'])) include "_pembimbing/update/u_ked_coass_lppp.php";
		else include "_pembimbing/view/v_ked_coass_lppp.php";
	} else pilihmenu();
}
//data dashboard
else {
	include "_praktikan/dashboard_praktikan.php";
}
