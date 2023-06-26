    <?php

    include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/crypt.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";

    $idpr = urldecode(decryptString($_GET['idpr'], $customkey));
    try {
        $sql_jkh = "SELECT * FROM tb_logbook_ked_coass_jkh ";
        $sql_jkh .= " WHERE id_praktikan = " . $idpr;
        $sql_jkh .= " ORDER BY tgl_ubah DESC, tgl_tambah DESC";
        // echo "$sql_jkh<br>";
        $q_jkh = $conn->query($sql_jkh);
        $r_jkh = $q_jkh->rowCount();
    } catch (Exception $ex) {
        echo "<script>alert('DATA JADWAL KEGIATAN HARIAN');</script>";
        echo "<script>document.location.href='?error404';</script>";
    }
    ?>
    <?php if ($r_jkh > 0) { ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered " id="dataTables">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th scope='col'>No</th>
                        <th>Tanggal</th>
                        <th>Kegiatan</th>
                        <th>Topik</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no0 = 1;
                    while ($d_jkh = $q_jkh->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td class="text-center"><?= $no0; ?></td>
                            <td><?= tanggal($d_jkh['tgl']); ?></td>
                            <td><?= $d_jkh['kegiatan']; ?></td>
                            <td><?= $d_jkh['topik']; ?></td>
                            <td class="text-center">
                                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php
                        $no0++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <div class="jumbotron border-2 m-2 shadow">
            <div class="jumbotron-fluid">
                <div class="text-gray-700">
                    <h5 class="text-center">Data Tidak Ada</h5>
                </div>
            </div>
        </div>
    <?php } ?>
    <script>
        Swal.close();
        $("#dataTables").DataTable();
    </script>