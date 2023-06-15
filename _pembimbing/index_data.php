<?php
//Kedokteran (Co-Ass)
if (isset($_GET["ked_coass_nilai"])) {
	if (isset($_GET['u'])) include "_pembimbing/update/u_ked_coass_nilai.php";
	else include "_pembimbing/view/v_ked_coass_nilai.php";
}
//data logbook
else if (isset($_GET["elogbook"])) {
	if ($_GET["elogbook"] == "p3d") {
		if (isset($_GET['u'])) include "_pembimbing/update/u_ked_coass_p3d.php";
		else include "_pembimbing/view/v_ked_coass_p3d.php";
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
