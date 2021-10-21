<!DOCTYPE html>
<html lang="en">
<?php
    //error_reporting(0);
    session_start();
    include "_add-ons/connection.php";  
    include "_add-ons/date.php";
    include "_header.php";

    if(isset($_SESSION['status_user'])=='Y')
    {
        if(isset($_GET['lo']))
        {
            include "_log-sign/log_out.php";
        }
        elseif(isset($_SESSION['status_user'])=='Y')
        {
            include"_user/index.php";
        } 
    }
    elseif(empty($_SESSION['id_user'])||isset($_GET['ls'])) 
    {
        if(isset($_GET['reg']))
        {
            include"_log-sign/register.php";
        }
        elseif(isset($_GET['reg_x']))
        {
            include"_log-sign/register_exc.php";
        }
        else
        {
            include"_log-sign/index.php";   
        }
    }
    
    include "_scriptJS.php";
?>
</html>