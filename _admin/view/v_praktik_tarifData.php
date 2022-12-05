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

$sql_praktik_tarif = "SELECT * FROM tb_tarif_pilih ";
$sql_praktik_tarif .= " JOIN tb_praktik ON tb_tarif_pilih.id_praktik = tb_praktik.id_praktik ";
$sql_praktik_tarif .= " WHERE tb_praktik.status_praktik = 'Y' AND tb_praktik.id_praktik = " . base64_decode(urldecode($_GET['idp']));
$sql_praktik_tarif .= " ORDER BY tb_tarif_pilih.nama_tarif_pilih ASC";
// echo "$sql_praktik_tarif<br>";
try {
    $q_praktik_tarif = $conn->query($sql_praktik_tarif);
} catch (Exception $ex) {
    echo "<script>alert('$ex -DATA PRAKTIK');";
    echo "document.location.href='?error404';</script>";
}
$r_praktik_tarif = $q_praktik_tarif->rowCount();

if ($r_praktik_tarif > 0) {
?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="<?= md5('table' . $d_praktik['id_praktik']) ?>">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Jenis tarif</th>
                    <th scope="col">Nama Tarif </th>
                    <th scope="col">Tarif </th>
                    <th scope="col">Satuan </th>
                    <th scope="col">Frekuensi </th>
                    <th scope="col">Kuantitas </th>
                    <th scope="col">Total Tarif </th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total_jumlah_tarif = 0;
                $no = 1;
                while ($d_praktik_tarif = $q_praktik_tarif->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr class="text-center align-middle my-auto">
                        <td class="align-middle "><?= $no; ?></td>
                        <td class="align-middle "><?= $d_praktik_tarif['nama_jenis_tarif_pilih']; ?></td>
                        <td class="align-middle "><?= $d_praktik_tarif['nama_tarif_pilih']; ?></td>
                        <td class="align-middle "><?= "Rp " . number_format($d_praktik_tarif['nominal_tarif_pilih'], 0, ",", "."); ?></td>
                        <td class="align-middle "><?= $d_praktik_tarif['nama_satuan_tarif_pilih']; ?></td>
                        <td class="align-middle "><?= $d_praktik_tarif['frekuensi_tarif_pilih']; ?></td>
                        <td class="align-middle "><?= $d_praktik_tarif['kuantitas_tarif_pilih']; ?></td>
                        <td class="align-middle "> <?= "Rp " . number_format($d_praktik_tarif['jumlah_tarif_pilih'], 0, ",", "."); ?></td>
                        <td class="align-middle ">
                            <?php if ($d_praktik_tarif['status_tarif_pilih'] == 'Y') { ?>
                                <span class="badge badge-success">Aktif</span>
                            <?php } else if ($d_praktik_tarif['status_tarif_pilih'] == 'T') { ?>
                                <span class="badge badge-danger">Tidak Aktif</span>
                            <?php } else { ?>
                                <span class="badge badge-danger">ERROR!!!</span>
                            <?php } ?>
                        </td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" role="group" aria-label="Basic example">
                                <div class="btn-group" role="group" role="group" aria-label="Basic example">
                                    <?php if ($d_prvl['u_praktikan'] == 'Y') { ?>
                                        <!-- tombol modal ubah praktikan  -->
                                        <a title="Ubah" class='btn btn-outline-primary ubah_init<?= md5($d_praktik_tarif['id_praktikan']); ?>' id="<?= urlencode(base64_encode($d_praktik_tarif['id_praktikan'])); ?>" href='#' data-toggle="modal" data-target="#mu<?= md5($d_praktik_tarif['id_praktikan']); ?>">
                                            <i class="far fa-edit"></i>
                                        </a>

                                        <!-- modal ubah praktikan  -->
                                        <div class="modal fade text-center" id="mu<?= md5($d_praktik_tarif['id_praktikan']); ?>" data-backdrop="static">
                                            <div class="modal-dialog modal-dialog-scrollable  modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header h5">
                                                        Ubah Praktikan
                                                    </div>
                                                    <div class="modal-body text-md">
                                                        <form class="form-data b" method="post" id="form_u<?= md5($d_praktik_tarif['id_praktikan']); ?>">
                                                            <input type="hidden" name="idprkn<?= md5($d_praktik_tarif['id_praktikan']); ?>" id="idprkn<?= md5($d_praktik_tarif['id_praktikan']); ?>" value="" required>
                                                            No. ID Praktikan (NIM/NPM/NIP) : <span style="color:red">*</span><br>
                                                            <input type="text" id="u_no_id<?= md5($d_praktik_tarif['id_praktikan']); ?>" name="u_no_id" class="form-control" placeholder="Isikan No ID" required>
                                                            <div class="text-danger b i text-xs blink" id="err_u_no_id"></div><br>
                                                            Nama Siswa/Mahasiswa : <span style="color:red">*</span><br>
                                                            <input type="text" id="u_nama<?= md5($d_praktik_tarif['id_praktikan']); ?>" name="u_nama" class="form-control" placeholder="Inputkan Nama Siswa/Mahasiswa" required>
                                                            <div class="text-danger b i text-xs blink" id="err_u_nama"></div><br>
                                                            Tanggal Lahir : <span style="color:red">*</span><br>
                                                            <input type="date" id="u_tgl<?= md5($d_praktik_tarif['id_praktikan']); ?>" name="u_tgl" class="form-control" required>
                                                            <div class="text-danger b i text-xs blink" id="err_u_tgl"></div><br>
                                                            Alamat : <span style="color:red">*</span><br>
                                                            <textarea id="u_alamat<?= md5($d_praktik_tarif['id_praktikan']); ?>" name="u_alamat" class="form-control" rows="2" placeholder="Inputkan Alamat"></textarea>
                                                            <div class="text-danger b i text-xs blink" id="err_u_alamat"></div><br>
                                                            No Telepon : <span style="color:red">*</span><br>
                                                            <input type="number" id="u_telp<?= md5($d_praktik_tarif['id_praktikan']); ?>" name="u_telp" class="form-control" min="1" placeholder="Inputkan No Telpon" required>
                                                            <div class="text-danger b i text-xs blink" id="err_u_telpon"></div><br>
                                                            No WhatsApp :<br>
                                                            <input type="number" id="u_wa<?= md5($d_praktik_tarif['id_praktikan']); ?>" name="u_wa" class="form-control" min="1" placeholder="Inputkan WhatsApp">
                                                            <div class="text-danger b i text-xs blink" id="err_u_wa"></div><br>
                                                            E-Mail : <br>
                                                            <input type="email" id="u_email<?= md5($d_praktik_tarif['id_praktikan']); ?>" name="u_email" class="form-control" placeholder="Inputkan E-Mail">
                                                            <div class="text-danger b i text-xs blink" id="err_u_email"></div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer text-md">
                                                        <a class="btn btn-danger btn-sm ubah_tutup<?= md5($d_praktik_tarif['id_praktikan']); ?>" data-dismiss="modal">
                                                            Kembali
                                                        </a>
                                                        &nbsp;
                                                        <a class="btn btn-primary btn-sm ubah<?= md5($d_praktik_tarif['id_praktikan']); ?>" id="<?= urlencode(base64_encode($d_praktik_tarif['id_praktikan'])); ?>" data-dismiss="modal">
                                                            Ubah
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($d_prvl['d_praktikan'] == 'Y') { ?>
                                        <!-- tombol modal hapus praktikan  -->
                                        <a title="Hapus" class='btn btn-outline-danger' href='#' data-toggle="modal" data-target="#md<?= md5($d_praktik_tarif['id_praktikan']); ?>">
                                            <i class="far fa-trash-alt"></i>
                                        </a>

                                        <!-- modal hapus praktikan  -->
                                        <div class="modal fade text-center" id="md<?= md5($d_praktik_tarif['id_praktikan']); ?>">
                                            <div class="modal-dialog modal-dialog-scrollable  modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header h5">
                                                        Hapus Praktikan
                                                    </div>
                                                    <div class="modal-footer text-md">
                                                        <a class="btn btn-outline-secondary btn-sm" data-dismiss="modal">
                                                            Kembali
                                                        </a>
                                                        &nbsp;
                                                        <a class="btn btn-outline-danger btn-sm hapus<?= md5($d_praktik_tarif['id_praktikan']); ?>" id="<?= urlencode(base64_encode($d_praktik_tarif['id_praktikan'])); ?>" data-dismiss="modal">
                                                            Hapus
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                                <script>
                                    $(document).ready(function() {
                                        $('#dataTable<?= $_GET['tb'] ?>').DataTable();
                                    });
                                    <?php if ($d_prvl['u_praktikan'] == 'Y') { ?>
                                        $(".ubah_init<?= md5($d_praktik_tarif['id_praktikan']); ?>").click(function() {
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
                                                    $('#idprkn<?= md5($d_praktik_tarif['id_praktikan']); ?>').val(response.idprkn);
                                                    $('#u_no_id<?= md5($d_praktik_tarif['id_praktikan']); ?>').val(response.u_no_id);
                                                    $('#u_nama<?= md5($d_praktik_tarif['id_praktikan']); ?>').val(response.u_nama);
                                                    $('#u_tgl<?= md5($d_praktik_tarif['id_praktikan']); ?>').val(response.u_tgl);
                                                    $('#u_telp<?= md5($d_praktik_tarif['id_praktikan']); ?>').val(response.u_telp);
                                                    $('#u_wa<?= md5($d_praktik_tarif['id_praktikan']); ?>').val(response.u_wa);
                                                    $('#u_email<?= md5($d_praktik_tarif['id_praktikan']); ?>').val(response.u_email);
                                                    $('#u_alamat<?= md5($d_praktik_tarif['id_praktikan']); ?>').val(response.u_alamat);
                                                },
                                                error: function(response) {
                                                    alert(response.responseText);
                                                    console.log(response.responseText);
                                                }
                                            });
                                        });

                                        // inisiasi klik modal ubah  tutup
                                        $(".ubah_tutup<?= md5($d_praktik_tarif['id_praktikan']); ?>").click(function() {
                                            // console.log("tambah_tutup<?= md5($d_praktik_tarif['id_praktikan']); ?>");
                                            $("#form_u<?= md5($d_praktik_tarif['id_praktikan']); ?>").trigger("reset");
                                            $('#mu<?= md5($d_praktik_tarif['id_praktikan']); ?>').modal('hide');
                                        });

                                        $(document).on('click', '.ubah<?= md5($d_praktik_tarif['id_praktikan']); ?>', function() {
                                            var data_u = $('#form_u<?= md5($d_praktik_tarif['id_praktikan']); ?>').serializeArray();
                                            data_u.push({
                                                name: "idprkn",
                                                value: $(this).attr('id')
                                            });

                                            var u_no_id = $('#u_no_id<?= md5($d_praktik_tarif['id_praktikan']); ?>').val();
                                            var u_nama = $('#u_nama<?= md5($d_praktik_tarif['id_praktikan']); ?>').val();
                                            var u_tgl = $('#u_tgl<?= md5($d_praktik_tarif['id_praktikan']); ?>').val();
                                            var u_alamat = $('#u_alamat<?= md5($d_praktik_tarif['id_praktikan']); ?>').val();
                                            var u_telpon = $('#u_telpon<?= md5($d_praktik_tarif['id_praktikan']); ?>').val();
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
                                                        $('#mu<?= md5($d_praktik_tarif['id_praktikan']) ?>').on('hidden.bs.modal', function(e) {
                                                            $('#<?= md5("data" . $d_praktik_tarif['id_praktik']); ?>')
                                                                .load("_admin/view/v_praktikanData.php?idu=<?= $_GET['idu']; ?>&idp=<?= urlencode(base64_encode($d_praktik_tarif['id_praktik'])); ?>&tb=<?= $_GET['tb'] ?>");
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
                                                            title: '<span class"text-centere"><b>Data Praktikan</b><br>Berhasil Dirubah',
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
                                        $(document).on('click', '.hapus<?= md5($d_praktik_tarif['id_praktikan']); ?>', function() {
                                            console.log("hapus data praktikan");
                                            $.ajax({
                                                type: 'POST',
                                                url: "_admin/exc/x_v_praktikan_h.php",
                                                data: {
                                                    "idprkn": $(this).attr('id')
                                                },
                                                success: function() {

                                                    $('#md<?= md5($d_praktik_tarif['id_praktikan']); ?>').on('hidden.bs.modal', function(e) {
                                                        $('#<?= md5("data" . $d_praktik_tarif['id_praktik']); ?>')
                                                            .load("_admin/view/v_praktikanData.php?idu=<?= $_GET['idu']; ?>&idp=<?= urlencode(base64_encode($d_praktik_tarif['id_praktik'])); ?>&tb=<?= $_GET['tb'] ?>");
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
                                        });
                                    <?php } ?>
                                </script>
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

<script>
    $(document).ready(function() {
        $("#<?= md5('table' . $d_praktik['id_praktik']) ?>").dataTable();
    });
</script>