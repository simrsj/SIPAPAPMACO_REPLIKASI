   
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

    <script type="text/javascript">
    /** Days to be disabled as an array */
    <?php


    
    ?>

    var disableddates = ["2021-05-01", "2021-05-02"];

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