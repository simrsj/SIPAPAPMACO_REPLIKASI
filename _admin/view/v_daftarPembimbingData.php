<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";
?>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <?php
            $sql_pembimbing = "SELECT * FROM tb_pembimbing";
            $sql_pembimbing .= " JOIN tb_pembimbing_jenis ON tb_pembimbing.id_pembimbing_jenis = tb_pembimbing_jenis.id_pembimbing_jenis ";
            $sql_pembimbing .= " JOIN tb_jenjang_pdd ON tb_pembimbing.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd";
            $sql_pembimbing .= " ORDER BY nama_pembimbing ASC";

            $q_pembimbing = $conn->query($sql_pembimbing);
            $r_pembimbing = $q_pembimbing->rowCount();

            if ($r_pembimbing > 0) {
            ?>
                <div class="table-responsive">
                    <table class="table table-striped" id="myTable">
                        <thead class="thead-dark">
                            <tr>
                                <th scope='col'>No</th>
                                <th>NIP/NIPK</th>
                                <th>Nama Pembimbing</th>
                                <th>Unit</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($d_pembimbing = $q_pembimbing->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $d_pembimbing['no_id_pembimbing']; ?></td>
                                    <td><?php echo $d_pembimbing['nama_pembimbing']; ?></td>
                                    <td><?php echo $d_pembimbing['nama_unit']; ?></td>
                                    <td>

                                        <!-- Aktivasi status Pembimbing -->
                                        <form method="post" action="">
                                            <?php
                                            switch ($d_pembimbing['status_pembimbing']) {
                                                case "y":
                                                    $btn_status_pembimbing = "success";
                                                    $nama_status_pembimbing = "Aktif";
                                                    break;
                                                case "t":
                                                    $btn_status_pembimbing = "danger";
                                                    $nama_status_pembimbing = "Non-Aktif";
                                                    break;
                                            }
                                            ?>
                                            <input name='id_pembimbing' value="<?php echo $d_pembimbing['id_pembimbing']; ?>" hidden>
                                            <input name='status_pembimbing' value='<?php echo $d_pembimbing['status_pembimbing']; ?>' hidden>
                                            <button title="<?php echo $d_pembimbing['status_pembimbing']; ?>" type="submit" name="ubah_status_pembimbing" class="<?php echo "btn btn-" . $btn_status_pembimbing . " btn-sm"; ?>">
                                                <?php echo $nama_status_pembimbing; ?>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a title="Ubah" class='btn btn-primary btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#pmbb_u_m" . $d_pembimbing['id_pembimbing']; ?>'>
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a title="Hapus" class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#pmbb_d_m" . $d_pembimbing['id_pembimbing']; ?>'>
                                            <i class="fas fa-trash-alt"></i>
                                        </a>

                                        <!-- modah ubah -->
                                        <div class="modal fade" id="<?php echo "pmbb_u_m" . $d_pembimbing['id_pembimbing']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form method="post" action="">
                                                        <div class="modal-header">
                                                            UBAH DATA PEMBIMBING
                                                        </div>
                                                        <div class="modal-body">
                                                            <input name="id_pembimbing" value="<?php echo $d_pembimbing['id_pembimbing']; ?>" hidden>
                                                            NIP/NIPK : <br>
                                                            <input class="form-control" name="no_id_pembimbing" value="<?php echo $d_pembimbing['no_id_pembimbing']; ?>"><br>

                                                            Nama Pembimbing :<br>
                                                            <input class="form-control" name="nama_pembimbing" value="<?php echo $d_pembimbing['nama_pembimbing']; ?>" size="35px"><br>

                                                            Unit/Ruangan :<br>
                                                            <?php
                                                            $sql_unit = "SELECT * FROM tb_unit order by nama_unit ASC";

                                                            $q_unit = $conn->query($sql_unit);
                                                            $r_unit = $q_unit->rowCount();

                                                            if ($r_unit > 0) {
                                                            ?>
                                                                <select class="form-control" name='id_unit'>
                                                                    <?php
                                                                    while ($d_unit = $q_unit->fetch(PDO::FETCH_ASSOC)) {
                                                                        if (strtolower($d_unit['id_unit']) == strtolower($d_pembimbing['id_unit'])) {
                                                                            $selected = "selected";
                                                                        } else {
                                                                            $selected = "";
                                                                        }
                                                                    ?>
                                                                        <option <?php echo $selected; ?> value='<?php echo $d_unit['id_unit']; ?>'>
                                                                            <?php echo $d_unit['nama_unit']; ?>
                                                                        </option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <br>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <i class='btn btn-danger btn-sm' style='font-size:10px'> Data Unit Tida Ada</i>
                                                            <?php
                                                            }
                                                            ?>

                                                            Jenis Pembimbing : <br>
                                                            <?php
                                                            $sql_pembimbing_jenis = "SELECT * FROM tb_pembimbing_jenis ORDER BY nama_pembimbing_jenis ASC";
                                                            // echo $sql_pembimbing_jenis;
                                                            $q_pembimbing_jenis = $conn->query($sql_pembimbing_jenis);
                                                            $r_pembimbing_jenis = $q_pembimbing_jenis->rowCount();

                                                            // echo $r_pembimbing_jenis;
                                                            if ($r_pembimbing_jenis > 0) {
                                                            ?>
                                                                <select class="form-control" name='id_pembimbing_jenis'>
                                                                    <?php
                                                                    while ($d_pembimbing_jenis = $q_pembimbing_jenis->fetch(PDO::FETCH_ASSOC)) {
                                                                        if (strtolower($d_pembimbing_jenis['id_pembimbing_jenis']) == strtolower($d_pembimbing['id_pembimbing_jenis'])) {
                                                                            $selected = "selected";
                                                                        } else {
                                                                            $selected = "";
                                                                        }
                                                                    ?>
                                                                        <option <?php echo $selected; ?> value='<?php echo $d_pembimbing_jenis['id_pembimbing_jenis']; ?>'>
                                                                            <?php echo $d_pembimbing_jenis['nama_pembimbing_jenis'] ?>
                                                                        </option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <i class='btn btn-danger btn-sm' style='font-size:10px'> Data Jenis Pembimbing Tidak Ada</i>
                                                            <?php
                                                            }
                                                            ?>

                                                            Pendidikan Pembimbing : <br>
                                                            <?php
                                                            $sql_pembimbing_jenis = "SELECT * FROM tb_jenjang_pdd ORDER BY nama_jenjang_pdd ASC";
                                                            // echo $sql_pembimbing_jenis;
                                                            $q_pembimbing_jenis = $conn->query($sql_pembimbing_jenis);
                                                            $r_pembimbing_jenis = $q_pembimbing_jenis->rowCount();

                                                            // echo $r_pembimbing_jenis;
                                                            if ($r_pembimbing_jenis > 0) {
                                                            ?>
                                                                <select class="form-control" name='id_jenjang_pdd'>
                                                                    <?php
                                                                    while ($d_pembimbing_jenis = $q_pembimbing_jenis->fetch(PDO::FETCH_ASSOC)) {
                                                                        if (strtolower($d_pembimbing_jenis['id_jenjang_pdd']) == strtolower($d_pembimbing['id_jenjang_pdd'])) {
                                                                            $selected = "selected";
                                                                        } else {
                                                                            $selected = "";
                                                                        }
                                                                    ?>
                                                                        <option <?php echo $selected; ?> value='<?php echo $d_pembimbing_jenis['id_jenjang_pdd']; ?>'>
                                                                            <?php echo $d_pembimbing_jenis['nama_jenjang_pdd'] ?>
                                                                        </option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <i class='btn btn-danger btn-sm' style='font-size:10px'> Data Jenis Pembimbing Tidak Ada</i>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success btn-sm" name="ubah_pembimbing">Ubah</button>
                                                            <button class="btn btn-outline-dark" type="button" data-dismiss="modal">Tidak</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- modal hapus Mess -->
                                        <div class="modal fade" id="<?php echo "pmbb_d_m" . $d_pembimbing['id_pembimbing']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form method="post" action="">
                                                        <div class="modal-header">
                                                            <h5>HAPUS PEMBIMBING ?</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            Nama Pembimbing :
                                                            <h6><b><?php echo $d_pembimbing['no_id_pembimbing']; ?></b></h6>
                                                            NIP/NIPK :
                                                            <h6><b><?php echo $d_pembimbing['nama_pembimbing']; ?></b></h6>
                                                            <input name="id_pembimbing" value="<?php echo $d_pembimbing['id_pembimbing']; ?>" hidden>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger" name="hapus">Ya</button>
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php
            } else {
            ?>
                <h3> Data Pembimbing Tidak Ada</h3>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    $(".ubah_init").click(function() {
        document.getElementById("err_u_nama_institusi").innerHTML = "";
        document.getElementById("err_u_akronim_institusi").innerHTML = "";
        document.getElementById("err_u_logo_institusi").innerHTML = "";
        document.getElementById("err_u_akred_institusi").innerHTML = "";
        document.getElementById("err_u_tglAkhirAkred_institusi").innerHTML = "";
        document.getElementById("err_u_fileAkred_institusi").innerHTML = "";
        document.getElementById("form_ubah_institusi").reset();

        var id = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: "_admin/view/v_institusiGetData.php",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {

                document.getElementById("form_ubah_institusi").reset();

                document.getElementById("u_id_institusi").value = response.id_institusi;
                // console.log("u_id_institusi : " + response.id_institusi);
                document.getElementById("u_nama_institusi").value = response.nama_institusi;
                document.getElementById("u_akronim_institusi").value = response.akronim_institusi;

                $("#logo_institusi").empty();
                if (response.logo_institusi == '' || response.logo_institusi == null) {
                    $("#logo_institusi").append('LOGO TIDAK ADA');
                } else {
                    // document.getElementById("logo_institusi").value = response.logo_institusi;
                    // $("#logo_institusi").attr('src', response.logo_institusi);
                    $('#logo_institusi')
                        .append(
                            '<img src="' + response.logo_institusi + '" width="80px" height="80px">' +
                            ' &nbsp;&nbsp;<a class="btn btn-outline-success btn-xs" href="' + response.logo_institusi + '" download><i class="far fa-image"></i> Unduh</a>'
                        );
                }

                document.getElementById("u_alamat_institusi").value = response.alamat_institusi;

                // document.getElementById("u_akred_institusi").value = response.akred_institusi;
                $('#u_akred_institusi').val(response.akred_institusi).trigger('change');

                document.getElementById("u_tglAkhirAkred_institusi").value = response.tglAkhirAkred_institusi;

                $("#fileAkred_institusi").empty();
                if (response.fileAkred_institusi == '' || response.fileAkred_institusi == null) {
                    console.log('Data File Akreditasi Tidak Ada');
                    $('#fileAkred_institusi').append('<span class="badge badge-danger">Tidak Ada</span>');
                } else {
                    // $("#fileAkred_institusi").attr('href', response.fileAkred_institusi);
                    $('#fileAkred_institusi').append('<a href="' + response.fileAkred_institusi + '" target="_blank" download><u><b>UNDUH</b></u></a>');
                }
            },
            error: function(response) {
                alert(response.responseText);
                console.log(response.responseText);
            }
        });

        $("#data_ubah_institusi").fadeIn(1);
        $("#data_tambah_institusi").fadeOut(1);
        $('#u_nama_institusi').focus();

    });

    $(".ubah_tutup").click(function() {
        document.getElementById("err_u_nama_institusi").innerHTML = "";
        document.getElementById("err_u_akronim_institusi").innerHTML = "";
        document.getElementById("err_u_logo_institusi").innerHTML = "";
        document.getElementById("err_u_akred_institusi").innerHTML = "";
        document.getElementById("err_u_tglAkhirAkred_institusi").innerHTML = "";
        document.getElementById("err_u_fileAkred_institusi").innerHTML = "";
        document.getElementById("form_tambah_institusi").reset();
        $("#data_ubah_institusi").fadeOut(1);
    });

    $(document).on('click', '.ubah', function() {
        var data = $('#form_ubah_institusi').serialize();

        var u_nama_institusi = $('#u_nama_institusi').val();
        var u_akronim_institusi = $('#u_akronim_institusi').val();
        var u_logo_institusi = $('#u_logo_institusi').val();
        var u_akred_institusi = $('#u_akred_institusi').val();
        var u_tglAkhirAkred_institusi = $('#u_tglAkhirAkred_institusi').val();
        var u_fileAkred_institusi = $('#u_fileAkred_institusi').val();
        // console.log("NAMA : " + u_nama_institusi);
        // console.log("AKRED : " + u_akred_institusi);
        // console.log("ALAMAT : " + $('#u_alamat_institusi').val());

        //cek data from tambah bila tidak diiisi
        if (
            u_nama_institusi == "" ||
            u_akronim_institusi == "" ||
            u_logo_institusi == "" ||
            u_akred_institusi == "" ||
            u_akred_institusi == null ||
            u_tglAkhirAkred_institusi == "" ||
            u_fileAkred_institusi == ""
        ) {
            if (u_nama_institusi == "") {
                document.getElementById("err_u_nama_institusi").innerHTML = "Nama Institusi Harus Diisi";
            } else {
                document.getElementById("err_u_nama_institusi").innerHTML = "";
            }

            if (u_akronim_institusi == "") {
                document.getElementById("err_u_akronim_institusi").innerHTML = "Akronim Harus Diisi";
            } else {
                document.getElementById("err_u_akronim_institusi").innerHTML = "";
            }

            if (u_logo_institusi == "") {
                document.getElementById("err_u_logo_institusi").innerHTML = "Logo Harus Diunggah";
            } else {
                document.getElementById("err_u_logo_institusi").innerHTML = "";
            }

            if (u_akred_institusi == "" || u_akred_institusi == null) {
                document.getElementById("err_u_akred_institusi").innerHTML = "Akreditasi Harus Dipilih";
            } else {
                document.getElementById("err_u_akred_institusi").innerHTML = "";
            }

            if (u_tglAkhirAkred_institusi == "") {
                document.getElementById("err_u_tglAkhirAkred_institusi").innerHTML = "Tanggal Berlaku Akreditasi Harus Dipilih";
            } else {
                document.getElementById("err_u_tglAkhirAkred_institusi").innerHTML = "";
            }

            if (u_fileAkred_institusi == "") {
                document.getElementById("err_u_fileAkred_institusi").innerHTML = "File Akreditasi Harus Dipilih";
            } else {
                document.getElementById("err_u_fileAkred_institusi").innerHTML = "";
            }

        }

        //eksekusi bila file MoU terisi
        if (u_logo_institusi != "") {

            //Cari ekstensi file MoU yg diupload
            var typeLogo = document.querySelector('#u_logo_institusi').value;
            var getTypeLogo = typeLogo.split('.').pop();

            //cari ukuran file MoU yg diupload
            var getSizeLogo = document.getElementById("u_logo_institusi").files[0].size / 1024;

            console.log("Ukuran Logo : " + getSizeLogo);
            //Toast bila upload Logo selain pdf
            if (getTypeLogo != 'png') {
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
                    title: '<div class="text-md text-center">Logo Harus <b>.png</b></div>'
                });
                document.getElementById("err_u_logo_institusi").innerHTML = "Logo Harus png";
            } //Toast bila upload file MoU diatas 200 Kb 
            else if (getSizeLogo > 256) {
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
                    title: '<div class="text-md text-center">Ukuran File MoU Harus <br><b>Kurang dari 200 Kb </b></div>'
                });
                document.getElementById("err_u_logo_institusi").innerHTML = "Ukuran Logo Harus Kurang dari 200 Kb ";
            }
        }

        //eksekusi bila file MoU terisi
        if (u_fileAkred_institusi != "") {

            //Cari ekstensi file MoU yg diupload
            var typeAkred = document.querySelector('#u_fileAkred_institusi').value;
            var getTypeAkred = typeAkred.split('.').pop();

            //cari ukuran file MoU yg diupload
            var getSizeAkred = document.getElementById("u_fileAkred_institusi").files[0].size / 1024;

            //Toast bila upload file MoU selain pdf
            if (getTypeAkred != 'pdf') {
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
                    title: '<div class="text-md text-center">File Akrediatasi Harus <b>.pdf</b></div>'
                });
                document.getElementById("err_u_fileAkred_institusi").innerHTML = "File Akrediatasi Harus pdf";
            } //Toast bila upload file MoU diatas 1 Mb 
            else if (getSizeAkred > 1024) {
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
                    title: '<div class="text-md text-center">Ukuran File Akreditasi Harus <br><b>Kurang dari 1 Mb</b></div>'
                });
                document.getElementById("err_u_fileAkred_institusi").innerHTML = "Ukuran File Akreditasi Harus Kurang dari 1 Mb";
            }
        }

        if (
            u_nama_institusi != "" &&
            u_akronim_institusi != "" &&
            u_logo_institusi != "" &&
            getTypeLogo == "png" &&
            getSizeLogo < 256 &&
            u_akred_institusi != "" &&
            u_tglAkhirAkred_institusi != "" &&
            u_fileAkred_institusi != "" &&
            getTypeAkred == "pdf" &&
            getSizeAkred < 1024
        ) {
            $.ajax({
                type: 'POST',
                url: "_admin/exc/x_v_institusi_u.php",
                data: data,
                success: function() {
                    //ambil data file yang diupload
                    var data_file = new FormData();
                    var xhttp = new XMLHttpRequest();

                    var logo = document.getElementById("u_logo_institusi").files;
                    data_file.append("u_logo_institusi", logo[0]);

                    var fileAkred = document.getElementById("u_fileAkred_institusi").files;
                    data_file.append("u_fileAkred_institusi", fileAkred[0]);

                    var id_institusi = document.getElementById("u_id_institusi").value;
                    data_file.append("u_id_institusi", id_institusi);

                    xhttp.open("POST", "_admin/exc/x_v_institusi_uFile.php", true);
                    xhttp.send(data_file);
                    Swal.fire({
                        allowOutsideClick: false,
                        // isDismissed: false,
                        icon: 'success',
                        title: '<span class"text-xs"><b>Data Institusi</b><br>Berhasil Tersimpan',
                        showConfirmButton: false,
                        timer: 523123000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });

                    $('#data_institusi').load('_admin/view/v_institusiData.php');

                    document.getElementById("err_u_nama_institusi").innerHTML = "";
                    document.getElementById("err_u_akronim_institusi").innerHTML = "";
                    document.getElementById("err_u_logo_institusi").innerHTML = "";
                    document.getElementById("err_u_akred_institusi").innerHTML = "";
                    document.getElementById("err_u_tglAkhirAkred_institusi").innerHTML = "";
                    document.getElementById("err_u_fileAkred_institusi").innerHTML = "";
                    document.getElementById("form_tambah_institusi").reset();
                    $("#data_tambah_institusi").fadeOut(1);
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
            title: 'Hapus Data Institusi ?',
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
                    url: "_admin/exc/x_v_institusi_h.php",
                    data: {
                        "h_id_institusi": $(this).attr('id')
                    },
                    success: function() {
                        $('#data_institusi').load('_admin/view/v_institusiData.php?');

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
                            title: '<div class="text-center font-weight-bold text-uppercase">Data Berhasil DIHAPUS</b></div>'
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