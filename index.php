<?php
// error_reporting(0);
session_start();


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
    <!-- <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.css" rel="stylesheet" /> -->
    <link href="vendor/sw2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="vendor/boxed-check/css/boxed-check.min.css" rel="stylesheet">
    <link href="vendor/!custom/cssCustom.css" rel="stylesheet">

    <!-- <script rel="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body id="page-top" class="bg-primary">
    <div class="preloader">
        <div class="loading">
            <img src="./_img/logorsj.png" class="rotate mb-3" width="100" height="100" />
            <p>Harap Tunggu</p>
        </div>
    </div>
    <?php

    if (isset($_GET['dashboard'])) include "_dashboard/dashboard.php";
    elseif (isset($_SESSION['status_user'])) {
        if ($_SESSION['status_user'] == 'Y') {
            if (isset($_GET['lo'])) include "_log-sign/exc/x_log_out.php";
            elseif (isset($_SESSION['level_user'])) include "_admin/index.php";
        } elseif ($_SESSION['status_user'] == 'T') {
            echo "
            <script>
                alert('Akun Sudah Tidak Aktif');
            </script>
        ";
            include "_log-sign/exc/x_log_out.php";
        }
    } 
    // Index Log-Sign
    elseif (empty($_SESSION['id_user']) || isset($_GET['ls'])) include "_log-sign/index.php";
    ?>

    <!-- JS -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="vendor/sw2/dist/sweetalert2.min.js"></script>
    <script src="vendor/select2/dist/js/select2.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.js"></script> -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/!custom/jsCustom.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
    <script>
        // console.log('Javascript Aktif');
    </script>

</body>

</html>