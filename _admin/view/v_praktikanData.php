<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";
$sql_prvl = "SELECT * FROM tb_user_privileges ";
$sql_prvl .= " JOIN tb_user ON tb_user_privileges.id_user = tb_user.id_user";
$sql_prvl .= " WHERE tb_user.id_user = " . base64_decode(urldecode($_GET['idu']));
try {
    $q_prvl = $conn->query($sql_prvl);
} catch (Exception $ex) {
    echo "<script>alert('$ex -DATA PRIVILEGES-');";
    echo "document.location.href='?error404';</script>";
}
$d_prvl = $q_prvl->fetch(PDO::FETCH_ASSOC);
?>
<div class="card-body">
    <?php
    $sql_data_praktikan = "SELECT * FROM tb_praktikan ";
    $sql_data_praktikan .= " JOIN tb_praktik ON tb_praktikan.id_praktik = tb_praktik.id_praktik";
    $sql_data_praktikan .= " WHERE tb_praktik.id_praktik = " . base64_decode(urldecode($_GET['idp']));
    // $sql_data_praktikan .= " AND tb_praktikan.status_praktikan = 'Y'";
    $sql_data_praktikan .= " ORDER BY tb_praktikan.nama_praktikan ASC";
    // echo "$sql_data_praktikan<br>";
    try {
        $q_data_praktikan = $conn->query($sql_data_praktikan);
    } catch (Exception $ex) {
        echo "<script>alert('$ex -DATA PRAKTIKAN-');";
        echo "document.location.href='?error404';</script>";
    }
    $r_data_praktikan = $q_data_praktikan->rowCount();

    if ($r_data_praktikan > 0) {
    ?>
        <div class="table-responsive">
            <table class="table table-striped" id="myTable">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">NO ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tgl Lahir</th>
                        <th scope="col">No. HP</th>
                        <th scope="col">No. WA</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">ALAMAT</th>
                        <?php if ($d_prvl['level_user'] == 1) { ?>
                            <th scope="col">STATUS</th>
                        <?php } ?>
                        <th scope="col">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_jumlah_tarif = 0;
                    $no = 1;
                    while ($d_data_praktikan = $q_data_praktikan->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <th scope="row"><?= $no; ?></th>
                            <td><?= $d_data_praktikan['no_id_praktikan']; ?></td>
                            <td><?= $d_data_praktikan['nama_praktikan']; ?></td>
                            <td><?= tanggal_minimal($d_data_praktikan['tgl_lahir_praktikan']); ?></td>
                            <td><?= $d_data_praktikan['telp_praktikan']; ?></td>
                            <td><?= $d_data_praktikan['wa_praktikan']; ?></td>
                            <td><?= $d_data_praktikan['email_praktikan']; ?></td>
                            <td><?= $d_data_praktikan['alamat_praktikan']; ?></td>
                            <?php if ($d_prvl['level_user'] == 1) { ?>
                                <td>
                                    <?php
                                    if ($d_data_praktikan['status_praktikan'] == "Y") echo "<span class='badge badge-success'>AKTIF</span>";
                                    elseif ($d_data_praktikan['status_praktikan'] == "T") echo "<span class='badge badge-danger'>NON-AKTIF</span>";
                                    else echo "<span class='badge badge-danger'>ERROR!!!</span>";
                                    ?>
                                </td>
                            <?php } ?>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <!-- tombol modal ubah praktikan  -->
                                    <?php if ($d_prvl['u_praktikan'] == 'Y') { ?>
                                        <a title="Ubah" class='btn btn-primary ubah_init<?= md5($d_data_praktikan['id_praktikan']); ?>' id="<?= urlencode(base64_encode($d_data_praktikan['id_praktikan'])); ?>" href='#' data-toggle="modal" data-target="#mu<?= md5($d_data_praktikan['id_praktikan']); ?>">
                                            <i class="far fa-edit"></i>
                                        </a>

                                        <!-- modal ubah praktikan  -->
                                        <div class="modal fade text-center" id="mu<?= md5($d_data_praktikan['id_praktikan']); ?>" data-backdrop="static">
                                            <div class="modal-dialog modal-dialog-scrollable  modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header h5">
                                                        Ubah Praktikan
                                                    </div>
                                                    <div class="modal-body text-md">
                                                        <form class="form-data b" method="post" id="form_u<?= md5($d_data_praktikan['id_praktikan']); ?>">
                                                            <input type="hidden" name="idprkn<?= md5($d_data_praktikan['id_praktikan']); ?>" id="idprkn<?= md5($d_data_praktikan['id_praktikan']); ?>" value="" required>
                                                            No. ID Praktikan (NIM/NPM/NIP) : <span style="color:red">*</span><br>
                                                            <input type="text" id="u_no_id<?= md5($d_data_praktikan['id_praktikan']); ?>" name="u_no_id" class="form-control" placeholder="Isikan No ID" required>
                                                            <div class="text-danger b i text-xs blink" id="err_u_no_id"></div><br>
                                                            Nama Siswa/Mahasiswa : <span style="color:red">*</span><br>
                                                            <input type="text" id="u_nama<?= md5($d_data_praktikan['id_praktikan']); ?>" name="u_nama" class="form-control" placeholder="Inputkan Nama Siswa/Mahasiswa" required>
                                                            <div class="text-danger b i text-xs blink" id="err_u_nama"></div><br>
                                                            Tanggal Lahir : <span style="color:red">*</span><br>
                                                            <input type="date" id="u_tgl<?= md5($d_data_praktikan['id_praktikan']); ?>" name="u_tgl" class="form-control" required>
                                                            <div class="text-danger b i text-xs blink" id="err_u_tgl"></div><br>
                                                            Alamat : <span style="color:red">*</span><br>
                                                            <textarea id="u_alamat<?= md5($d_data_praktikan['id_praktikan']); ?>" name="u_alamat" class="form-control" rows="2" placeholder="Inputkan Alamat"></textarea>
                                                            <div class="text-danger b i text-xs blink" id="err_u_alamat"></div><br>
                                                            No Telepon : <span style="color:red">*</span><br>
                                                            <input type="number" id="u_telp<?= md5($d_data_praktikan['id_praktikan']); ?>" name="u_telp" class="form-control" min="1" placeholder="Inputkan No Telpon" required>
                                                            <div class="text-danger b i text-xs blink" id="err_u_telpon"></div><br>
                                                            No WhatsApp :<br>
                                                            <input type="number" id="u_wa<?= md5($d_data_praktikan['id_praktikan']); ?>" name="u_wa" class="form-control" min="1" placeholder="Inputkan WhatsApp">
                                                            <div class="text-danger b i text-xs blink" id="err_u_wa"></div><br>
                                                            E-Mail : <br>
                                                            <input type="email" id="u_email<?= md5($d_data_praktikan['id_praktikan']); ?>" name="u_email" class="form-control" placeholder="Inputkan E-Mail">
                                                            <div class="text-danger b i text-xs blink" id="err_u_email"></div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer text-md">
                                                        <a class="btn btn-danger btn-sm ubah_tutup<?= md5($d_data_praktikan['id_praktikan']); ?>" data-dismiss="modal">
                                                            Kembali
                                                        </a>
                                                        &nbsp;
                                                        <a class="btn btn-primary btn-sm ubah<?= md5($d_data_praktikan['id_praktikan']); ?>" id="<?= urlencode(base64_encode($d_data_praktikan['id_praktikan'])); ?>" data-dismiss="modal">
                                                            Ubah
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($d_prvl['d_praktikan'] == 'Y') { ?>
                                        <a class="btn btn-danger hapus<?= md5($d_data_praktikan['id_praktikan']) ?>" id="<?= urlencode(base64_encode($d_data_praktikan['id_praktikan'])); ?>" href="#" title="Hapus">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    <?php } ?>
                                </div>

                                <script>
                                    $(document).ready(function() {
                                        $('#myTable').DataTable();
                                    });

                                    <?php if ($d_prvl['u_praktikan'] == 'Y') { ?>
                                        $(".ubah_init<?= md5($d_data_praktikan['id_praktikan']); ?>").click(function() {
                                            // console.log("ubah_init");
                                            $('#err_u_no_id').empty();
                                            $('#err_u_nama').empty();
                                            $('#err_u_tgl').empty();
                                            $('#err_u_alamat').empty();
                                            $('#err_u_telpon').empty();
                                            $.ajax({
                                                type: 'POST',
                                                url: "_admin/view/v_praktikanGetData.php",
                                                data: {
                                                    idprkn: $(this).attr('id')
                                                },
                                                dataType: 'json',
                                                success: function(response) {
                                                    $('#idprkn<?= md5($d_data_praktikan['id_praktikan']); ?>').val(response.idprkn);
                                                    $('#u_no_id<?= md5($d_data_praktikan['id_praktikan']); ?>').val(response.u_no_id);
                                                    $('#u_nama<?= md5($d_data_praktikan['id_praktikan']); ?>').val(response.u_nama);
                                                    $('#u_tgl<?= md5($d_data_praktikan['id_praktikan']); ?>').val(response.u_tgl);
                                                    $('#u_telp<?= md5($d_data_praktikan['id_praktikan']); ?>').val(response.u_telp);
                                                    $('#u_wa<?= md5($d_data_praktikan['id_praktikan']); ?>').val(response.u_wa);
                                                    $('#u_email<?= md5($d_data_praktikan['id_praktikan']); ?>').val(response.u_email);
                                                    $('#u_alamat<?= md5($d_data_praktikan['id_praktikan']); ?>').val(response.u_alamat);
                                                },
                                                error: function(response) {
                                                    alert(response.responseText);
                                                    console.log(response.responseText);
                                                }
                                            });
                                        });

                                        // inisiasi klik modal ubah  tutup
                                        $(".ubah_tutup<?= md5($d_data_praktikan['id_praktikan']); ?>").click(function() {
                                            // console.log("tambah_tutup<?= md5($d_data_praktikan['id_praktikan']); ?>");
                                            $("#form_u<?= md5($d_data_praktikan['id_praktikan']); ?>").trigger("reset");
                                            $('#mu<?= md5($d_data_praktikan['id_praktikan']); ?>').modal('hide');
                                        });

                                        $(document).on('click', '.ubah<?= md5($d_data_praktikan['id_praktikan']); ?>', function() {
                                            var data_u = $('#form_u<?= md5($d_data_praktikan['id_praktikan']); ?>').serializeArray();
                                            data_u.push({
                                                name: "idprkn",
                                                value: $(this).attr('id')
                                            });

                                            var u_no_id = $('#u_no_id<?= md5($d_data_praktikan['id_praktikan']); ?>').val();
                                            var u_nama = $('#u_nama<?= md5($d_data_praktikan['id_praktikan']); ?>').val();
                                            var u_tgl = $('#u_tgl<?= md5($d_data_praktikan['id_praktikan']); ?>').val();
                                            var u_alamat = $('#u_alamat<?= md5($d_data_praktikan['id_praktikan']); ?>').val();
                                            var u_telpon = $('#u_telpon<?= md5($d_data_praktikan['id_praktikan']); ?>').val();
                                            //cek data from ubah bila tidak diiisi
                                            if (
                                                u_no_id == "" ||
                                                u_nama == "" ||
                                                u_tgl == "" ||
                                                u_alamat == "" ||
                                                u_telpon == ""
                                            ) {
                                                if (u_no_id == "") {
                                                    document.getElementById("err_u_no_id").innerHTML = "No ID Harus Diisi";
                                                } else {
                                                    document.getElementById("err_u_no_id").innerHTML = "";
                                                }

                                                if (u_nama == "") {
                                                    document.getElementById("err_u_nama").innerHTML = "Nama Harus Diisi";
                                                } else {
                                                    document.getElementById("err_u_nama").innerHTML = "";
                                                }

                                                if (u_tgl == "") {
                                                    document.getElementById("err_u_tgl").innerHTML = "Tanggal Lahir Harus Dipilih";
                                                } else {
                                                    document.getElementById("err_u_tgl").innerHTML = "";
                                                }

                                                if (u_alamat == "") {
                                                    document.getElementById("err_u_alamat").innerHTML = "Alamat Harus Diisi";
                                                } else {
                                                    document.getElementById("err_u_alamat").innerHTML = "";
                                                }

                                                if (u_telpon == "") {
                                                    document.getElementById("err_u_telpon").innerHTML = "Telpon Harus Diisi";
                                                } else {
                                                    document.getElementById("err_u_telpon").innerHTML = "";
                                                }
                                            }

                                            //simpan data ubah bila sudah sesuai
                                            if (
                                                u_no_id != "" &&
                                                u_nama != "" &&
                                                u_tgl != "" &&
                                                u_alamat != "" &&
                                                u_telpon != ""
                                            ) {
                                                $.ajax({
                                                    type: 'POST',
                                                    url: "_admin/exc/x_v_praktikan_u.php",
                                                    data: data_u,
                                                    success: function() {
                                                        $('#mu<?= md5($d_data_praktikan['id_praktikan']) ?>').on('hidden.bs.modal', function(e) {
                                                            $('#<?= md5("data" . $d_data_praktikan['id_praktik']); ?>').load("_admin/view/v_praktikanData.php?idu=<?= $_GET['idu']; ?>&idp=<?= urlencode(base64_encode($d_data_praktikan['id_praktik'])); ?>");
                                                        })
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

                                    <?php } ?>

                                    <?php if ($d_prvl['d_praktikan'] == 'Y') { ?>
                                        $(document).on('click', '.hapus<?= md5($d_data_praktikan['id_praktikan']) ?>', function() {
                                            console.log("hapus data praktikan");
                                            Swal.fire({
                                                title: 'Hapus Data Praktikan ?',
                                                icon: 'error',
                                                showCancelButton: true,
                                                confirmButtonColor: '#1cc88a',
                                                cancelButtonColor: '#d33',
                                                cancelButtonText: 'Kembali',
                                                confirmButtonText: 'Ya',
                                                allowOutsideClick: true,
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: "_admin/exc/x_v_praktikan_h.php",
                                                        data: {
                                                            "idprkn": $(this).attr('id')
                                                        },
                                                        success: function() {
                                                            $('#mu<?= md5($d_data_praktikan['id_praktikan']) ?>').on('hidden.bs.modal', function(e) {
                                                                $('#<?= md5("data" . $d_data_praktikan['id_praktik']); ?>').load("_admin/view/v_praktikanData.php?idu=<?= $_GET['idu']; ?>&idp=<?= urlencode(base64_encode($d_data_praktikan['id_praktik'])); ?>");
                                                            })
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
                                                            console.log(response);
                                                            alert('eksekusi query gagal');
                                                        }
                                                    });
                                                }
                                            });
                                        });
                                    <?php } ?>
                                </script>
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
        <div class="jumbotron">
            <div class="jumbotron-fluid">
                <div class="text-gray-700">
                    <h5 class="text-center">Data Praktikan Tidak Ada</h5>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>