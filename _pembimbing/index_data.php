<?php
//Kedokteran (Co-Ass)
if (isset($_GET["ked_coass_nilai"])) {
	if (isset($_GET['u'])) include "_pembimbing/update/u_ked_coass_nilai.php";
	else include "_pembimbing/view/v_ked_coass_nilai.php";
}
//data Log Book
else if (isset($_GET["elogbook"])) {
	//data Log Book Pencapaian Komptensi Keterampilan P3D
	if ($_GET["elogbook"] == "p3d") {
		if (isset($_GET['u'])) include "_pembimbing/update/u_ked_coass_p3d.php";
		else include "_pembimbing/view/v_ked_coass_p3d.php";
	}
	//data Log Book Pencapaian Komptensi Keterampilan P3D
	else if ($_GET["elogbook"] == "jkh") {
		if (isset($_GET['data'])) include "_pembimbing/view/v_ked_coass_jkh_data.php";
		else include "_pembimbing/view/v_ked_coass_jkh.php";
	} else blankpage();
} else blankpage();

function blankpage()
{
	echo
	'
	<div class="jumbotron border-2 m-2  shadow">
		<div class="jumbotron-fluid">
			<div class="text-gray-700">
				<h5 class="text-center">Silahkan Pilih <b>Menu</b> diatas</h5>
			</div>
		</div>
	</div>
	';
}
