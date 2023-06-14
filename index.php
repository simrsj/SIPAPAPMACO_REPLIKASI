<?php
error_reporting(0);
session_start();
// phpinfo();
date_default_timezone_set('Asia/Jakarta');

// Get the current time
$current_time = new DateTime();

// Add 1 minute to the current time
$current_time->add(new DateInterval('PT1M'));

include "_add-ons/koneksi.php";
include "_add-ons/tanggal_waktu.php";
include "_add-ons/crypt.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SIPAPAP MACO</title>
    <link rel="icon" href="./_img/logorsj.ico">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="vendor/fontawesome-free-6.2.1-web/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="vendor/sw2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="vendor/boxed-check/css/boxed-check.min.css" rel="stylesheet">
    <link href="vendor/custom/cssCustom.css" rel="stylesheet">
    <link href="vendor/custom/cs_loader.css" rel="stylesheet">
    <script src="vendor/jquery3.6.0.min.js"></script>

</head>

<body id="page-top" class="bg-sipapapmaco-abstrack1">
    <div class="preloader">
        <div class="loading">
            <div class="loader loader-main"></div>
        </div>
    </div>
    <?php

    if (isset($_GET['dashboard'])) include "_dashboard/dashboard.php";
    elseif (isset($_GET['test'])) include "test.php";
    elseif (isset($_GET['logbookked'])) include "_praktikan\logbookked.php";
    elseif (isset($_GET['logbookkep'])) include "_praktikan\logbookkep.php";
    elseif (isset($_GET['error401'])) include "_error/error401.php";
    elseif (isset($_GET['error404'])) include "_error/error404.php";
    elseif (isset($_SESSION['status_user'])) {
        if ($_SESSION['status_user'] == 'Y') {
            if (isset($_GET['lo'])) include "_log-sign/exc/x_log_out.php";
            elseif (
                $_SESSION['level_user'] == 1 ||
                $_SESSION['level_user'] == 2 ||
                $_SESSION['level_user'] == 3
            ) include "_admin/index.php";
            elseif ($_SESSION['level_user'] == 4) include "_pembimbing/index.php";
            elseif ($_SESSION['level_user'] == 5) include "_praktikan/index.php";
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
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/custom/jsCustom.js"></script>
    <!-- <script src="js/pkd/chart-area-demo.js"></script> -->
    <!-- <script src="https://js.hcaptcha.com/1/api.js" async defer></script> -->
    <script>
        window.top == window &&
            window.console &&
            (setTimeout(
                    console.log.bind(
                        console,
                        "%c%s",
                        "color: white; background: #4e73df; font-size: 20px;",
                        " SIPAPAP MACO "
                    )
                ),
                setTimeout(
                    console.log.bind(
                        console,
                        "%c%s",
                        "font-size: 14px;",
                        "(Sistem Informasi Pendaftaran Penjadwalan Praktikan Mahasiswa dan Co-Ass)  "
                    )
                ));
        <?php
        // include "./vendor/custom/disable_keyboard.js";
        include $_SERVER['DOCUMENT_ROOT'] . "/SM/vendor/custom/cs_datatable.js";
        ?>
        alert = function() {};
        $('img').mousedown(function(e) {
            if (e.button == 2) { // right click
                return false; // do nothing!
            }
        });
    </script>
</body>

</html>