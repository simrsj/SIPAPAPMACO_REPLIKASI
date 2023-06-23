<div class="container-fluid">
    <?php
    $idpr = urldecode(decryptString($_GET['data'], $customkey));
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
                <div class="card-header b between">
                    <div class="row">
                        <div class="col-md-10">Data Jadwal Kegiatan Harian</div>
                        <div class="col-md-2 text-right">
                            <a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#modal_tambah">
                                <i class="fa-solid fa-plus"></i> Tambah
                            </a>
                            <div class="modal  fade" id="modal_tambah" tabindex="-1" role="dialog" aria-labelledby="modal_tambah" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-secondary text-light">
                                            Jadwal Kegiatan Harian
                                            <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal" aria-label="Close">
                                                X
                                            </button>
                                        </div>
                                        <div class="modal-body text-left">
                                            <form id="form" method="post">
                                                <label for="tgl">Tanggal</label>
                                                <input type="date" class="form-control mb-2" id="tgl" name="tgl"><br>
                                                <div id="err_tgl" class="i text-danger text-xs blink"></div>
                                                <label for="kegiatan">Kegiatan</label>
                                                <textarea id="kegiatan" name="kegiatan" class="form-control mb-2" rows="3"></textarea>
                                                <div id="err_kegiatan" class="i text-danger text-xs blink"></div>
                                                <label for="topik">Topik</label>
                                                <textarea id="topik" name="topik" class="form-control mb-2" rows="3"></textarea>
                                                <div id="err_topik" class="i text-danger text-xs blink"></div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="loader" class="loader mb-5 mt-5 text-center"></div>
                    <div id="data_jkh"></div>
                </div>

                <script>
                    $(document).ready(function() {
                        loading_sw2();
                        $('#data_jkh')
                            .load(
                                "_pembimbing/view/v_ked_coass_jkh_data.php?idpr=<?= $_GET['data'] ?>");
                        $('#loader').remove();

                    });

                    $(".tambah_init").click(function() {
                        $("#err_tgl").html("");
                        $("#err_kegiatan").html("");
                        $("#err_topik").html("");
                    });
                    $(document).on('click', '.tambah', function() {
                        var data_form = $('#form').serialize();
                        var tgl = $("#tgl").value();
                        var kegiatan = $("#kegiatan").value();
                        var topik = $("#topik").value();

                        //cek data from ubah bila tidak diiisi
                        if (
                            tgl == "" ||
                            kegiatan == "" ||
                            topik == ""
                        ) {
                            loading();
                            if (tgl == "") $("#err_tgl").html("Pilih Tanggal");
                            else $("#err_tgl").html("");
                            if (kegiatan == "") $("#err_kegiatan").html("Isikan Kegiatan");
                            else $("#err_kegiatan").html("");
                            if (topik == "") $("#topik").html("Isiskan Topik");
                            else $("#topik").html("");

                        } else {
                            $.ajax({
                                type: 'POST',
                                url: "_admin/exc/x_v_kuota_s.php",
                                data: data,
                                success: function() {

                                    $('#data_kuota').load('_admin/view/v_kuotaData.php?idu=<?= urlencode(base64_encode($_SESSION['id_user'])) ?>');
                                    Swal.fire({
                                        allowOutsideClick: false,
                                        // isDismissed: false,
                                        icon: 'error',
                                        title: '<span class"text-xs">' +
                                            '<b>DATA PRAKTIKAN</b> <br> ' +
                                            'TIDAK SESUAI DENGAN<br>' +
                                            '<b>JUMLAH PRAKTIK</b><br>' +
                                            'Sesuaikan kembali di menu <b>DATA PRAKTIKAN praktikan</b><br>' +
                                            '</span>',
                                        showConfirmButton: false,
                                        timer: 5000,
                                        timerProgressBar: true,
                                        didOpen: (toast) => {
                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                        }
                                    });
                                    document.getElementById("err_t_nama").innerHTML = "";
                                    document.getElementById("err_t_jumlah").innerHTML = "";
                                    document.getElementById("form_tambah_kuota").reset();
                                },
                                error: function(response) {
                                    console.log(response.responseText);
                                }
                            });
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</div>