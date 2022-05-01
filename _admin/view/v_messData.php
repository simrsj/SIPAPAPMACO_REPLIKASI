<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";
?>

<div class="card shadow mb-4">
    <div class="card-body">
        <?php
        $sql_mess = "SELECT * FROM tb_mess order by nama_mess ASC";
        $q_mess = $conn->query($sql_mess);
        $r_mess = $q_mess->rowCount();
        if ($r_mess > 0) {
        ?>
            <div class="table-responsive text-center">
                <table class="table table-hover" id="myTable">
                    <thead class="table-dark">
                        <tr>
                            <th scope='col'>No</th>
                            <th>Nama Mess</th>
                            <th>Nama Pemilik</th>
                            <th>Kontak Pemilik</th>
                            <th>Kapasitas Total</th>
                            <th>Tarif Tanpa Makan</th>
                            <th>Tarif Dengan Makan</th>
                            <th>Kepemilikan</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($d_mess = $q_mess->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $d_mess['nama_mess']; ?></td>
                                <td><?php echo $d_mess['nama_pemilik_mess']; ?></td>
                                <td><?php echo $d_mess['no_pemilik_mess']; ?></td>
                                <td><?php echo $d_mess['kapasitas_t_mess']; ?></td>
                                <td><?php echo "Rp " . number_format($d_mess['tarif_tanpa_makan_mess'], 0, ",", "."); ?></td>
                                <td><?php echo "Rp " . number_format($d_mess['tarif_dengan_makan_mess'], 0, ",", "."); ?></td>
                                <td class="text-center">
                                    <?php
                                    if ($d_mess['kepemilikan_mess'] == 'dalam') {
                                        echo "<span class='badge badge-success text-uppercase'>" . $d_mess['kepemilikan_mess'] . "</span>";
                                    } elseif ($d_mess['kepemilikan_mess'] == 'luar') {
                                        echo "<span class='badge badge-primary text-uppercase'>" . $d_mess['kepemilikan_mess'] . "</span>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <form method="post" action="">
                                        <?php
                                        switch ($d_mess['status_mess']) {
                                            case "y":
                                                $btn_status_mess = "success";
                                                $icon_status_mess = "Aktif";
                                                break;
                                            case "t":
                                                $btn_status_mess = "danger";
                                                $icon_status_mess = "Non Aktif";
                                                break;
                                        }
                                        ?>
                                        <input name='id_mess' value="<?php echo $d_mess['id_mess']; ?>" hidden>
                                        <input name='status_mess' value='<?php echo $d_mess['status_mess']; ?>' hidden>
                                        <button title="<?php echo $d_mess['status_mess']; ?>" type="submit" name="ubah_status_mess" class="<?php echo "btn btn-" . $btn_status_mess . " btn-sm"; ?>">
                                            <?php echo $icon_status_mess; ?>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <a title="Ubah" class='btn btn-primary btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#mes_u_m" . $d_mess['id_mess']; ?>'>
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a title="Hapus" class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#mes_d_m" . $d_mess['id_mess']; ?>'>
                                        <i class="fas fa-trash-alt"></i>
                                    </a>

                                    <!-- modal ubah Mess  -->
                                    <div class="modal fade" id="<?php echo "mes_u_m" . $d_mess['id_mess']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form method="post" action="">
                                                    <div class="modal-header">
                                                        <b>UBAH MESS</b>
                                                    </div>
                                                    <div class="modal-body">
                                                        Nama Mess : <span style="color:red">*</span><br>
                                                        <input type="text" class="form-control" name="nama_mess" value="<?php echo $d_mess['nama_mess']; ?>" required><br>
                                                        Nama Pemilik : <span style="color:red">*</span><br>
                                                        <input type="text" class="form-control" name="nama_pemilik_mess" value="<?php echo $d_mess['nama_pemilik_mess']; ?>" required><br>
                                                        No Pemilik : <span style="color:red">*</span><br>
                                                        <input type="number" class="form-control" name="no_pemilik_mess" value="<?php echo $d_mess['no_pemilik_mess']; ?>" required><br>
                                                        E-Mail Pemilik : <br>
                                                        <input type="emial" class="form-control" name="email_pemilik_mess" value="<?php echo $d_mess['email_pemilik_mess']; ?>"><br>
                                                        <?php
                                                        $km1 = "";
                                                        $km2 = "";
                                                        if ($d_mess['kepemilikan_mess'] == 'dalam') {
                                                            $km1 = 'checked';
                                                        } elseif ($d_mess['kepemilikan_mess'] == 'luar') {
                                                            $km2 = 'checked';
                                                        }
                                                        ?>
                                                        Kepemilikan : <span style="color:red">*</span><br>
                                                        <input type="radio" name="kepemilikan" value="dalam" required <?php echo $km1; ?>> Dalam (RSJ)<br>
                                                        <input type="radio" name="kepemilikan" value="luar" <?php echo $km1; ?>> Luar<br><br>
                                                        Tarif Tanpa Makan : (Rp)<span style="color:red">*</span><br>
                                                        <input type="number" class="form-control" name="tarif_tanpa_makan_mess" value="<?php echo $d_mess['tarif_tanpa_makan_mess']; ?>" required><br>
                                                        Tarif Dengan Makan : (Rp)<span style="color:red">*</span><br>
                                                        <input type="number" class="form-control" name="tarif_dengan_makan_mess" value="<?php echo $d_mess['tarif_dengan_makan_mess']; ?>" required><br>
                                                        Alamat Mess : <span style="color:red">*</span><br>
                                                        <textarea class="form-control" name="alamat_mess" required><?php echo $d_mess['alamat_mess']; ?></textarea><br>
                                                        Keterangan Mess : <br>
                                                        <textarea class="form-control" name="ket_mess"><?php echo $d_mess['ket_mess']; ?></textarea>
                                                        <hr>
                                                        <b>KAPASITAS MESS</b><br>
                                                        <!-- Laki-Laki :
                                                            <input type="number" class="form-control" name="kapasitas_l_mess" value="<?php echo $d_mess['kapasitas_l_mess']; ?>">
                                                            Perempuan :
                                                            <input type="number" class="form-control" name="kapasitas_p_mess" value="<?php echo $d_mess['kapasitas_p_mess']; ?>"> -->
                                                        Kapasitas Total : <span style="color:red">*</span><br>
                                                        <input type="number" class="form-control" name="kapasitas_t_mess" value="<?php echo $d_mess['kapasitas_t_mess']; ?>" required>
                                                        Kapasitas Terisi : <span style="color:red">*</span><br>
                                                        <input type="number" class="form-control" name="kapasitas_terisi_mess" value="<?php echo $d_mess['kapasitas_terisi_mess']; ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input name="id_mess" value="<?php echo $d_mess['id_mess']; ?>" hidden>
                                                        <button type="submit" class="btn btn-success btn-sm" name="ubah">Ubah</button>
                                                        <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">
                                                            Kembali
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- modal hapus Mess -->
                                    <div class="modal fade" id="<?php echo "mes_d_m" . $d_mess['id_mess']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form method="post" action="">
                                                    <div class="modal-header">
                                                        <h5>HAPUS MESS ?</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        Nama Mess :
                                                        <h6><b><?php echo $d_mess['nama_mess']; ?></b></h6>
                                                        Nama Pemilik :
                                                        <h6><b><?php echo $d_mess['nama_pemilik_mess']; ?></b></h6>
                                                        <input name="id_mess" value="<?php echo $d_mess['id_mess']; ?>" hidden>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger btn-sm" name="hapus">Ya</button>
                                                        <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Tidak</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <?php
                                $no++;
                                ?>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php
        } else {
        ?>
            <h3> Data Mess Tidak Ada</h3>
        <?php
        }
        ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    $(".ubah_init").click(function() {
        // console.log("ubah_init");
        $('#err_u_nama_pembimbing').empty();
        $('#err_u_nipnipk_pembimbing').empty();
        $('#err_u_jenis_pembimbing').empty();
        $('#err_u_jenjang_pembimbing').empty();
        $('#err_u_kali_pembimbing').empty();
        $('#err_u_status_pembimbing').empty();

        $('#form_ubah_pembimbing').trigger("reset");
        $('#u_jenis_pembimbing').val('').trigger("change");
        $('#u_jenjang_pembimbing').val('').trigger("change");
        $('#u_status_pembimbing').val('').trigger("change");
        var id = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: "_admin/view/v_daftarPembimbingGetData.php",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                $('#u_id_pembimbing').val(response.id_pembimbing);
                $('#u_nama_pembimbing').val(response.nama_pembimbing);
                $('#u_nipnipk_pembimbing').val(response.no_id_pembimbing);
                $('#u_jenis_pembimbing').val(response.id_pembimbing_jenis).trigger('change');
                $('#u_jenjang_pembimbing').val(response.id_jenjang_pdd).trigger('change');
                $('#u_kali_pembimbing').val(response.kali_pembimbing);
                $('#u_status_pembimbing').val(response.status_pembimbing).trigger('change');
                // console.log('' + response.u_id_pembimbing);
            },
            error: function(response) {
                alert(response.responseText);
                console.log(response.responseText);
            }
        });

        $("#data_tambah_pembimbing").fadeOut(1);
        $("#data_ubah_pembimbing").fadeIn(1);
        $('#u_nama_pembimbing').focus();
    });

    $(".ubah_tutup").click(function() {
        $('#err_u_nama_pembimbing').empty();
        $('#err_u_nipnipk_pembimbing').empty();
        $('#err_u_jenis_pembimbing').empty();
        $('#err_u_jenjang_pembimbing').empty();
        $('#err_u_kali_pembimbing').empty();
        $('#err_u_status_pembimbing').empty();

        $('#form_ubah_pembimbing').trigger("reset");
        $('#u_jenis_pembimbing').val('').trigger("change");
        $('#u_jenjang_pembimbing').val('').trigger("change");

        $("#data_ubah_pembimbing").fadeOut(1);
    });

    $(document).on('click', '.ubah', function() {
        var data = $('#form_ubah_pembimbing').serialize();

        var u_id_pembimbing = $('#u_id_pembimbing').val();
        var u_nama_pembimbing = $('#u_nama_pembimbing').val();
        var u_nipnipk_pembimbing = $('#u_nipnipk_pembimbing').val();
        var u_jenis_pembimbing = $('#u_jenis_pembimbing').val();
        var u_jenjang_pembimbing = $('#u_jenjang_pembimbing').val();
        var u_kali_pembimbing = $('#u_kali_pembimbing').val();
        var u_status_pembimbing = $('#u_status_pembimbing').val();
        // console.log("id : " + u_id_pembimbing);

        //cek data from tambah bila tidak diiisi
        if (
            u_id_pembimbing == "" ||
            u_nama_pembimbing == "" ||
            u_nipnipk_pembimbing == "" ||
            u_jenis_pembimbing == "" ||
            u_jenjang_pembimbing == "" ||
            u_kali_pembimbing == "" ||
            u_status_pembimbing == ""
        ) {
            if (u_nama_pembimbing == "") {
                document.getElementById("err_u_nama_pembimbing").innerHTML = "Nama Pembimbing Harus Diisi";
            } else {
                document.getElementById("err_u_nama_pembimbing").innerHTML = "";
            }

            if (u_nipnipk_pembimbing == "") {
                document.getElementById("err_u_nipnipk_pembimbing").innerHTML = "NIP/NIPK Harus Diisi";
            } else {
                document.getElementById("err_u_nipnipk_pembimbing").innerHTML = "";
            }

            if (u_jenis_pembimbing == "") {
                document.getElementById("err_u_jenis_pembimbing").innerHTML = "Jenis Pembimbing Harus Dipilih";
            } else {
                document.getElementById("err_u_jenis_pembimbing").innerHTML = "";
            }

            if (u_jenjang_pembimbing == "") {
                document.getElementById("err_u_jenjang_pembimbing").innerHTML = "Jenjang Pembimbing Harus Dipilih";
            } else {
                document.getElementById("err_u_jenjang_pembimbing").innerHTML = "";
            }

            if (u_kali_pembimbing == "") {
                document.getElementById("err_u_kali_pembimbing").innerHTML = "Kali Membimbing Harus Diisi";
            } else {
                document.getElementById("err_u_kali_pembimbing").innerHTML = "";
            }

            if (u_status_pembimbing == "") {
                document.getElementById("err_u_status_pembimbing").innerHTML = "Status Harus Dipilih";
            } else {
                document.getElementById("err_u_status_pembimbing").innerHTML = "";
            }
        }

        if (
            u_id_pembimbing != "" &&
            u_nama_pembimbing != "" &&
            u_nipnipk_pembimbing != "" &&
            u_jenis_pembimbing != "" &&
            u_jenjang_pembimbing != "" &&
            u_kali_pembimbing != "" &&
            u_status_pembimbing != ""
        ) {
            $.ajax({
                type: 'POST',
                url: "_admin/exc/x_v_daftarPembimbing_u.php",
                data: data,
                success: function(response) {
                    Swal.fire({
                        allowOutsideClick: false,
                        // isDismissed: false,
                        icon: 'success',
                        title: '<span class"text-xs"><b>Data Pembimbing</b><br>Berhasil Dirubah',
                        showConfirmButton: false,
                        timer: 5000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });

                    $('#data_daftarPembimbing').load("_admin/view/v_daftarPembimbingData.php");

                    $('#err_u_nama_pembimbing').empty();
                    $('#err_u_nipnipk_pembimbing').empty();
                    $('#err_u_jenis_pembimbing').empty();
                    $('#err_u_jenjang_pembimbing').empty();
                    $('#err_u_kali_pembimbing').empty();
                    $('#err_u_status_pembimbing').empty();

                    $('#form_ubah_pembimbing').trigger("reset");
                    $('#u_jenis_pembimbing').val('').trigger("change");
                    $('#u_jenjang_pembimbing').val('').trigger("change");

                    $("#data_ubah_pembimbing").fadeOut(1);
                },
                error: function(response) {
                    console.log(response.responseText);
                }
            });
        }
    });

    $(document).on('click', '.hapus', function() {
        console.log("hapus");
        Swal.fire({
            position: 'top',
            title: 'Hapus Data Pembimbing ?',
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: '#1cc88a',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Kembali',
            confirmButtonText: 'Ya',
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: "_admin/exc/x_v_daftarPembimbing_h.php",
                    data: {
                        "h_id_pembimbing": $(this).attr('id')
                    },
                    success: function() {
                        $('#data_daftarPembimbing').load("_admin/view/v_daftarPembimbingData.php");

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
                            title: '<div class="text-center font-weight-bold text-uppercase">Data Berhasil Dihapus</b></div>'
                        });
                    },
                    error: function(response) {
                        console.log(response.responseText);
                        alert('eksekusi query gagal');
                    }
                });
            }
        });
    });
</script>