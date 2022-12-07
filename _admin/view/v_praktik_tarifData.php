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
$sql_praktik_tarif .= " ORDER BY tb_tarif_pilih.nama_jenis_tarif_pilih ASC";
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
        <table class="table table-striped table-bordered" id="<?= $_GET['tb'] ?>">
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
                            <div class="btn-group" role="group">
                                <?php if ($d_prvl['u_praktik_tarif'] == 'Y') { ?>
                                    <!-- tombol modal ubah tarif  -->
                                    <a title="Ubah" class='btn btn-outline-primary ubah_init<?= md5($d_praktik_tarif['id_tarif_pilih']); ?>' href='#' data-toggle="modal" data-target="#mu<?= md5($d_praktik_tarif['id_tarif_pilih']); ?>">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <!-- modal ubah tarif  -->
                                    <div class="modal fade text-center" id="mu<?= md5($d_praktik_tarif['id_tarif_pilih']); ?>" data-backdrop="static">
                                        <div class="modal-dialog modal-dialog-scrollable modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header h5">
                                                    Ubah Tarif
                                                </div>
                                                <div class="modal-body text-md m-0">
                                                    <form class="form-data b" method="post" id="<?= md5('form_u' . $d_praktik_tarif['id_praktik_tarif']); ?>">
                                                        <input type="hidden" id="<?= md5('id_tarif_pilih' . $d_praktik_tarif['id_tarif_pilih']); ?>" name="<?= md5('id_tarif_pilih' . $d_praktik_tarif['id_tarif_pilih']); ?>" value="">
                                                        Jenis Tarif : <span style="color:red">*</span><br>
                                                        <select class="select2 form-control" id="<?= md5('u_jenis_tarif' . $d_praktik_tarif['id_tarif_pilih']); ?>" name="<?= md5('u_jenis_tarif' . $d_praktik_tarif['id_tarif_pilih']); ?>" required>
                                                            <option value="">-- Pilih Jenis Tarif --</option>
                                                            <?php
                                                            $sql_jenis_tarif = "SELECT * FROM tb_tarif_jenis";
                                                            $sql_jenis_tarif .= " ORDER BY nama_tarif_jenis ASC";
                                                            echo $sql_jenis_tarif . "<br>";
                                                            try {
                                                                $q_jenis_tarif = $conn->query($sql_jenis_tarif);
                                                            } catch (Exception $ex) {
                                                                echo "<script>alert('$ex -DATA JENIS TARIF');";
                                                                echo "document.location.href='?error404';</script>";
                                                            }
                                                            while ($d_jenis_tarif = $q_jenis_tarif->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                                <option value="<?= $d_jenis_tarif['nama_tarif_jenis'] ?>">
                                                                    <?= $d_jenis_tarif['nama_tarif_jenis'] ?>
                                                                </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <div class="text-danger b i text-xs blink" id="<?= md5('err_u_jenis_tarif' . $d_praktik_tarif['id_tarif_pilih']); ?>"></div><br>
                                                        Nama Tarif : <span style="color:red">*</span>
                                                        <input type="text" id="<?= md5('u_nama' . $d_praktik_tarif['id_tarif_pilih']); ?>" name="<?= md5('u_nama' . $d_praktik_tarif['id_tarif_pilih']); ?>" class="form-control form-control-xs" placeholder="Isikan Nama Tarif" required>
                                                        <div class="text-danger b i text-xs blink" id="<?= md5('err_u_nama' . $d_praktik_tarif['id_tarif_pilih']); ?>"></div><br>
                                                        <div class="row">
                                                            <div class="col-md">
                                                                Tarif : <span style="color:red">*</span>
                                                                <input type="number" id="<?= md5('u_tarif' . $d_praktik_tarif['id_tarif_pilih']); ?>" name="<?= md5('u_tarif' . $d_praktik_tarif['id_tarif_pilih']); ?>" class="form-control form-control-xs" min="1" placeholder="Isikan Tarif" required>
                                                                <div class="text-danger b i text-xs blink" id="<?= md5('err_u_tarif' . $d_praktik_tarif['id_tarif_pilih']); ?>"></div><br>
                                                            </div>
                                                            <div class="col-md">
                                                                Satuan : <span style="color:red">*</span>
                                                                <select class="select2 form-control" id="<?= md5('u_satuan' . $d_praktik_tarif['id_tarif_pilih']); ?>" name="<?= md5('u_satuan' . $d_praktik_tarif['id_tarif_pilih']); ?>" required>
                                                                    <option value="">-- Pilih Satuan Tarif --</option>
                                                                    <?php
                                                                    $sql_satuan_tarif = "SELECT * FROM tb_tarif_satuan";
                                                                    $sql_satuan_tarif .= " ORDER BY nama_tarif_satuan ASC";
                                                                    echo $sql_satuan_tarif . "<br>";
                                                                    try {
                                                                        $q_satuan_tarif = $conn->query($sql_satuan_tarif);
                                                                    } catch (Exception $ex) {
                                                                        echo "<script>alert('$ex -DATA SATUAN TARIF');";
                                                                        echo "document.location.href='?error404';</script>";
                                                                    }
                                                                    while ($d_satuan_tarif = $q_satuan_tarif->fetch(PDO::FETCH_ASSOC)) {
                                                                    ?>
                                                                        <option value="<?= $d_satuan_tarif['nama_tarif_satuan'] ?>">
                                                                            <?= $d_satuan_tarif['nama_tarif_satuan'] ?>
                                                                        </option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <div class="text-danger b i text-xs blink" id="<?= md5('err_u_satuan' . $d_praktik_tarif['id_tarif_pilih']); ?>"></div><br>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="row">
                                                            <div class="col-md">
                                                                Frekuensi : <span style="color:red">*</span>
                                                                <input type="number" id="<?= md5('u_frekuensi' . $d_praktik_tarif['id_praktik']); ?>" name="<?= md5('u_frekuensi' . $d_praktik_tarif['id_praktik']); ?>" class="form-control form-control-xs" min="1" placeholder="Isikan Frekeunsi" required>
                                                                <div class="text-danger b i text-xs blink" id="<?= md5('err_u_frekuensi' . $d_praktik_tarif['id_praktik']); ?>"></div><br>
                                                            </div>
                                                            <div class="col-md">
                                                                Kuantitas : <span style="color:red">*</span>
                                                                <input type="number" id="<?= md5('u_kuantitas' . $d_praktik_tarif['id_praktik']); ?>" name="<?= md5('u_kuantitas' . $d_praktik_tarif['id_praktik']); ?>" class="form-control form-control-xs" min="1" placeholder="Isikan Kuantitas" required>
                                                                <div class="text-danger b i text-xs blink" id="<?= md5('err_u_kuantitas' . $d_praktik_tarif['id_praktik']); ?>"></div><br>
                                                            </div>
                                                        </div> -->
                                                    </form>
                                                </div>
                                                <div class="modal-footer text-md">
                                                    <a class="btn btn-danger btn-sm ubah_tutup<?= $v_no; ?>" data-dismiss="modal">
                                                        Kembali
                                                    </a>
                                                    &nbsp;
                                                    <a class="tambah btn btn-success btn-sm ubah<?= $v_no; ?>" id="<?= urlencode(base64_encode($d_praktik_tarif['id_praktik'])); ?>">
                                                        Ubah
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if ($d_prvl['d_praktik_tarif'] == 'Y') { ?>
                                    <!-- tombol modal hapus pilih tarif  -->
                                    <a title="Hapus" class='btn btn-outline-danger' href='#' data-toggle="modal" data-target="#md<?= $no; ?>">
                                        <i class="far fa-trash-alt"></i>
                                    </a>

                                    <!-- modal hapus pilih tarif  -->
                                    <div class="modal fade text-center" id="md<?= $no; ?>">
                                        <div class="modal-dialog modal-dialog-scrollable  modal-md">
                                            <div class="modal-content">
                                                <div class="modal-body h5">
                                                    <div class="row">
                                                        <div class="col-lg text-left">
                                                            Hapus Tarif Praktik ?
                                                        </div>
                                                        <div class="col-lg text-right">
                                                            <a class="btn btn-outline-secondary btn-sm" data-dismiss="modal">
                                                                Kembali
                                                            </a>
                                                            &nbsp;
                                                            <a class="btn btn-outline-danger btn-sm hapus<?= $no; ?>" id="<?= urlencode(base64_encode($d_praktik_tarif['id_tarif_pilih'])); ?>" data-dismiss="modal">
                                                                Hapus
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    $('#<?= $_GET['tb'] ?>').DataTable();
                                });

                                <?php if ($d_prvl['u_praktik_tarif'] == 'Y') { ?>
                                    //ubah initial
                                    $(".ubah_init<?= md5($d_praktik_tarif['id_tarif_pilih']); ?>").click(function() {
                                        console.log("ubah_init");
                                        $("#<?= md5('err_u_jenis_tarif' . $d_praktik_tarif['id_tarif_pilih']); ?>").empty();
                                        $('#<?= md5('err_u_nama' . $d_praktik_tarif['id_tarif_pilih']); ?>').empty();
                                        $('#<?= md5('err_u_tarif' . $d_praktik_tarif['id_tarif_pilih']); ?>').empty();
                                        $("#<?= md5('err_u_satuan' . $d_praktik_tarif['id_tarif_pilih']); ?>").empty();
                                        $('#<?= md5('err_u_frekuensi' . $d_praktik_tarif['id_tarif_pilih']); ?>').empty();
                                        $('#<?= md5('err_u_kuantitas' . $d_praktik_tarif['id_tarif_pilih']); ?>').empty();
                                        $.ajax({
                                            type: 'POST',
                                            url: "_admin/view/v_praktik_tarifGetData.php",
                                            data: {
                                                idptrf: '<?= urlencode(base64_encode($d_praktik_tarif['id_tarif_pilih'])) ?>'
                                            },
                                            dataType: 'json',
                                            success: function(response) {
                                                $('#<?= md5('id_tarif_pilih' . $d_praktik_tarif['id_tarif_pilih']); ?>').val(response.id_tarif_pilih);
                                                $('#<?= md5('u_jenis_tarif' . $d_praktik_tarif['id_tarif_pilih']); ?>').val(response.u_nama_jenis).trigger("change");
                                                $('#<?= md5('u_nama' . $d_praktik_tarif['id_tarif_pilih']); ?>').val(response.u_nama);
                                                $('#<?= md5('u_tarif' . $d_praktik_tarif['id_tarif_pilih']); ?>').val(response.u_tarif);
                                                $('#<?= md5('u_satuan' . $d_praktik_tarif['id_tarif_pilih']); ?>').val(response.u_satuan).trigger("change");
                                                $('#<?= md5('u_frekuensi' . $d_praktik_tarif['id_tarif_pilih']); ?>').val(response.u_frekuensi);
                                                $('#<?= md5('u_kuantitas' . $d_praktik_tarif['id_tarif_pilih']); ?>').val(response.u_kuantitas);
                                                console.log(response.u_tarif);
                                            },
                                            error: function(response) {
                                                console.log(response.responseText);
                                            }
                                        });
                                    });

                                    // inisiasi klik modal ubah  tutup
                                    $(".ubah_tutup<?= md5($d_praktik_tarif['id_tarif_pilih']); ?>").click(function() {
                                        // console.log("tambah_tutup<?= md5($d_praktik_tarif['id_tarif_pilih']); ?>");
                                        $("#form_u<?= md5($d_praktik_tarif['id_tarif_pilih']); ?>").trigger("reset");
                                        $('#mu<?= md5($d_praktik_tarif['id_tarif_pilih']); ?>').modal('hide');
                                    });

                                    $(document).on('click', '.ubah<?= md5($d_praktik_tarif['id_tarif_pilih']); ?>', function() {
                                        var data_u = $('#form_u<?= md5($d_praktik_tarif['id_tarif_pilih']); ?>').serializeArray();
                                        data_u.push({
                                            name: "idtrf",
                                            value: $(this).attr('id')
                                        });

                                        var u_no_id = $('#u_no_id<?= md5($d_praktik_tarif['id_tarif_pilih']); ?>').val();
                                        var u_nama = $('#u_nama<?= md5($d_praktik_tarif['id_tarif_pilih']); ?>').val();
                                        var u_tgl = $('#u_tgl<?= md5($d_praktik_tarif['id_tarif_pilih']); ?>').val();
                                        var u_alamat = $('#u_alamat<?= md5($d_praktik_tarif['id_tarif_pilih']); ?>').val();
                                        var u_telpon = $('#u_telpon<?= md5($d_praktik_tarif['id_tarif_pilih']); ?>').val();
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
                                                    $('#mu<?= md5($d_praktik_tarif['id_tarif_pilih']) ?>').on('hidden.bs.modal', function(e) {
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
                                <?php if ($d_prvl['d_praktik_tarif'] == 'Y') { ?>
                                    // hapus data tarif 
                                    $(document).on('click', '.hapus<?= $no; ?>', function() {
                                        console.log("hapus data tarif Pilih");
                                        $.ajax({
                                            type: 'POST',
                                            url: "_admin/exc/x_v_praktik_tarif_h.php",
                                            data: {
                                                "idptrf": $(this).attr('id')
                                            },
                                            success: function() {

                                                $('#md<?= $no; ?>').on('hidden.bs.modal', function(e) {
                                                    $('#<?= $_GET['tb'] ?>  ')
                                                        .load("_admin/view/v_praktik_tarifData.php?" +
                                                            "idu=<?= $_GET['idu']; ?>" +
                                                            "&idp=<?= $_GET['idp']; ?>" +
                                                            "&tb=<?= $_GET['tb'] ?>");
                                                });
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
                <h5 class="text-center">Data Tarif Tidak Ada</h5>
            </div>
        </div>
    </div>
<?php
}
?>