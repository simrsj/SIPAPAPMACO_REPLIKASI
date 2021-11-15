<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(0);
session_start();
include "_add-ons/connection.php";
include "_add-ons/date.php";
include "_header.php";

if ($_SESSION['status_user'] == 'Y') {
    if (isset($_GET['lo'])) {
        include "_log-sign/log_out.php";
    } elseif ($_SESSION['level_user'] == 1) {
        include "_admin/index.php";
    } elseif ($_SESSION['level_user'] == 2) {
        include "_institusi/index.php";
    }
} elseif (empty($_SESSION['id_user']) || isset($_GET['ls'])) {
    if (isset($_GET['reg'])) {
        include "_log-sign/register.php";
    } elseif (isset($_GET['reg_x'])) {
        include "_log-sign/register_exc.php";
    } else {
        include "_log-sign/index.php";
    }
}
?>

</html>
<?php
include "_scriptJS.php";
?>