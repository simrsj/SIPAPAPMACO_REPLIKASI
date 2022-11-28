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

  $("#table-search-each tfoot th").each(function () {
    var title = $(this).text();
    $(this).html(
      '<input class="form-control" type="text" placeholder="Cari ' +
        title +
        '" />'
    );
  });

  // DataTable
  var table = $("#table-search-each").DataTable({
    initComplete: function () {
      // Apply the search
      this.api()
        .columns()
        .every(function () {
          var that = this;

          $("input", this.footer()).on("keyup change clear", function () {
            if (that.search() !== this.value) {
              that.search(this.value).draw();
            }
          });
        });
    },
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
