<?php
// error_reporting(0);
session_start();
include "_add-ons/koneksi.php";
include "_add-ons/tanggal_waktu.php";
include '_add-ons/csrf_auth.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">

    <title>SIPAPAP MACO</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/v4-shims-min.css" rel="stylesheet" />
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" />
    <!-- <link href="vendor/datatables-all/datatables.min.css" rel="stylesheet"> -->
    <!-- <link href="vendor/boxed-check/css/boxed-check.min.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="vendor/tata-master/dist/index.css"> -->

</head>
<?php

if (isset($_GET['dashboard'])) {
    include "dashboard/dashboard.php";
} elseif (isset($_SESSION['status_user'])) {
    if ($_SESSION['status_user'] == 'Y') {
        if (isset($_GET['lo'])) {
            include "_log-sign/log_out.php";
        } elseif ($_SESSION['level_user'] == 1) {
            include "_admin/index.php";
        } elseif ($_SESSION['level_user'] == 2) {
            include "_ip/index.php";
        }
    } elseif ($_SESSION['status_user'] == 'T') {
        echo "
            <script>
                alert('Akun Sudah Tidak Aktif');
            </script>
        ";
        include "_log-sign/log_out.php";
    }
} elseif (empty($_SESSION['id_user']) || isset($_GET['ls'])) {
    if (isset($_GET['reg'])) {
        include "_log-sign/register.php";
    } elseif (isset($_GET['reg_x'])) {
        include "_log-sign/register_exc.php";
    } else if (isset($_GET['coba'])) {
        include "_log-sign/calendar.php";
    } else {
        include "_log-sign/index.php";
    }
}
?>

<!-- JS -->

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- <script type="text/javascript" src="vendor/datatables-all/datatables.min.js"></script> -->
<!-- <script src="vendor/tata-master/dist/tata.js"></script> -->
<!-- <script src="vendor/tata-master/dist/index.js"></script> -->
<script src="vendor/select2/dist/js/select2.min.js"></script>
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

<!-- SCRIPT JS  -->
<script>
    $(document).ready(function() {
        $('#myTable').dataTable();
    });
    $(document).ready(function() {
        $('#myTable_2').dataTable();
    });

    $(document).ready(function() {
        $('.js-example-placeholder-single-long').select2({
            placeholder: "-------------- Pilih --------------",
            allowClear: true
        });
    });

    $(document).ready(function() {
        $('.js-example-placeholder-single').select2({
            placeholder: "-- Pilih --",
            allowClear: true
        });
    });
</script>

</html>