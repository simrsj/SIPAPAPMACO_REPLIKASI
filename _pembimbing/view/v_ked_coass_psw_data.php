    <?php

    include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/crypt.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";
    error_reporting(0);
    $idpr = decryptString($_GET['idpr'], $customkey);
    try {
        $sql_psw = "SELECT * FROM tb_logbook_ked_coass_psw ";
        $sql_psw .= " WHERE id_praktikan = " . $idpr;
        $sql_psw .= " ORDER BY tgl_ubah DESC, tgl_tambah DESC";
        // echo "$sql_psw<br>";
        $q_psw = $conn->query($sql_psw);
        $r_psw = $q_psw->rowCount();
    } catch (PDOException $ex) {
        echo "<script>alert('ERROR DATA JADWAL KEGIATAN HARIAN INPUT');</script>";
        echo "<script>document.location.href='?error404';</script>";
    }
    ?>
    <?php if ($r_psw > 0) { ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered " id="dataTable">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th scope='col'>No</th>
                        <th>Ruang</th>
                        <th>Nama</th>
                        <th>Usia</th>
                        <th>DD</th>
                        <th>Diagnosis Kerja</th>
                        <th>Terapi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no0 = 1;
                    while ($d_psw = $q_psw->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td class="text-center"><?= $no0; ?></td>
                            <td><?= $d_psw['ruang']; ?></td>
                            <td><?= $d_psw['nama']; ?></td>
                            <td><?= $d_psw['usia']; ?></td>
                            <td><?= $d_psw['dd']; ?></td>
                            <td><?= $d_psw['diagnosis_kerja']; ?></td>
                            <td><?= $d_psw['terapi']; ?></td>
                            <td class="text-center">
                                <a class="btn btn-primary btn-sm ubah_init<?= $no0 ?> " data-toggle="modal" data-target="#modal_ubah<?= $no0; ?>">
                                    <i class=" fa fa-edit"></i> Ubah
                                </a>

                                <div class="modal" id="modal_ubah<?= $no0; ?>" role="dialog" aria-labelledby="modal_ubah<?= $no0; ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-light">
                                                Ubah Kegiatan yang Ditemukan
                                                <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal" aria-label="Close">
                                                    X
                                                </button>
                                            </div>
                                            <div class="modal-body text-left">
                                                <form id="form_u<?= $no0 ?>" method="post">
                                                    <label for="ruang">Ruang</label>
                                                    <select class="form-control" id="ruang<?= $no0 ?>" name="ruang">
                                                        <option value="" class="text-center">-- Pilih --</option>
                                                        <option value="Rawat Inap">Rawat Inap</option>
                                                        <option value="Rawat Jalan">Rawat Jalan</option>
                                                        <option value="Keswara">Keswara</option>
                                                        <option value="Napza">Napza</option>
                                                        <option value="Psikogeriatri">Psikogeriatri</option>
                                                        <option value="IGD">IGD</option>
                                                    </select>
                                                    <div id="err_ruang<?= $no0 ?>" class="err i text-danger text-center text-xs blink mb-2"></div>

                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <label for="nama<?= $no0 ?>">Nama</label>
                                                            <input class="form-control" id="nama<?= $no0 ?>" name="nama">
                                                            <div id="err_nama<?= $no0 ?>" class="err i text-danger text-center text-xs blink mb-2"></div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="usia<?= $no0 ?>">Usia</label>
                                                            <input class="form-control" type="number" min="0" id="usia<?= $no0 ?>" name="usia">
                                                            <div class="i text-center text-xs "><label for="usia<?= $no0 ?>" class="m-0">Isian Hanya Angka</label></div>
                                                            <div id="err_usia<?= $no0 ?>" class="err i text-danger text-center text-xs blink mb-2"></div>
                                                        </div>
                                                    </div>

                                                    <label for="dd<?= $no0 ?>">DD</label>
                                                    <textarea class="form-control" id="dd<?= $no0 ?>" name="dd" rows="3"></textarea>
                                                    <div id="err_dd<?= $no0 ?>" class="err i text-danger text-center text-xs blink mb-2"></div>

                                                    <label for="diagnosis_kerja<?= $no0 ?>">Diagnosis Kerja</label>
                                                    <textarea class="form-control" id="diagnosis_kerja<?= $no0 ?>" name="diagnosis_kerja" rows="3"></textarea>
                                                    <div id="err_diagnosis_kerja<?= $no0 ?>" class="err i text-danger text-center text-xs blink mb-2"></div>

                                                    <label for="terapi<?= $no0 ?>">Terapi</label>
                                                    <textarea class="form-control" id="terapi<?= $no0 ?>" name="terapi" rows="3"></textarea>
                                                    <div id="err_terapi<?= $no0 ?>" class="err i text-danger text-center text-xs blink"></div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="#" class="btn btn-primary btn-sm ubah<?= $no0; ?>"><i class="fa fa-edit"></i> Ubah</a>
                                            </div>
                                            <script>
                                                $(".ubah_init<?= $no0 ?>").click(function() {
                                                    loading_sw2();
                                                    $(".err").html("");
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: "_pembimbing/view/v_ked_coass_psw_dataGetData.php",
                                                        data: {
                                                            id: '<?= encryptString($d_psw['id'], $customkey) ?>'
                                                        },
                                                        dataType: "JSON",
                                                        success: function(response) {
                                                            if (response.ket == "SUCCESS") {
                                                                $('#ruang<?= $no0 ?>').val(response.ruang);
                                                                $('#nama<?= $no0 ?>').val(response.nama);
                                                                $('#usia<?= $no0 ?>').val(response.usia);
                                                                $('#dd<?= $no0 ?>').val(response.dd);
                                                                $('#diagnosis_kerja<?= $no0 ?>').val(response.diagnosis_kerja);
                                                                $('#terapi<?= $no0 ?>').val(response.terapi);
                                                            } else error();
                                                            swal.close();

                                                        },
                                                        error: function(response) {
                                                            error();
                                                        }
                                                    });
                                                });
                                                $(document).on('click', '.ubah<?= $no0 ?>', function() {
                                                    var data_form = $('#form_u<?= $no0 ?>').serializeArray();
                                                    data_form.push({
                                                        name: "id",
                                                        value: "<?= encryptString($d_psw['id'], $customkey) ?>"
                                                    });
                                                    var ruang = $("#ruang<?= $no0 ?>").val();
                                                    var nama = $("#nama<?= $no0 ?>").val();
                                                    var usia = $("#usia<?= $no0 ?>").val();
                                                    var dd = $("#dd<?= $no0 ?>").val();
                                                    var diagnosis_kerja = $("#diagnosis_kerja<?= $no0 ?>").val();
                                                    var terapi = $("#terapi<?= $no0 ?>").val();
                                                    if (
                                                        ruang == "" ||
                                                        nama == "" ||
                                                        usia == "" ||
                                                        dd == "" ||
                                                        diagnosis_kerja == "" ||
                                                        terapi == ""
                                                    ) {
                                                        simpan_tidaksesuai();
                                                        ruang == "" ? $("#err_ruang<?= $no0 ?>").html("Pilih Ruang") : $("#err_ruang<?= $no0 ?>").html("");
                                                        nama == "" ? $("#err_nama<?= $no0 ?>").html("Isikan Nama Pasien") : $("#err_nama<?= $no0 ?>").html("")
                                                        usia == "" ? $("#err_usia<?= $no0 ?>").html("Isikan Usia") : $("#err_usia<?= $no0 ?>").html("")
                                                        dd == "" ? $("#err_dd<?= $no0 ?>").html("Isiskan DD") : $("#err_dd<?= $no0 ?>").html("")
                                                        diagnosis_kerja == "" ? $("#err_diagnosis<?= $no0 ?>").html("Isikan Diagnosis") : ("#err_diagnosis<?= $no0 ?>").html("")
                                                        terapi == "" ? $("#err_terapi<?= $no0 ?>").html("Isikan Terapi") : $("#err_terapi<?= $no0 ?>").html("")
                                                    } else {
                                                        loading_sw2();
                                                        $.ajax({
                                                            type: 'POST',
                                                            url: "_pembimbing/exc/x_v_ked_coass_psw_data_u.php",
                                                            data: data_form,
                                                            dataType: "JSON",
                                                            success: function(response) {
                                                                if (response.ket == "SUCCESS") {
                                                                    $('#modal_ubah<?= $no0 ?>').modal('hide')
                                                                    $('#data_psw')
                                                                        .load(
                                                                            "_pembimbing/view/v_ked_coass_psw_data.php?idpr=<?= $_GET['idpr'] ?>");
                                                                } else simpan_gagal_database();
                                                            },
                                                            error: function(response) {
                                                                error();
                                                            }
                                                        });
                                                    }
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>

                                <a href="#" class="btn btn-danger btn-sm hapus" id="<?= encryptString($d_psw['id'], $customkey) ?>">
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
                    loading_sw2();
                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            url: "_pembimbing/exc/x_v_ked_coass_psw_data_h.php",
                            data: {
                                id: $(this).attr('id')
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.ket == "SUCCESS") {
                                    hapus_berhasil();
                                    $('#data_psw')
                                        .load(
                                            "_pembimbing/view/v_ked_coass_psw_data.php?idpr=<?= $_GET['idpr'] ?>");
                                } else simpan_gagal_database();
                                swal.close();
                            },
                            error: function(response) {
                                error();
                            }
                        });
                    }
                })
            });
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

    <script>
        $(document).ready(function() {
            Swal.close();
            $('#dataTable').DataTable();
        });
    </script>