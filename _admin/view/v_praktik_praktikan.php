<?php if (isset($_GET['ptkn']) && $d_prvl['r_praktikan'] == "Y") { ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Daftar Praktikan</h1>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <?php
                $sql_praktik = "SELECT * FROM tb_praktik ";
                $sql_praktik .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi ";
                $sql_praktik .= " JOIN tb_profesi_pdd ON tb_praktik.id_profesi_pdd = tb_profesi_pdd.id_profesi_pdd ";
                $sql_praktik .= " JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd ";
                $sql_praktik .= " JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd ";
                // $sql_praktik .= " JOIN tb_mess_pilih ON tb_praktik.id_praktik = tb_mess_pilih.id_praktik";
                $sql_praktik .= " JOIN tb_jurusan_pdd_jenis ON tb_jurusan_pdd.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis ";
                $sql_praktik .= " WHERE tb_praktik.status_praktik = 'Y' ";
                $sql_praktik .= " ORDER BY tb_praktik.id_praktik DESC";
                // echo $sql_praktik . "<br>";
                try {
                    $q_praktik = $conn->query($sql_praktik);
                } catch (Exception $ex) {
                    echo "<script>alert('$ex -DATA PRAKTIK-');";
                    echo "document.location.href='?error404';</script>";
                }
                $r_praktik = $q_praktik->rowCount();

                if ($r_praktik > 0) {
                    while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {

                        $sql_mess_pilih = "SELECT * FROM tb_mess_pilih";
                        $sql_mess_pilih .= " WHERE id_praktik =  " . $d_praktik['id_praktik'];
                        // echo $sql_mess_pilih . "<br>";
                        try {
                            $q_mess_pilih = $conn->query($sql_mess_pilih);
                            $r_mess_pilih = $q_mess_pilih->rowCount();
                        } catch (Exception $ex) {
                            echo "<script>alert('$ex -DATA MESS PILIH-');";
                            echo "document.location.href='?error404';</script>";
                        }
                        if ($d_praktik['status_mess_praktik'] == 'T' || $r_mess_pilih > 0) {
                ?>
                            <div id="accordion<?= md5($d_praktik['id_praktik']) ?>">
                                <div class="card">
                                    <div class="card-header align-items-center bg-gray-200">
                                        <div class="row" style="font-size: small;">
                                            <br><br>
                                            <div class="col-sm-4 text-center m-auto">
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
                                            <div class="col-sm-2 text-center">
                                                <b class="text-gray-800">PROFESI : </b><br><?= $d_praktik['nama_profesi_pdd']; ?><br>
                                                <b class="text-gray-800">JUMLAH PRAKTIKAN : </b><br><?= $d_praktik['jumlah_praktik']; ?>
                                            </div>
                                            <!-- tombol aksi/info proses  -->
                                            <div class="col-sm-2 my-auto text-right">
                                                <!-- tombol rincian -->
                                                <a class="btn btn-info btn-sm collapsed" data-toggle="collapse" data-target="#rincian<?= md5($d_praktik['id_praktik']); ?>" title="Rincian">
                                                    <i class="fas fa-info-circle"></i> Rincian Data
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- collapse data praktikan -->
                                    <div id="rincian<?= md5($d_praktik['id_praktik']); ?>" class="collapse" data-parent="#accordion<?= md5($d_praktik['id_praktik']) ?>">
                                        <div class="card-body " style="font-size: medium;">
                                            <!-- data praktikan -->
                                            <div class="text-gray-700 row mb-0">
                                                <div class="col">
                                                    <h4 class="font-weight-bold">DATA PRAKTIKAN</h4><br>
                                                </div>
                                                <?php if ($d_prvl['c_praktikan'] == 'Y') { ?>
                                                    <div class="col-2 text-right">
                                                        <!-- tombol modal tambah praktikan  -->
                                                        <a title="tambah praktikan" class='btn btn-success btn-sm tambah_init<?= md5($d_praktik['id_praktik']); ?>' href='#' data-toggle="modal" data-target="#mi<?= md5($d_praktik['id_praktik']); ?>">
                                                            <i class="fas fa-plus"></i> Tambah Data
                                                        </a>

                                                        <!-- modal tambah praktikan  -->
                                                        <div class="modal text-center" id="mi<?= md5($d_praktik['id_praktik']); ?>" data-backdrop="static">
                                                            <div class="modal-dialog modal-dialog-scrollable  modal-md">
                                                                <div class="modal-content">
                                                                    <div class="modal-header h5">
                                                                        Tambah Praktikan
                                                                    </div>
                                                                    <div class="modal-body text-md">
                                                                        <form class="form-data b" method="post" id="form_t<?= md5($d_praktik['id_praktik']); ?>">
                                                                            Foto Formal : <span style="color:red">*</span><br>
                                                                            <img width="100px" height="120px" id="t_fotoout<?= md5($d_praktik['id_praktik']); ?>" class="mb-2" style="width: 100px; height: 120px; background: url(./_img/defaultfoto.png) center center/cover no-repeat;">
                                                                            <br>
                                                                            <div class="custom-file">
                                                                                <label class="custom-file-label text-xs" for="customFile" id="labelfoto<?= md5($d_praktik['id_praktik']); ?>">Pilih File</label>
                                                                                <input type="file" class="custom-file-input mb-1" name="t_foto" id="t_foto<?= md5($d_praktik['id_praktik']); ?>" accept=".jpg">
                                                                                <span class='i text-xs'>Data unggah harus jpg, Maksimal 200 Kb</span><br>
                                                                                <div class="text-danger b i text-xs blink" id="err_t_foto<?= md5($d_praktik['id_praktik']); ?>"></div><br>
                                                                                <script>
                                                                                    $('#t_foto<?= md5($d_praktik['id_praktik']); ?>').on('change', function(evt) {
                                                                                        //label input
                                                                                        var fileFoto = $(this).val();
                                                                                        fileFoto = fileFoto.replace(/^.*[\\\/]/, '');
                                                                                        if (fileFoto == "") fileFoto = "Pilih File Foto";
                                                                                        $('#labelfoto<?= md5($d_praktik['id_praktik']); ?>').html(fileFoto);

                                                                                        // load Image
                                                                                        var tgt = evt.target || window.event.srcElement,
                                                                                            files = tgt.files;

                                                                                        if (FileReader && files && files.length) {
                                                                                            var fr = new FileReader();
                                                                                            fr.onload = function() {
                                                                                                document.getElementById('t_fotoout<?= md5($d_praktik['id_praktik']); ?>').src = fr.result;
                                                                                            }
                                                                                            fr.readAsDataURL(files[0]);
                                                                                        }
                                                                                        //disable drag
                                                                                        document.getElementById('t_fotoout<?= md5($d_praktik['id_praktik']); ?>').setAttribute('draggable', false);
                                                                                        // $('#t_fotoout<?= md5($d_praktik['id_praktik']); ?>').setAttribute('draggable', false);

                                                                                    });
                                                                                </script>
                                                                            </div>
                                                                            <script>
                                                                            </script>
                                                                            No. ID Praktikan (NIM/NPM/NIP) : <span style="color:red">*</span><br>
                                                                            <input type="text" id="t_no_id<?= md5($d_praktik['id_praktik']); ?>" name="t_no_id" class="form-control" placeholder="Isikan No ID" required>
                                                                            <div class="text-danger b i text-xs blink" id="err_t_no_id<?= md5($d_praktik['id_praktik']); ?>"></div><br>
                                                                            Nama Siswa/Mahasiswa : <span style="color:red">*</span><br>
                                                                            <input type="text" id="t_nama<?= md5($d_praktik['id_praktik']); ?>" name="t_nama" class="form-control" placeholder="Inputkan Nama Siswa/Mahasiswa" required>
                                                                            <div class="text-danger b i text-xs blink" id="err_t_nama<?= md5($d_praktik['id_praktik']); ?>"></div><br>
                                                                            Tanggal Lahir : <span style="color:red">*</span><br>
                                                                            <input type="date" id="t_tgl<?= md5($d_praktik['id_praktik']); ?>" name="t_tgl" class="form-control" required>
                                                                            <div class="text-danger b i text-xs blink" id="err_t_tgl<?= md5($d_praktik['id_praktik']); ?>"></div><br>
                                                                            Alamat : <span style="color:red">*</span><br>
                                                                            <textarea id="t_alamat<?= md5($d_praktik['id_praktik']); ?>" name="t_alamat" class="form-control" rows="2" placeholder="Inputkan Alamat"></textarea>
                                                                            <div class="text-danger b i text-xs blink" id="err_t_alamat<?= md5($d_praktik['id_praktik']); ?>"></div><br>
                                                                            No Telepon : <span style="color:red">*</span><br>
                                                                            <input type="number" id="t_telpon<?= md5($d_praktik['id_praktik']); ?>" name="t_telpon" class="form-control" min="1" placeholder="Inputkan No Telpon" required>
                                                                            <div class="text-danger b i text-xs blink" id="err_t_telpon<?= md5($d_praktik['id_praktik']); ?>"></div><br>
                                                                            No WhatsApp :<br>
                                                                            <input type="number" id="t_wa<?= md5($d_praktik['id_praktik']); ?>" name="t_wa" class="form-control" min="1" placeholder="Inputkan WhatsApp">
                                                                            <br>
                                                                            E-Mail : <br>
                                                                            <input type="email" id="t_email<?= md5($d_praktik['id_praktik']); ?>" name="t_email" class="form-control" placeholder="Inputkan E-Mail"><br>
                                                                            <?php if ($d_praktik['id_profesi_pdd'] > 0) { ?>
                                                                                File Ijazah :<span style="color:red">*</span><br>
                                                                                <div class="custom-file">
                                                                                    <label class="custom-file-label text-xs" for="customFile" id="labelfileijazah<?= md5($d_praktik['id_praktik']); ?>">Pilih File</label>
                                                                                    <input type="file" class="custom-file-input mb-1" id="t_ijazah<?= md5($d_praktik['id_praktik']); ?>" name="t_ijazah<?= md5($d_praktik['id_praktik']); ?>" accept="application/pdf" required>
                                                                                    <span class='i text-xs'>Data unggah harus pdf, Maksimal 200 Kb</span><br>
                                                                                    <div class="text-xs font-italic text-danger blink" id="err_t_ijazah<?= md5($d_praktik['id_praktik']); ?>"></div><br>
                                                                                    <script>
                                                                                        $('#t_ijazah<?= md5($d_praktik['id_praktik']); ?>').on('change', function() {
                                                                                            var fileNameIjazah = $(this).val();
                                                                                            fileNameIjazah = fileNameIjazah.replace(/^.*[\\\/]/, '');
                                                                                            if (fileNameIjazah == "") fileNameIjazah = "Pilih File";
                                                                                            $('#labelfileijazah<?= md5($d_praktik['id_praktik']); ?>').html(fileNameIjazah);
                                                                                        })
                                                                                    </script>
                                                                                </div>
                                                                                <br>
                                                                            <?php } ?>
                                                                            File Swab/Serfikat Vaksin :<span style="color:red">*</span><br>
                                                                            <div class="custom-file">
                                                                                <label class="custom-file-label text-xs" for="customFile" id="labelfileswab<?= md5($d_praktik['id_praktik']); ?>">Pilih File</label>
                                                                                <input type="file" class="custom-file-input mb-1" id="t_swab<?= md5($d_praktik['id_praktik']); ?>" name="t_swab<?= md5($d_praktik['id_praktik']); ?>" accept="application/pdf" required>
                                                                                <span class='i text-xs'>Data unggah harus pdf, Maksimal 200 Kb</span><br>
                                                                                <div class="text-xs font-italic text-danger blink" id="err_t_swab<?= md5($d_praktik['id_praktik']); ?>"></div><br>
                                                                                <script>
                                                                                    $('#t_swab<?= md5($d_praktik['id_praktik']); ?>').on('change', function() {
                                                                                        var fileNameSwab = $(this).val();
                                                                                        fileNameSwab = fileNameSwab.replace(/^.*[\\\/]/, '');
                                                                                        if (fileNameSwab == "") fileNameSwab = "Pilih File";
                                                                                        $('#labelfileswab<?= md5($d_praktik['id_praktik']); ?>').html(fileNameSwab);
                                                                                    })
                                                                                </script>
                                                                            </div>
                                                                            <br>
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer text-md">
                                                                        <a class="btn btn-danger btn-sm tambah_tutup<?= md5($d_praktik['id_praktik']); ?>" data-dismiss="modal">
                                                                            Kembali
                                                                        </a>
                                                                        &nbsp;
                                                                        <a class="btn btn-success btn-sm tambah<?= md5($d_praktik['id_praktik']); ?>" id="<?= bin2hex(urlencode(base64_encode($d_praktik['id_praktik'] . "*sm*" . date('Y-m-d h:i:s')))); ?>">
                                                                            Simpan
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <!-- inisiasi tabel data praktikan -->
                                            <div id="<?= md5("data" . $d_praktik['id_praktik']); ?>"></div>
                                            <script>
                                                $(document).ready(function() {

                                                    $(function() {
                                                        // check if there is a hash in the url
                                                        if (window.location.hash != '') {
                                                            // remove any accordion panels that are showing (they have a class of 'in')
                                                            $('.collapse').removeClass('in');

                                                            // show the panel based on the hash now:
                                                            $(window.location.hash + '.collapse').collapse('show');
                                                        }
                                                    });
                                                    Swal.fire({
                                                        title: 'Mohon Ditunggu . . .',
                                                        html: ' <img src="./_img/d3f472b06590a25cb4372ff289d81711.gif" class="rotate mb-3" width="100" height="100" />',
                                                        // add html attribute if you want or remove
                                                        allowOutsideClick: false,
                                                        showConfirmButton: false,
                                                    });
                                                    $('#<?= md5("data" . $d_praktik['id_praktik']); ?>')
                                                        .load(
                                                            "_admin/view/v_praktik_praktikanData.php?" +
                                                            "idu=<?= bin2hex(urlencode(base64_encode($_SESSION['id_user'] . "*sm*" . date('Y-m-d h:i:s')))); ?>" +
                                                            "&idp=<?= bin2hex(urlencode(base64_encode($d_praktik['id_praktik'] . "*sm*" . date('Y-m-d h:i:s')))); ?>" +
                                                            "&tb=<?= md5($d_praktik['id_praktik']); ?>");
                                                    Swal.close();
                                                });


                                                // inisiasi klik modal tambah
                                                $(".tambah_init<?= md5($d_praktik['id_praktik']); ?>").click(function() {
                                                    console.log("tambah_init<?= md5($d_praktik['id_praktik']); ?>");
                                                    $('#err_t_foto<?= md5($d_praktik['id_praktik']); ?>').empty();
                                                    $('#err_t_no_id<?= md5($d_praktik['id_praktik']); ?>').empty();
                                                    $('#err_t_nama<?= md5($d_praktik['id_praktik']); ?>').empty();
                                                    $('#err_t_tgl<?= md5($d_praktik['id_praktik']); ?>').empty();
                                                    $('#err_t_alamat<?= md5($d_praktik['id_praktik']); ?>').empty();
                                                    $('#err_t_telpon<?= md5($d_praktik['id_praktik']); ?>').empty();
                                                    <?php if ($d_praktik['id_profesi_pdd'] > 0) { ?>
                                                        $('#err_t_ijazah<?= md5($d_praktik['id_praktik']); ?>').empty();
                                                    <?php } ?>
                                                    $('#err_t_swab<?= md5($d_praktik['id_praktik']); ?>').empty();
                                                });

                                                // inisiasi klik modal tambah  tutup
                                                $(".tambah_tutup<?= md5($d_praktik['id_praktik']); ?>").click(function() {
                                                    console.log("tambah_tutup<?= md5($d_praktik['id_praktik']); ?>");
                                                    $("#form_t<?= md5($d_praktik['id_praktik']); ?>").trigger("reset");
                                                    <?php if ($d_praktik['id_profesi_pdd'] > 0) { ?>
                                                        $("#file_ijazah<?= md5($d_praktik['id_praktik']); ?>").val("").trigger("change");
                                                    <?php } ?>
                                                    $("#file_swab<?= md5($d_praktik['id_praktik']); ?>").val("").trigger("change");
                                                    $("#t_foto<?= md5($d_praktik['id_praktik']); ?>").val("").trigger("change");
                                                });


                                                // inisiasi klik modal tambah simpan
                                                $(document).on('click', '.tambah<?= md5($d_praktik['id_praktik']); ?>', function() {

                                                    // console.log("tambah<?= md5($d_praktik['id_praktik']); ?>");
                                                    var idp = $(this).attr('id');
                                                    var data_t = $("#form_t<?= md5($d_praktik['id_praktik']); ?>").serializeArray();
                                                    data_t.push({
                                                        name: "idp",
                                                        value: idp
                                                    });
                                                    var t_foto = $('#t_foto<?= md5($d_praktik['id_praktik']); ?>').val();
                                                    var t_no_id = $('#t_no_id<?= md5($d_praktik['id_praktik']); ?>').val();
                                                    var t_nama = $('#t_nama<?= md5($d_praktik['id_praktik']); ?>').val();
                                                    var t_tgl = $('#t_tgl<?= md5($d_praktik['id_praktik']); ?>').val();
                                                    var t_alamat = $('#t_alamat<?= md5($d_praktik['id_praktik']); ?>').val();
                                                    var t_telpon = $('#t_telpon<?= md5($d_praktik['id_praktik']); ?>').val();
                                                    <?php if ($d_praktik['id_profesi_pdd'] > 0) { ?>
                                                        var t_ijazah = $('#t_ijazah<?= md5($d_praktik['id_praktik']); ?>').val();
                                                    <?php } ?>
                                                    var t_swab = $('#t_swab<?= md5($d_praktik['id_praktik']); ?>').val();

                                                    //eksekusi bila file swab terisi
                                                    if (t_foto != "" && t_foto != undefined) {

                                                        //Cari ekstensi file swab yg diupload
                                                        var typeFoto = document.querySelector('#t_foto<?= md5($d_praktik['id_praktik']); ?>').value;
                                                        var getTypeFoto = typeFoto.split('.').pop();

                                                        //cari ukuran file Swab yg diupload
                                                        var fileFoto = document.getElementById("t_foto<?= md5($d_praktik['id_praktik']); ?>").files;
                                                        var getSizeFoto = document.getElementById("t_foto<?= md5($d_praktik['id_praktik']); ?>").files[0].size / 1024;

                                                        console.log("getTypeFoto : " + getTypeFoto);
                                                        console.log("getSizeFoto : " + getSizeFoto);
                                                    }
                                                    <?php if ($d_praktik['id_profesi_pdd'] > 0) { ?>
                                                        //eksekusi bila file ijazah terisi
                                                        if (t_ijazah != "" && t_ijazah != undefined) {

                                                            //Cari ekstensi file ijazah yg diupload
                                                            var typeIjazah = document.querySelector('#t_ijazah<?= md5($d_praktik['id_praktik']); ?>').value;
                                                            var getTypeIjazah = typeIjazah.split('.').pop();

                                                            //cari ukuran file Ijazah yg diupload
                                                            var fileIjazah = document.getElementById("t_ijazah<?= md5($d_praktik['id_praktik']); ?>").files;
                                                            var getSizeIjazah = document.getElementById("t_ijazah<?= md5($d_praktik['id_praktik']); ?>").files[0].size / 1024;

                                                            console.log("getTypeIjazah : " + getTypeIjazah);
                                                            console.log("getSizeIjazah : " + getSizeIjazah);
                                                        }
                                                    <?php } ?>

                                                    //eksekusi bila file swab terisi
                                                    if (t_swab != "" && t_swab != undefined) {

                                                        //Cari ekstensi file swab yg diupload
                                                        var typeSwab = document.querySelector('#t_swab<?= md5($d_praktik['id_praktik']); ?>').value;
                                                        var getTypeSwab = typeSwab.split('.').pop();

                                                        //cari ukuran file Swab yg diupload
                                                        var fileSwab = document.getElementById("t_swab<?= md5($d_praktik['id_praktik']); ?>").files;
                                                        var getSizeSwab = document.getElementById("t_swab<?= md5($d_praktik['id_praktik']); ?>").files[0].size / 1024;

                                                        console.log("getTypeSwab : " + getSizeSwab);
                                                        console.log("getSizeSwab : " + fileSwab);
                                                    }

                                                    //cek data from modal tambah bila tidak diiisi
                                                    if (
                                                        getTypeFoto != 'jpg' ||
                                                        getSizeFoto > 256 ||
                                                        t_foto == "" ||
                                                        t_foto == undefined ||
                                                        t_foto == "" ||
                                                        t_no_id == "" ||
                                                        t_nama == "" ||
                                                        t_tgl == "" ||
                                                        t_alamat == "" ||
                                                        t_telpon == "" ||
                                                        <?php
                                                        if ($d_praktik['id_profesi_pdd'] > 0) {
                                                        ?> getTypeIjazah != 'pdf' ||
                                                            getSizeIjazah > 256 ||
                                                            t_ijazah == "" ||
                                                            t_ijazah == undefined ||
                                                        <?php
                                                        }
                                                        ?> getTypeSwab != 'pdf' ||
                                                        getSizeSwab > 256 ||
                                                        t_swab == "" ||
                                                        t_swab == undefined
                                                    ) {

                                                        if (t_foto == "" || t_foto == undefined)
                                                            $("#err_t_foto<?= md5($d_praktik['id_praktik']); ?>").html("Foto Harus Dipilih");
                                                        else if (getTypeFoto != "jpg")
                                                            $("#err_t_foto<?= md5($d_praktik['id_praktik']); ?>").html("File Foto Harus jpg");
                                                        else if (getSizeFoto > 256)
                                                            $("#err_t_foto<?= md5($d_praktik['id_praktik']); ?>").html("File Foto Harus Kurang dari 200 Kb");
                                                        else
                                                            $("#err_t_foto<?= md5($d_praktik['id_praktik']); ?>").html("");


                                                        <?php if ($d_praktik['id_profesi_pdd'] > 0) { ?>
                                                            if (t_ijazah == "" || t_ijazah == undefined)
                                                                $("#err_t_ijazah<?= md5($d_praktik['id_praktik']); ?>").html("Ijazah Harus Dipilih");
                                                            else if (getTypeIjazah != "pdf")
                                                                $("#err_t_ijazah<?= md5($d_praktik['id_praktik']); ?>").html("File Ijazah Harus pdf");
                                                            else if (getSizeIjazah > 256)
                                                                $("#err_t_ijazah<?= md5($d_praktik['id_praktik']); ?>").html("File Ijazah Harus Kurang dari 200 Kb");
                                                            else
                                                                $("#err_t_ijazah<?= md5($d_praktik['id_praktik']); ?>").html("");
                                                        <?php } ?>

                                                        if (t_swab == "" || t_swab == undefined)
                                                            $("#err_t_swab<?= md5($d_praktik['id_praktik']); ?>").html("Swab/Serfikat Vaksin Harus Dipilih");
                                                        else if (getTypeSwab != "pdf")
                                                            $("#err_t_swab<?= md5($d_praktik['id_praktik']); ?>").html("Swab/Serfikat Vaksin Harus pdf");
                                                        else if (getSizeSwab > 256)
                                                            $("#err_t_swab<?= md5($d_praktik['id_praktik']); ?>").html("Swab/Serfikat Vaksin Harus Kurang dari 200 Kb");
                                                        else
                                                            $("#err_t_swab<?= md5($d_praktik['id_praktik']); ?>").html("");


                                                        if (t_no_id == "") {
                                                            $("#err_t_no_id<?= md5($d_praktik['id_praktik']); ?>").html("No ID Harus Diisi");
                                                        } else {
                                                            $("#err_t_no_id<?= md5($d_praktik['id_praktik']); ?>").html("");
                                                        }

                                                        if (t_nama == "") {
                                                            $("#err_t_nama<?= md5($d_praktik['id_praktik']); ?>").html("Nama Harus Diisi");
                                                        } else {
                                                            $("#err_t_nama<?= md5($d_praktik['id_praktik']); ?>").html("");
                                                        }

                                                        if (t_tgl == "") {
                                                            $("#err_t_tgl<?= md5($d_praktik['id_praktik']); ?>").html("Tanggal Lahir Harus Dipilih");
                                                        } else {
                                                            $("#err_t_tgl<?= md5($d_praktik['id_praktik']); ?>").html("");
                                                        }

                                                        if (t_alamat == "") {
                                                            $("#err_t_alamat<?= md5($d_praktik['id_praktik']); ?>").html("Alamat Harus Diisi");
                                                        } else {
                                                            $("#err_t_alamat<?= md5($d_praktik['id_praktik']); ?>").html("");
                                                        }

                                                        if (t_telpon == "") {
                                                            $("#err_t_telpon<?= md5($d_praktik['id_praktik']); ?>").html("Telpon Harus Diisi");
                                                        } else {
                                                            $("#err_t_telpon<?= md5($d_praktik['id_praktik']); ?>").html("");
                                                        }

                                                        Swal.fire({
                                                            allowOutsideClick: true,
                                                            showConfirmButton: false,
                                                            icon: 'warning',
                                                            html: '<div class="text-lg b">DATA ADA YANG TIDAK SESUAI</div>',
                                                            timer: 3000,
                                                            timerProgressBar: true,
                                                            backdrop: true,
                                                            didOpen: (toast) => {
                                                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                            }
                                                        });
                                                    }
                                                    //simpan data tambah bila sudah sesuai
                                                    else {
                                                        $.ajax({
                                                            type: 'POST',
                                                            url: "_admin/exc/x_v_praktik_praktikan_s.php",
                                                            data: data_t,
                                                            dataType: 'JSON',
                                                            success: function(response) {
                                                                if (response.ket == 'Y') {
                                                                    var data_file = new FormData();
                                                                    var xhttp = new XMLHttpRequest();

                                                                    var fileFoto = document.getElementById("t_foto<?= md5($d_praktik['id_praktik']); ?>").files;
                                                                    data_file.append("t_foto", fileFoto[0]);
                                                                    var fileIjazah = document.getElementById("t_ijazah<?= md5($d_praktik['id_praktik']); ?>").files;
                                                                    data_file.append("t_ijazah", fileIjazah[0]);
                                                                    var fileSwab = document.getElementById("t_swab<?= md5($d_praktik['id_praktik']); ?>").files;
                                                                    data_file.append("t_swab", fileSwab[0]);

                                                                    data_file.append("q", response.q);
                                                                    data_file.append("idpp", response.idpp);
                                                                    data_file.append("idp", idp);

                                                                    xhttp.open("POST", "_admin/exc/x_v_praktik_praktikan_sFile.php", true);

                                                                    xhttp.onload = function() {
                                                                        if (xhttp.response == "<?= base64_decode(urldecode(hex2bin("size"))) ?>") {
                                                                            console.log("size too big");
                                                                            Swal.fire({
                                                                                allowOutsideClick: true,
                                                                                icon: 'warning',
                                                                                html: '<span class="text-danger text-lg text-center">Ukuran File Terlalu Besar</span>',
                                                                                showConfirmButton: false,
                                                                                backdrop: true,
                                                                                timer: 5000,
                                                                                timerProgressBar: true
                                                                            });
                                                                        } else if (xhttp.response == "<?= base64_decode(urldecode(hex2bin("type"))) ?>") {
                                                                            console.log("Tipe Different");
                                                                            Swal.fire({
                                                                                allowOutsideClick: true,
                                                                                icon: 'warning',
                                                                                html: '<span class="text-danger text-lg text-center">Tipe File Berbeda</span>',
                                                                                showConfirmButton: false,
                                                                                backdrop: true,
                                                                                timer: 5000,
                                                                                timerProgressBar: true
                                                                            });
                                                                        } else {
                                                                            console.log("Success");
                                                                            Swal.fire({
                                                                                allowOutsideClick: true,
                                                                                // isDismissed: false,
                                                                                icon: 'success',
                                                                                html: '<span class="text-lg b">Data Berhasil Tersimpan</span>',
                                                                                // html: '<a href="?pkd" class="btn btn-outline-primary">OK</a>',
                                                                                showConfirmButton: false,
                                                                                backdrop: true,
                                                                                timer: 5000,
                                                                                timerProgressBar: true,
                                                                                didOpen: (toast) => {
                                                                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                                                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                                                }
                                                                            }).then(
                                                                                function() {
                                                                                    $('#<?= md5("data" . $d_praktik['id_praktik']); ?>')
                                                                                        .load(
                                                                                            "_admin/view/v_praktik_praktikanData.php?" +
                                                                                            "idu=<?= bin2hex(urlencode(base64_encode($_SESSION['id_user'] . "*sm*" . date('Y-m-d h:i:s')))); ?>" +
                                                                                            "&idp=<?= bin2hex(urlencode(base64_encode($d_praktik['id_praktik'] . "*sm*" . date('Y-m-d h:i:s')))); ?>" +
                                                                                            "&tb=<?= md5($d_praktik['id_praktik']); ?>");

                                                                                    $('#err_t_no_id<?= md5($d_praktik['id_praktik']); ?>').empty();
                                                                                    $('#err_t_nama<?= md5($d_praktik['id_praktik']); ?>').empty();
                                                                                    $('#err_t_tgl<?= md5($d_praktik['id_praktik']); ?>').empty();
                                                                                    $('#err_t_alamat<?= md5($d_praktik['id_praktik']); ?>').empty();
                                                                                    $('#err_t_telpon<?= md5($d_praktik['id_praktik']); ?>').empty();
                                                                                    $('#err_t_wa<?= md5($d_praktik['id_praktik']); ?>').empty();
                                                                                    $('#err_t_email<?= md5($d_praktik['id_praktik']); ?>').empty();
                                                                                    <?php if ($d_praktik['id_profesi_pdd'] > 0) { ?>
                                                                                        $('#err_t_ijazah<?= md5($d_praktik['id_praktik']); ?>').empty();
                                                                                        $("#t_ijazah<?= md5($d_praktik['id_praktik']); ?>").val("").trigger("change");
                                                                                    <?php } ?>
                                                                                    $('#err_t_swab<?= md5($d_praktik['id_praktik']); ?>').empty();
                                                                                    $('#err_t_foto<?= md5($d_praktik['id_praktik']); ?>').empty();
                                                                                    $("#form_t<?= md5($d_praktik['id_praktik']); ?>").trigger("reset");
                                                                                    $("#t_swab<?= md5($d_praktik['id_praktik']); ?>").val("").trigger("change");
                                                                                    $("#t_foto<?= md5($d_praktik['id_praktik']); ?>").val("").trigger("change");
                                                                                }

                                                                            );
                                                                        }
                                                                    }
                                                                    xhttp.send(data_file);
                                                                } else {
                                                                    Swal.fire({
                                                                        allowOutsideClick: true,
                                                                        showConfirmButton: false,
                                                                        icon: 'warning',
                                                                        html: '<div class="text-lg">Mohon Maaf Data Praktikan <br><b>Sudah Penuh</b></div>',
                                                                        timer: 10000,
                                                                        timerProgressBar: true,
                                                                        didOpen: (toast) => {
                                                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                                        }
                                                                    });
                                                                }
                                                            },
                                                            error: function(response) {
                                                                console.log(response);
                                                            }
                                                        });
                                                    }
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="bg-gray-800">
                    <?php
                        }
                    }
                } else {
                    ?>
                    <h3 class='text-center'> Data Pendaftaran Praktikan Anda Tidak Ada</h3>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
<?php
} else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
