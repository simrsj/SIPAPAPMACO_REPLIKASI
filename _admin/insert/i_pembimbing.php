<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Pilih Pembimbing dan Tempat</h1>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php
            $sql_data_praktikan = "SELECT * FROM tb_praktikan ";
            $sql_data_praktikan .= " JOIN tb_praktik ON tb_praktikan.id_praktik = tb_praktik.id_praktik";
            $sql_data_praktikan .= " WHERE tb_praktik.id_praktik = " . $_GET['i'];
            $sql_data_praktikan .= " ORDER BY tb_praktikan.nama_praktikan ASC";
            // echo $sql_data_praktikan;

            $q_data_praktikan = $conn->query($sql_data_praktikan);
            $r_data_praktikan = $q_data_praktikan->rowCount();
            $j_ptkn = $r_data_praktikan;

            if ($r_data_praktikan > 0) {
            ?>
                <form method="POST" id="form_pembb_tempat">
                    <!-- data praktikan  -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr class="text-center" style="vertical-align: middle">
                                    <th scope="col ">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIM / NPM / NIS </th>
                                    <th scope="col">Pilih<br>Pembimbing</th>
                                    <th scope="col">Pilih<br>Tempat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($d_data_praktikan = $q_data_praktikan->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <input type="hidden" name="jp" id="jp" value="<?php echo $d_data_praktikan['jumlah_praktik'] ?>">
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $d_data_praktikan['nama_praktikan']; ?></td>
                                        <td class="text-center"><?php echo $d_data_praktikan['no_id_praktikan']; ?></td>
                                        <td class="text-center">
                                            <?php
                                            $id_jurusan_pdd = $d_data_praktikan['id_jurusan_pdd'];
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
                                                    <option value="<?php echo $d_pmbb['id_pmebimbing']; ?>">
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

                    <!-- tombol simpan pilih Pembimbing dan Tempat  -->
                    <div id="simpan_praktik_tarif" class="nav btn justify-content-center text-md">
                        <button type="button" name="simpan_pmbb_tmp" id="simpan_pmbb_tmp" class="btn btn-outline-success">
                            <!-- <a class=" nav-link" href="#tarif"> -->
                            <i class="fas fa-check-circle"></i>
                            Simpan Pembimbing dan Tempat Praktik
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
        var data_pembimbing = $('#form_pembb_tempat').serializeArray();
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

        if (pmbb == 0 && unit == 0) {
            $.ajax({
                type: 'POST',
                url: "_admin/exc/x_i_pembimbing_s.php?",
                data: data_pembimbing,
                success: function() {
                    Swal.fire({
                        allowOutsideClick: false,
                        // isDismissed: false,
                        icon: 'success',
                        title: '<span class"text-xs"><b>DATA Pembimbing</b> dan <b>Tempat</b><br>Berhasil Tersimpan',
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