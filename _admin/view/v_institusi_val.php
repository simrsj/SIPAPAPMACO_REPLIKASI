<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Daftar Validasi Profil Institusi</h1>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive text-xs">
                <?php
                $sql_institusi = "SELECT * FROM tb_institusi ";
                $sql_institusi .= "WHERE tempStatus_institusi IN ('pengajuan')";
                $sql_institusi .= "ORDER BY nama_institusi ASC";
                $q_institusi = $conn->query($sql_institusi);
                $r_institusi = $q_institusi->rowCount();
                if ($r_institusi > 0) {
                ?>
                    <table class='table table-striped' id="myTable">
                        <thead class="thead-dark text-center align-content-center">
                            <tr>
                                <th scope='col'>No</th>
                                <th>Nama Institusi</th>
                                <th>Akronim </th>
                                <th>Logo </th>
                                <th>Alamat </th>
                                <th>Akreditasi </th>
                                <th>Tanggal <br>Berlaku Akreditasi</th>
                                <th>File Akreditasi</th>
                                <th>Terima/Tolak</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($d_institusi = $q_institusi->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $d_institusi['nama_institusi']; ?></td>
                                    <td>
                                        <?php
                                        if ($d_institusi['tempAkronim_institusi'] == '') {
                                        ?>
                                            <span class="badge badge-danger">Tidak Ada</span>
                                        <?php
                                        } else {
                                            echo $d_institusi['tempAkronim_institusi'];
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <a title="Lihat Logo" class='btn btn-info btn-xs' href='#' data-toggle='modal' data-target='<?php echo "#see_" . $d_institusi['id_institusi']; ?>'>
                                            <i class="fas fa-eye"></i> Lihat
                                        </a>

                                        <!-- Lihat Logo  -->
                                        <div class="modal fade" id="<?php echo "see_" . $d_institusi['id_institusi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <img src="<?php echo $d_institusi['tempLogo_institusi']; ?>" width="250px" height="250px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        echo $d_institusi['tempAlamat_institusi'];
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        echo $d_institusi['tempAkred_institusi'];
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        echo tanggal($d_institusi['tempTglAkhirAkred_institusi']);
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo $d_institusi['tempFileAkred_institusi']; ?>" class="btn btn-success btn-xs">
                                            <i class="fas fa-file-download"></i> Download
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-success btn-xs terima" id="<?php echo $d_institusi['id_institusi']; ?>">
                                            <i class="far fa-check-circle"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-xs tolak" id="<?php echo $d_institusi['id_institusi']; ?>">
                                            <i class="far fa-times-circle"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
            </div>
        <?php
                } else {
        ?>
            <h3 class="text-center text-justify"> Data Institusi Tidak Ada</h3>
        <?php
                }
        ?>
        </div>
    </div>
</div>