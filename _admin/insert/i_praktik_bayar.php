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
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <div class="row">
                <div class="col-md">
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
                                <div class="h6 text-gray-700 text-center">
                                    <div class="mb-2">
                                        <?php if ($d_prvl['level_user'] == 1) { ?>
                                            <!-- tombol modal unduh/unggah invoice pembayaran -->
                                            <a class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='#invoice'>
                                                Unduh dan Unggah Invoice
                                            </a>

                                            <!-- modal rincian pembayaran -->
                                            <div class="modal fade" id="invoice">
                                                <div class="modal-dialog modal-sm modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <b>FILE INVOICE</b>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <span class="b"> Invoice untuk di Tanda Tangan </span><br><br>
                                                            <form id="form_non_ttd" method="POST">
                                                                <input type="hidden" id="idp" name="idp">
                                                                No Surat RSJ : <span class="text-danger">*</span><br>
                                                                <input type="text" class="form-control" id="no_surat" name="no_surat" required><br>
                                                                Ditujukan Kepada : <span class="text-danger">*</span><br>
                                                                <input type="text" class="form-control" id="kepada" name="kepada" required><br>
                                                                <a class="btn btn-outline-primary btn-sm">
                                                                    <i class="fa-solid fa-file-word"></i> .docx (WORD)
                                                                </a>
                                                                <a class="btn btn-outline-danger btn-sm" href="<?= "./_print/p_praktik_invoice.php?idp=" . $_GET['pbyr'] .
                                                                                                                    "&ns" ?>" download="invoice_non_ttd">
                                                                    <i class="fa-solid fa-file-pdf"></i>.pdf (PDF)
                                                                </a>
                                                            </form>
                                                            <script>
                                                            </script>
                                                            <hr>

                                                            Unggah File Invoice yang Sudah di Tanda Tangan : <span style="color:red">*</span><br>
                                                            <div class="custom-file">
                                                                <label class="custom-file-label text-md bg-primary text-danger" for="customFile" id="labelfileinput">Pilih File</label>
                                                                <input type="file" class="custom-file-input bg-primary text-white" id="t_file_invoice" name="t_file_invoice" accept="application/pdf" required>
                                                                <span class='i text-xs'>Data unggah harus pdf, Maksimal 200 Kb</span><br>
                                                                <div class="text-xs font-italic text-danger blink" id="err_t_file_invoice"></div><br>
                                                                <script>
                                                                    $('.custom-file-input').on('change', function() {
                                                                        var fileName = $(this).val();
                                                                        $('#labelfileinput').html(fileName);
                                                                    })
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <!-- tombol modal rincian pembayaran -->
                                        <a class='btn btn-outline-primary btn-sm tambah_init' href='#' data-toggle='modal' data-target='#rincianTarif'>
                                            Rincian Pembayaran
                                        </a>
                                        <!-- modal rincian pembayaran -->
                                        <div class="modal fade text-left" id="rincianTarif">
                                            <div class="modal-dialog modal-xl" role="document">
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
                                    <div class="mb-2">
                                        <?php if ($d_praktik['fileInv_praktik'] != "") { ?>
                                            <a class="btn btn-outline-success btn-sm" href="<?= $d_praktik['fileInv_praktik']; ?>" title="Invoice" download="invoice">
                                                Unduh Invoice
                                            </a>
                                        <?php } else { ?>
                                            <span class="badge badge-primary blink">Invoice Sedang Diproses</span>
                                        <?php } ?>
                                        <br>
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
                                            <div class="modal-content ">
                                                <form enctype="multipart/form-data" class="form-group" method="post" id="form_t">
                                                    <div class="modal-header">
                                                        <b>BUKTI DATA PEMABAYARAN</b>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body  b">
                                                        <?php

                                                        //Cari id_bayar
                                                        $no = 1;
                                                        $sql = "SELECT id_bayar FROM tb_bayar ORDER BY id_bayar ASC";
                                                        $q = $conn->query($sql);
                                                        if ($q->rowCount() > 0) {
                                                            while ($d = $q->fetch(PDO::FETCH_ASSOC)) {
                                                                if ($no != $d['id_bayar']) {
                                                                    break;
                                                                }
                                                                $no++;
                                                            }
                                                        }
                                                        $id_bayar = $no;
                                                        ?>
                                                        <input type="hidden" id="idb" name="idb" value="<?= urlencode(base64_encode($id_bayar)) ?>" required>
                                                        <input type="hidden" id="t_kode" name="t_kode" value="<?= $d_praktik['kode_bayar_praktik'] ?>" required>
                                                        Kode Pembayaran : <span class="text-danger"><?= $d_praktik['kode_bayar_praktik'] ?></span><br><br>

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
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md">
                <div class="card shadow mb-4">
                    <!-- Card Body -->
                    <div class="card-body">
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


                                    //eksekusi bila file bukti
                                    if (t_file != "" && t_file != undefined) {

                                        //Cari ekstensi file bukti yg diupload
                                        var typeFile = document.querySelector('#t_file').value;
                                        var getTypeFile = typeFile.split('.').pop();
                                        // console.log(getTypeFile)

                                        //cari ukuran file bukti yg diupload
                                        var file = document.getElementById("t_file").files;
                                        var getSizeFile = document.getElementById("t_file").files[0].size / 1024;
                                        // console.log(getSizeFile)

                                        //Toast bila upload file bukti tipe tidak sesuai
                                        if (!(
                                                getTypeFile == 'pdf' ||
                                                getTypeFile == 'png' ||
                                                getTypeFile == 'jpg' ||
                                                getTypeFile == 'jpeg'
                                            )) {
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
                                                title: '<div class="text-md text-center">Data unggah harus <b>pdf/jpg/png/jpeg</b></div>'
                                            });
                                            $("#err_t_file").html("file bukti Harus pdf/jpg/png/jpeg");
                                        } //Toast bila upload file bukti ukuran tidak sesuai 
                                        else if (getSizeFile > 256) {
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
                                                title: '<div class="text-md text-center">file bukti Harus <br><b>Kurang dari 200 Kb</b></div>'
                                            });
                                            $("#err_t_file").html("file bukti Harus Kurang dari 200 Kb");
                                        }
                                    }

                                    //simpan data tambah bila sudah sesuai
                                    if (
                                        t_atasNama != "" &&
                                        t_noRek != "" &&
                                        t_melalui != "" &&
                                        t_tglTF != "" &&
                                        t_file != "" && (
                                            getTypeFile == "pdf" ||
                                            getTypeFile == "png" ||
                                            getTypeFile == "jpg" ||
                                            getTypeFile == "jpeg"
                                        ) &&
                                        getSizeFile < 256
                                    ) {
                                        console.log("tambah data");

                                        var data_t = $("#form_t").serializeArray();
                                        data_t.push({
                                            name: "idu",
                                            value: '<?= urlencode(base64_encode($_SESSION['id_user'])) ?>'
                                        }, {
                                            name: "idp",
                                            value: '<?= urlencode(base64_encode($d_praktik['id_praktik'])) ?>'
                                        });
                                        $.ajax({
                                            type: 'POST',
                                            url: "_admin/exc/x_i_praktik_bayar_t.php",
                                            data: data_t,
                                            success: function() {
                                                //ambil data file yang diupload
                                                var data_file = new FormData();
                                                var xhttp = new XMLHttpRequest();

                                                var file = document.getElementById("t_file").files;
                                                data_file.append("t_file", file[0]);

                                                var idb = $("#idb").val();
                                                data_file.append("idb", idb);
                                                data_file.append("idp", "<?= $_GET['pbyr'] ?>");

                                                xhttp.open("POST", "_admin/exc/x_i_praktik_bayar_tFile.php", true);
                                                xhttp.send(data_file);

                                                $('#data_bayar')
                                                    .load(
                                                        "_admin/insert/i_praktik_bayarData.php?" +
                                                        "idu=<?= urlencode(base64_encode($_SESSION['id_user'])); ?>" +
                                                        "&idp=<?= urlencode(base64_encode($d_praktik['id_praktik'])); ?>"
                                                    );

                                                $("#err_t_atasNama").empty();
                                                $("#err_t_noRek").empty();
                                                $("#err_t_melalui").empty();
                                                $("#err_t_tglTF").empty();
                                                $("#err_t_file").empty();
                                                $("#form_t").trigger("reset");

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
                                                    title: '<b>Data Tarif</b><br>Berhasil Tersimpan',
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
