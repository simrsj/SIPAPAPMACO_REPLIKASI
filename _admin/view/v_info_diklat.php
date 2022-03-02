    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-11">
                <h1 class="h4 text-gray-800">Informasi Kediklatan</h1>
            </div>
        </div><br>


        <!-- INFORMASI JURUSAN, JENJANG, PROFESI -->
        <div class="row">

            <!-- DATA KEDOKTERAN -->
            <div class="col-xl-3 col-md-3 mb-4 d-flex align-items-stretch">
                <div class="card shadow h-100">
                    <div class="card-header  d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Kedokteran</h6>
                    </div>
                    <div class="card-body">
                        <div class="overflow-auto py-5">
                            <div class="row no-gutters align-items-center text-center">
                                <div class="col">
                                    Berlaku (Aktif) : <br>
                                    <span class="badge badge-success text-lg"><?php echo $dashboard_dma; ?></span>
                                </div>
                                <div class="col">
                                    Tidak Berlaku (Non-Aktif) : <br>
                                    <span class="badge badge-danger text-lg"><?php echo $dashboard_dmb; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DATA KEPERAWATAN -->
            <div class="col-xl-3 col-md-3 mb-4 d-flex align-items-stretch">
                <div class="card  shadow h-100">
                    <div class="card-header  d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Keperawatan</h6>
                    </div>
                    <div class="card-body">
                        <div class="overflow-auto">
                            <div class="row no-gutters align-items-center text-center">
                                <div class="col">
                                    Berlaku (Aktif) : <br>
                                    <span class="badge badge-success text-lg"><?php echo $dashboard_dma; ?></span>
                                </div>
                                <div class="col">
                                    Tidak Berlaku (Non-Aktif) : <br>
                                    <span class="badge badge-danger text-lg"><?php echo $dashboard_dmb; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DATA NAKES LAINNYA -->
            <div class="col-xl-3 col-md-3 mb-4 d-flex align-items-stretch">
                <div class="card shadow h-100">
                    <div class="card-header  d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Nakes Lainnya</h6>
                    </div>
                    <div class="card-body">
                        <div class="overflow-auto">
                            <div class="row no-gutters align-items-center text-center">
                                <div class="col">
                                    Berlaku (Aktif) : <br>
                                    <span class="badge badge-success text-lg"><?php echo $dashboard_dma; ?></span>
                                </div>
                                <div class="col">
                                    Tidak Berlaku (Non-Aktif) : <br>
                                    <span class="badge badge-danger text-lg"><?php echo $dashboard_dmb; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DATA NON-NAKES -->
            <div class="col-xl-3 col-md-3 mb-4 d-flex align-items-stretch">
                <div class="card  shadow h-100">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Non-Nakes</h6>
                    </div>
                    <div class="card-body">
                        <div class="overflow-auto">
                            <div class="row no-gutters align-items-center text-center">
                                <div class="col">
                                    Berlaku (Aktif) : <br>
                                    <span class="badge badge-success text-lg"><?php echo $dashboard_dma; ?></span>
                                </div>
                                <div class="col">
                                    Tidak Berlaku (Non-Aktif) : <br>
                                    <span class="badge badge-danger text-lg"><?php echo $dashboard_dmb; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>