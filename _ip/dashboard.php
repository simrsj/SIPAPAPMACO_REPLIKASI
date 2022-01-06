<?php include "./_add-ons/dashboard_data_institusi.php"; ?>

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
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold  text-primary mb-1">
                                JUMLAH DIKLAT PROSES :
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <b><?php echo $data_dpp; ?></b> Kelompok
                                </div>
                            </div>
                            <div class="text-md font-weight-bold text-primary mb-1">
                                JUMLAH DIKLAT AKTIF :
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <b><?php echo $data_dpa; ?></b> Kelompok
                                </div>
                            </div>
                            <div class="text-md font-weight-bold text-primary mb-1">
                                JUMLAH DIKLAT NON-AKTIF :
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <b><?php echo $data_dpn; ?></b> Kelompok
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-3x text-gray-400"></i>
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
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-danger mb-1">
                                <b>TOTAL MOU : </b>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <span class="badge badge-primary text-lg"><?php echo $data_dmt; ?></span>
                                </div>
                                <b>MOU BERAKHIR : </b>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <span class="badge badge-danger text-lg"><?php echo $data_dmb; ?></span>
                                </div>
                                <b>MOU AKTIF : </b>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <span class="badge badge-success text-lg"><?php echo $data_dma; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-handshake fa-3x text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-6 col-md-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Mess</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php
                    $sql_mess = "SELECT * FROM tb_mess order by nama_mess ASC";
                    $q_mess = $conn->query($sql_mess);
                    $r_mess = $q_mess->rowCount();
                    ?>
                    <div class="table-responsive text-xs">
                        <table class="table table-hover" id="myTable_2">
                            <thead class="table-dark">
                                <tr>
                                    <th scope='col'>No</th>
                                    <th>Nama Mess</th>
                                    <th>Kapasitas Total</th>
                                    <th>Kapasitas Terisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($d_mess = $q_mess->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $d_mess['nama_mess']; ?></td>
                                        <td><?php echo $d_mess['kapasitas_t_mess']; ?></td>
                                        <td><?php echo $d_mess['kapasitas_terisi_mess']; ?></td>
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

        <!-- Area Chart -->
        <div class="col-xl-6 col-md-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Praktikan</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php
                    $sql_mess = "SELECT * FROM tb_mess order by nama_mess ASC";
                    $q_mess = $conn->query($sql_mess);
                    $r_mess = $q_mess->rowCount();
                    ?>
                    <div class="table-responsive text-xs">
                        <table class="table table-hover" id="myTable">
                            <thead class="table-dark">
                                <tr>
                                    <th scope='col'>No</th>
                                    <th>Nama Mess</th>
                                    <th>Kapasitas Total</th>
                                    <th>Kapasitas Terisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($d_mess = $q_mess->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $d_mess['nama_mess']; ?></td>
                                        <td><?php echo $d_mess['kapasitas_t_mess']; ?></td>
                                        <td><?php echo $d_mess['kapasitas_terisi_mess']; ?></td>
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
    </div>
</div>
<!-- /.container-fluid -->