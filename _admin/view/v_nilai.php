<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Penilaian Praktikan</h1>
        </div>
        <!-- <div class="col-lg-2 text-right">
            <a href="?dpk&a" class="btn btn-outline-info btn-sm">
                <i>
                    <i class="fas fa-archive"></i>
                </i>Arsip
            </a>
        </div> -->
    </div>


    <div class="card shadow mb-4">
        <div class="card-body">
            <?php
            $sql_praktik = "SELECT * FROM tb_praktik ";
            $sql_praktik .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi ";
            $sql_praktik .= " JOIN tb_profesi_pdd ON tb_praktik.id_profesi_pdd = tb_profesi_pdd.id_profesi_pdd ";
            $sql_praktik .= " JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd ";
            $sql_praktik .= " JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd ";
            $sql_praktik .= " JOIN tb_jurusan_pdd_jenis ON tb_jurusan_pdd.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis ";
            // $sql_praktik .= " JOIN tb_akreditasi ON tb_praktik.id_akreditasi = tb_akreditasi.id_akreditasi  ";
            $sql_praktik .= " WHERE (tb_praktik.status_praktik = 'Y' OR tb_praktik.status_praktik = 'S' ) ";
            $sql_praktik .= " ORDER BY tb_praktik.id_praktik DESC";

            // echo $sql_praktik;

            $q_praktik = $conn->query($sql_praktik);
            $r_praktik = $q_praktik->rowCount();

            if ($r_praktik > 0) {
            ?>
                <?php
                while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {

                    $sql_data_praktikan = "SELECT * FROM tb_pembimbing_pilih ";
                    $sql_data_praktikan .= " JOIN tb_pembimbing ON tb_pembimbing_pilih.id_pembimbing = tb_pembimbing.id_pembimbing ";
                    $sql_data_praktikan .= " JOIN tb_praktikan ON tb_pembimbing_pilih.id_praktikan = tb_praktikan.id_praktikan ";
                    $sql_data_praktikan .= " JOIN tb_unit ON tb_pembimbing_pilih.id_unit = tb_unit.id_unit ";
                    $sql_data_praktikan .= " JOIN tb_praktik ON tb_pembimbing_pilih.id_praktik = tb_praktik.id_praktik ";
                    $sql_data_praktikan .= " WHERE tb_praktik.status_praktik IN ('Y','S') AND tb_praktik.id_praktik = " . $d_praktik['id_praktik'];
                    $sql_data_praktikan .= " GROUP BY tb_pembimbing.nama_pembimbing";
                    $sql_data_praktikan .= " ORDER BY tb_praktikan.nama_praktikan ASC";

                    $q_data_praktikan = $conn->query($sql_data_praktikan);
                    $q1_data_praktikan = $conn->query($sql_data_praktikan);
                    $r_data_praktikan = $q_data_praktikan->rowCount();
                    $d1_data_praktikan = $q1_data_praktikan->fetch(PDO::FETCH_ASSOC);
                ?>
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header align-items-center bg-gray-200">
                                <div class="row" style="font-size: small;" class="justify-content-center">
                                    <br><br>
                                    <div class="col-sm-3 text-center">
                                        <b class="text-gray-800">INSTITUSI : </b><br><?php echo $d_praktik['nama_institusi']; ?><br>
                                        <b class="text-gray-800">GELOMBANG/KELOMPOK : </b><br><?php echo $d_praktik['nama_praktik']; ?>
                                    </div>

                                    <div class="col-sm-2 text-center">
                                        <b class="text-gray-800">TANGGAL MULAI : </b><br><?php echo tanggal($d_praktik['tgl_mulai_praktik']); ?><br>
                                        <b class="text-gray-800">TANGGAL SELESAI : </b><br><?php echo tanggal($d_praktik['tgl_selesai_praktik']); ?>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <b class="text-gray-800">JURUSAN : </b><br><?php echo $d_praktik['nama_jurusan_pdd']; ?><br>
                                        <b class="text-gray-800">JENJANG : </b><br><?php echo $d_praktik['nama_jenjang_pdd']; ?>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <b class="text-gray-800">PROFESI : </b><br><?php echo $d_praktik['nama_profesi_pdd']; ?><br>
                                        <b class="text-gray-800">JUMLAH PRAKTIKAN : </b><br><?php echo $d_praktik['jumlah_praktik']; ?>
                                    </div>
                                    <!-- tombol aksi/info proses  -->
                                    <div class="col-sm-3 my-auto text-center">
                                        <!-- tombol rincian -->
                                        <button class="btn btn-info btn-sm collapsed" data-toggle="collapse" data-target="#collapse<?php echo $d_praktik['id_praktik']; ?>" title="Rincian">
                                            <i class="fas fa-info-circle"></i> Rincian Data
                                        </button>
                                        <?php
                                        //cek data nilai keperawatan
                                        if ($d_praktik['id_jurusan_pdd'] == 2) {
                                        ?>
                                            <hr>
                                            <!-- unduh nilai  -->
                                            <a class="btn btn-outline-success btn-sm" title="Unduh Nilai " target="_blank" href="./_print/p_praktikNilaiKep.php?ip=<?php echo $d_praktik['id_praktik'] ?>">
                                                <i class="fas fa-file-download"></i> Unduh
                                            </a>

                                            <!-- tombol unggah nilai  -->
                                            <a class="btn btn-outline-primary btn-sm" title="Unduh Nilai" data-toggle="modal" data-target="#ungNil<?php echo $d_praktik['id_praktik']; ?>">
                                                <i class="fas fa-file-upload"></i> Unggah
                                            </a>

                                            <!-- modal unggah Nilai -->
                                            <div class="modal fade" id="ungNil<?php echo $d_praktik['id_praktik']; ?>" data-backdrop="static">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4>Unggah Nilai Keperawatan</h4>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-lg">
                                                            <form enctype="multipart/form-data" class="form-group" method="post" action="">
                                                                <h5>Unggah Data Nilai Keperawatan yg sudah ditandatangani: </h5><br>
                                                                <input type="file" name="file_nilai_kep" id="file_nilai_kep" accept="application/pdf" required>
                                                                <input type="hidden" name="id_praktik" id="id_praktik" value="<?php echo $d_praktik['id_praktik'] ?>">
                                                                <hr>
                                                                <center>
                                                                    <button type="submit" name="simpan_nilai_kep" class="btn btn-outline-success btn-sm">
                                                                        <i class="fas fa-paper-plane"></i> Kirim Data Nilai
                                                                    </button>
                                                                </center>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            if ($d_praktik['fileNilKep_praktik'] != "") {
                                            ?>

                                                <a class="btn btn-outline-danger btn-sm" title="Unduh Nilai " target="_blank" href="<?php echo $d_praktik['fileNilKep_praktik'] ?>">
                                                    <i class="fas fa-file-download"></i> Data Nilai
                                                </a>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="badge badge-danger"> Data Nilai Belum diunggah</span>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <!-- collapse data praktikan -->
                            <div id="collapse<?php echo $d_praktik['id_praktik']; ?>" class="collapse" aria-labelledby="heading<?php echo $d_praktik['id_praktik']; ?>" data-parent="#accordion">
                                <div class="card-body " style="font-size: medium;">
                                    <!-- data praktikan -->
                                    <div class="text-gray-700">
                                        <h4 class="font-weight-bold">DATA NILAI</h4><br>
                                    </div>
                                    <?php
                                    if ($r_data_praktikan > 0) {
                                    ?>
                                        <div class="table-responsive">
                                            <table class="table" id="myTable">
                                                <thead class="thead-dark text-center">
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Nama Pembimbing </th>
                                                        <th scope="col">NIP / NIPK</th>
                                                        <th scope="col">Nama Ruangan</th>
                                                        <?php
                                                        if ($d_praktik['id_jurusan_pdd'] == 2) {
                                                        ?>
                                                            <th scope="col">Isi / Ubah <br>Nilai</th>
                                                            <th scope="col">Data Nilai</th>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <th scope="col">File Nilai</th>
                                                            <th scope="col">Unggah File Nilai</th>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <div id="accordion_nilai">
                                                        <div class="card">
                                                            <?php
                                                            $no = 1;
                                                            while ($d_data_praktikan = $q_data_praktikan->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                                <tr>
                                                                    <th scope="row"><?php echo $no; ?></th>
                                                                    <td><?php echo $d_data_praktikan['nama_pembimbing']; ?></td>
                                                                    <td><?php echo $d_data_praktikan['no_id_pembimbing']; ?></td>
                                                                    <td><?php echo $d_data_praktikan['nama_unit']; ?></td>
                                                                    <td class="text-center">
                                                                        <?php

                                                                        $sql_data_nilai = "SELECT * FROM tb_nilai_kep ";
                                                                        $sql_data_nilai .= " WHERE id_praktik = " . $d_data_praktikan['id_praktik'] . " AND id_pembimbing = " . $d_data_praktikan['id_pembimbing'];
                                                                        // echo "$sql_data_nilai<br>";

                                                                        $q_data_nilai = $conn->query($sql_data_nilai);
                                                                        $r_data_nilai = $q_data_nilai->rowCount();
                                                                        if ($r_data_nilai > 0) {
                                                                        ?>
                                                                            <a href="<?php echo "?nil&u=" . $d_praktik['id_praktik'] . "&p=" . $d_data_praktikan['id_pembimbing']; ?>" class="btn btn-outline-primary btn-sm">
                                                                                Ubah Nilai
                                                                            </a>
                                                                            <?php
                                                                        } else {
                                                                            if ($d_praktik['id_jurusan_pdd'] == 2) {
                                                                            ?>
                                                                                <a href="<?php echo "?nil&i=" . $d_praktik['id_praktik'] . "&p=" . $d_data_praktikan['id_pembimbing']; ?>" class="btn btn-outline-success btn-sm">
                                                                                    Isi Nilai
                                                                                </a>
                                                                                <?php
                                                                            } else {
                                                                                $sql_data_nilai_u = "SELECT * FROM tb_nilai_upload ";
                                                                                $sql_data_nilai_u .= " WHERE id_praktik = " . $d_data_praktikan['id_praktik'] . " AND id_pembimbing = " . $d_data_praktikan['id_pembimbing'];
                                                                                // echo "$sql_data_nilai<br>";

                                                                                $q_data_nilai_u = $conn->query($sql_data_nilai_u);
                                                                                $r_data_nilai_u = $q_data_nilai_u->rowCount();
                                                                                $d_data_nilai_u = $q_data_nilai_u->fetch(PDO::FETCH_ASSOC);
                                                                                if ($r_data_nilai_u > 0) {
                                                                                ?>
                                                                                    <a href="<?php echo $d_data_nilai_u['file_nilai_upload']; ?>" target="_blank" class="btn btn-outline-success btn-sm">
                                                                                        Unduh Nilai
                                                                                    </a>
                                                                                <?php
                                                                                } else {
                                                                                ?>
                                                                                    <span class="badge badge-danger text-lg"> Data Nilai Belum Diupload </span>
                                                                        <?php
                                                                                }
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <?php
                                                                    if ($d_praktik['id_jurusan_pdd'] == 2) {
                                                                    ?>
                                                                        <td class="text-center">
                                                                            <button class="btn btn-info btn-sm collapsed" data-toggle="collapse" data-target="#nilai<?php echo $no; ?>" title="Rincian">
                                                                                <i class="fas fa-info-circle"></i> Rincian Nilai
                                                                            </button>
                                                                        </td>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <td class="text-center">
                                                                            <a href="<?php echo "?nil&i=" . $d_praktik['id_praktik'] . "&pu=" . $d_data_praktikan['id_pembimbing']; ?>" class="btn btn-primary btn-sm">
                                                                                Unggah File Nilai
                                                                            </a>
                                                                        </td>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <?php
                                                                if ($d_praktik['id_jurusan_pdd'] == 2) {
                                                                ?>
                                                                    <tr>
                                                                        <td colspan="6" class="p-0">
                                                                            <div id="nilai<?php echo $no; ?>" class="collapse text-center" aria-labelledby="nilai<?php echo $no; ?>" data-parent="#accordion_nilai">
                                                                                <?php
                                                                                $sql_nilai = "SELECT * FROM tb_nilai_kep ";
                                                                                $sql_nilai .= " JOIN tb_praktikan ON tb_nilai_kep.id_praktikan = tb_praktikan.id_praktikan";
                                                                                $sql_nilai .= " JOIN tb_pembimbing ON tb_nilai_kep.id_pembimbing = tb_pembimbing.id_pembimbing";
                                                                                $sql_nilai .= " JOIN tb_unit ON tb_nilai_kep.id_unit = tb_unit.id_unit";
                                                                                $sql_nilai .= " WHERE tb_nilai_kep.id_praktik = " . $d_data_praktikan['id_praktik'] . " AND tb_nilai_kep.id_pembimbing = " . $d_data_praktikan['id_pembimbing'];
                                                                                $sql_nilai .= " ORDER BY tb_praktikan.nama_praktikan ASC";

                                                                                // echo $sql_data_praktikan;

                                                                                $q_nilai = $conn->query($sql_nilai);
                                                                                $r_nilai = $q_nilai->rowCount();
                                                                                if ($r_nilai > 0) {
                                                                                ?>
                                                                                    <span class="table-responsive">
                                                                                        <table class="table table-bordered table-striped">
                                                                                            <thead>
                                                                                                <tr class="text-center">
                                                                                                    <th scope="col">No</th>
                                                                                                    <th scope="col">Nama</th>
                                                                                                    <th scope="col">NIM / NPM / NIS</th>
                                                                                                    <th scope="col">LP</th>
                                                                                                    <th scope="col">Pre-Post</th>
                                                                                                    <th scope="col">SPTK</th>
                                                                                                    <th scope="col">PENKES</th>
                                                                                                    <th scope="col">DOKEP</th>
                                                                                                    <th scope="col">KOMTER</th>
                                                                                                    <th scope="col">TAK</th>
                                                                                                    <th scope="col">KASUS</th>
                                                                                                    <th scope="col">UJIAN</th>
                                                                                                    <th scope="col">SIKAP</th>
                                                                                                    <th scope="col">KETERANGAN</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php
                                                                                                $no1 = 1;
                                                                                                while ($d_nilai = $q_nilai->fetch(PDO::FETCH_ASSOC)) {
                                                                                                ?>
                                                                                                    <tr>
                                                                                                        <td><?php echo $no1; ?></td>
                                                                                                        <td><?php echo $d_nilai['nama_praktikan']; ?></td>
                                                                                                        <td class="text-center"><?php echo $d_nilai['no_id_praktikan']; ?></td>
                                                                                                        <td><?php echo $d_nilai['lp'] ?></td>
                                                                                                        <td><?php echo $d_nilai['prepost'] ?></td>
                                                                                                        <td><?php echo $d_nilai['sptk'] ?></td>
                                                                                                        <td><?php echo $d_nilai['penkes'] ?></td>
                                                                                                        <td><?php echo $d_nilai['dokep'] ?></td>
                                                                                                        <td><?php echo $d_nilai['komter'] ?></td>
                                                                                                        <td><?php echo $d_nilai['tak'] ?></td>
                                                                                                        <td><?php echo $d_nilai['kasus'] ?></td>
                                                                                                        <td><?php echo $d_nilai['ujian'] ?></td>
                                                                                                        <td><?php echo $d_nilai['sikap'] ?></td>
                                                                                                        <td><?php echo $d_nilai['ket_nilai'] ?></td>
                                                                                                    </tr>
                                                                                                <?php
                                                                                                    $no1++;
                                                                                                }
                                                                                                ?>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </span>
                                                                                <?php
                                                                                } else {
                                                                                ?>
                                                                                    <div class="jumbotron">
                                                                                        <div class="jumbotron-fluid">
                                                                                            <div class="text-gray-700">
                                                                                                <h5 class="text-center">Data Nilai Tidak Ada</h5>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                <?php
                                                                }
                                                                ?>
                                                            <?php
                                                                $no++;
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="jumbotron">
                                            <div class="jumbotron-fluid">
                                                <div class="text-gray-700">
                                                    <h5 class="text-center">Data Nilai Tidak Ada</h5>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="bg-gray-800">
                <?php
                }
            } else {
                ?>
                <h3 class='text-center'> Data Pendaftaran Praktikan Anda Tidak Ada</h3>
            <?php
            }
            ?>

        </div>
    </div>
</div>
<?php
if (isset($_POST['simpan_nilai_kep'])) {

    //alamat file surat masuk
    $alamat_unggah = "./_file/nilai";

    //ubah Nama File
    $_FILES['file_nilai_kep']['name'] = "nilai_kep_" .  $_POST['id_praktik'] . "_" . date('Y-m-d') . ".pdf";

    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";

    //pembuatan alamat bila tidak ada
    if (!is_dir($alamat_unggah)) {
        mkdir($alamat_unggah, 0777, $rekursif = true);
    }

    //unggah surat dan data praktik
    if (!is_null($_FILES['file_nilai_kep'])) {
        $file_nilai_kep = (object) @$_FILES['file_nilai_kep'];

        //mulai unggah file surat praktik
        if ($file_nilai_kep->size > 1000 * 1000) {
?>
            <script>
                alert('File Harus dibawah 1 Mb');
                document.location.href = "?nil";
            </script>
        <?php
            $link_file_nilai_kep = "";
        } elseif ($file_nilai_kep->type !== 'application/pdf') {
        ?>
            <script>
                alert('File Surat Harus .pdf');
                document.location.href = "?nil";
            </script>
        <?php
            $link_file_nilai_kep = "";
        } else {
            $unggah_file_bayar = move_uploaded_file(
                $file_nilai_kep->tmp_name,
                "{$alamat_unggah}/{$file_nilai_kep->name}"
            );
            $link_file_nilai_kep = "{$alamat_unggah}/{$file_nilai_kep->name}";

            $sql_uNilPraktik = " UPDATE tb_praktik SET ";
            $sql_uNilPraktik .= " fileNilKep_praktik = '" . $link_file_nilai_kep . "'";
            $sql_uNilPraktik .= " WHERE id_praktik = " . $_POST['id_praktik'];

            // echo $sql_uNilPraktik . "<br>";
            $conn->query($sql_uNilPraktik);

        ?>
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        allowOutsideClick: false,
                        // isDismissed: false,
                        icon: 'success',
                        title: '<span class"text-xs"><b>DATA NILAI</b><br>Berhasil Tersimpan',
                        showConfirmButton: false,
                        html: '<a href="?nil" class="btn btn-outline-primary">OK</a>',
                        timer: 5000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    }).then(
                        function() {
                            document.location.href = "?nil";
                        }
                    );
                });
            </script>
<?php
        }
    }
}
