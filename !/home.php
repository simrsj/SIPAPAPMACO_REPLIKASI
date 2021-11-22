<?php
error_reporting(0);
session_start();
include "_add-ons/connection.php";
include "_add-ons/date.php";
include "_add-ons/sb_admin2/";
?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="_img/logo_icon.ico">
	<title>SM</title>
</head>

<body>
	<div class=''>
		<?php
		if (isset($_SESSION['status_user']) == 'Y') {
			if (isset($_GET['lo'])) {
				include "_log-sign/log_out.php";
			} elseif (isset($_SESSION['status_user']) == 'Y') {
				include "_user/index.php";
				//var_dump('SESSION : '.$_SESSION['status_user']);die;
			}
		} elseif (empty($_SESSION['id_user']) || isset($_GET['ls'])) {
			include "_log-sign/index.php";
		}
		?>
	</div>
	<footer>
		<hr>
		<b align='center'>RS Jiwa Provinsi Jawa Barat</b>
	</footer>
</body>

</html>