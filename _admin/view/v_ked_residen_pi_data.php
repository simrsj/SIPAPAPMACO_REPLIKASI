    <?php

    include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/crypt.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";
    // error_reporting(0);
    $idpr = decryptString($_GET['idpr'], $customkey);
    try {
        $sql_pi = "SELECT * FROM tb_logbook_ked_residen_pi ";
        $sql_pi .= " WHERE id_praktikan = " . $idpr;
        $sql_pi .= " ORDER BY tgl_ubah DESC, tgl_tambah DESC";
        // echo "$sql_pi<br>";
        $q_pi = $conn->query($sql_pi);
        $r_pi = $q_pi->rowCount();
    } catch (PDOException $ex) {
    ?>
        <script>
            alert("<?= $ex->getMessage() . $ex->getLine() . $sql_pi ?>");
            document.location.href = '?error404';
        </script>
    <?php
    }
    ?>
    <?php if ($r_pi > 0) { ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered " id="dataTable">
                <thead class="">
                    <tr class="text-center">
                        <th scope='col'>No&nbsp;&nbsp;</th>
                        <th>Tanggal<br>(yyyy-mm-dd)&nbsp;&nbsp;</th>
                        <th>Semester&nbsp;&nbsp;</th>
                        <th>Jenis&nbsp;&nbsp;</th>
                        <th>Judul&nbsp;&nbsp;</th>
                        <th>Bim 1&nbsp;&nbsp;</th>
                        <th>Bim 2&nbsp;&nbsp;</th>
                        <th>Bim 3&nbsp;&nbsp;</th>
                        <th>Present&nbsp;&nbsp;</th>
                        <th>Pembimbing&nbsp;&nbsp;</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no0 = 1;
                    while ($d_pi = $q_pi->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td class="text-center"><?= $no0; ?></td>
                            <td><?= $d_pi['tgl']; ?></td>
                            <td><?= $d_pi['semester']; ?></td>
                            <td><?= $d_pi['jenis']; ?></td>
                            <td><?= $d_pi['judul']; ?></td>
                            <td><?= $d_pi['bim1']; ?></td>
                            <td><?= $d_pi['bim2']; ?></td>
                            <td><?= $d_pi['bim3']; ?></td>
                            <td><?= $d_pi['present']; ?></td>
                            <td><?= $d_pi['pembimbing']; ?></td>
                            <td class="text-center">
                                <a href="#" class="btn btn-primary btn-sm ubah_init" data-toggle="modal" data-target="#modal_ubah<?= $no0; ?>">
                                    <i class=" fa fa-edit"></i> Ubah
                                </a>
                                <div class="modal" id="modal_ubah<?= $no0; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_ubah<?= $no0; ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-light">
                                                Ubah Jadwal Kegiatan Harian
                                                <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal" aria-label="Close">
                                                    X
                                                </button>
                                            </div>
                                            <div class="modal-body text-left">
                                                <form id="form_u<?= $no0 ?>" method="post">
                                                    <label for="tgl<?= $no0 ?>">Tanggal <span class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" id="tgl<?= $no0 ?>" name="tgl">
                                                    <div id="err_tgl<?= $no0 ?>" class="i err text-danger text-center text-xs blink mb-2"></div>
                                                    <div class="row mb-2 text-center">
                                                        <div class="col-xl">
                                                            <label for="semester<?= $no0 ?>">Semester<span class="text-danger">*</span></label>
                                                            <input type="number" min="0" id="semester<?= $no0 ?>" name="semester" class="form-control">
                                                            <div id="err_semester<?= $no0 ?>" class="i err text-danger text-center text-xs blink mb-2"></div>
                                                        </div>
                                                        <div class="col-xl text-center">
                                                            <label for="jenis<?= $no0 ?>">Jenis<span class="text-danger">*</span></label>
                                                            <input id="jenis" name="jenis<?= $no0 ?>" class="form-control">
                                                            <div id="err_jenis<?= $no0 ?>" class="i err text-danger text-center text-xs blink mb-2"></div>
                                                        </div>
                                                    </div>
                                                    <label for="judul<?= $no0 ?>">Judul<span class="text-danger">*</span></label>
                                                    <textarea id="judul<?= $no0 ?>" name="judul" class="form-control" rows="2"></textarea>
                                                    <div id="err_judul<?= $no0 ?>" class="i err text-danger text-center text-xs blink mb-2"></div>
                                                    <div class="row mb-2 text-center">
                                                        <div class="col-xl">
                                                            <label for="bim1<?= $no0 ?>">Bim 1<span class="text-danger">*</span></label>
                                                            <input type="date" id="bim1<?= $no0 ?>" name="bim1" class="form-control">
                                                            <div id="err_bim1<?= $no0 ?>" class="i err text-danger text-center text-xs blink mb-2"></div>
                                                        </div>
                                                        <div class="col-xl text-center">
                                                            <label for="bim2<?= $no0 ?>">Bim 2<span class="text-danger">*</span></label>
                                                            <input type="date" id="bim2<?= $no0 ?>" name="bim2" class="form-control">
                                                            <div id="err_bim2<?= $no0 ?>" class="i err text-danger text-center text-xs blink mb-2"></div>
                                                        </div>
                                                        <div class="col-xl text-center">
                                                            <label for="bim3<?= $no0 ?>">Bim 3<span class="text-danger">*</span></label>
                                                            <input type="date" id="bim3<?= $no0 ?>" name="bim3" class="form-control">
                                                            <div id="err_bim3<?= $no0 ?>" class="i err text-danger text-center text-xs blink mb-2"></div>
                                                        </div>
                                                        <div class="col-xl text-center">
                                                            <label for="present<?= $no0 ?>">Present<span class="text-danger">*</span></label>
                                                            <input type="date" id="present<?= $no0 ?>" name="present" class="form-control">
                                                            <div id="err_present<?= $no0 ?>" class="i err text-danger text-center text-xs blink mb-2"></div>
                                                        </div>
                                                    </div>
                                                    <label for="pembimbing<?= $no0 ?>">Pembimbing<span class="text-danger">*</span></label>
                                                    <input id="pembimbing<?= $no0 ?>" name="pembimbing" class="form-control">
                                                    <div id="err_pembimbing<?= $no0 ?>" class="i err text-danger text-center text-xs blink mb-2"></div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <a onClick="ubah('<?= $no0; ?>', '<?= encryptString($d_pi['id_pi'], $customkey) ?>' )" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-danger btn-sm hapus" id="<?= encryptString($d_pi['id_pi'], $customkey) ?>">
                                    <i class="fa fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php
                        $no0++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <script>
            $(".ubah_init").click(function() {
                $(".err").html("");
            });

            function ubah(x, y) {
                var data_form = $('#form_u' + x).serializeArray();
                data_form.push({
                    name: "id",
                    value: y
                });
                var jenis = $("#jenis" + x).val();
                var tgl = $("#tgl" + x).val();
                var semester = $("#semester" + x).val();
                var no_rm = $("#no_rm" + x).val();
                var icd10_diagnosis = $("#icd10_diagnosis" + x).val();
                var ket = $("#ket" + x).val();
                if (
                    jenis == "" ||
                    semester == "" ||
                    tgl == "" ||
                    no_rm == "" ||
                    icd10_diagnosis == "" ||
                    ket == ""
                ) {
                    custom_alert(true, 'warning', '<center>DATA WAJIB ADA YANG BELUM TERISI/TIDAK SESUAI</center>', 10000);
                    (jenis == "") ? $("#err_jenis" + x).html("Harus Dipilih"): $("#err_jenis" + x).html("");
                    (tgl == "") ? $("#err_tgl" + x).html("Harus Dipilih" + x): $("#err_tgl").html("");
                    (semester == "" || semester < 0) ? $("#err_semester" + x).html("Isian harus lebih sama dengan 0 (Nol)"): $("#err_semester" + x).html("");
                    (no_rm == "" || no_rm < 0) ? $("#err_no_rm" + x).html("Isian harus lebih sama dengan 0 (Nol)"): $("#err_no_rm" + x).html("");
                    (icd10_diagnosis == "") ? $("#err_icd10_diagnosis" + x).html("Harus Diisi"): $("#err_icd10_diagnosis" + x).html("");
                    (ket == "") ? $("#err_ket" + x).html("Harus Diisi"): $("#err_ket" + x).html("");
                } else {
                    $.ajax({
                        type: 'POST',
                        url: "_admin/exc/x_v_ked_residen_pi_data_u.php",
                        data: data_form,
                        dataType: "JSON",
                        success: function(response) {
                            if (response.ket == "SUCCESS") {
                                $('#modal_ubah' + x).modal('hide')
                                custom_alert(true, 'success', '<center>DATA BERHASIL DIUBAH</center>', 10000);
                                loading_sw2();
                                $('#data_pi')
                                    .load(
                                        "_admin/view/v_ked_residen_pi_data.php?idpr=<?= $_GET['idpr'] ?>");
                            } else custom_alert(true, 'error', '<center>DATA GAGAL DIUBAH <br>' + response.ket + '</center>', 10000);
                        },
                        error: function(response) {
                            custom_alert(true, 'error', '<center>DATA ERROR <br>' + response.ket + '</center>', 10000);
                        }
                    });
                }
            }

            $(document).on('click', '.hapus', function() {
                Swal.fire({
                    title: 'Anda Yakin?',
                    text: "Data akan Permanen Terhapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e74a3b',
                    cancelButtonColor: '#858796',
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Kembali'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            url: "_admin/exc/x_v_ked_residen_pi_data_h.php",
                            data: {
                                id: $(this).attr('id')
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.ket == "SUCCESS") {
                                    custom_alert(true, 'success', '<center>DATA BERHASIL DIHAPUS</center>', 10000);
                                    loading_sw2();
                                    $('#data_pi')
                                        .load(
                                            "_admin/view/v_ked_residen_pi_data.php?idpr=<?= $_GET['idpr'] ?>");
                                } else custom_alert(true, 'error', '<center>DATA GAGAL DIUBAH <br>' + response.ket + '</center>', 10000);
                            },
                            error: function(response) {
                                custom_alert(true, 'error', '<center>DATA ERROR <br>' + response.ket + '</center>', 10000);
                            }
                        });
                    }
                })
            });

            Swal.close();
            $('#dataTable').DataTable();
        </script>
    <?php } else { ?>
        <div class="jumbotron border-2 m-2 shadow">
            <div class="jumbotron-fluid">
                <div class="text-gray-700">
                    <h5 class="text-center">Data Tidak Ada</h5>
                </div>
            </div>
        </div>
    <?php } ?>