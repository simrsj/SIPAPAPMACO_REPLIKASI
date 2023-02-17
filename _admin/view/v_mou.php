    <div class="container-fluid">
        <div class="row justify-content-center mb-2">
            <div class="col-md my-auto">
                <h1 class="h4 text-gray-800">Daftar MoU-Kerjasama</h1>
            </div>
            <!-- Card Data Mou Belum Perpanjang, Pengajuan Baru, Pengajuan Perbanjang -->
            <!-- <div class="col-md">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center text-center">
                            <div class="col">
                                Belum Perpanjang : <br>
                                <span class="badge badge-danger text-lg"><?= $dashboard_dmbp; ?></span>
                            </div>
                            <div class="col">
                                Pengajuan Baru : <br>
                                <span class="badge badge-primary text-lg"><?= $dashboard_dmpb; ?></span>
                            </div>
                            <div class="col">
                                Pengajuan Perpanjang : <br>
                                <span class="badge badge-primary text-lg"><?= $dashboard_dmpl; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="col-md-2 text-right my-auto">
                <a href="?mou&i" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-plus"></i> Tambah
                </a>
                <a href="?mou&a" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-archive"></i> Arsip
                </a>
            </div>
        </div>

        <!-- Data Tabel MoU -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div id="data_mou"></div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#data_mou').load("_admin/view/v_mouData.php");

            $(".arsip_mou").click(function() {
                var id = $(this).attr('id');
                $.ajax({
                    type: 'POST',
                    url: "_admin/exc/x_v_mou_a.php?id=" + id,
                    success: function(response) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 5000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });

                        Toast.fire({
                            icon: 'success',
                            title: '<div class="text-center font-weight-bold text-uppercase">Data Berhasil Diarsipkan</b></div>'
                        });
                    },
                    error: function(response) {
                        alert(response.responseText);
                        console.log(response.responseText);
                    }
                });

                $('#data_mou').load("_admin/view/v_mouData.php");
            });
        });
    </script>