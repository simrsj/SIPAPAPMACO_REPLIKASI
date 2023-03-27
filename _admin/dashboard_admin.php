<?php include "_admin/dashboard_adminData.php"; ?>
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
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col">
                            <div class="text-md font-weight-bold  text-primary mb-1">
                                JUMLAH PRAKTIK PROSES :
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <b><?= $dashboard_dpp; ?></b> Kelompok
                                </div>
                            </div>
                            <div class="text-md font-weight-bold text-primary mb-1">
                                JUMLAH PRAKTIK AKTIF :
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <b><?= $dashboard_dpa; ?></b> Kelompok
                                </div>
                            </div>
                            <div class="text-md font-weight-bold text-primary mb-1">
                                JUMLAH PRAKTIK SELESAI :
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <b><?= $dashboard_dps; ?></b> Kelompok
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pendapatan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col">
                            <div class="text-md font-weight-bold text-success text-uppercase mb-1">
                                TOTAL PENDAPATAN : </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= "Rp " . number_format($total_tarif, 0, '.', '.'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MoU -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col">
                            <div class="text-md font-weight-bold text-danger mb-1">
                                <b>TOTAL KERJASAMA : </b>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <span class="badge badge-primary text-lg"><?= $dashboard_dmt; ?></span>
                                </div>
                                <b>KERJASAMA BERAKHIR : </b>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <span class="badge badge-danger text-lg"><?= $dashboard_dmb; ?></span>
                                </div>
                                <b>KERJASAMA AKTIF : </b>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <span class="badge badge-success text-lg"><?= $dashboard_dma; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Praktikan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col">
                            <div class="text-md font-weight-bold text-warning text-uppercase mb-1">
                                JUMLAH PRAKTIKAN PROSES: </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $dashboard_dprtknp; ?> Orang
                            </div>
                            <div class="text-md font-weight-bold text-warning text-uppercase mb-1">
                                JUMLAH PRAKTIKAN AKTIF: </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $dashboard_dprtkna; ?> Orang
                            </div>
                            <div class="text-md font-weight-bold text-warning text-uppercase mb-1">
                                JUMLAH PRAKTIKAN SELESAI: </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $dashboard_dprtkns; ?> Orang
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Data Mess -->
        <div class="col-xl-7 col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Mess</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <!-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div> -->
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php
                    $sql_mess = "SELECT * FROM tb_mess order by nama_mess ASC";
                    $q_mess = $conn->query($sql_mess);
                    $r_mess = $q_mess->rowCount();
                    ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th scope='col'>No</th>
                                    <th>Nama Mess</th>
                                    <th>Kapasitas Total</th>
                                    <!-- <th>Kapasitas Terisi</th> -->
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($d_mess = $q_mess->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?></td>
                                        <td><?= $d_mess['nama_mess']; ?></td>
                                        <td class="text-center"><?= $d_mess['kapasitas_t_mess']; ?></td>
                                        <!-- <td><?php
                                                    // $sql_kapsTerisiMess = "SELECT * FROM tb_praktik 
                                                    // JOIN tb_mess_pilih ON tb_praktik.id_praktik = tb_mess_pilih.id_mess_pilih
                                                    // WHERE tb_praktik.status_cek_praktik = 'BYR_Y' 
                                                    // AND tb_praktik.status_cek_praktik = 'AKV'
                                                    // AND tb_mess.id_mess = ".d_mess['id_mess'];                                      "; 

                                                    // $q_kapsTerisiMess = $conn->query($sql_kapsTerisiMess);
                                                    // while ($d_kapsTerisiMess = $q_kapsTerisiMess->fetch(PDO::FETCH_ASSOC)){
                                                    //     $d_kapsTerisiMess['jumlah_praktik'];
                                                    // }
                                                    // echo $d_kapsTerisiMess['jumlah_praktik']; 
                                                    ?>
                                        </td> -->
                                        <td class="text-center">
                                            <?php
                                            if ($d_mess['status_mess'] == 'Y') {
                                            ?>
                                                <div class="btn btn-sm btn-success">Aktif</div>
                                            <?php
                                            } elseif ($d_mess['status_mess'] == 'T') {
                                            ?>
                                                <div class="btn btn-sm btn-danger">Non-Aktif</div>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <?php
                                        $no++;
                                        ?>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Praktik Tahunan -->
        <div class="col-xl-5 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Persentase Jenis Diklat Tahun <?= date('Y'); ?></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Kedokteran
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Keperawatan
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-warning"></i> Nakes Lainnya
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> Non-Nakes
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->