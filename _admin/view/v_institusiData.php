<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";
?>


<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <?php
            $sql_institusi = "SELECT * FROM tb_institusi order by nama_institusi ASC";
            $q_institusi = $conn->query($sql_institusi);
            $r_institusi = $q_institusi->rowCount();
            if ($r_institusi > 0) {
            ?>
                <table class='table table-striped' id="myTable">
                    <thead class="thead-dark text-center align-content-center">
                        <tr>
                            <th scope='col' width="10px">No</th>
                            <th width="250px">Nama Institusi</th>
                            <th>Akronim</th>
                            <th>Alamat</th>
                            <th>
                                Akreditasi
                                <hr class="p-0 m-0" style="background-color: white;">
                                Tanggal Berlaku
                                <hr class="p-0 m-0" style="background-color: white;">
                                File Akreditasi
                            </th>
                            <th>
                                Tombol
                                <hr class="p-0 m-0" style="background-color: white;">
                                Logo
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($d_institusi = $q_institusi->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $d_institusi['nama_institusi']; ?></td>
                                <td class="text-center">
                                    <?php

                                    // akronim 
                                    if ($d_institusi['akronim_institusi'] == '') {
                                    ?>
                                        <span class="badge badge-danger">Tidak Ada</span>
                                    <?php
                                    } else {
                                        echo $d_institusi['akronim_institusi'];
                                    }
                                    ?>
                                </td>
                                <td><?php echo $d_institusi['alamat_institusi'] ?></td>
                                <td class="text-center">
                                    <?php

                                    // Akreditasi
                                    if ($d_institusi['akred_institusi'] == '') {
                                    ?>
                                        <span class="badge badge-danger">Tidak Ada</span>
                                    <?php
                                    } else {
                                        echo $d_institusi['akred_institusi'];
                                    }
                                    ?>
                                    <br>
                                    <?php

                                    // Tanggal Berlaku Akreditasi
                                    if ($d_institusi['tglAkhirAkred_institusi'] == '') {
                                    ?>
                                        <span class="badge badge-danger">Tidak Ada</span>
                                    <?php
                                    } else {
                                        echo tanggal($d_institusi['tglAkhirAkred_institusi']);
                                    }
                                    ?>
                                    <br>
                                    <?php

                                    // File Akreditasi
                                    if ($d_institusi['fileAkred_institusi'] == '') {
                                    ?>
                                        <span class="badge badge-danger">Tidak Ada</span>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="<?php echo $d_institusi['fileAkred_institusi']; ?>" class="btn btn-success btn-sm" target="_blank">
                                            <i class="fas fa-file-download"></i> Unduh
                                        </a>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <a title="Ubah" class='btn btn-primary btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#akr_u_m" . $d_institusi['id_institusi']; ?>'>
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a title="Hapus" class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#akr_d_m" . $d_institusi['id_institusi']; ?>'>
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                    <hr class="m-2">
                                    <?php

                                    // logo 
                                    if ($d_institusi['logo_institusi'] == '') {
                                    ?>
                                        <span class="badge badge-danger">Tidak Ada</span>
                                    <?php
                                    } else {
                                    ?>
                                        <a title="Lihat Logo" class='btn btn-info btn-xs' href='#' data-toggle='modal' data-target='<?php echo "#see_" . $d_institusi['id_institusi']; ?>'>
                                            <i class="fas fa-eye"></i> Lihat
                                        </a>

                                        <!-- Lihat Logo  -->
                                        <div class="modal fade" id="<?php echo "see_" . $d_institusi['id_institusi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <img src="<?php echo $d_institusi['logo_institusi']; ?>" width="250px" height="250px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <?php $no++; ?>
                                <!-- modal ubah Institusi  -->
                                <div class="modal fade" id="<?php echo "akr_u_m" . $d_institusi['id_institusi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form method="post" action="" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    Ubah Institusi :
                                                </div>
                                                <div class="modal-body">
                                                    <input name="id_institusi" value="<?php echo $d_institusi['id_institusi']; ?>" hidden>
                                                    Nama Institusi :
                                                    <input class="form-control" name="nama_institusi" value="<?php echo $d_institusi['nama_institusi']; ?>" required><br>
                                                    Akronim Institusi :
                                                    <i style='font-size:12px;'>Maximal 10 Karakter</i><span style="color:red">*</span>
                                                    <input type='text' class="form-control" name="akronim_institusi" maxlength="10" value="<?php echo $d_institusi['akronim_institusi']; ?>"><br>
                                                    Logo Institusi:<br>
                                                    <input type="file" name="logo_institusi" accept="image/png, image/gif, image/jpeg, image/jpg"><br>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success btn-sm" name="ubah">Ubah</button>
                                                    <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Kembali</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="<?php echo "akr_d_m" . $d_institusi['id_institusi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form method="post" action="">
                                                <div class="modal-header">
                                                    <h5>Hapus Data</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <h6><b><?php echo $d_institusi['nama_institusi']; ?></b></h6>
                                                    <input name="id_institusi" value="<?php echo $d_institusi['id_institusi']; ?>" hidden>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger btn-sm" name="hapus">Ya</button>
                                                    <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Tidak</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
        <h3 class="text-center text-justify"> Data Institusi Tidak Ada</h3>
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
        document.getElementById("err_u_nama_institusi").innerHTML = "";
        document.getElementById("err_u_akronim_institusi").innerHTML = "";
        document.getElementById("err_u_logo_institusi").innerHTML = "";
        document.getElementById("err_u_akred_institusi").innerHTML = "";
        document.getElementById("err_u_tglAkhirAkred_institusi").innerHTML = "";
        document.getElementById("err_u_fileAkred_institusi").innerHTML = "";
        document.getElementById("form_tambah_institusi").reset();
        $("#data_ubah_institus").fadeIn(1);
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

        //cek data from tambah bila tidak diiisi
        if (
            u_nama_institusi == "" ||
            u_akronim_institusi == "" ||
            u_logo_institusi == "" ||
            u_akred_institusi == "" ||
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

            if (u_akred_institusi == "") {
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
                document.getElementById("err_file_mou").innerHTML = "Logo Harus png";
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
                document.getElementById("err_file_mou").innerHTML = "Ukuran Logo Harus Kurang dari 200 Kb ";
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
                document.getElementById("err_file_mou").innerHTML = "File Akrediatasi Harus pdf";
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
                document.getElementById("err_file_mou").innerHTML = "Ukuran File Akreditasi Harus Kurang dari 1 Mb";
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

                    var id_institusi = document.getElementById("id_institusi").value;
                    data_file.append("id_institusi", id_institusi);

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
            title: 'Hapus Data Tempat ?',
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
                    url: "_admin/exc/x_v_tempat_h.php",
                    data: {
                        "id_tempat": $(this).attr('id')
                    },
                    success: function() {
                        $('#data_tempat').load('_admin/view/v_tempatData.php?');

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
        })
    });
</script>