<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <h1 class="h3 mb-2 text-gray-800">Ubah Data Praktikan</h1>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <form action="" class="form-group" method="post">
                    <?php
                    $id_praktik = $_GET['uh'];

                    $sql_harga_pilih = "SELECT * FROM tb_harga_pilih 
                        JOIN tb_harga ON tb_harga_pilih.id_harga = tb_harga.id_harga
                        JOIN tb_praktik ON tb_harga_pilih.id_praktik = tb_praktik.id_praktik
                        WHERE tb_praktik.id_praktik = $id_praktik
                        ORDER BY tb_harga.nama_harga";

                    $q_harga_pilih = $conn->query($sql_harga_pilih);
                    $no = 1;
                    ?>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Harga</th>
                                <th scope="col">Jumlah Harga</th>
                                <th scope="col">Frekuensi</th>
                                <th scope="col">Kuantitas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?
                            while ($d_harga_pilih = $q_harga_pilih->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no; ?></th>
                                    <td><?php echo $d_harga_pilih['nama_harga']; ?></td>
                                    <td><?php echo "Rp " . number_format($d_harga_pilih['jumlah_harga'], 0, ",", "."); ?></td>
                                    <td>
                                        <input type="number" name="frek_<?php echo $d_harga_pilih['id_harga_pilih'] ?>" value="<?php echo $d_harga_pilih['frekuensi_harga_pilih']; ?>" class="form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="kntt_<?php echo $d_harga_pilih['id_harga_pilih'] ?>" value="<?php echo $d_harga_pilih['frekuensi_harga_pilih']; ?>" class="form-control">
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <hr>
                    <!-- Simpan -->
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="submit" name="ubah_praktik" value="Ubah" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['ubah_praktik'])) {

    $sql_update = " UPDATE `tb_praktik` SET
        `id_mou` = '" . $_POST['id_institusi'] . "', 
        `id_institusi` = '" . $_POST['id_institusi'] . "', 
        `nama_praktik` = '" . $_POST['nama_praktik'] . "', 
        `tgl_ubah_praktik` = '" . date('Y-m-d') . "', 
        `tgl_mulai_praktik` = '" . $_POST['tgl_mulai_praktik'] . "', 
        `tgl_selesai_praktik` = '" . $_POST['tgl_selesai_praktik'] . "', 
        `jumlah_praktik` = '" . $_POST['jumlah_praktik'] . "', 
        `surat_praktik` = '" . $surat_praktik . "', 
        `data_praktik` = '" . $data_praktik . "', 
        `id_spesifikasi_pdd` = '" . $_POST['id_spesifikasi_pdd'] . "', 
        `id_jenjang_pdd` = '" . $_POST['id_jenjang_pdd'] . "', 
        `id_jurusan_pdd` = '" . $_POST['id_jurusan_pdd'] . "', 
        `id_akreditasi` = '" . $_POST['id_akreditasi'] . "', 
        `id_user` = '" . $_SESSION['id_user'] . "',
        `email_mentor_praktik` = '" . $_POST['email_mentor_praktik'] . "',
        `telp_mentor_praktik` = '" . $_POST['telp_mentor_praktik'] . "'
        WHERE `tb_praktik`.`id_praktik` = " . $id_praktik;

    // echo $sql_update;
    $conn->query($sql_update);
?>
    <script type="text/javascript">
        document.location.href = "?prk";
    </script>
<?php
}
?>