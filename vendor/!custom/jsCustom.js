$(document).ready(function () {
  /* -------------------------------------------------------------- Loader */
  $(".preloader").fadeOut();

  /* -------------------------------------------------------------- dataTable */
  $("#dataTable").DataTable();
  $("#dataTable_2").dataTable();

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
  function swalTunggu() {
    Swal.fire({
      title: "Mohon Ditunggu . . .",
      html: ' <img src="./_img/d3f472b06590a25cb4372ff289d81711.gif" class="rotate mb-3" width="100" height="100" />',
      allowOutsideClick: false,
      showConfirmButton: false,
      backdrop: true,
    });
  }
});
