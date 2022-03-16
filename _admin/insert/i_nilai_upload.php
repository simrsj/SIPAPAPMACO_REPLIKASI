<?php
$i = $_GET['i'];
$pu = $_GET['pu'];

if (is_numeric($i) && is_numeric($pu)) {
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Input Nilai</h1>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <?php
                $sql_data_praktikan = "SELECT * FROM tb_pembimbing_pilih ";
                $sql_data_praktikan .= " JOIN tb_praktikan ON tb_pembimbing_pilih.id_praktikan = tb_praktikan.id_praktikan";
                $sql_data_praktikan .= " JOIN tb_pembimbing ON tb_pembimbing_pilih.id_pembimbing = tb_pembimbing.id_pembimbing";
                $sql_data_praktikan .= " JOIN tb_unit ON tb_pembimbing_pilih.id_unit = tb_unit.id_unit";
                $sql_data_praktikan .= " WHERE tb_pembimbing_pilih.id_praktik = " . $i . " AND tb_pembimbing_pilih.id_pembimbing = " . $pu;
                $sql_data_praktikan .= " ORDER BY tb_praktikan.nama_praktikan ASC";

                // echo $sql_data_praktikan;

                $q_data_praktikan = $conn->query($sql_data_praktikan);
                $q1_data_praktikan = $conn->query($sql_data_praktikan);
                $r_data_praktikan = $q_data_praktikan->rowCount();
                $j_ptkn = $r_data_praktikan;
                $d1_data_praktikan = $q1_data_praktikan->fetch(PDO::FETCH_ASSOC);
                if ($r_data_praktikan > 0) {
                ?>
                    <form method="POST" id="form_nilai_upload">
                        <!-- data praktikan  -->
                        <div class="row justify-content-between">
                            <div class="col-md-4">
                                Nama Pembimbing : <?php echo $d1_data_praktikan['nama_pembimbing']; ?><br>
                                Ruangan : <?php echo $d1_data_praktikan['nama_unit']; ?>
                            </div>
                            <div class="col-md-auto">
                            </div>
                            <div class="col-md-3">
                                Unggah File :
                                <input type="file" name="nilai_upload" id="nilai_upload" class="form-control-file" accept="application/pdf">
                                <div class="text-xs font-italic">
                                    File Data Nilai Harus .pdf dan ukuran file kurang dari 1Mb
                                </div>
                                <span id="err_nilai_upload" class="text-xs font-italic text-danger blink"></span>
                            </div>
                        </div>
                        <hr>
                        <span class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIM / NPM / NIS</th>
                                        <th scope="col">No. HP </th>
                                        <th scope="col">No. WA </th>
                                        <th scope="col">EMAIL</th>
                                        <th scope="col">ASAL KOTA / KABUPATEN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($d_data_praktikan = $q_data_praktikan->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <input type="hidden" name="id_unit" id="id_unit" value="<?php echo $d_data_praktikan['id_unit']; ?>">
                                        <input type="hidden" name="id_praktik" id="id_praktik" value="<?php echo $d_data_praktikan['id_praktik']; ?>">
                                        <input type="hidden" name="id_pembimbing" id="id_pembimbing" value="<?php echo $d_data_praktikan['id_pembimbing']; ?>">
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $d_data_praktikan['nama_praktikan']; ?></td>
                                            <td><?php echo $d_data_praktikan['telp_praktikan']; ?></td>
                                            <td><?php echo $d_data_praktikan['wa_praktikan']; ?></td>
                                            <td><?php echo $d_data_praktikan['wa_praktikan']; ?></td>
                                            <td><?php echo $d_data_praktikan['email_praktikan']; ?></td>
                                            <td><?php echo $d_data_praktikan['kota_kab_praktikan']; ?></td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </span>
                        <!-- tombol simpan pilih Pembimbing dan Ruangan  -->
                        <center>
                            <button type="button" name="simpan_nilai_upload" id="simpan_nilai_upload" class="btn btn-outline-success">
                                <i class="fas fa-check-circle"></i>
                                Simpan Pembimbing dan Ruangan Praktik
                                <i class="fas fa-check-circle"></i>
                            </button>
                        </center>
                    </form>
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
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#simpan_nilai_upload").click(function() {
                var nilai_upload = $('#nilai_upload').val();
                if (nilai_upload == "") {

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
                        icon: 'warning',
                        title: '<div class="text-center font-weight-bold text-uppercase">Data NILAI Belum dipilih</b></div>'
                    });

                    document.getElementById("err_nilai_upload").innerHTML = "Data Nilai Belum Dipilih";
                    // console.log("Belum Upload");

                }

                //eksekusi bila file surat terisi
                if (nilai_upload != "") {

                    //Cari ekstensi file surat yg diupload
                    var typeSurat = document.querySelector('#nilai_upload').value;
                    var getTypeSurat = typeSurat.split('.').pop();

                    //cari ukuran file surat yg diupload
                    var fileSurat = document.getElementById("nilai_upload").files;
                    var getSizeSurat = document.getElementById("nilai_upload").files[0].size / 1024;

                    // console.log("Size Surat : " + getSizeSurat);
                    // console.log("Size Surat : " + fileSurat);

                    //Toast bila upload file surat selain pdf
                    if (getTypeSurat != 'pdf') {
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
                            title: '<div class="text-md text-center">File Nilai Harus <b>.pdf</b></div>'
                        });
                        document.getElementById("err_nilai_upload").innerHTML = "File Nilai Harus pdf";
                    } //Toast bila upload file surat diatas 1 Mb 
                    else if (getSizeSurat > 1024) {
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
                            title: '<div class="text-md text-center">File Nilai Harus <br><b>Kurang dari 1 Mb</b></div>'
                        });
                        document.getElementById("err_nilai_upload").innerHTML = "File Nilai Harus Kurang dari 1 Mb";
                    } else {
                        //simpan file upload
                        var data_file = new FormData();
                        var xhttp = new XMLHttpRequest();

                        var fileSurat = document.getElementById("nilai_upload").files;
                        data_file.append("nilai_upload", fileSurat[0]);

                        var id_pembimbing = document.getElementById("id_pembimbing").value;
                        data_file.append("id_pembimbing", id_pembimbing);

                        var id_unit = document.getElementById("id_unit").value;
                        data_file.append("id_unit", id_unit);

                        var id_praktik = document.getElementById("id_praktik").value;
                        data_file.append("id_praktik", id_praktik);

                        xhttp.open("POST", "_admin/exc/x_i_nilai_upload_sFileNilai.php", true);
                        xhttp.send(data_file);

                        Swal.fire({
                            allowOutsideClick: false,
                            // isDismissed: false,
                            icon: 'success',
                            title: '<span class"text-xs"><b>Data Nilai Berhasil disimpan',
                            showConfirmButton: false,
                            html: '<a href="?nil" class="btn btn-outline-primary">OK</a>',
                            timer: 5000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        }).then(
                            function() {
                                document.location.href = "?nil";
                            }
                        );
                    }
                }

            });


        });
    </script>
<?php
} else {
    include "_error/index.php";
}
?>