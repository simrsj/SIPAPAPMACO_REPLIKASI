<?php if (isset($_GET['ptrf']) && $d_prvl['r_praktik_tarif'] == "Y") { ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Daftar Tarif Praktik</h1>
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
                $sql_praktik .= " JOIN tb_praktikan ON tb_praktik.id_praktik = tb_praktikan.id_praktik ";
                $sql_praktik .= " WHERE tb_praktik.status_praktik = 'Y' ";
                $sql_praktik .= " GROUP BY tb_praktikan.id_praktik ";
                $sql_praktik .= " ORDER BY tb_praktik.id_praktik DESC";
                // echo "$sql_praktik<br>";
                try {
                    $q_praktik = $conn->query($sql_praktik);
                } catch (Exception $ex) {
                    echo "<script>alert('$ex -DATA PRAKTIK');";
                    echo "document.location.href='?error404';</script>";
                }
                $r_praktik = $q_praktik->rowCount();

                if ($r_praktik > 0) {
                ?>
                    <?php
                    while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {

                        $sql_praktik_tarif = "SELECT * FROM tb_tarif_pilih ";
                        $sql_praktik_tarif .= " JOIN tb_praktik ON tb_tarif_pilih.id_praktik = tb_praktik.id_praktik ";
                        $sql_praktik_tarif .= " WHERE tb_praktik.status_praktik = 'Y' AND tb_praktik.id_praktik = " . $d_praktik['id_praktik'];
                        $sql_praktik_tarif .= " ORDER BY tb_tarif_pilih.nama_tarif_pilih ASC";
                        // echo "$sql_praktik_tarif<br>";
                        try {
                            $q_praktik_tarif = $conn->query($sql_praktik_tarif);
                        } catch (Exception $ex) {
                            echo "<script>alert('$ex -DATA PRAKTIK');";
                            echo "document.location.href='?error404';</script>";
                        }
                        $r_praktik_tarif = $q_praktik_tarif->rowCount();
                    ?>
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header align-items-center bg-gray-200">
                                    <div class="row" style="font-size: small;" class="justify-content-center">
                                        <br><br>
                                        <div class="col-sm-4 text-center">
                                            <?php if ($_SESSION['level_user'] == 1) { ?>
                                                <b class="text-gray-800">INSTITUSI : </b><br><?= $d_praktik['nama_institusi']; ?><br>
                                            <?php } ?>
                                            <b class="text-gray-800">GELOMBANG/KELOMPOK : </b><br><?= $d_praktik['nama_praktik']; ?>
                                        </div>

                                        <div class="col-sm-2 text-center">
                                            <b class="text-gray-800">TANGGAL MULAI : </b><br><?= tanggal($d_praktik['tgl_mulai_praktik']); ?><br>
                                            <b class="text-gray-800">TANGGAL SELESAI : </b><br><?= tanggal($d_praktik['tgl_selesai_praktik']); ?>
                                        </div>
                                        <div class="col-sm-2 text-center">
                                            <b class="text-gray-800">JURUSAN : </b><br><?= $d_praktik['nama_jurusan_pdd']; ?><br>
                                            <b class="text-gray-800">JENJANG : </b><br><?= $d_praktik['nama_jenjang_pdd']; ?>
                                        </div>
                                        <div class="col-sm-3 text-center">
                                            <b class="text-gray-800">PROFESI : </b><br><?= $d_praktik['nama_profesi_pdd']; ?><br>
                                            <b class="text-gray-800">JUMLAH PRAKTIKAN : </b><br><?= $d_praktik['jumlah_praktik']; ?>
                                        </div>
                                        <!-- tombol aksi/info proses  -->
                                        <div class="col-sm-1 my-auto text-right">
                                            <!-- tombol rincian -->
                                            <a class="btn btn-info btn-sm collapsed m-0 " data-toggle="collapse" data-target="#collapse<?= $d_praktik['id_praktik']; ?>" title="Rincian">
                                                <i class="fas fa-info-circle"></i> Rincian
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- collapse data pembimbing -->
                                <div id="collapse<?= $d_praktik['id_praktik']; ?>" class="collapse" aria-labelledby="heading<?= $d_praktik['id_praktik']; ?>" data-parent="#accordion">
                                    <div class="card-body " style="font-size: medium;">
                                        <!-- data praktikan -->
                                        <div class="row text-gray-700">
                                            <div class="col">
                                                <h4 class="font-weight-bold">Data Tarif</h4><br>
                                            </div>
                                            <?php if ($d_prvl['c_praktikan'] == 'Y') { ?>
                                                <div class="col-2 text-right">
                                                    <!-- tombol modal tambah praktikan  -->
                                                    <a title="tambah praktikan" class='btn btn-success btn-sm <?= md5('tambah_init' . $d_praktik['id_praktik']); ?>' href='#' data-toggle="modal" data-target="#<?= md5('mi' . $d_praktik['id_praktik']); ?>">
                                                        <i class="fas fa-plus"></i> Tambah Tarif
                                                    </a>

                                                    <!-- modal tambah praktikan  -->
                                                    <div class="modal fade text-center" id="<?= md5('mi' . $d_praktik['id_praktik']); ?>" data-backdrop="static">
                                                        <div class="modal-dialog modal-dialog-scrollable  modal-md">
                                                            <div class="modal-content">
                                                                <div class="modal-header h5">
                                                                    Tambah Tarif
                                                                </div>
                                                                <div class="modal-body text-md">
                                                                    <form class="form-data b" method="post" id="<?= md5('form_t' . $d_praktik['id_praktik']); ?>">
                                                                        Jenis Tarif : <span style="color:red">*</span><br>
                                                                        <select class="select2 form-control" id="<?= md5('t_jenis_tarif' . $d_praktik['id_praktik']); ?>" name="<?= md5('t_jenis_tarif' . $d_praktik['id_praktik']); ?>" required>
                                                                            <option value="">-- Pilih Jenis Tarif --</option>
                                                                            <?php
                                                                            $sql_jenis_tarif = "SELECT * FROM tb_tarif_jenis";
                                                                            $sql_jenis_tarif .= " ORDER BY nama_tarif_jenis ASC";
                                                                            echo $sql_jenis_tarif . "<br>";
                                                                            try {
                                                                                $q_jenis_tarif = $conn->query($sql_jenis_tarif);
                                                                            } catch (Exception $ex) {
                                                                                echo "<script>alert('$ex -DATA JENIS TARIF');";
                                                                                echo "document.location.href='?error404';</script>";
                                                                            }
                                                                            while ($d_jenis_tarif = $q_jenis_tarif->fetch(PDO::FETCH_ASSOC)) {
                                                                            ?>
                                                                                <option value="<?= $d_jenis_tarif['id_tarif_jenis'] ?>">
                                                                                    <?= $d_jenis_tarif['nama_tarif_jenis'] ?>
                                                                                </option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <div class="text-danger b i text-xs blink" id="<?= md5('err_t_jenis_tarif' . $d_praktik['id_praktik']); ?>"></div><br>
                                                                        Nama Tarif : <span style="color:red">*</span>
                                                                        <input type="text" id="<?= md5('t_nama' . $d_praktik['id_praktik']); ?>" name="<?= md5('t_nama' . $d_praktik['id_praktik']); ?>" class="form-control form-control-xs" placeholder="Isikan Nama Tarif" required>
                                                                        <div class="text-danger b i text-xs blink" id="<?= md5('err_t_nama' . $d_praktik['id_praktik']); ?>"></div><br>
                                                                        <div class="row">
                                                                            <div class="col-md">
                                                                                Tarif : <span style="color:red">*</span>
                                                                                <input type="number" id="<?= md5('t_tarif' . $d_praktik['id_praktik']); ?>" name="<?= md5('t_tarif' . $d_praktik['id_praktik']); ?>" class="form-control form-control-xs" min="1" placeholder="Isikan Tarif" required>
                                                                                <div class="text-danger b i text-xs blink" id="<?= md5('err_t_tarif' . $d_praktik['id_praktik']); ?>"></div><br>
                                                                            </div>
                                                                            <div class="col-md">
                                                                                Satuan : <span style="color:red">*</span>
                                                                                <select class="select2 form-control" id="<?= md5('t_satuan' . $d_praktik['id_praktik']); ?>" name="<?= md5('t_satuan' . $d_praktik['id_praktik']); ?>" required>
                                                                                    <option value="">-- Pilih Satuan Tarif --</option>
                                                                                    <?php
                                                                                    $sql_satuan_tarif = "SELECT * FROM tb_tarif_satuan";
                                                                                    $sql_satuan_tarif .= " ORDER BY nama_tarif_satuan ASC";
                                                                                    echo $sql_satuan_tarif . "<br>";
                                                                                    try {
                                                                                        $q_satuan_tarif = $conn->query($sql_satuan_tarif);
                                                                                    } catch (Exception $ex) {
                                                                                        echo "<script>alert('$ex -DATA SATUAN TARIF');";
                                                                                        echo "document.location.href='?error404';</script>";
                                                                                    }
                                                                                    while ($d_satuan_tarif = $q_satuan_tarif->fetch(PDO::FETCH_ASSOC)) {
                                                                                    ?>
                                                                                        <option value="<?= $d_satuan_tarif['id_tarif_satuan'] ?>">
                                                                                            <?= $d_satuan_tarif['nama_tarif_satuan'] ?>
                                                                                        </option>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                                <div class="text-danger b i text-xs blink" id="<?= md5('err_t_satuan' . $d_praktik['id_praktik']); ?>"></div><br>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md">
                                                                                Frekuensi : <span style="color:red">*</span>
                                                                                <input type="number" id="<?= md5('t_frekuensi' . $d_praktik['id_praktik']); ?>" name="<?= md5('t_frekuensi' . $d_praktik['id_praktik']); ?>" class="form-control form-control-xs" min="1" placeholder="Isikan Frekeunsi" required>
                                                                                <div class="text-danger b i text-xs blink" id="<?= md5('err_t_frekuensi' . $d_praktik['id_praktik']); ?>"></div><br>
                                                                            </div>
                                                                            <div class="col-md">
                                                                                Kuantitas : <span style="color:red">*</span>
                                                                                <input type="number" id="<?= md5('t_kuantitas' . $d_praktik['id_praktik']); ?>" name="<?= md5('t_kuantitas' . $d_praktik['id_praktik']); ?>" class="form-control form-control-xs" min="1" placeholder="Isikan Kuantitas" required>
                                                                                <div class="text-danger b i text-xs blink" id="<?= md5('err_t_kuantitas' . $d_praktik['id_praktik']); ?>"></div><br>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer text-md">
                                                                    <a class="btn btn-danger btn-sm <?= md5('tambah_tutup' . $d_praktik['id_praktik']); ?>" data-dismiss="modal">
                                                                        Kembali
                                                                    </a>
                                                                    &nbsp;
                                                                    <a class="tambah btn btn-success btn-sm <?= md5('tambah' . $d_praktik['id_praktik']); ?>" id="<?= urlencode(base64_encode($d_praktik['id_praktik'])); ?>">
                                                                        Tambah
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <?php
                                        if ($r_praktik_tarif > 0) {
                                        ?>
                                            <!-- inisiasi tabel data praktikan -->
                                            <div id="<?= md5("data" . $d_praktik['id_praktik']); ?>"></div>
                                            <script>
                                                $('#<?= md5("data" . $d_praktik['id_praktik']); ?>')
                                                    .load(
                                                        "_admin/view/v_praktik_tarifData.php?idu=<?= urlencode(base64_encode($_SESSION['id_user'])); ?>&idp=<?= urlencode(base64_encode($d_praktik['id_praktik'])); ?>&dt=<?= md5('dataTables' . $d_praktik['id_praktik']); ?>");

                                                // inisiasi klik modal tambah
                                                $(".<?= md5('tambah_init' . $d_praktik['id_praktik']); ?>").click(function() {
                                                    console.log("tambah_init");
                                                    $("#<?= md5('err_t_jenis_tarif' . $d_praktik['id_praktik']); ?>").empty();
                                                    $('#<?= md5('err_t_nama' . $d_praktik['id_praktik']); ?>').empty();
                                                    $('#<?= md5('err_t_tarif' . $d_praktik['id_praktik']); ?>').empty();
                                                    $("#<?= md5('err_t_satuan' . $d_praktik['id_praktik']); ?>").empty();
                                                    $('#<?= md5('err_t_frekuensi' . $d_praktik['id_praktik']); ?>').empty();
                                                    $('#<?= md5('err_t_kuantitas' . $d_praktik['id_praktik']); ?>').empty();
                                                    $("#<?= md5('form_t' . $d_praktik['id_praktik']); ?>").trigger("reset");
                                                    $("#<?= md5('t_jenis_tarif' . $d_praktik['id_praktik']); ?>").val("").trigger("change");
                                                    $("#<?= md5('t_satuan' . $d_praktik['id_praktik']); ?>").val("").trigger("change");
                                                });

                                                // inisiasi klik modal tambah simpan
                                                $(document).on('click', '.<?= md5('tambah' . $d_praktik['id_praktik']); ?>', function() {
                                                    console.log("tambah");
                                                    var data_t = $("#<?= md5('form_t' . $d_praktik['id_praktik']); ?>").serializeArray();
                                                    data_t.push({
                                                        name: "idp",
                                                        value: $(this).attr('id')
                                                    });

                                                    var t_jenis_tarif = $('#<?= md5('t_jenis_tarif' . $d_praktik['id_praktik']); ?>').val();
                                                    var t_nama = $('#<?= md5('t_nama' . $d_praktik['id_praktik']); ?>').val();
                                                    var t_tarif = $('#<?= md5('t_tarif' . $d_praktik['id_praktik']); ?>').val();
                                                    var t_satuan = $('#<?= md5('t_satuan' . $d_praktik['id_praktik']); ?>').val();
                                                    var t_frekuensi = $('#<?= md5('t_frekuensi' . $d_praktik['id_praktik']); ?>').val();
                                                    var t_kuantitas = $('#<?= md5('t_kuantitas' . $d_praktik['id_praktik']); ?>').val();

                                                    //cek data from modal tambah bila tidak diiisi
                                                    if (
                                                        t_jenis_tarif == "" ||
                                                        t_nama == "" ||
                                                        t_tarif == "" ||
                                                        t_satuan == "" ||
                                                        t_frekuensi == "" ||
                                                        t_kuantitas == ""
                                                    ) {
                                                        // console.log("error data");
                                                        if (t_jenis_tarif == "") {
                                                            $("#<?= md5('err_t_jenis_tarif' . $d_praktik['id_praktik']); ?>").html("Jenis Tarif Harus Dipilih");
                                                        } else {
                                                            $("#<?= md5('err_t_jenis_tarif' . $d_praktik['id_praktik']); ?>").html("");
                                                        }

                                                        if (t_nama == "") {
                                                            $("#<?= md5('err_t_nama' . $d_praktik['id_praktik']); ?>").html("Nama Tarif Harus Diisi");
                                                        } else {
                                                            $("#<?= md5('err_t_nama' . $d_praktik['id_praktik']); ?>").html("");
                                                        }

                                                        if (t_tarif == "") {
                                                            $("#<?= md5('err_t_tarif' . $d_praktik['id_praktik']); ?>").html("Tarif Pilih Harus Diisi");
                                                        } else {
                                                            $("#<?= md5('err_t_tarif' . $d_praktik['id_praktik']); ?>").html("");
                                                        }

                                                        if (t_satuan == "") {
                                                            $("#<?= md5('err_t_satuan' . $d_praktik['id_praktik']); ?>").html("Satuan Pilih Harus Dipilih");
                                                        } else {
                                                            $("#<?= md5('err_t_satuan' . $d_praktik['id_praktik']); ?>").html("");
                                                        }

                                                        if (t_frekuensi == "") {
                                                            $("#<?= md5('err_t_frekuensi' . $d_praktik['id_praktik']); ?>").html("Frekuensi Harus Diisi");
                                                        } else {
                                                            $("#<?= md5('err_t_frekuensi' . $d_praktik['id_praktik']); ?>").html("");
                                                        }

                                                        if (t_kuantitas == "") {
                                                            $("#<?= md5('err_t_kuantitas' . $d_praktik['id_praktik']); ?>").html("Kuamtitas Harus Diisi");
                                                        } else {
                                                            $("#<?= md5('err_t_kuantitas' . $d_praktik['id_praktik']); ?>").html("");
                                                        }
                                                    }

                                                    //simpan data tambah bila sudah sesuai
                                                    if (
                                                        t_jenis_tarif != "" &&
                                                        t_nama != "" &&
                                                        t_tarif != "" &&
                                                        t_satuan != "" &&
                                                        t_frekuensi != "" &&
                                                        t_kuantitas != ""
                                                    ) {
                                                        console.log("tambah data");

                                                        $.ajax({
                                                            type: 'POST',
                                                            url: "_admin/exc/x_v_praktik_tarif_t.php",
                                                            data: data_t,
                                                            success: function() {
                                                                $('#<?= md5("data" . $d_praktik['id_praktik']); ?>')
                                                                    .load("_admin/view/v_praktik_tarifData.php?" +
                                                                        "idu=<?= urlencode(base64_encode($_SESSION['id_user'])); ?>" +
                                                                        "&idp=<?= urlencode(base64_encode($d_praktik['id_praktik'])); ?>" +
                                                                        "&dt=<?= md5($d_praktik['id_praktik']); ?>");

                                                                $("#<?= md5('err_t_jenis_tarif' . $d_praktik['id_praktik']); ?>").empty();
                                                                $('#<?= md5('err_t_nama' . $d_praktik['id_praktik']); ?>').empty();
                                                                $('#<?= md5('err_t_tarif' . $d_praktik['id_praktik']); ?>').empty();
                                                                $("#<?= md5('err_t_satuan' . $d_praktik['id_praktik']); ?>").empty();
                                                                $('#<?= md5('err_t_frekuensi' . $d_praktik['id_praktik']); ?>').empty();
                                                                $('#<?= md5('err_t_kuantitas' . $d_praktik['id_praktik']); ?>').empty();
                                                                $("#<?= md5('form_t' . $d_praktik['id_praktik']); ?>").trigger("reset");
                                                                $("#<?= md5('t_jenis_tarif' . $d_praktik['id_praktik']); ?>").val("").trigger("change");
                                                                $("#<?= md5('t_satuan' . $d_praktik['id_praktik']); ?>").val("").trigger("change");

                                                                const Toast = Swal.mixin({
                                                                    toast: true,
                                                                    position: 'top-end',
                                                                    showConfirmButton: false,
                                                                    timer: 5000,
                                                                    timerProgressBar: true,
                                                                    didOpen: (toast) => {
                                                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                                    }
                                                                });

                                                                Toast.fire({
                                                                    icon: 'success',
                                                                    title: '<span class"text-centere"><b>Data Praktikan</b><br>Berhasil Tersimpan',
                                                                }).then(
                                                                    function() {}
                                                                );
                                                            },
                                                            error: function(response) {
                                                                console.log(response);
                                                            }
                                                        });
                                                    }
                                                });
                                            </script>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="jumbotron">
                                                <div class="jumbotron-fluid">
                                                    <div class="text-gray-700">
                                                        <h5 class="text-center">Data Pembimbing dan Ruangan Tidak Ada</h5>
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
                        <hr class="bg-gray-800">
                    <?php
                    }
                } else {
                    ?>
                    <h3 class='text-center'> Data Tarif Tidak Ada</h3>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
<?php } else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
