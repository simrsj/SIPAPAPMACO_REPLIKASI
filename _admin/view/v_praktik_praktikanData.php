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

$sql_data_praktikan = "SELECT * FROM tb_praktikan ";
$sql_data_praktikan .= " JOIN tb_praktik ON tb_praktikan.id_praktik = tb_praktik.id_praktik";
$sql_data_praktikan .= " WHERE tb_praktik.id_praktik = " . base64_decode(urldecode($_GET['idp']));
$sql_data_praktikan .= " ORDER BY tb_praktikan.nama_praktikan ASC";
// echo "$sql_data_praktikan<br>";
try {
    $q_data_praktikan = $conn->query($sql_data_praktikan);
    $q_data_praktikan1 = $conn->query($sql_data_praktikan);
} catch (Exception $ex) {
    echo "<script>alert('$ex -DATA PRAKTIKAN-');";
    echo "document.location.href='?error404';</script>";
}
$r_data_praktikan = $q_data_praktikan->rowCount();
$d_data_praktikan1 = $q_data_praktikan1->fetch(PDO::FETCH_ASSOC);

if ($r_data_praktikan > 0) {
?>
    <div class="table-responsive">
        <table class="table table-striped" id="dataTable<?= $_GET['tb']; ?>">
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
                    <?php if ($d_data_praktikan1['id_profesi_pdd'] > 0) { ?>
                        <th scope="col">IJAZAH</th>
                    <?php } ?>
                    <th scope="col">HASIL SWAB</th>
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
                        <td class="text-center">
                            <?php
                            if ($d_data_praktikan['id_profesi_pdd'] > 0) {
                                if ($d_data_praktikan['file_ijazah_praktikan'] != "") {
                            ?>
                                    <a href="<?= $d_data_praktikan['file_ijazah_praktikan']; ?>" download="Ijazah Praktikan.pdf" target="_blank" class="btn btn-outline-success btn-sm">
                                        Unduh
                                    </a>
                                <?php } else { ?>
                                    <span class="badge badge-warning text-dark">Belum Ada</span>
                                <?php } ?>
                            <?php } ?>

                        </td>
                        <td class="text-center">
                            <?php if ($d_data_praktikan['file_ijazah_praktikan'] != "") { ?>
                                <a href="<?= $d_data_praktikan['file_swab_praktikan']; ?>" download="Swab Praktikan.pdf" target="_blank" class="btn btn-outline-success btn-sm">
                                    Unduh
                                </a>
                            <?php } else { ?>
                                <span class="badge badge-warning text-dark">Belum Ada</span>
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <div class="btn-group" role="group" role="group" aria-label="Basic example">
                                <?php if ($d_prvl['u_praktikan'] == 'Y') { ?>
                                    <!-- tombol modal ubah praktikan  -->
                                    <a title="Ubah" class='btn btn-outline-primary ubah_init<?= md5($d_data_praktikan['id_praktikan']); ?>' id="<?= urlencode(base64_encode($d_data_praktikan['id_praktikan'])); ?>" href='#' data-toggle="modal" data-target="#mu<?= md5($d_data_praktikan['id_praktikan']); ?>">
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
                                                        <div class="text-danger b i text-xs blink" id="err_u_email"></div><br>
                                                        <?php if ($d_data_praktikan['id_profesi_pdd'] > 0) { ?>
                                                            File Ijazah :<span style="color:red">*</span><br>
                                                            <div class="custom-file">
                                                                <label class="custom-file-label text-xs" for="customFile" id="labelfileijazahu<?= md5($d_data_praktikan['id_praktik']); ?>">Pilih File</label>
                                                                <input type="file" class="custom-file-input mb-1" id="u_ijazah<?= md5($d_data_praktikan['id_praktik']); ?>" name="u_ijazah<?= md5($d_data_praktikan['id_praktik']); ?>" accept="application/pdf" required>
                                                                <span class='i text-xs'>Data unggah harus pdf, Maksimal 200 Kb</span><br>
                                                                <div class="text-xs font-italic text-danger blink" id="err_u_ijazah<?= md5($d_data_praktikan['id_praktik']); ?>"></div><br>
                                                                <script>
                                                                    $('#u_ijazah<?= md5($d_data_praktikan['id_praktik']); ?>').on('change', function() {
                                                                        var fileNameIjazah = $(this).val();
                                                                        fileNameIjazah = fileNameIjazah.replace(/^.*[\\\/]/, '');
                                                                        if (fileNameIjazah == "") fileNameIjazah = "Pilih File";
                                                                        $('#labelfileijazahu<?= md5($d_data_praktikan['id_praktik']); ?>').html(fileNameIjazah);
                                                                    })
                                                                </script>
                                                            </div>
                                                            <br>
                                                        <?php } ?>
                                                        File Hasil Swab :<span style="color:red">*</span><br>
                                                        <div class="custom-file">
                                                            <label class="custom-file-label text-xs" for="customFile" id="labelfileswabu<?= md5($d_data_praktikan['id_praktik']); ?>">Pilih File</label>
                                                            <input type="file" class="custom-file-input mb-1" id="u_swab<?= md5($d_data_praktikan['id_praktik']); ?>" name="u_swab<?= md5($d_data_praktikan['id_praktik']); ?>" accept="application/pdf" required>
                                                            <span class='i text-xs'>Data unggah harus pdf, Maksimal 200 Kb</span><br>
                                                            <div class="text-xs font-italic text-danger blink" id="err_u_swab<?= md5($d_data_praktikan['id_praktik']); ?>"></div><br>
                                                            <script>
                                                                $('#u_swab<?= md5($d_data_praktikan['id_praktik']); ?>').on('change', function() {
                                                                    var fileNameSwab = $(this).val();
                                                                    fileNameSwab = fileNameSwab.replace(/^.*[\\\/]/, '');
                                                                    if (fileNameSwab == "") fileNameSwab = "Pilih File";
                                                                    $('#labelfileswabu<?= md5($d_data_praktikan['id_praktik']); ?>').html(fileNameSwab);
                                                                })
                                                            </script>
                                                        </div>
                                                        <br>
                                                    </form>
                                                </div>
                                                <div class="modal-footer text-md">
                                                    <a class="btn btn-danger btn-sm ubah_tutup<?= md5($d_data_praktikan['id_praktikan']); ?>" data-dismiss="modal">
                                                        Kembali
                                                    </a>
                                                    &nbsp;
                                                    <a class="btn btn-primary btn-sm ubah<?= md5($d_data_praktikan['id_praktikan']); ?>" id="<?= urlencode(base64_encode($d_data_praktikan['id_praktikan'])); ?>">
                                                        Ubah
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if ($d_prvl['d_praktikan'] == 'Y') { ?>
                                    <!-- tombol modal hapus praktikan  -->
                                    <a title="Hapus" class='btn btn-outline-danger' href='#' data-toggle="modal" data-target="#md<?= md5($d_data_praktikan['id_praktikan']); ?>">
                                        <i class="far fa-trash-alt"></i>
                                    </a>

                                    <!-- modal hapus praktikan  -->
                                    <div class="modal fade text-center" id="md<?= md5($d_data_praktikan['id_praktikan']); ?>">
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
                                                    <a class="btn btn-outline-danger btn-sm hapus<?= md5($d_data_praktikan['id_praktikan']); ?>" id="<?= urlencode(base64_encode($d_data_praktikan['id_praktikan'])); ?>" data-dismiss="modal">
                                                        Hapus
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                            <script>
                                <?php if (isset($_GET['acc'])) { ?>
                                    $('#<?= $_GET['acc'] ?>').addClass('show');
                                <?php } ?>
                                $(document).ready(function() {
                                    $('#dataTable<?= $_GET['tb'] ?>').DataTable();
                                });
                                <?php if ($d_prvl['u_praktikan'] == 'Y') { ?>
                                    $(".ubah_init<?= md5($d_data_praktikan['id_praktikan']); ?>").click(function() {
                                        // console.log("ubah_init");

                                        $('#err_u_no_id<?= md5($d_data_praktikan['id_praktik']); ?>').empty();
                                        $('#err_u_nama<?= md5($d_data_praktikan['id_praktik']); ?>').empty();
                                        $('#err_u_tgl<?= md5($d_data_praktikan['id_praktik']); ?>').empty();
                                        $('#err_u_alamat<?= md5($d_data_praktikan['id_praktik']); ?>').empty();
                                        $('#err_u_telpon<?= md5($d_data_praktikan['id_praktik']); ?>').empty();
                                        $('#err_u_wa<?= md5($d_data_praktikan['id_praktik']); ?>').empty();
                                        $('#err_u_email<?= md5($d_data_praktikan['id_praktik']); ?>').empty();
                                        <?php if ($d_data_praktikan['id_profesi_pdd'] > 0) { ?>
                                            $('#err_u_ijazah<?= md5($d_data_praktikan['id_praktik']); ?>').empty();
                                        <?php } ?>
                                        $('#err_u_swab<?= md5($d_data_praktikan['id_praktik']); ?>').empty();
                                        $("#form_u<?= md5($d_data_praktikan['id_praktik']); ?>").trigger("reset");
                                        $.ajax({
                                            type: 'POST',
                                            url: "_admin/view/v_praktik_praktikanGetData.php",
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
                                        <?php if ($d_data_praktikan['id_profesi_pdd'] > 0) { ?>
                                            $('#err_u_ijazah<?= md5($d_data_praktikan['id_praktik']); ?>').empty();
                                        <?php } ?>
                                        $('#err_u_swab<?= md5($d_data_praktikan['id_praktik']); ?>').empty();
                                    });

                                    // inisiasi klik modal ubah  tutup
                                    $(".ubah_tutup<?= md5($d_data_praktikan['id_praktikan']); ?>").click(function() {
                                        // console.log("tambah_tutup<?= md5($d_data_praktikan['id_praktikan']); ?>");
                                        $("#form_u<?= md5($d_data_praktikan['id_praktikan']); ?>").trigger("reset");
                                        $('#mu<?= md5($d_data_praktikan['id_praktikan']); ?>').modal('hide');
                                    });

                                    $(document).on('click', '.ubah<?= md5($d_data_praktikan['id_praktikan']); ?>', function() {
                                        var u_no_id = $('#u_no_id<?= md5($d_data_praktikan['id_praktikan']); ?>').val();
                                        var u_nama = $('#u_nama<?= md5($d_data_praktikan['id_praktikan']); ?>').val();
                                        var u_tgl = $('#u_tgl<?= md5($d_data_praktikan['id_praktikan']); ?>').val();
                                        var u_alamat = $('#u_alamat<?= md5($d_data_praktikan['id_praktikan']); ?>').val();
                                        var u_telpon = $('#u_telpon<?= md5($d_data_praktikan['id_praktikan']); ?>').val();
                                        <?php if ($d_data_praktikan['id_profesi_pdd'] > 0) { ?>
                                            var u_ijazah = $('#u_ijazah<?= md5($d_data_praktikan['id_praktik']); ?>').val();
                                        <?php } ?>
                                        var u_swab = $('#u_swab<?= md5($d_data_praktikan['id_praktik']); ?>').val();
                                        var idpp = $(this).attr('id');

                                        var data_u = $('#form_u<?= md5($d_data_praktikan['id_praktikan']); ?>').serializeArray();
                                        data_u.push({
                                            name: "idprkn",
                                            value: idpp
                                        });


                                        <?php if ($d_data_praktikan['id_profesi_pdd'] > 0) { ?>
                                            //eksekusi bila file ijazah terisi
                                            if (u_ijazah != "" && u_ijazah != undefined) {

                                                //Cari ekstensi file ijazah yg diupload
                                                var typeIjazahu = document.querySelector('#u_ijazah<?= md5($d_data_praktikan['id_praktik']); ?>').value;
                                                var getTypeIjazahu = typeIjazahu.split('.').pop();

                                                //cari ukuran file Ijazah yg diupload
                                                var fileIjazahu = document.getElementById("u_ijazah<?= md5($d_data_praktikan['id_praktik']); ?>").files;
                                                var getSizeIjazahu = document.getElementById("u_ijazah<?= md5($d_data_praktikan['id_praktik']); ?>").files[0].size / 1024;

                                                // console.log("Size Ijazah : " + getSizeIjazahu);
                                                // console.log("Size Ijazah : " + fileIjazahu);

                                                //Toast bila upload file Ijazah selain pdf
                                                if (getTypeIjazahu != 'pdf') {
                                                    Swal.fire({
                                                        allowOutsideClick: true,
                                                        showConfirmButton: false,
                                                        icon: 'warning',
                                                        title: '<div class="text-md text-center">File Ijazah Harus <b>.pdf</b></div>',
                                                        timer: 10000,
                                                        timerProgressBar: true,
                                                        didOpen: (toast) => {
                                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                        }
                                                    });
                                                    $("#err_u_ijazah<?= md5($d_data_praktikan['id_praktik']); ?>").html("File ijazah Harus pdf");
                                                } //Toast bila upload file ijazah diatas 200 Kb 
                                                else if (getSizeIjazahu > 256) {
                                                    Swal.fire({
                                                        allowOutsideClick: true,
                                                        showConfirmButton: false,
                                                        icon: 'warning',
                                                        title: '<div class="text-md text-center">File Ijazah Harus <br><b>Kurang dari 200 Kb</b></div>',
                                                        timer: 10000,
                                                        timerProgressBar: true,
                                                        didOpen: (toast) => {
                                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                        }
                                                    });
                                                    $("#err_u_ijazah<?= md5($d_data_praktikan['id_praktik']); ?>").html("File Ijazah Harus Kurang dari 200 Kb");
                                                }
                                            }
                                        <?php } ?>

                                        //eksekusi bila file swab terisi
                                        if (u_swab != "" && u_swab != undefined) {

                                            //Cari ekstensi file swab yg diupload
                                            var typeSwabu = document.querySelector('#u_swab<?= md5($d_data_praktikan['id_praktik']); ?>').value;
                                            var getTypeSwabu = typeSwabu.split('.').pop();

                                            //cari ukuran file Swab yg diupload
                                            var fileSwabu = document.getElementById("u_swab<?= md5($d_data_praktikan['id_praktik']); ?>").files;
                                            var getSizeSwabu = document.getElementById("u_swab<?= md5($d_data_praktikan['id_praktik']); ?>").files[0].size / 1024;

                                            // console.log("Size Swab : " + getSizeSwabu);
                                            // console.log("Size Swab : " + fileSwabu);

                                            //Toast bila upload file Swab selain pdf
                                            if (getTypeSwabu != 'pdf') {
                                                Swal.fire({
                                                    allowOutsideClick: true,
                                                    showConfirmButton: false,
                                                    icon: 'warning',
                                                    title: '<div class="text-md text-center">File Swab Harus <b>.pdf</b></div>',
                                                    timer: 10000,
                                                    timerProgressBar: true,
                                                    didOpen: (toast) => {
                                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                    }
                                                });
                                                $("#err_u_swab<?= md5($d_data_praktikan['id_praktik']); ?>").html("File Hasil Swab Harus pdf");
                                            } //Toast bila upload file swab diatas 200 Kb 
                                            else if (getSizeSwabu > 256) {
                                                Swal.fire({
                                                    allowOutsideClick: true,
                                                    showConfirmButton: false,
                                                    icon: 'warning',
                                                    title: '<div class="text-md text-center">File Swab Harus <br><b>Kurang dari 200 Kb</b></div>',
                                                    timer: 10000,
                                                    timerProgressBar: true,
                                                    didOpen: (toast) => {
                                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                    }
                                                });
                                                $("#err_u_swab<?= md5($d_data_praktikan['id_praktik']); ?>").html("File Hasil Swab  Harus Kurang dari 200 Kb");
                                            }
                                        }

                                        //cek data from modal Ubah bila tidak diiisi
                                        if (
                                            u_no_id == "" ||
                                            u_nama == "" ||
                                            u_tgl == "" ||
                                            u_alamat == "" ||
                                            u_telpon == "" ||
                                            <?php if ($d_data_praktikan['id_profesi_pdd'] > 0) { ?> u_ijazah == "" || u_ijazah == undefined ||
                                            <?php } ?> u_swab == "" || u_swab == undefined
                                        ) {
                                            if (u_no_id == "") {
                                                $("#err_u_no_id<?= md5($d_data_praktikan['id_praktik']); ?>").html("No ID Harus Diisi");
                                            } else {
                                                $("#err_u_no_id<?= md5($d_data_praktikan['id_praktik']); ?>").html("");
                                            }

                                            if (u_nama == "") {
                                                $("#err_u_nama<?= md5($d_data_praktikan['id_praktik']); ?>").html("Nama Harus Diisi");
                                            } else {
                                                $("#err_u_nama<?= md5($d_data_praktikan['id_praktik']); ?>").html("");
                                            }

                                            if (u_tgl == "") {
                                                $("#err_u_tgl<?= md5($d_data_praktikan['id_praktik']); ?>").html("Tanggal Lahir Harus Dipilih");
                                            } else {
                                                $("#err_u_tgl<?= md5($d_data_praktikan['id_praktik']); ?>").html("");
                                            }

                                            if (u_alamat == "") {
                                                $("#err_u_alamat<?= md5($d_data_praktikan['id_praktik']); ?>").html("Alamat Harus Diisi");
                                            } else {
                                                $("#err_u_alamat<?= md5($d_data_praktikan['id_praktik']); ?>").html("");
                                            }

                                            if (u_telpon == "") {
                                                $("#err_u_telpon<?= md5($d_data_praktikan['id_praktik']); ?>").html("Telpon Harus Diisi");
                                            } else {
                                                $("#err_u_telpon<?= md5($d_data_praktikan['id_praktik']); ?>").html("");
                                            }
                                            <?php if ($d_data_praktikan['id_profesi_pdd'] > 0) { ?>
                                                if (u_ijazah == "") {
                                                    $("#err_u_ijazah<?= md5($d_data_praktikan['id_praktik']); ?>").html("Ijazah Harus Dipilih");
                                                } else {
                                                    $("#err_u_ijazah<?= md5($d_data_praktikan['id_praktik']); ?>").html("");
                                                }
                                            <?php } ?>
                                            if (u_swab == "") {
                                                $("#err_u_swab<?= md5($d_data_praktikan['id_praktik']); ?>").html("Swab Harus Dipilih");
                                            } else {
                                                $("#err_u_swab<?= md5($d_data_praktikan['id_praktik']); ?>").html("");
                                            }

                                            Swal.fire({
                                                allowOutsideClick: true,
                                                showConfirmButton: false,
                                                icon: 'warning',
                                                html: '<div class="text-lg b">DATA WAJIB ADA YANG BELUM TERISI</div>',
                                                timer: 5000,
                                                timerProgressBar: true,
                                                didOpen: (toast) => {
                                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                }
                                            });
                                        }

                                        //simpan data ubah bila sudah sesuai
                                        if (
                                            u_no_id != "" &&
                                            u_nama != "" &&
                                            u_tgl != "" &&
                                            u_alamat != "" &&
                                            u_telpon != "" &&
                                            <?php if ($d_data_praktikan['id_profesi_pdd'] > 0) { ?> getTypeIjazahu == 'pdf' && getSizeIjazahu <= 256 && u_ijazah != "" && u_ijazah != undefined &&
                                            <?php } ?> getTypeSwabu == 'pdf' && getSizeSwabu <= 256 && u_swab != "" && u_swab != undefined
                                        ) {
                                            $.ajax({
                                                type: 'POST',
                                                url: "_admin/exc/x_v_praktik_praktikan_u.php",
                                                data: data_u,
                                                success: function() {
                                                    console.log("Ubah Data Praktikan")
                                                    var data_file = new FormData();
                                                    var xhttp = new XMLHttpRequest();

                                                    var fileIjazahu = document.getElementById("u_ijazah<?= md5($d_data_praktikan['id_praktik']); ?>").files;
                                                    data_file.append("u_ijazah", fileIjazahu[0]);

                                                    var fileSwabu = document.getElementById("u_swab<?= md5($d_data_praktikan['id_praktik']); ?>").files;
                                                    data_file.append("u_swab", fileSwabu[0]);

                                                    data_file.append("idpp", idpp);
                                                    data_file.append("idp", "<?= urlencode(base64_encode($d_data_praktikan['id_praktik'])); ?>");

                                                    xhttp.open("POST", "_admin/exc/x_v_praktik_praktikan_sFile.php", true);
                                                    xhttp.send(data_file);


                                                    $('#err_u_no_id<?= md5($d_data_praktikan['id_praktik']); ?>').empty();
                                                    $('#err_u_nama<?= md5($d_data_praktikan['id_praktik']); ?>').empty();
                                                    $('#err_u_tgl<?= md5($d_data_praktikan['id_praktik']); ?>').empty();
                                                    $('#err_u_alamat<?= md5($d_data_praktikan['id_praktik']); ?>').empty();
                                                    $('#err_u_telpon<?= md5($d_data_praktikan['id_praktik']); ?>').empty();
                                                    $('#err_u_wa<?= md5($d_data_praktikan['id_praktik']); ?>').empty();
                                                    $('#err_u_email<?= md5($d_data_praktikan['id_praktik']); ?>').empty();
                                                    <?php if ($d_data_praktikan['id_profesi_pdd'] > 0) { ?>
                                                        $('#err_u_ijazah<?= md5($d_data_praktikan['id_praktik']); ?>').empty();
                                                        $("#u_ijazah<?= md5($d_data_praktikan['id_praktik']); ?>").val("").trigger("change");
                                                    <?php } ?>
                                                    $('#err_u_swab<?= md5($d_data_praktikan['id_praktik']); ?>').empty();
                                                    $("#form_u<?= md5($d_data_praktikan['id_praktik']); ?>").trigger("reset");
                                                    $("#u_swab<?= md5($d_data_praktikan['id_praktik']); ?>").val("").trigger("change");

                                                    Swal.fire({
                                                        allowOutsideClick: false,
                                                        showConfirmButton: false,
                                                        icon: 'success',
                                                        html: '<div class="text-lg b">Data Praktikan<br>Berhasil Diubah</div>',
                                                        timer: 5000,
                                                        timerProgressBar: true,
                                                        didOpen: (toast) => {
                                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                        }
                                                    }).then(
                                                        function() {
                                                            $('#mu<?= md5($d_data_praktikan['id_praktikan']) ?>').on('hidden.bs.modal', function(e) {
                                                                $('#<?= md5("data" . $d_data_praktikan['id_praktik']); ?>')
                                                                    .load("_admin/view/v_praktik_praktikanData.php?idu=<?= $_GET['idu']; ?>&idp=<?= urlencode(base64_encode($d_data_praktikan['id_praktik'])); ?>&tb=<?= $_GET['tb'] ?>");
                                                            });
                                                        }
                                                    )

                                                },
                                                error: function(response) {
                                                    console.log(response);
                                                }
                                            });
                                        }
                                    });
                                <?php } ?>

                                <?php if ($d_prvl['d_praktikan'] == 'Y') { ?>
                                    $(document).on('click', '.hapus<?= md5($d_data_praktikan['id_praktikan']); ?>', function() {
                                        console.log("hapus data praktikan");
                                        $.ajax({
                                            type: 'POST',
                                            url: "_admin/exc/x_v_praktik_praktikan_h.php",
                                            data: {
                                                "idprkn": $(this).attr('id')
                                            },
                                            success: function() {

                                                $('#md<?= md5($d_data_praktikan['id_praktikan']); ?>').on('hidden.bs.modal', function(e) {
                                                    $('#<?= md5("data" . $d_data_praktikan['id_praktik']); ?>')
                                                        .load("_admin/view/v_praktik_praktikanData.php?idu=<?= $_GET['idu']; ?>&idp=<?= urlencode(base64_encode($d_data_praktikan['id_praktik'])); ?>&tb=<?= $_GET['tb'] ?>");
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