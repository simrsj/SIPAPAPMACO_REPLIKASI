function error_data() {
  Swal.fire({
    allowOutsideClick: true,
    icon: "warning",
    title: '<span class="">DATA ADA YANG TIDAK SESUAI</span>',
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener("mouseenter", Swal.stopTimer);
      toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
  });
}

function loading_sw2() {
  Swal.fire({
    title: "Mohon Ditunggu",
    html: '<div class="loader mb-5 mt-5 text-center"></div>',
    allowOutsideClick: false,
    showConfirmButton: false,
    backdrop: true,
  });
}

function simpan_sw2() {
  Swal.fire({
    allowOutsideClick: true,
    icon: "success",
    title: '<span class="">DATA BERHASIL DISIMPAN</span>',
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener("mouseenter", Swal.stopTimer);
      toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
  });
}
