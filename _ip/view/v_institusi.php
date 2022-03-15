<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Data Institusi</h1>
        </div>
        <div class="col-lg-2 text-right">
            <a class="btn btn-outline-primary btn-sm" href="?ins&u"><i class="fas fa-edit"></i> Ubah</a>
        </div>
    </div>

    <div class="row">

        <div class="col-xl-3 col-md-3 mb-4  align-items-stretch justify-content-center">

            <div class="card shadow mb-4">
                <div class="card-header flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Data Profil Institusi</h6>
                </div>
                <div class="card-body text-center">
                    <?php
                    $sql = "SELECT * FROM tb_institusi ";
                    $sql .= " WHERE id_institusi = " . $_SESSION['id_institusi'];
                    $q = $conn->query($sql);

                    $d = $q->fetch(PDO::FETCH_ASSOC);
                    ?>
                    Institusi : <br>
                    <b><?php echo $d['nama_institusi']; ?></b><br><br>
                    Akronim :<br>
                    <b>
                        <?php
                        if ($d['akronim_institusi'] == "") {
                        ?>
                            <span class="badge badge-danger">Data Tidak Ada</span>
                        <?php
                        } else {
                            echo $d['akronim_institusi'];
                        }
                        ?>
                    </b><br><br>
                    Logo :<br>
                    <b>
                        <?php
                        if ($d['logo_institusi'] == "") {
                        ?>
                            <span class="badge badge-danger">Data Tidak Ada</span>
                        <?php
                        } else {
                        ?>
                            <a title="Lihat Logo" class='btn btn-info btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#see_" . $d['id_institusi']; ?>'>
                                <i class="fas fa-eye"></i> Lihat
                            </a>

                            <!-- Lihat Logo  -->
                            <div class="modal fade text-center" id="<?php echo "see_" . $d['id_institusi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <img src="<?php echo $d['logo_institusi']; ?>" width="250px" height="250px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </b>
                    <br><br>
                    Alamat :<br>
                    <b>
                        <?php
                        if ($d['alamat_institusi'] == "") {
                        ?>
                            <span class="badge badge-danger">Data Tidak Ada</span>
                        <?php
                        } else {
                            echo $d['alamat_institusi'];
                        }
                        ?>
                    </b><br><br>
                    Akreditasi :<br>
                    <b>
                        <?php
                        if ($d['akred_institusi'] == "") {
                        ?>
                            <span class="badge badge-danger">Data Tidak Ada</span>
                        <?php
                        } else {
                            echo $d['alamat_institusi'];
                        }
                        ?>
                    </b><br><br>
                    Tanggal Akreditasi Berlaku:<br>
                    <b>
                        <?php
                        if ($d['tglAkhirAkred_institusi'] == "") {
                        ?>
                            <span class="badge badge-danger">Data Tidak Ada</span>
                            <?php
                        } else {
                            if ($d['tglAkhirAkred_institusi'] >= date('Y-m-d')) {
                            ?>
                                <span class="badge badge-danger">Sudah Tidak Berlaku</span><br>
                        <?php
                            }
                            echo tanggal($d['tglAkhirAkred_institusi']);
                        }
                        ?>
                    </b><br><br>
                    File Akreditasi :<br>
                    <b>
                        <?php
                        if ($d['fileAkred_institusi'] == "") {
                        ?>
                            <span class="badge badge-danger">Data Tidak Ada</span>
                        <?php
                        } else {
                        ?>
                            <a href='<?php echo $d['fileAkred_institusi']; ?>' target=" _blank" class="btn btn-success btn-sm">
                                <i class="fas fa-file-download"></i> Download
                            </a>
                        <?php
                        }
                        ?>
                    </b><br><br>
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
        <div class="col-xl-6 col-md-6 mb-4 align-items-stretch">
        </div>
        <div class="col-xl-6 col-md-6 mb-4 align-items-stretch">
            <div class="card shadow mb-4">
                <div class="card-header flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Data Pengajuan Profil Institusi</h6>
                </div>
                <div class="card-body text-center">
                    <?php
                    $sql = "SELECT * FROM tb_institusi_temp ";
                    $sql .= " WHERE id_institusi = " . $_SESSION['id_institusi'];
                    $q = $conn->query($sql);

                    $d = $q->fetch(PDO::FETCH_ASSOC);
                    if ($q->rowCount() > 0) {
                    ?>
                        Institusi : <br>
                        <b><?php echo $d['nama_institusi']; ?></b><br><br>
                        Akronim :<br>
                        <b>
                            <?php
                            if ($d['akronim_institusi'] == "") {
                            ?>
                                <span class="badge badge-danger">Data Tidak Ada</span>
                            <?php
                            } else {
                                echo $d['akronim_institusi'];
                            }
                            ?>
                        </b><br><br>
                        Logo :<br>
                        <b>
                            <?php
                            if ($d['logo_institusi'] == "") {
                            ?>
                                <span class="badge badge-danger">Data Tidak Ada</span>
                            <?php
                            } else {
                            ?>
                                <a title="Lihat Logo" class='btn btn-info btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#see_" . $d['id_institusi']; ?>'>
                                    <i class="fas fa-eye"></i> Lihat
                                </a>

                                <!-- Lihat Logo  -->
                                <div class="modal fade text-center" id="<?php echo "see_" . $d['id_institusi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <img src="<?php echo $d['logo_institusi']; ?>" width="250px" height="250px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </b>
                        <br><br>
                        Alamat :<br>
                        <b>
                            <?php
                            if ($d['alamat_institusi'] == "") {
                            ?>
                                <span class="badge badge-danger">Data Tidak Ada</span>
                            <?php
                            } else {
                                echo $d['alamat_institusi'];
                            }
                            ?>
                        </b><br><br>
                        Akreditasi :<br>
                        <b>
                            <?php
                            if ($d['akred_institusi'] == "") {
                            ?>
                                <span class="badge badge-danger">Data Tidak Ada</span>
                            <?php
                            } else {
                                echo $d['alamat_institusi'];
                            }
                            ?>
                        </b><br><br>
                        Tanggal Akreditasi Berlaku:<br>
                        <b>
                            <?php
                            if ($d['tglAkhirAkred_institusi'] == "") {
                            ?>
                                <span class="badge badge-danger">Data Tidak Ada</span>
                                <?php
                            } else {
                                if ($d['tglAkhirAkred_institusi'] >= date('Y-m-d')) {
                                ?>
                                    <span class="badge badge-danger">Sudah Tidak Berlaku</span><br>
                            <?php
                                }
                                echo tanggal($d['tglAkhirAkred_institusi']);
                            }
                            ?>
                        </b><br><br>
                        File Akreditasi :<br>
                        <b>
                            <?php
                            if ($d['fileAkred_institusi'] == "") {
                            ?>
                                <span class="badge badge-danger">Data Tidak Ada</span>
                            <?php
                            } else {
                            ?>
                                <a href='<?php echo $d['fileAkred_institusi']; ?>' target=" _blank" class="btn btn-success btn-sm">
                                    <i class="fas fa-file-download"></i> Download
                                </a>
                            <?php
                            }
                            ?>
                        </b><br><br>
                    <?php
                    } else {
                    ?>
                        <div class="jumbotron">
                            <div class="jumbotron-fluid">
                                <div class="text-gray-700" style="padding-bottom: 2px; padding-top: 5px;">
                                    <h5 class="text-center">DATA PENGAJUAN PROFIL INSTITUSI TIDAK ADA</h5>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>