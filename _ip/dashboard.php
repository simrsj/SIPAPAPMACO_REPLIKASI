<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i>
            Laporan
        </a> -->
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Diklat -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-md font-weight-bold text-center text-primary mb-1">
                        <div class="h5 mb-0 font-weight-bold">
                            <b><?php echo $dashboard_dpp; ?></b> INSTITUSI
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center text-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold  text-primary mb-1">
                                Akronim :
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <b><?php echo $dashboard_dpp; ?></b> Kelompok
                                </div>
                            </div>
                            <div class="text-md font-weight-bold text-primary mb-1">
                                Logo :
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <b><?php echo $dashboard_dpa; ?></b> Kelompok
                                </div>
                            </div>
                            <div class="text-md font-weight-bold text-primary mb-1">
                                Alamat :
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <b><?php echo $dashboard_dpn; ?></b> Kelompok
                                </div>
                            </div>
                        </div>
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold  text-primary mb-1">
                                Akreditasi :
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <b><?php echo $dashboard_dpp; ?></b> Kelompok
                                </div>
                            </div>
                            <div class="text-md font-weight-bold text-primary mb-1">
                                File Akreditasi :
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <b><?php echo $dashboard_dpn; ?></b> Kelompok
                                </div>
                            </div>
                            <div class="text-md font-weight-bold text-primary mb-1">
                                Tanggal Berlaku Akreditasi Sampai :
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <b><?php echo $dashboard_dpa; ?></b> Kelompok
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pendapatan -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-danger text-uppercase mb-1">
                                TOTAL PENDAPATAN : </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo "Rp " . number_format($total_tarif, 0, '.', '.'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->