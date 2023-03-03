	<?php
	// error_reporting(0);
	session_start();
	// phpinfo();

$timezone = new DateTimeZone('Asia/Jakarta');
$date = new DateTime();
$date->setTimeZone($timezone);

// echo 'Indonesian Timezone: ' . $date->format('d-m-Y H:i:s') . '<br/>';

// include '_add-ons/csrf_auth.php';
include "_add-ons/koneksi.php";
include "_add-ons/tanggal_waktu.php";
// phpinfo();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SIPAPAP MACO</title>
    <link rel="icon" href="./_img/logorsj.ico">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="vendor/fontawesome-free-6.2.1-web/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="vendor/sw2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="vendor/boxed-check/css/boxed-check.min.css" rel="stylesheet">
    <link href="vendor/!custom/cssCustom.css" rel="stylesheet">
    <link href="vendor/!custom/cs_loader.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body id="page-top" class="bg-primary">
    <div class="card bg-light text-black shadow m-2">
		<div class="card-body text-center">
		Link APLIKASI SIPAPAP MACO (Sistem Informasi Pendaftaran Penjadwalan Praktikan Mahasiswa dan Co-Ass) pindah<br>
		Klik Link :  
		<a href="https://bit.ly/sipapapmacorsj" title="link baru SIPAPAP MACO" class="btn btn-danger">
		<i class="fa-solid fa-arrow-up-right-from-square"></i> KLIK
</a>
		</div>
	</div>

    <!-- JS -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="vendor/sw2/dist/sweetalert2.min.js"></script>
    <script src="vendor/select2/dist/js/select2.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <!-- <script src="js/pkd/chart-area-demo.js"></script> -->
    <script src="vendor/!custom/jsCustom.js"></script>
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
    <script src="vendor/chart.js/Chart.js"></script>
    <script src="vendor/!custom/jsCustom.js"> </script>
    <script>
        <?php
        // include "./vendor/!custom/disable_keyboard.js";
        include $_SERVER['DOCUMENT_ROOT'] . "/SM/vendor/!custom/cs_datatable.js";
        ?>
        $('img').mousedown(function(e) {
            if (e.button == 2) { // right click
                return false; // do nothing!
            }
        });
    </script>

</body>

</html>