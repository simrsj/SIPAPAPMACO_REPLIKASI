<script type="text/javascript">
     var disableddates = ["2021-05-01", "2021-05-02"];

     function DisableSpecificDates(date) {
       var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
       return [disableddates.indexOf(string) == -1];
     }

     $(function() {
       $("#several_disable_date_1").datepicker({
         beforeShowDay: DisableSpecificDates
       });
       $("#several_disable_date_2").datepicker({
         beforeShowDay: DisableSpecificDates
       });
     });
   </script>