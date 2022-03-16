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
                                Jenjang : D3, D4, S1, Profesi (Farmasi, Psikologi).
                                <hr>
                                Profesi : Apoteker (Farmasi), Psikologi Klinik (Psikologi)
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
                                Jenjang : D3, D4, S1.
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
                        <?php
                        $sql_kuotaKedKep = "SELECT * FROM tb_kuota";
                        $sql_kuotaKedKep .= " WHERE id_kuota = 1";
                        $q_kuotaKedKep = $conn->query($sql_kuotaKedKep);
                        $d_kuotaKedKep = $q_kuotaKedKep->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <h6 class="m-0 font-weight-bold text-primary">
                            Kedokteran dan Keperawatan <br>
                            <span class="text-danger">(Kuota Harian Praktikan: <?php echo $d_kuotaKedKep['jumlah_kuota']; ?>)</span>
                        </h6>
                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#info_status_kedKep" title="Keterangan Status">
                            <i class="fas fa-info-circle"></i> Keterangan
                        </a>
                        <div class="modal fade text-gray-800" id="info_status_kedKep" data-backdrop="static" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4>Keterangan</h4>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        Kuota Praktikan untuk Jurusan Kedokteran dan Keparawatan Digabung <span class="text-danger">Kuota Harian : <?php echo $d_kuotaKedKep['jumlah_kuota']; ?></span>
                                        <br><br>

                                        <button class="btn btn-outline-success btn-sm">"Tanggal"</button> = Info Kuota Praktikan Belum terisi <br><br>
                                        <button class="btn btn-outline-warning btn-sm">"Tanggal"</button> = Info Kuota Praktikan Sudah terisi <br><br>
                                        <button class="btn btn-outline-danger btn-sm">"Tanggal"</button> = Info Kuota Praktikan Sudah Penuh
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="overflow-auto">
                            <div class="no-gutters align-items-center text-center pt-0">
                                <div class="overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light" style="max-height: 500px;">
                                    <?php include "./_admin/view/v_info_diklat_dataKedKep.php"; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- NAKES LAINNYA DAN NON NAKES-->
            <div class="col-xl-6 col-md-6 mb-4 align-items-stretch">
                <div class="card shadow h-100">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Nakes Lainnya dan Non-Nakes <br>
                            <a href="#" class="text-danger" data-toggle="modal" data-target="#info_status" title="Keterangan Status">
                                (<i class="fas fa-info-circle"></i> Cek Kuota Harian Praktikan)
                            </a>
                            <div class="modal fade text-gray-800" id="info_status" data-backdrop="static" style="display: none;">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4>Info Kuota Harian Praktikan Nakes Lainnya dan Non Nakes</h4>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row text-center text-lg">
                                                <?php
                                                $sql_kuotaFar = "SELECT * FROM tb_kuota";
                                                $sql_kuotaFar .= " WHERE id_kuota = 2";
                                                $q_kuotaFar = $conn->query($sql_kuotaFar);
                                                $d_kuotaFar = $q_kuotaFar->fetch(PDO::FETCH_ASSOC);

                                                $sql_kuotaKesling = "SELECT * FROM tb_kuota";
                                                $sql_kuotaKesling .= " WHERE id_kuota = 3";
                                                $q_kuotaKesling = $conn->query($sql_kuotaKesling);
                                                $d_kuotaKesling = $q_kuotaKesling->fetch(PDO::FETCH_ASSOC);

                                                $sql_kuotaPsi = "SELECT * FROM tb_kuota";
                                                $sql_kuotaPsi .= " WHERE id_kuota = 4";
                                                $q_kuotaPsi = $conn->query($sql_kuotaPsi);
                                                $d_kuotaPsi = $q_kuotaPsi->fetch(PDO::FETCH_ASSOC);

                                                $sql_kuotaRm = "SELECT * FROM tb_kuota";
                                                $sql_kuotaRm .= " WHERE id_kuota = 5";
                                                $q_kuotaRm = $conn->query($sql_kuotaRm);
                                                $d_kuotaRm = $q_kuotaRm->fetch(PDO::FETCH_ASSOC);

                                                $sql_kuotaIt = "SELECT * FROM tb_kuota";
                                                $sql_kuotaIt .= " WHERE id_kuota = 6";
                                                $q_kuotaIt = $conn->query($sql_kuotaIt);
                                                $d_kuotaIt = $q_kuotaIt->fetch(PDO::FETCH_ASSOC);

                                                $sql_kuotaPeksos = "SELECT * FROM tb_kuota";
                                                $sql_kuotaPeksos .= " WHERE id_kuota = 7";
                                                $q_kuotaPeksos = $conn->query($sql_kuotaPeksos);
                                                $d_kuotaPeksos = $q_kuotaPeksos->fetch(PDO::FETCH_ASSOC);
                                                ?>
                                                <div class="col-md-4">
                                                    Farmasi : <br><span class="badge badge-danger text-lg"><?php echo $d_kuotaFar['jumlah_kuota']; ?></span><br><br>
                                                    Kesehatan Lingkungan (KESLING) : <br><span class="badge badge-danger text-lg"><?php echo $d_kuotaKesling['jumlah_kuota']; ?>
                                                </div>
                                                <div class="col-md-4">
                                                    Psikologi : <br><span class="badge badge-danger text-lg"><?php echo $d_kuotaPsi['jumlah_kuota']; ?></span><br><br>
                                                    Rekam Medis (RM) : <br><span class="badge badge-danger text-lg"><?php echo $d_kuotaRm['jumlah_kuota']; ?></span>
                                                </div>
                                                <div class="col-md-4">
                                                    Informasi Teknologi (IT) : <br><span class="badge badge-danger text-lg"><?php echo $d_kuotaIt['jumlah_kuota']; ?></span><br><br>
                                                    Pekerja Sosial (PEKSOS) : <br><span class="badge badge-danger text-lg"><?php echo $d_kuotaPeksos['jumlah_kuota']; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </h6>
                        <!-- <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#info_status2" title="Keterangan Status">
                            <i class="fas fa-info-circle"></i> Keterangan
                        </a>
                        <div class="modal fade text-gray-800" id="info_status2" data-backdrop="static" style="display: none;">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4>Keterangan</h4>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="card all-0 d-flex flex-column w-100 h-100 overflow-auto">
                        <div class="overflow-auto">
                            <div class="overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light" style="max-height: 500px;">
                                <?php include "./_admin/view/v_info_diklat_dataNklNnk.php"; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>