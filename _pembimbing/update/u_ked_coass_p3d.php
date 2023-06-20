<div class="container-fluid">
    <?php
    $idpr = urldecode(decryptString($_GET['u'], $customkey));
    try {
        $sql_praktikan = "SELECT * FROM tb_praktikan ";
        $sql_praktikan .= " JOIN tb_praktik ON tb_praktikan.id_praktik = tb_praktik.id_praktik";
        $sql_praktikan .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi";
        $sql_praktikan .= " WHERE id_praktikan = " .  $idpr;
        // echo "$sql_praktikan<br>";
        $q_praktikan = $conn->query($sql_praktikan);
        $d_praktikan = $q_praktikan->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $ex) {
        echo "<script>alert('DATA BIMBINGAN PRAKTIKAN')</script>;";
        // echo "<script>document.location.href='?error404';</script>";
    }
    try {
        $sql_pertanyaan = "SELECT * FROM tb_pertanyaan ";
        $sql_pertanyaan .= " WHERE kategori_pertanyaan = 'P3D'";
        // echo "$sql_pertanyaan<br>";
        $q_pertanyaan = $conn->query($sql_pertanyaan);
    } catch (Exception $ex) {
        echo "<script>alert('DATA PRAKTIKAN');</script>";
        echo "<script>document.location.href='?error404';</script>";
    }
    ?>
    <div class="card shadow  m-2">
        <div class="card-header b text-center">
            Data Praktikan
        </div>
        <div class="card-body text-center">
            <div class="row">
                <div class="col-md">
                    <img height="100" height="80" src="<?= $d_praktikan['foto_praktikan'] ?>">
                </div>
                <div class="col-md">
                    Nama Praktikan : <br>
                    <strong><?= $d_praktikan['nama_praktikan'] ?></strong><br>
                    No. ID Praktikan : <br>
                    <strong><?= $d_praktikan['no_id_praktikan'] ?></strong>
                </div>
                <div class="col-md">
                    Nama Institusi : <br>
                    <strong> <?= $d_praktikan['nama_institusi'] ?> </strong><br>
                    Nama Kelompok/Gelombang/Praktik : <br>
                    <strong> <?= $d_praktikan['nama_praktik'] ?></strong>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="card shadow m-2 rounded-5">
                <div class="card-header b ">
                    Data Nilai
                </div>
                <div class="card-body text-center">
                    <div class="table-responsive text-sm">
                        <form id="form_nilai" method="post">
                            <table class="table table-striped table-bordered ">
                                <thead class="table-dark">
                                    <tr class="text-center">
                                        <th scope='col'>No</th>
                                        <th>Pertanyaan</th>
                                        <th>I</th>
                                        <th>II</th>
                                        <th>III</th>
                                        <th>IV</th>
                                    </tr>
                                    <tr class="text-center bg-secondary">
                                        <th colspan="2 text-right" class="text-right">Pilih Semua-></th>
                                        <th class="text-center"><input type="checkbox" class="checkbox-md" id="i_all"></th>
                                        <th class="text-center"><input type="checkbox" class="checkbox-md" id="ii_all"></th>
                                        <th class="text-center"><input type="checkbox" class="checkbox-md" id="iii_all"></th>
                                        <th class="text-center"><input type="checkbox" class="checkbox-md" id="iv_all"></th>

                                        <script>
                                            function checkboxi() {
                                                var totalCheckbox = $('.checkboxi').length;
                                                var totalChecked = $('.checkboxi:checked').length;

                                                if (totalChecked == totalCheckbox) {
                                                    $("#i_all").prop("checked", true);
                                                } else {
                                                    $("#i_all").prop("checked", false);
                                                }
                                            }

                                            function checkboxii() {
                                                var totalCheckbox = $('.checkboxii').length;
                                                var totalChecked = $('.checkboxii:checked').length;

                                                if (totalChecked == totalCheckbox) {
                                                    $("#ii_all").prop("checked", true);
                                                } else {
                                                    $("#ii_all").prop("checked", false);
                                                }
                                            }

                                            function checkboxiii() {
                                                var totalCheckbox = $('.checkboxiii').length;
                                                var totalChecked = $('.checkboxiii:checked').length;

                                                if (totalChecked == totalCheckbox) {
                                                    $("#iii_all").prop("checked", true);
                                                } else {
                                                    $("#iii_all").prop("checked", false);
                                                }
                                            }

                                            function checkboxiv() {
                                                var totalCheckbox = $('.checkboxiv').length;
                                                var totalChecked = $('.checkboxiv:checked').length;

                                                if (totalChecked == totalCheckbox) {
                                                    $("#iv_all").prop("checked", true);
                                                } else {
                                                    $("#iv_all").prop("checked", false);
                                                }
                                            }
                                            $(document).ready(function() {
                                                $("#i_all").click(function() {
                                                    if ($(this).is(":checked")) {
                                                        $(".checkboxi").prop("checked", true);
                                                    } else {
                                                        $(".checkboxi").prop("checked", false);
                                                    }
                                                });
                                                $("#ii_all").click(function() {
                                                    if ($(this).is(":checked")) {
                                                        $(".checkboxii").prop("checked", true);
                                                    } else {
                                                        $(".checkboxii").prop("checked", false);
                                                    }
                                                });
                                                $("#iii_all").click(function() {
                                                    if ($(this).is(":checked")) {
                                                        $(".checkboxiii").prop("checked", true);
                                                    } else {
                                                        $(".checkboxiii").prop("checked", false);
                                                    }
                                                });
                                                $("#iv_all").click(function() {
                                                    if ($(this).is(":checked")) {
                                                        $(".checkboxiv").prop("checked", true);
                                                    } else {
                                                        $(".checkboxiv").prop("checked", false);
                                                    }
                                                });
                                            });
                                        </script>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    try {
                                        $sql_pertanyaan = "SELECT * FROM tb_pertanyaan ";
                                        $sql_pertanyaan .= " WHERE kategori_pertanyaan = 'P3D'";
                                        // echo "$sql_pertanyaan<br>";
                                        $q_pertanyaan = $conn->query($sql_pertanyaan);
                                    } catch (Exception $ex) {
                                        echo "<script>alert('DATA PRAKTIKAN');</script>";
                                        echo "<script>document.location.href='?error404';</script>";
                                    }
                                    $no = 1;
                                    while ($d_bimbingan = $q_pertanyaan->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td><?= $d_bimbingan_isi['pertanyaan']; ?></td>
                                            <td>
                                                <input type="checkbox" class="checkbox-md checkboxi" id="i<?= $no ?>" name="i<?= $no ?>" onclick="checkboxi()" value="Y">
                                            </td>
                                            <td>
                                                <input type="checkbox" class="checkbox-md checkboxii" id="ii<?= $no ?>" name="ii<?= $no ?>" onclick="checkboxii()" value="Y">
                                            </td>
                                            <td>
                                                <input type="checkbox" class="checkbox-md checkboxiii" id="iii<?= $no ?>" name="iii<?= $no ?>" onclick="checkboxii()" value="Y">
                                            </td>
                                            <td>
                                                <input type="checkbox" class="checkbox-md checkboxiv" id="iv<?= $no ?>" name="iv<?= $no ?>" onclick="checkboxiv()" value="Y">
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <a class="btn btn-success btn-sm col" href="#" data-toggle="modal" data-target="#modal_simpan">
                                SIMPAN
                            </a>
                            <!-- Logout Modal-->
                            <div class="modal  fade" id="modal_simpan" tabindex="-1" role="dialog" aria-labelledby="modal_simpan" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <i class="fa-regular fa-circle-question fa-7x"></i><br>
                                            <div class="b text-lg">Yakin Simpan?</div>
                                            <div class="i blink text-danger mb-1">(data yang lama akan terhapus)</div>
                                            <a class="btn btn-success btn-sm simpan">Simpan</a>&nbsp;&nbsp;
                                            <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal" aria-label="Close">
                                                Kembali
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <script>
                            $(document).on('click', '.simpan', function() {
                                var data_form = $("#form_nilai").serializeArray();

                                Swal.fire({
                                    allowOutsideClick: true,
                                    icon: 'warning',
                                    title: '<span><b>NILAI ADA YANG TIDAK SESUAI</b></span>',
                                    showConfirmButton: false,
                                    timer: 5000,
                                    timerProgressBar: true,
                                    backdrop: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                });
                                bst < 0 || bst > 100 ? $("#err_bst").html("Tidak Sesuai") : $("#err_bst").html("");
                                crs < 0 || crs > 100 ? $("#err_crs").html("Tidak Sesuai") : $("#err_crs").html("");
                                css < 0 || css > 100 ? $("#err_css").html("Tidak Sesuai") : $("#err_css").html("");
                                minicex < 0 || minicex > 100 ? $("#err_minicex").html("Tidak Sesuai") : $("#err_minicex").html("");
                                rps < 0 || rps > 100 ? $("#err_rps").html("Tidak Sesuai") : $("#err_rps").html("");
                                osler < 0 || osler > 100 ? $("#err_osler").html("Tidak Sesuai") : $("#err_osler").html("");
                                dops < 0 || dops > 100 ? $("#err_dops").html("Tidak Sesuai") : $("#err_dops").html("");
                            } else {
                                data_form.push({
                                    name: "idpr",
                                    value: "<?= encryptString($d_praktikan['id_praktikan'], $customkey) ?>"
                                });
                                $.ajax({
                                    type: 'POST',
                                    url: "_pembimbing/exc/x_u_ked_coass_nilai.php",
                                    data: data_form,
                                    dataType: "JSON",
                                    success: function(response) {
                                        if (response.ket == "ERROR") {
                                            Swal.fire({
                                                allowOutsideClick: true,
                                                icon: 'error',
                                                title: '<span><b>DATA GAGAL DISIMAPAN</b></span>',
                                                showConfirmButton: false,
                                                timer: 10000,
                                                timerProgressBar: true,
                                                backdrop: true,
                                                didOpen: (toast) => {
                                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                }
                                            });
                                        } else {
                                            Swal.fire({
                                                allowOutsideClick: true,
                                                icon: 'success',
                                                title: '<span><b>NILAI BERHASIL DISIMPAN</b></span>',
                                                showConfirmButton: false,
                                                timer: 10000,
                                                timerProgressBar: true,
                                                backdrop: true,
                                                didOpen: (toast) => {
                                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                }
                                            }).then(
                                                function() {
                                                    document.location.href = "?ked_coass_nilai";
                                                }
                                            );
                                        }
                                    },
                                    error: function(response) {
                                        console.log(response);
                                    }
                                });
                            }
                            });
                        </script>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>