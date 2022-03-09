<?php
$iup = $_GET['iup'];
$p = $_GET['p'];
if (is_numeric($iup) && is_numeric($p)) {
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Unggah Nilai</h1>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <?php
                $sql_nilai_praktikan = "SELECT * FROM tb_pembimbing_pilih ";
                $sql_nilai_praktikan .= " JOIN tb_praktikan ON tb_pembimbing_pilih.id_praktikan = tb_praktikan.id_praktikan";
                $sql_nilai_praktikan .= " JOIN tb_pembimbing ON tb_pembimbing_pilih.id_pembimbing = tb_pembimbing.id_pembimbing";
                $sql_nilai_praktikan .= " JOIN tb_unit ON tb_pembimbing_pilih.id_unit = tb_unit.id_unit";
                $sql_nilai_praktikan .= " WHERE tb_pembimbing_pilih.id_praktik = " . $iup . " AND tb_pembimbing_pilih.id_pembimbing = " . $p;
                $sql_nilai_praktikan .= " ORDER BY tb_praktikan.nama_praktikan ASC";
                // echo $sql_nilai_praktikan;

                $q_nilai_praktikan = $conn->query($sql_nilai_praktikan);
                $r_nilai_praktikan = $q_nilai_praktikan->rowCount();
                $j_ptkn = $r_nilai_praktikan;

                if ($r_nilai_praktikan > 0) {
                ?>
                    <form method="POST" id="form_pembb_ruangan">
                        <!-- data praktikan  -->
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th scope="col ">No</th>
                                        <th scope="col">Nama Pembimbing</th>
                                        <th scope="col">NIP / NIPK </th>
                                        <th scope="col">Ruangan</th>
                                        <th scope="col">Unggah File</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($d_nilai_praktikan = $q_nilai_praktikan->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <input type="hidden" name="jp" id="jp" value="<?php echo $d_nilai_praktikan['jumlah_praktik']; ?>">
                                        <input type="hidden" name="id_praktik" id="id_praktik" value="<?php echo $_GET['i']; ?>">
                                        <input type="hidden" name="id_praktikan<?php echo $no; ?>" id="id_praktikan<?php echo $no; ?>" value="<?php echo $d_nilai_praktikan['id_praktikan']; ?>">
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $d_nilai_praktikan['nama_praktikan']; ?></td>
                                            <td class="text-center"><?php echo $d_nilai_praktikan['no_id_praktikan']; ?></td>
                                            <td class="text-center">
                                                <?php
                                                $id_jurusan_pdd = $d_nilai_praktikan['id_jurusan_pdd'];
                                                if ($id_jurusan_pdd == 1) {
                                                    if ($id_profesi_pdd == 1) {
                                                        $jenis_pmbb = "PPDS";
                                                    } elseif ($id_profesi_pdd == 2) {
                                                        $jenis_pmbb = "PSPD";
                                                    }
                                                } elseif ($id_jurusan_pdd == 2) {
                                                    $jenis_pmbb = "CI KEP";
                                                } elseif ($id_jurusan_pdd == 3) {
                                                    $jenis_pmbb = "CI PSI";
                                                } elseif ($id_jurusan_pdd == 4) {
                                                    $jenis_pmbb = "CI IT";
                                                } elseif ($id_jurusan_pdd == 5) {
                                                    $jenis_pmbb = "CI FAR";
                                                } elseif ($id_jurusan_pdd == 6) {
                                                    $jenis_pmbb = "CI PEKSOS";
                                                } elseif ($id_jurusan_pdd == 7) {
                                                    $jenis_pmbb = "CI KESLING";
                                                }
                                                $sql_pmbb = "SELECT * FROM tb_pembimbing";
                                                $sql_pmbb .= " WHERE jenis_pembimbing = '" . $jenis_pmbb . "' AND status_pembimbing = 'y'";
                                                $sql_pmbb .= " ORDER BY kali_pembimbing ASC, nama_pembimbing ASC";

                                                $q_pmbb = $conn->query($sql_pmbb);
                                                ?>

                                                <select class='form-inline js-example-placeholder-single' aria-label='Default select example' name="id_pembimbing<?php echo $no; ?>" id="id_pembimbing<?php echo $no; ?>" required>
                                                    <option value="">-- Pilih --</option>
                                                    <?php
                                                    while ($d_pmbb = $q_pmbb->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                        <option value="<?php echo $d_pmbb['id_pembimbing']; ?>">
                                                            <?php echo "(" . $d_pmbb['kali_pembimbing'] . ") " . $d_pmbb['nama_pembimbing']; ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <span id="err_pmbb<?php echo $no; ?>" class="text-danger text-xs font-italic blink"></span>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                $sql_unit = "SELECT * FROM tb_unit";
                                                $sql_unit .= " ORDER BY nama_unit ASC";

                                                $q_unit = $conn->query($sql_unit);
                                                ?>
                                                <select class='form-inline js-example-placeholder-single' aria-label='Default select example' name='id_unit<?php echo $no; ?>' id="id_unit<?php echo $no; ?>" required>
                                                    <option value="">-- Pilih --</option>
                                                    <?php
                                                    while ($d_unit = $q_unit->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                        <option value="<?php echo $d_unit['id_unit']; ?>">
                                                            <?php echo $d_unit['nama_unit']; ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <span id="err_unit<?php echo $no; ?>" class="text-danger text-xs font-italic blink"></span>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <hr>

                        <!-- tombol simpan pilih Pembimbing dan Ruangan  -->
                        <div id="simpan_praktik_tarif" class="nav btn justify-content-center text-md">
                            <button type="button" name="simpan_pmbb_tmp" id="simpan_pmbb_tmp" class="btn btn-outline-success">
                                <!-- <a class=" nav-link" href="#tarif"> -->
                                <i class="fas fa-check-circle"></i>
                                Simpan Pembimbing dan Ruangan Praktik
                                <i class="fas fa-check-circle"></i>
                                <!-- </a> -->
                            </button>
                        </div>
                    </form>
                <?php
                } else {
                ?>
                    <div class="jumbotron">
                        <div class="jumbotron-fluid">
                            <div class="text-gray-700">
                                <h5 class="text-center">Data Praktikan Tidak Ada</h5>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

        $("#simpan_pmbb_tmp").click(function() {
            var data_pembimbing = $('#form_pembb_ruangan').serializeArray();
            var jp = document.getElementById('jp').value;

            //Notif jika tida diisi Pembimbing 
            var no = 1;
            var pmbb = 0;
            while (no <= jp) {
                console.log("no: " + no + "jp: " + jp);
                if (document.getElementById('id_pembimbing' + no).value == "") {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 10000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });

                    Toast.fire({
                        icon: 'warning',
                        title: '<center>DATA ADA YANG BELUM TERISI</center>'
                    });
                    document.getElementById("err_pmbb" + no).innerHTML = "<br>Pembimbing Harus Dipilih";
                    pmbb++;
                } else {
                    document.getElementById("err_pmbb" + no).innerHTML = "";
                }
                no++;

            }

            //Notif jika tida diisi Unit
            var no = 1;
            var unit = 0;
            while (no <= jp) {
                console.log("no: " + no + "jp: " + jp);
                if (document.getElementById('id_unit' + no).value == "") {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 10000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });

                    Toast.fire({
                        icon: 'warning',
                        title: '<center>DATA ADA YANG BELUM TERISI</center>'
                    });
                    document.getElementById("err_unit" + no).innerHTML = "<br> Ruangan Harus Dipilih";
                    unit++;
                } else {
                    document.getElementById("err_unit" + no).innerHTML = "";
                }
                no++;
            }

            //jika data sudah diisi semua
            if (pmbb == 0 && unit == 0) {
                console.log("SIMPAN");
                $.ajax({
                    type: 'POST',
                    url: "_admin/exc/x_i_pembimbing_s.php?",
                    data: data_pembimbing,
                    success: function() {
                        Swal.fire({
                            allowOutsideClick: false,
                            // isDismissed: false,
                            icon: 'success',
                            title: '<span class"text-xs"><b>DATA Pembimbing</b> dan <b>Ruangan</b><br>Berhasil Tersimpan',
                            showConfirmButton: false,
                            html: '<a href="?pmbb" class="btn btn-outline-primary">OK</a>',
                        });
                    },
                    error: function(response) {
                        console.log(response.responseText);
                        alert('eksekusi query gagal');
                    }
                });
            }
        });
    </script>
<?php
} else {
    include "_error/index.php";
}
?>