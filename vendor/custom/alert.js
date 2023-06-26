function loading_sw2() {
  Swal.fire({
    title: "Mohon Ditunggu",
    html: '<div class="loader mb-5 mt-5 text-center"></div>',
    allowOutsideClick: false,
    showConfirmButton: false,
    backdrop: true,
  });
}

function simpan_tidaksesuai() {
  Swal.fire({
    allowOutsideClick: true,
    icon: "warning",
    title: "DATA ADA YANG TIDAK SESUAI",
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener("mouseenter", Swal.stopTimer);
      toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
  });
}

function simpan_berhasil() {
  Swal.fire({
    allowOutsideClick: true,
    icon: "success",
    title: "DATA BERHASIL DISIMPAN",
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener("mouseenter", Swal.stopTimer);
      toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
  });
}

function simpan_gagal_database() {
  Swal.fire({
    allowOutsideClick: true,
    icon: "error",
    title: "DATA GAGAL DISIMPAN KE DATABASE",
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener("mouseenter", Swal.stopTimer);
      toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
  });
}
