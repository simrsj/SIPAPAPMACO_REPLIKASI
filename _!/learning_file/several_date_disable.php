<!DOCTYPE html>
<html>
<head>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Several Disable Date -->
    <link href="http://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" rel="stylesheet">

       
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    
    <!--Several Disable Date -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="http://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>

<?php


    include "_add-ons/connection.php";  
    include "_add-ons/date.php";

        $sql_practice="SELECT * FROM tb_practice";

        $q_practice=$conn->query($sql_practice);

        $date_array = array();
        while ($d_practice = $q_practice->fetch(PDO::FETCH_ASSOC))
        {
            $date1=$d_practice['start_practice'];
            $date2=$d_practice['end_practice'];
            $diff = abs(strtotime($date2) - strtotime($date1));
            
            $years = floor($diff / (365*60*60*24));
            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24))+1;
            $no=0;
            while ($days>0) {
                $tgl2 = date('Y-m-d', strtotime('+'.$no.' days', strtotime($date1))); 
                array_push($date_array, $tgl2);
                $days--;
                $no++;
            }
        }
?>


<script type="text/javascript">

    var disableddates = <?= json_encode($date_array) ?>;
    //console.log(disableddates);

    function DisableSpecificDates(date) {
        var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
        return [disableddates.indexOf(string) == -1];
      }

    $(function(){  
        $("#several_disable_date_1").datepicker({
        beforeShowDay: DisableSpecificDates
      }); 
        $("#several_disable_date_2").datepicker({
        beforeShowDay: DisableSpecificDates
      });
    });
    </script>
</head>
<body>
    Tanggal Mulai : <span style="color:red">*</span><br>
    <input id="several_disable_date_1" type="text" name="start_practice" readonly=""><br>
    Tanggal Akhir : <span style="color:red">*</span><br>
    <input id="several_disable_date_2" type="text"  name="end_practice" readonly="">
</body>
</html>