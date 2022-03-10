    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-11">
                <h1 class="h4 text-gray-800">Informasi Kediklatan</h1>
            </div>
        </div><br>


        <!-- INFORMASI JURUSAN, JENJANG, PROFESI -->
        <div class="row">
            <!-- DATA KEDOKTERAN -->
            <div class="col-xl-3 col-md-3 mb-4  align-items-stretch justify-content-center">
                <div class="card shadow h-100">
                    <div class="card-header   flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Kedokteran</h6>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="no-gutters align-items-center">
                                Jurusan : Kedokteran
                                <hr>
                                Jenjang : Profesi
                                <hr>
                                Profesi : Program Pendidikan Dokter Spesialis (PPDS), Program Studi Pendidikan Dokter (PSPD) / Co-ass
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DATA KEPERAWATAN -->
            <div class="col-xl-3 col-md-3 mb-4  align-items-stretch justify-content-center">
                <div class="card  shadow h-100">
                    <div class="card-header   flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Keperawatan</h6>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="no-gutters align-items-center">
                                Jurusan : Keperawatan
                                <hr>
                                Jenjang : D3, S1, Profesi.
                                <hr>
                                Profesi : NERS
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DATA NAKES LAINNYA -->
            <div class="col-xl-3 col-md-3 mb-4  align-items-stretch justify-content-center">
                <div class="card shadow h-100">
                    <div class="card-header   flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Nakes Lainnya</h6>
                    </div>
                    <div class="card-body">
                        <div class="overflow-auto">
                            <div class="no-gutters align-items-center">
                                Jurusan : Farmasi, Kesehatan Lingkungan (KESLING), Psikologi, Rekam Medis
                                <hr>
                                Jenjang : D3, S1, Profesi (Farmasi, Psikologi).
                                <hr>
                                Profesi : Apotekes (Farmasi), Psikologi Klinik (Psikologi)
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DATA NON-NAKES -->
            <div class="col-xl-3 col-md-3 mb-4  align-items-stretch justify-content-center">
                <div class="card  shadow h-100">
                    <div class="card-header  flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Non-Nakes</h6>
                    </div>
                    <div class="card-body">
                        <div class="overflow-auto">
                            <div class="no-gutters align-items-center ">
                                Jurusan : Informasi Teknologi (IT), Pekerja Sosial (Peksos)
                                <hr>
                                Jenjang : D3, S1.
                                <hr>
                                Profesi : -
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- INFORMASI JADWAL PRAKTIKAN-->
        <div class="row">
            <!-- KEDOKTERAN DAN KEPERAWATAN-->
            <div class="col-xl-6 col-md-6 mb-4 align-items-stretch">
                <div class="card shadow h-100">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Kedokteran dan Keperawatan (Kuota Harian : )</h6>
                        <a class="btn btn-outline-primary btn-sm" href="#">Input Kuota</a>
                    </div>
                    <div class="card">
                        <div class="overflow-auto">
                            <div class="no-gutters align-items-center text-center pt-0">
                                <?php include "./_admin/view/v_info_diklat_dataKedKep.php"; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- NAKES LAINNYA DAN NON NAKES-->
            <div class="col-xl-6 col-md-6 mb-4 align-items-stretch">
                <div class="card shadow h-100">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Nakes Lainnya dan Non-Nakes (Kuota Harian : )</h6>
                        <a class="btn btn-outline-primary btn-sm" href="#">Input Kuota</a>
                    </div>
                    <div class="card">
                        <div class="overflow-auto">
                            <div class="no-gutters align-items-center text-center pt-0">
                                <br>
                                <div class="row text-center">
                                    <div class="col-md-4">
                                        Farmasi : 10<br><br>
                                        Kesling : 10
                                    </div>
                                    <div class="col-md-4">
                                        Farmasi : 10<br><br>
                                        Kesling : 10
                                    </div>
                                    <div class="col-md-4">
                                        Farmasi : 10<br><br>
                                        Kesling : 10
                                    </div>
                                </div>
                                <?php include "./_admin/view/v_info_diklat_dataNklNnk.php"; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function kuotaKedKep() {
            console.log("kuotaKedKep");
            Swal.fire({
                position: 'top',
                title: 'Yakin ?',
                html: "<span class='text-danger text-uppercase font-weight-bold'>Penolakan</span> Data Pembayaran Kurang Transfer" +
                    '<input id="valP_T" class="swal2-input" type="number" min="10000" placeHolder="Isi Kekurangan Transfer">',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1cc88a',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Kembali',
                confirmButtonText: 'Ya',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    var valP_T = document.getElementById('valP_T').value;
                    $.ajax({
                        type: 'POST',
                        url: "_admin/exc/x_v_praktik_valPembayaran.php",
                        data: {
                            'id': id,
                            'ket': 't',
                            'valP_T': valP_T
                        },
                        success: function() {
                            Swal.fire({
                                allowOutsideClick: false,
                                // isDismissed: false,
                                icon: 'error',
                                title: '<div class="text-md text-center">DATA PRAKTIKAN DAN TARIF <br> <b>DITOLAK</b></div>',
                                showConfirmButton: false,
                                html: '<a href="<?php echo "?prk=" . $_GET['prk']; ?>" class="btn btn-primary">OK</a>',
                                timer: 5000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            }).then(
                                function() {
                                    document.location.href = "<?php echo "?prk=" . $_GET['prk']; ?>";
                                }
                            );
                        },
                        error: function(response) {
                            console.log(response.responseText);
                            alert('eksekusi query gagal');
                        }
                    });

                }
            });
        }
    </script>