$(document).ready(function () {
  $(".preloader").fadeOut();

  $("#myTable").dataTable();

  $("#myTable_2").dataTable();

  $(".select2").select2({
    placeholder: "-- Pilih --",
    allowClear: true,
  });

  $(".select2-long").select2({
    placeholder: "-------------- Pilih --------------",
    allowClear: true,
  });
});
