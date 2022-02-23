$(document).ready(function () {
  $("#myTable").dataTable();

  $("#myTable_2").dataTable();

  $(".js-example-placeholder-single-long").select2({
    placeholder: "-------------- Pilih --------------",
    allowClear: true,
  });

  $(".js-example-placeholder-single").select2({
    placeholder: "-- Pilih --",
    allowClear: true,
  });
});
