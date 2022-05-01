<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Daftar Mess/Pemondokan</h1>
        </div>
        <div class="col-lg-2 text-right">
            <a class='btn btn-outline-success btn-sm ' href='#' data-toggle='modal' data-target='#mes_i_m'>
                <i class="fas fa-plus"></i> Tambah
            </a>

            <!-- modal tambah Mess  -->
            <div class="modal fade text-left " id="mes_i_m" data-backdrop="static">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="">
                            <div class="modal-header">
                                <b>TAMBAH MESS/PEMONDOKAN</b>
                            </div>
                            <div class="modal-body">
                                Alamat Mess : <span style="color:red">*</span><br>
                                <textarea class="form-control" name="alamat_mess" required></textarea><br>
                                Keterangan Mess : <br>
                                <textarea class="form-control" name="ket_mess"></textarea>
                                <hr>
                                <b>KAPASITAS MESS</b><br>
                                <!-- Laki-Laki :
                                <input type="number" class="form-control" name="kapasitas_l_mess">
                                Perempuan :
                                <input type="number" class="form-control" name="kapasitas_p_mess"> -->
                                Kapasitas Total : <span style="color:red">*</span><br>
                                <input type="number" class="form-control" name="kapasitas_t_mess" required>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success btn-sm" name="tambah">Tambah</button>
                                <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Kembali</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- form tambah mess  -->
    <div class="card shadow mb-4 card-body" id="data_tambah_mess" style="display: none;">
        <form class="form-data" method="post" id="form_tambah_mess">
            <!-- Nama Institusi, MoU RSJ dan Institusi -->
            <div class="row mb-4">
                <div class="col-md-3">
                    Nama Mess/Pemondokan : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <input class="form-control form-control-sm" name="t_nama_mess" id="t_nama_mess" required>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_t_nama_mess"></div>
                </div>
                <div class="col-md">
                    Nama Pemilik : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <input class="form-control form-control-sm" name="t_nama_pemilik_mess" id="t_nama_pemilik_mess" required>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_t_nama_pemilik_mess"></div>
                </div>
                <div class="col-md">
                    Telp. Pemilik : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <input class="form-control form-control-sm" name="t_telp_pemilik_mess" id="t_telp_pemilik_mess" required>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_t_telp_pemilik_mess"></div>
                </div>
                <div class="col-md">
                    E-Mail Pemilik : &nbsp;&nbsp;
                    <input class="form-control form-control-sm" type="email" name="t_email_pemilik_mess" id="t_email_pemilik_mess">
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_t_email_pemilik_mess"></div>
                </div>
                <div class="col-md-3">
                    Kepemilikan : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <select class="select2" name="t_kepemilikan_mess" id="t_kepemilikan_mess" required>
                        <option value=""></option>
                        <option value="dalam">Dalam (RSJ)</option>
                        <option value="luar">Luar</option>
                    </select>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_t_kepemilikan_mess"></div>
                </div>
                <div class="col-md-3">
                    Tarif Tanpa Makan : (Rp)<span style="color:red">*</span><br>
                    <input type="number" class="form-control" name="t_tarif_tanpa_makan_mess" id="t_tarif_tanpa_makan_mess" required><br>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_t_tarif_tanpa_makan_mess"></div>
                </div>
                <div class="col-md-3">
                    Tarif Dengan Makan : (Rp)<span style="color:red">*</span><br>
                    <input type="number" class="form-control" name="t_tarif_dengan_makan_mess" id="t_tarif_dengan_makan_mess" required><br>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_t_tarif_dengan_makan_mess"></div>
                </div>
                <div class="col-md-2">
                    Kapasitas Total Mess/Pemondokan : <span style="color:red">*</span><br>
                    <input type="number" class="form-control" name="t_kapsitas_total_mess" id="t_kapsitas_total_mess" required><br>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_t_kapsitas_total_mess"></div>
                </div>
                <div class="col-md-2">
                    Alamat Mess/Pemondokan : <span style="color:red">*</span><br>
                    <input type="number" class="form-control" name="t_alamat_mess" id="t_alamat_mess" required><br>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_t_alamat_mess"></div>
                </div>
                <div class="col-md-2">
                    Jenjang Pendidikan : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <select class="select2" name="t_jenjang_mess" id="t_jenjang_mess" required>
                        <option value=""></option>
                        <?php
                        $sql_jenjang_pmbb = "SELECT * FROM tb_jenjang_pdd";
                        $sql_jenjang_pmbb .= " ORDER BY nama_jenjang_pdd ASC";

                        $q_jenjang_pmbb = $conn->query($sql_jenjang_pmbb);
                        while ($d_jenjang_pmbb = $q_jenjang_pmbb->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <option value="<?php echo $d_jenjang_pmbb['id_jenjang_pdd'] ?>">
                                <?php
                                echo $d_jenjang_pmbb['nama_jenjang_pdd'];
                                ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_t_jenjang_mess"></div>
                </div>
                <div class="col-md-1">
                    Kali : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <input class="form-control form-control-sm" type="number" maxlength="1" name="t_kali_mess" id="t_kali_mess" required>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_t_kali_mess"></div>
                </div>
            </div>
            <hr>
            <div class="form-inline navbar nav-link justify-content-end">
                <button type="button" name="tambah" class="btn btn-success btn-sm tambah">
                    Tambah
                </button>
                &nbsp;&nbsp;
                <button type="button" class="btn btn-outline-danger btn-sm tambah_tutup">
                    Tutup
                </button>
            </div>
        </form>
    </div>

    <div id="data_mess"></div>
</div>



<script>
    $(document).ready(function() {
        $('#data_mess').load("_admin/view/v_messData.php");
    });

    $(".tambah_init").click(function() {
        // console.log("tambah_init")''
        $('#err_t_nama_mess').empty();
        $('#err_t_nipnipk_mess').empty();
        $('#err_t_jenis_mess').empty();
        $('#err_t_jenjang_mess').empty();
        $('#err_t_kali_mess').empty();

        $('#form_tambah_mess').trigger("reset");
        $('#t_jenis_mess').val('').trigger("change");
        $('#t_jenjang_mess').val('').trigger("change");

        $("#data_tambah_mess").fadeIn(1);
        $("#data_ubah_mess").fadeOut(1);

        $('#t_nama_mess').focus();
    });

    $(".tambah_tutup").click(function() {
        $('#err_t_nama_mess').empty();
        $('#err_t_nipnipk_mess').empty();
        $('#err_t_jenis_mess').empty();
        $('#err_t_jenjang_mess').empty();
        $('#err_t_kali_mess').empty();

        $('#form_tambah_mess').trigger("reset");
        $('#t_jenis_mess').val('').trigger("change");
        $('#t_jenjang_mess').val('').trigger("change");

        $("#data_tambah_mess").fadeOut(1);
    });

    $(document).on('click', '.tambah', function() {
        var data = $('#form_tambah_mess').serialize();

        var t_nama_mess = $('#t_nama_mess').val();
        var t_nipnipk_mess = $('#t_nipnipk_mess').val();
        var t_jenis_mess = $('#t_jenis_mess').val();
        var t_jenjang_mess = $('#t_jenjang_mess').val();
        var t_kali_mess = $('#t_kali_mess').val();

        //cek data from tambah bila tidak diiisi
        if (
            t_nama_mess == "" ||
            t_nipnipk_mess == "" ||
            t_jenis_mess == "" ||
            t_jenjang_mess == "" ||
            t_kali_mess == ""
        ) {
            if (t_nama_mess == "") {
                document.getElementById("err_t_nama_mess").innerHTML = "Nama Pembimbing Harus Diisi";
            } else {
                document.getElementById("err_t_nama_mess").innerHTML = "";
            }

            if (t_nipnipk_mess == "") {
                document.getElementById("err_t_nipnipk_mess").innerHTML = "NIP/NIPK Harus Diisi";
            } else {
                document.getElementById("err_t_nipnipk_mess").innerHTML = "";
            }

            if (t_jenis_mess == "") {
                document.getElementById("err_t_jenis_mess").innerHTML = "Jenis Pembimbing Harus Dipilih";
            } else {
                document.getElementById("err_t_jenis_mess").innerHTML = "";
            }

            if (t_jenjang_mess == "") {
                document.getElementById("err_t_jenjang_mess").innerHTML = "Jenjang Pembimbing Harus Dipilih";
            } else {
                document.getElementById("err_t_jenjang_mess").innerHTML = "";
            }

            if (t_kali_mess == "") {
                document.getElementById("err_t_kali_mess").innerHTML = "Kali Membimbing Harus Diisi";
            } else {
                document.getElementById("err_t_kali_mess").innerHTML = "";
            }
        }

        if (
            t_nama_mess != "" &&
            t_nipnipk_mess != "" &&
            t_jenis_mess != "" &&
            t_jenjang_mess != "" &&
            t_kali_mess != ""
        ) {
            $.ajax({
                type: 'POST',
                url: "_admin/exc/x_v_daftarPembimbing_s.php",
                data: data,
                success: function() {
                    Swal.fire({
                        allowOutsideClick: false,
                        // isDismissed: false,
                        icon: 'success',
                        title: '<span class"text-xs"><b>Data Pembimbing</b><br>Berhasil Tersimpan',
                        showConfirmButton: false,
                        timer: 5000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });;

                    $('#data_daftarPembimbing').load('_admin/view/v_daftarPembimbingData.php');

                    document.getElementById("err_t_nama_mess").innerHTML = "";
                    document.getElementById("err_t_nipnipk_mess").innerHTML = "";
                    document.getElementById("err_t_jenis_mess").innerHTML = "";
                    document.getElementById("err_t_jenjang_mess").innerHTML = "";
                    document.getElementById("err_t_kali_mess").innerHTML = "";
                    document.getElementById("form_tambah_mess").reset();
                    $("#data_tambah_mess").fadeOut(1);
                },
                error: function(response) {
                    console.log(response.responseText);
                }
            });
        }
    });
</script>