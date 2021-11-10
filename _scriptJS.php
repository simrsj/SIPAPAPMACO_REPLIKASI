   <!-- Bootstrap core JavaScript-->
   <script src="vendor/jquery/jquery.min.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- Core plugin JavaScript-->
   <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

   <!-- Custom scripts for all pages-->
   <script src="js/sb-admin-2.min.js"></script>

   <!-- Page level plugins -->
   <script src="vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

   <!-- Page level custom scripts -->

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