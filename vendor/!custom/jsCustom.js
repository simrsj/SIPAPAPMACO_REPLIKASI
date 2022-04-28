$(document).ready(function () {
  /* -------------------------------------------------------------- Loader */
  $(".preloader").fadeOut();

  /* -------------------------------------------------------------- dataTable */
  $("#myTable").dataTable();

  $("#myTable_2").dataTable();

  /* -------------------------------------------------------------- select2 */
  $(".select2").select2({
    placeholder: "-- Pilih --",
    allowClear: true,
    // width: "100%
  });

  $(".select2-long").select2({
    placeholder: "-------------- Pilih --------------",
    allowClear: true,
  });
});
