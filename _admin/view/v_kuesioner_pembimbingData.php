<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/crypt.php";

$sql_pertanyaan = "SELECT * FROM tb_kuesioner_pembimbing_pertanyaan";
// echo $sql_pertanyaan;
try {
    $q_pertanyaan = $conn->query($sql_pertanyaan);
    $r_pertanyaan = $q_pertanyaan->rowCount();
} catch (Exception $ex) {
?>
    <script>
        alert("<?= $ex->getMessage() . $ex->getLine() ?>");
        document.location.href = '?error404';
    </script>
<?php
}
?>
<?php if ($r_pertanyaan > 0) { ?>
    <div class="table-responsive">
        <table class="table table-striped" id="dataTable">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Pertanyaan</th>
                    <th scope="col">Jawaban</th>
                    <th scope="col">Waktu Tambah</th>
                    <th scope="col">Waktu Ubah</th>
                    <th scope="col">Keterangan </th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php while ($d_pertanyaan = $q_pertanyaan->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <th scope="row"><?= $no; ?></th>
                        <td><?= $d_pertanyaan['pertanyaan']; ?></td>
                        <td>
                            <?php
                            $sql_p_jawaban = "SELECT * FROM tb_kuesioner_pembimbing_jawaban";
                            $sql_p_jawaban .= " WHERE id_pertanyaan = " . $d_pertanyaan['id'];
                            // echo $sql_p_jawaban;
                            try {
                                $q_p_jawaban = $conn->query($sql_p_jawaban);
                                $r_p_jawaban = $q_p_jawaban->rowCount();
                            } catch (Exception $ex) {
                            ?>
                                <script>
                                    alert("<?= $ex->getMessage() . $ex->getLine() . $sql_p_jawaban ?>");
                                    document.location.href = '?error404';
                                </script>
                            <?php
                            }
                            ?>
                            <a href="?kuesioner_pembimbing&jawaban=<?= encryptString($d_pertanyaan['id'], $customkey) ?>&pertanyaan=<?= encryptString($d_pertanyaan['pertanyaan'], $customkey) ?>" title="ubah" class="btn btn-primary btn-xs">
                                <i class="fa-regular fa-pen-to-square fa-beat"></i> Ubah
                            </a>
                            <?php if ($r_p_jawaban > 0) { ?>
                                <a href="Ubah" title="ubah" class="btn btn-primary btn-xs">
                                    <i class="fa-regular fa-pen-to-square"></i> Ubah
                                </a>
                            <?php } else { ?>
                                <div class="badge badge-danger blink">Data Tidak Ada</div>
                            <?php } ?>
                        </td>
                        <td><?= $d_pertanyaan['tgl_tambah']; ?></td>
                        <td><?= $d_pertanyaan['tgl_ubah']; ?></td>
                        <td class="text-center"><?= $d_pertanyaan['ket']; ?></td>
                        <td class="text-center">

                            <!-- tombol modal ubah  -->
                            <a href="#" class="btn btn-primary btn-sm ubah_init<?= md5($no . $customkey); ?>" data-toggle="modal" data-target="#mubah<?= md5($no . $customkey); ?>">
                                <i class="fa fa-edit"></i> Ubah
                            </a>
                            <!-- modal tambah  -->
                            <div class="modal text-center" id="mubah<?= md5($no . $customkey); ?>" data-backdrop="static">
                                <div class="modal-dialog modal-dialog-scrollable  modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header h5 bg-primary text-light">
                                            Ubah Pertanyaan
                                        </div>
                                        <div class="modal-body text-md">
                                            <form class="form-data b" method="post" id="form<?= md5($no . $customkey); ?>">
                                                Ubah Pertanyaan <span style="color:red">*</span><br>
                                                <input type="text" id="pertanyaan<?= md5($no . $customkey); ?>" name="pertanyaan" class="form-control" placeholder="isikan pertanyaan" required>
                                                <div class="text-danger b i text-xs blink err" id="err_pertanyaan"></div>
                                                Keterangan<br>
                                                <textarea id="ket<?= md5($no . $customkey); ?>" name="ket" class="form-control"> </textarea>
                                                <input type="hidden" id="id<?= md5($no . $customkey); ?>" name="id">

                                            </form>
                                        </div>
                                        <div class="modal-footer text-md">
                                            <a class="btn btn-danger btn-sm tambah_tutup" data-dismiss="modal">
                                                Kembali
                                            </a>
                                            &nbsp;
                                            <a class="btn btn-primary btn-sm ubah<?= md5($no . $customkey); ?>" id="<?= encryptString($d_pertanyaan['id'], $customkey); ?>">
                                                Ubah
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                $(".ubah_init<?= md5($no . $customkey); ?>").click(function() {
                                    loading_sw2();
                                    $('.err').html("");
                                    $.ajax({
                                        type: 'POST',
                                        url: "_admin/view/v_kuesioner_pembimbingGetData.php",
                                        data: {
                                            id: "<?= encryptString($d_pertanyaan['id'], $customkey); ?>"
                                        },
                                        dataType: "JSON",
                                        success: function(response) {
                                            if (response.ket == "success") {
                                                $('#pertanyaan<?= md5($no . $customkey); ?>').val(response.pertanyaan);
                                                $('#ket<?= md5($no . $customkey); ?>').val(response.keterangan);
                                                $('#id<?= md5($no . $customkey); ?>').val(response.id);
                                                Swal.close();
                                            } else error();
                                        },
                                        error: function() {
                                            error();
                                        }
                                    });
                                });
                                $(".ubah<?= md5($no . $customkey); ?>").click(function() {
                                    loading_sw2();
                                    var data = $("#form<?= md5($no . $customkey); ?>").serializeArray();
                                    var pertanyaan = $('#pertanyaan<?= md5($no . $customkey); ?>').val();

                                    //cek data from modal tambah bila tidak diiisi
                                    if (pertanyaan == "") {
                                        pertanyaan == "" ? $("#err_pertanyaan").html("Pertanyaan Harus Diisi") : $("#err_pertanyaan").html("");
                                        simpan_tidaksesuai();
                                    }
                                    //simpan data tambah bila sudah sesuai
                                    else {
                                        loading_sw2();
                                        $('.err').html("");
                                        $.ajax({
                                            type: 'POST',
                                            url: "_admin/exc/x_v_kuesioner_pembimbing_u.php",
                                            data: data,
                                            dataType: "JSON",
                                            success: function(response) {
                                                if (response.ket == "success") {
                                                    simpan_berhasil("");
                                                    setTimeout(function() {
                                                        loading_sw2()
                                                        $('#data_pertanyaan').load('_admin/view/v_kuesioner_pembimbingData.php');
                                                        $('#err_pertanyaan').empty();
                                                        Swal.close();
                                                    }, 1235000);
                                                } else simpan_tidaksesuai();
                                            },
                                            error: function() {
                                                error();
                                            }
                                        });
                                    }
                                });
                            </script>

                            <!-- tombol modal hapus pertanyaan   -->
                            <a title="Hapus Pertanyaan" class='btn btn-danger btn-sm hapus' id="<?= encryptString($d_pertanyaan['id'], $customkey) ?>">
                                <i class="fas fa-trash"></i> Hapus
                            </a>

                            <!-- modal hapus pertanyaan   -->
                            <div class="modal text-center" id="<?= md5("hapus" . $no) ?>" data-backdrop="static">
                                <div class="modal-dialog modal-dialog-scrollable  modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header h5 bg-danger text-light">
                                            Yakin Hapus Pertanyaan?
                                        </div>
                                        <div class="modal-body text-md">
                                            <div class="i b text-uppercase"><?= $d_pertanyaan['pertanyaan']; ?></div>
                                        </div>
                                        <div class="modal-footer text-md">
                                            <a class="btn btn-secondary btn-sm" data-dismiss="modal">
                                                Kembali
                                            </a>
                                            &nbsp;
                                            <a class="btn btn-success btn-sm hapus">
                                                Hapus
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php $no++; ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php } else { ?>
    <div class="jumbotron">
        <div class="jumbotron-fluid">
            <div class="text-gray-700">
                <h5 class="text-center">Data Pertanyaan Pembimbing Tidak Ada</h5>
            </div>
        </div>
    </div>
<?php } ?>
</div>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
        Swal.close();
        $(document).on('click', '.hapus', function() {
            console.log("AKTIF");
            Swal.fire({
                position: 'top',
                html: "<span class='b'>HAPUS DATA?</span>",
                icon: 'warning',
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
                        url: "_admin/exc/x_v_kuesioner_pembimbing_h.php",
                        data: {
                            "id": $(this).attr('id')
                        },
                        dataType: "JSON",
                        success: function(response) {
                            response.ket == "error" ? hapus_gagal() : hapus_berhasil("?kuesioner_pembimbing");
                        },
                        error: function() {
                            error();
                        }
                    });
                }
            })
        });
    });
</script>