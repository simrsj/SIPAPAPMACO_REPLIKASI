$(document).ready(function () {
  /* -------------------------------------------------------------- Loader */
  $(".preloader").fadeOut();

  /* -------------------------------------------------------------- dataTable */
  var table = $("#myTable").DataTable({
    // scrollY: "500px",
    // paging: false,
  });

  $("a.toggle-vis").on("click", function (e) {
    e.preventDefault();

    // Get the column API object
    var column = table.column($(this).attr("data-column"));

    // Toggle the visibility
    column.visible(!column.visible());
  });

  $("#myTable_2").dataTable();

  /* -------------------------------------------------------------- select2 */
  $(".select2").select2({
    placeholder: "-- Pilih --",
    allowClear: true,
    width: "100%",
  });

  $(".select2-long").select2({
    placeholder: "-------------- Pilih --------------",
    allowClear: true,
    width: "100%",
  });
});
