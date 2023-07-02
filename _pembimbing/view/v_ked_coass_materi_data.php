    <?php

    include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/crypt.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";
    error_reporting(0);
    $idpr = decryptString($_GET['idpr'], $customkey);
    try {
        $sql_materi = "SELECT * FROM tb_logbook_ked_coass_materi ";
        $sql_materi .= " WHERE id_praktikan = " . $idpr;
        $sql_materi .= " ORDER BY tgl_ubah DESC, tgl_tambah DESC";
        // echo "$sql_materi<br>";
        $q_materi = $conn->query($sql_materi);
        $r_materi = $q_materi->rowCount();
    } catch (PDOException $ex) {
        echo "<script>alert('ERROR DATA JADWAL KEGIATAN HARIAN INPUT');</script>";
        echo "<script>document.location.href='?error404';</script>";
    }
    ?>
    <?php if ($r_materi > 0) { ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th scope='col'>No</th>
                        <th>Materi</th>
                        <th>Tanggal</th>
                        <th>Topik</th>
                        <th>LK</th>
                        <th>Dosen Pembimbing</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no0 = 1;
                    while ($d_materi = $q_materi->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td class="text-center"><?= $no0; ?></td>
                            <td><?= $d_materi['materi']; ?></td>
                            <td><?= tanggal($d_materi['tgl']); ?></td>
                            <td><?= $d_materi['topik']; ?></td>
                            <td><?= $d_materi['lk']; ?></td>
                            <td><?= $d_materi['dosen_pembimbing']; ?></td>
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
                                                    <label for="materi<?= $no0 ?>">Materi</label>
                                                    <select class="form-control" id="materi<?= $no0 ?>" name="materi">
                                                        <option value="" class="text-center">-- Pilih --</option>
                                                        <option value="Kuliah Pengayaan">Kuliah Pengayaan</option>
                                                        <option value="Mini C-Ex">Mini C-Ex</option>
                                                        <option value="RPS">RPS</option>
                                                        <option value="CRS">CRS</option>
                                                        <option value="CSS">CSS</option>
                                                        <option value="OSLER">OSLER</option>
                                                        <option value="DPS">DPS</option>
                                                    </select>
                                                    <div id="err_materi<?= $no0 ?>" class="err i text-danger text-center text-xs blink mb-2"></div>

                                                    <label for="tgl<?= $no0 ?>">Tanggal</label>
                                                    <input class="form-control" type="date" id="tgl<?= $no0 ?>" name="tgl">
                                                    <div id="err_tgl<?= $no0 ?>" class="err i text-danger text-center text-xs blink mb-2"></div>

                                                    <label for="topik<?= $no0 ?>">Topik</label>
                                                    <textarea class="form-control" id="topik<?= $no0 ?>" name="topik" rows="3"></textarea>
                                                    <div id="err_topik<?= $no0 ?>" class="err i text-danger text-center text-xs blink mb-2"></div>

                                                    <label for="lk<?= $no0 ?>">LK</label>
                                                    <input class="form-control" id="lk<?= $no0 ?>" name="lk">
                                                    <div id="err_lk<?= $no0 ?>" class="err i text-danger text-center text-xs blink mb-2"></div>

                                                    <label for="dosen_pembimbing<?= $no0 ?>">Dosen Pembimbing</label>
                                                    <input class="form-control" id="dosen_pembimbing<?= $no0 ?>" name="dosen_pembimbing">
                                                    <div id="err_dosen_pembimbing<?= $no0 ?>" class="err i text-danger text-center text-xs blink mb-2"></div>
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
                                                        url: "_pembimbing/view/v_ked_coass_materi_dataGetData.php",
                                                        data: {
                                                            id: '<?= encryptString($d_materi['id'], $customkey) ?>'
                                                        },
                                                        dataType: "JSON",
                                                        success: function(response) {
                                                            if (response.ket == "SUCCESS") {
                                                                $('#materi<?= $no0 ?>').val(response.materi);
                                                                $('#tgl<?= $no0 ?>').val(response.tgl);
                                                                $('#topik<?= $no0 ?>').val(response.topik);
                                                                $('#lk<?= $no0 ?>').val(response.lk);
                                                                $('#dosen_pembimbing<?= $no0 ?>').val(response.dosen_pembimbing);
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
                                                        value: "<?= encryptString($d_materi['id'], $customkey) ?>"
                                                    });
                                                    var materi = $("#materi<?= $no0 ?>").val();
                                                    var tgl = $("#tgl<?= $no0 ?>").val();
                                                    var topik = $("#topik<?= $no0 ?>").val();
                                                    var lk = $("#lk<?= $no0 ?>").val();
                                                    var dosen_pembimbing = $("#dosen_pembimbing<?= $no0 ?>").val();
                                                    if (
                                                        materi == "" ||
                                                        tgl == "" ||
                                                        topik == "" ||
                                                        lk == "" ||
                                                        dosen_pembimbing == ""
                                                    ) {
                                                        simpan_tidaksesuai();
                                                        materi == "" ? $("#err_materi<?= $no0 ?>").html("Pilih Materi") : $("#err_materi<?= $no0 ?>").html("");
                                                        tgl == "" ? $("#err_tgl<?= $no0 ?>").html("Pilih Tanggal") : $("#err_tgl<?= $no0 ?>").html("");
                                                        topik == "" ? $("#err_topik<?= $no0 ?>").html("Isikan Topik") : $("#err_topik<?= $no0 ?>").html("")
                                                        lk == "" ? $("#err_lk<?= $no0 ?>").html("Isikan LK") : $("#err_lk<?= $no0 ?>").html("")
                                                        dosen_pembimbing == "" ? $("#err_dosen_pembimbing<?= $no0 ?>").html("Isikan Dosen Pembimbing") : $("#err_dosen_pembimbing<?= $no0 ?>").html("")
                                                    } else {
                                                        loading_sw2();
                                                        $.ajax({
                                                            type: 'POST',
                                                            url: "_pembimbing/exc/x_v_ked_coass_materi_data_u.php",
                                                            data: data_form,
                                                            dataType: "JSON",
                                                            success: function(response) {
                                                                if (response.ket == "SUCCESS") {
                                                                    $('#modal_ubah<?= $no0 ?>').modal('hide')
                                                                    $('#data_materi')
                                                                        .load(
                                                                            "_pembimbing/view/v_ked_coass_materi_data.php?idpr=<?= $_GET['idpr'] ?>");
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

                                <a href="#" class="btn btn-danger btn-sm hapus" id="<?= encryptString($d_materi['id'], $customkey) ?>">
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
                            url: "_pembimbing/exc/x_v_ked_coass_materi_data_h.php",
                            data: {
                                id: $(this).attr('id')
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.ket == "SUCCESS") {
                                    hapus_berhasil();
                                    $('#data_materi')
                                        .load(
                                            "_pembimbing/view/v_ked_coass_materi_data.php?idpr=<?= $_GET['idpr'] ?>");
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