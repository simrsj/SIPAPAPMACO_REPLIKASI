<?php
if (isset($_GET['pbyr']) && isset($_GET['i'])) {

    //query data praktik
    $sql_praktik = "SELECT * FROM tb_praktik ";
    $sql_praktik .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi";
    $sql_praktik .= " WHERE id_praktik = " . base64_decode(urldecode($_GET['pbyr']));
    try {
        $q_praktik = $conn->query($sql_praktik);
        $d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $ex) {
        echo "<script>alert('$ex -DATA PRAKTIK-');document.location.href='?error404';</script>";
    }

    //data tarif praktik
    $sql_praktik_tarif = "SELECT * FROM tb_bayar";
    $sql_praktik_tarif .= " WHERE id_praktik = '" . base64_decode(urldecode($_GET['pbyr'])) . "'";
    // echo $id_praktik . "<br>";

    try {
        $q_praktik_tarif = $conn->query($sql_praktik_tarif);
    } catch (Exception $ex) {
        echo "<script> alert('$ex -DATA BAYAR-'); ";
        echo "document.location.href='?error404'; </script>";
    }
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Pembayaran Praktik</h1>
            </div>
        </div>
        <div class="row">
            <?php
            // echo $sql_praktik;
            ?>
            <!-- Data Rincian Pembayaran Chart -->
            <div class="col-md-12">

                <div class="card shadow mb-4 mt-3">
                    <div class="card-body">
                        <div class="row text-center h6 text-gray-900 ">
                            <div class="col-md">
                                Nama Kelompok : <br>
                                <b><?= $d_praktik['nama_praktik']; ?></b>
                                <hr>
                                Jumlah Praktik : <br>
                                <b><?= $d_praktik['jumlah_praktik']; ?></b>
                            </div>
                            <div class="col-md">
                                Tanggal Mulai : <br>
                                <b><?= tanggal($d_praktik['tgl_mulai_praktik']); ?></b>
                                <hr>
                                Tanggal Selesai : <br>
                                <b><?= tanggal($d_praktik['tgl_selesai_praktik']); ?></b>
                            </div>
                            <div class="col-md-2  my-auto">
                                <a class="btn btn-outline-success btn-sm" href="<?= $d_praktik['fileInv_praktik']; ?>" title="Invoice" download="invoice">
                                    Unduh Invoice
                                </a>
                                <hr>
                                <!-- tombol modal rincian pembayaran -->
                                <a class='btn btn-outline-primary btn-sm tambah_init' href='#' data-toggle='modal' data-target='#rincianTarif'>
                                    Rincian Pembayaran
                                </a>
                                <!-- modal rincian pembayaran -->
                                <div class="modal fade text-left" id="rincianTarif">
                                    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <form class="form-data text-gray-900" method="post" enctype="multipart/form-data" id="form_sbayar">
                                                <div class="modal-header">
                                                    <b>RINCIAN PEMBAYARAN</b>
                                                </div>
                                                <div class="modal-body">
                                                    <?php

                                                    //data tarif praktik
                                                    $sql_praktik_tarif = "SELECT * FROM tb_tarif_pilih";
                                                    $sql_praktik_tarif .= " WHERE id_praktik = '" . base64_decode(urldecode($_GET['pbyr'])) . "'";
                                                    // echo $id_praktik . "<br>";

                                                    try {
                                                        $q_praktik_tarif = $conn->query($sql_praktik_tarif);
                                                    } catch (Exception $ex) {
                                                        echo "<script> alert('$ex -DATA TARIF-'); ";
                                                        echo "document.location.href='?error404'; </script>";
                                                    }

                                                    ?>
                                                    <div class="table-responsive">
                                                        <table class="table table-hover" id="dataTable">
                                                            <thead class="table-dark">
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Nama Jenis</th>
                                                                    <th>Nama Tarif</th>
                                                                    <th>Satuan</th>
                                                                    <th>Tarif</th>
                                                                    <th>Frekuensi</th>
                                                                    <th>Kuantitas</th>
                                                                    <th>Total Tarif</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $no = 1;
                                                                while ($d_praktik_tarif = $q_praktik_tarif->fetch(PDO::FETCH_ASSOC)) {
                                                                ?>
                                                                    <tr>
                                                                        <td><?= $no; ?></td>
                                                                        <td><?= $d_praktik_tarif['nama_jenis_tarif_pilih']; ?></td>
                                                                        <td><?= $d_praktik_tarif['nama_tarif_pilih']; ?></td>
                                                                        <td><?= "Rp " . number_format($d_praktik_tarif['nominal_tarif_pilih'], 0, ",", "."); ?></td>
                                                                        <td><?= $d_praktik_tarif['nama_satuan_tarif_pilih']; ?></td>
                                                                        <td><?= $d_praktik_tarif['frekuensi_tarif_pilih']; ?></td>
                                                                        <td><?= $d_praktik_tarif['kuantitas_tarif_pilih']; ?></td>
                                                                        <td><?= "Rp " . number_format($d_praktik_tarif['jumlah_tarif_pilih'], 0, ",", "."); ?></td>
                                                                    </tr>
                                                                <?php
                                                                    $no++;
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <!-- Card Body -->
                    <div class="card-body">
                        <?php
                        $sql_jumlahTotal = "SELECT SUM(jumlah_tarif_pilih) AS jumlahTotal FROM tb_tarif_pilih";
                        try {
                            $q_jumlahTotal = $conn->query($sql_jumlahTotal);
                            $d_jumlahTotal = $q_jumlahTotal->fetch(PDO::FETCH_ASSOC);
                        } catch (Exception $ex) {
                            echo "<script>alert('$ex -DATA PRAKTIK-');document.location.href='?error404';</script>";
                        }
                        ?>
                        <div class="jumbotron">
                            <div class="jumbotron-fluid">
                                <div class="h5 text-gray-700 text-center">
                                    <div class="mb-2">
                                        Perlu kami informasikan pembayaran dapat ditransfer Ke Rekening <br>
                                        an. <b>PEMEGANG KAS RSJ PROV JABAR BLUD</b> dengan nomor : <b>BJB - 0063028738002</b>.<br>
                                    </div>
                                    <div class="mb-2">
                                        JUMLAH TOTAL PEMBAYARAN : <span class="b u"><?= "Rp " . number_format($d_jumlahTotal['jumlahTotal'], 0, ",", "."); ?> </span><br>
                                        KODE PEMBAYARAN : <span class="b u text-danger"><?= $d_praktik['kode_bayar_praktik']  ?> </span>
                                    </div>
                                    <!-- tombol modal rincian pembayaran -->
                                    <a class='btn btn-outline-danger tambah_init m-1' href='#' data-toggle='modal' data-target='#rincian'>
                                        Isi Bukti Pembayaran Disini
                                    </a>

                                    <!-- modal rincian pembayaran -->
                                    <div class="modal fade" id="rincian" data-backdrop="static">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form class="form-data text-gray-900" method="post" enctype="multipart/form-data" id="form_sbayar">
                                                    <div class="modal-header">
                                                        <b>BUKTI DATA PEMABAYARAN</b>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body  b">
                                                        <form enctype="multipart/form-data" class="form-group" method="post" id="form_t">
                                                            Kode Pembayaran : <span class="text-danger"><?= $d_praktik['kode_bayar_praktik'] ?></span>
                                                            <input type="hidden" id="t_kode" name="t_kode" value="<?= $d_praktik['kode_bayar_praktik'] ?>" required><br><br>

                                                            Atas Nama :<span style="color:red">*</span><br>
                                                            <input class="form-control" type="text" id="t_atasNama" name="t_atasNama" placeholder="Isikan Atas Nama Pembayaran" required>
                                                            <div class="text-xs font-italic text-danger blink" id="err_t_atasNama"></div><br>

                                                            No. Rekening/Lainnya : <span style="color:red">*</span><br>
                                                            <input class="form-control" type="text" id="t_noRek" name="t_noRek" placeholder="Isikan No. Rekening/Lainnya" required>
                                                            <div class="text-xs font-italic text-danger blink" id="err_t_noRek"></div><br>

                                                            Pembayaran: <span style="color:red">*</span><br>
                                                            <input class="form-control" type="text" id="t_melalui" name="t_melalui" placeholder="Isikan Pembayaran Melalui" required>
                                                            <span class='i text-xs'>BJB, BNI, BRI, BTN, Mandiri, GoPay, ShoppePay, dll.</span><br>
                                                            <div class="text-xs font-italic text-danger blink" id="err_t_melalui"></div><br>

                                                            Tanggal Transfer : <span style="color:red">*</span><br>
                                                            <input class="form-control" type="date" id="t_tglTF" name="t_tglTF" required>
                                                            <div class="text-xs font-italic text-danger blink" id="err_t_tglTF"></div><br>

                                                            Unggah File : <span style="color:red">*</span><br>
                                                            <div class="custom-file">
                                                                <label class="custom-file-label text-md" for="customFile" id="labelfileinput">Pilih File</label>
                                                                <input type="file" class="custom-file-input" id="t_file" name="t_file" accept="application/pdf, image/jpg, image/png, image/jpeg" required>
                                                                <span class='i text-xs'>Data unggah harus pdf/jpg/png/jpeg, Maksimal 200 Kb</span><br>
                                                                <div class="text-xs font-italic text-danger blink" id="err_t_file"></div><br>
                                                                <script>
                                                                    $('.custom-file-input').on('change', function() {
                                                                        var fileName = $(this).val();
                                                                        $('#labelfileinput').html(fileName);
                                                                    })
                                                                </script>
                                                            </div>
                                                            Keterangan : <br>
                                                            <textarea class="form-control" id="t_ket" name="t_ket"></textarea>
                                                            <hr>
                                                            <a class="btn btn-outline-success tambah">
                                                                <i class=" fas fa-paper-plane"></i> Kirim Bukti Pembayaran
                                                            </a>
                                                        </form>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    Bukti transfer dikirim juga melalui :
                                    <br> <i class="fas fa-envelope"></i> <b>Email</b> diklit.rsj.jabarprov@gmail.com
                                    <br> <i class="fab fa-whatsapp"></i> <b>WhatsApp</b> Atas Nama Bendahara Penerimaan RSJ (081321412643)<br>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div id="data_bayar"></div>
                        <script>
                            $('#data_bayar')
                                .load(
                                    "_admin/insert/i_praktik_bayarData.php?" +
                                    "idu=<?= urlencode(base64_encode($_SESSION['id_user'])); ?>" +
                                    "&idp=<?= urlencode(base64_encode($d_praktik['id_praktik'])); ?>"
                                );

                            <?php if ($d_prvl['c_praktik_bayar'] == 'Y') { ?>
                                // inisiasi klik modal tambah
                                $(".tambah_init").click(function() {
                                    console.log("tambah_init");
                                    $("#err_t_atasNama").empty();
                                    $("#err_t_noRek").empty();
                                    $("#err_t_melalui").empty();
                                    $("#err_t_tglTF").empty();
                                    $("#err_t_file").empty();
                                    $("#form_t").trigger("reset");
                                });

                                // inisiasi klik modal tambah simpan
                                $(document).on('click', '.tambah', function() {
                                    console.log("tambah");
                                    var data_t = $("#from_t").serializeArray();
                                    data_t.push({
                                        name: "idp",
                                        value: '<?= base64_decode(urldecode($_GET['pbyr'])) ?>'
                                    });

                                    var t_atasNama = $('#t_atasNama').val();
                                    var t_noRek = $('#t_noRek').val();
                                    var t_melalui = $('#t_melalui').val();
                                    var t_tglTF = $('#t_tglTF').val();
                                    var t_file = $('#t_file').val();

                                    //cek data from modal tambah bila tidak diiisi
                                    if (
                                        t_atasNama == "" ||
                                        t_noRek == "" ||
                                        t_melalui == "" ||
                                        t_tglTF == "" ||
                                        t_file == ""
                                    ) {
                                        // console.log("error data");

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
                                            icon: 'warning',
                                            title: '<b>DATA ADA YANG BELUM TERISI</b>',
                                        });

                                        if (t_atasNama == "") {
                                            $("#err_t_atasNama").html("Atas Nama Harus Diisi");
                                        } else {
                                            $("#err_t_atasNama").html("");
                                        }

                                        if (t_noRek == "") {
                                            $("#err_t_noRek").html("Nomor Rekening Harus Diisi");
                                        } else {
                                            $("#err_t_noRek").html("");
                                        }

                                        if (t_melalui == "") {
                                            $("#err_t_melalui").html("Pembayaran Harus Diisi");
                                        } else {
                                            $("#err_t_melalui").html("");
                                        }

                                        if (t_tglTF == "") {
                                            $("#err_t_tglTF").html("Tanggal Pembayaran Harus Diisi");
                                        } else {
                                            $("#err_t_tglTF").html("");
                                        }

                                        if (t_file == "") {
                                            $("#err_t_file").html("File Bukti Bayar Harus Diunggah");
                                        } else {
                                            $("#err_t_file").html("");
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
                                                    .load(
                                                        "_admin/view/v_praktik_tarifData.php?" +
                                                        "idu=<?= urlencode(base64_encode($_SESSION['id_user'])); ?>" +
                                                        "&idp=<?= urlencode(base64_encode($d_praktik['id_praktik'])); ?>" +
                                                        "&tb=<?= md5($d_praktik['id_praktik']); ?>");

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
                                                    title: '<span class"text-centere"><b>Data Tarif</b><br>Berhasil Tersimpan',
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
                            <?php } ?>
                        </script>
                    </div>


                </div>
            </div>
        </div>
    </div>
<?php } else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
