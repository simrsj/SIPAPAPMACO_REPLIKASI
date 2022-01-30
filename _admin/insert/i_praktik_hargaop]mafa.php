<!-- Menu Harga Lainnya -->
<div class="text-gray-700">
    <h5 class="font-weight-bold">Menu Harga Ruangan dan Tempat</h5>
</div>
<?php
if ($d_praktik['id_jurusan_pdd_jenis'] == 1) {
    $sql = "WHERE tb_harga.id_jurusan_pdd_jenis = 1 AND tb_harga.id_harga_jenis BETWEEN 7 AND 8";
} else {
    $sql = "WHERE tb_harga.id_jurusan_pdd_jenis != 1 AND tb_harga.id_harga_jenis BETWEEN 7 AND 8";
}
$sql_harga_lainnya = " SELECT * FROM tb_harga 
                JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis 
                JOIN tb_harga_satuan ON tb_harga.id_harga_satuan = tb_harga_satuan.id_harga_satuan 
                JOIN tb_jurusan_pdd_jenis ON tb_harga.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis
                $sql ORDER BY nama_harga_jenis ASC, nama_harga ASC
                ";

$q_harga_lainnya = $conn->query($sql_harga_lainnya);
$r_harga_lainnya = $q_harga_lainnya->rowCount();

if ($r_harga_lainnya > 0) {
?>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Jenis</th>
                <th scope="col">Nama Harga</th>
                <th scope="col">Satuan</th>
                <th scope="col">Harga</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($d_harga_lainnya = $q_harga_lainnya->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?php echo $d_harga_lainnya['nama_harga_jenis']; ?></td>
                    <td><?php echo $d_harga_lainnya['nama_harga']; ?></td>
                    <td><?php echo $d_harga_lainnya['nama_harga_satuan']; ?></td>
                    <td><?php echo "Rp " . number_format($d_harga_lainnya['jumlah_harga'], 0, ",", "."); ?></td>
                    <td>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="sewa_tempat_harga<?php echo $d_harga_lainnya['id_harga']; ?>" name="sewa_tempat_harga" value="<?php echo $d_harga_lainnya['id_harga']; ?>" class="custom-control-input" required>
                            <label class="custom-control-label" for="sewa_tempat_harga<?php echo $d_harga_lainnya['id_harga']; ?>">Pilih <?php echo $d_harga_lainnya['nama_harga']; ?></label>
                        </div>
                    </td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
<?php
} else {
?>
    <div class="bg-gray-500 text-gray-100" style="padding-bottom: 2px; padding-top: 5px;">
        <h5 class="text-center">Data Harga Tidak Ada</h5>
    </div>
<?php
}


if (isset($_POST['pilih_harga'])) {

    $id_praktik = $_POST['id_praktik'];

    //SQL Harga Lainnya
    $sewa_tempat_harga = $_POST['sewa_tempat_harga'];
    $sql_harga_lainnya = " SELECT * FROM tb_harga 
    JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis
    JOIN tb_jurusan_pdd_jenis ON tb_harga.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis
    WHERE tb_harga.id_harga = $sewa_tempat_harga
    ";

    $q_harga_lainnya = $conn->query($sql_harga_lainnya);
    $d_harga_lainnya = $q_harga_lainnya->fetch(PDO::FETCH_ASSOC);

    $sql_insert_harga_lainnya = " INSERT INTO tb_harga_pilih (
            id_praktik, 
            id_harga, 
            tgl_input_harga_pilih, 
            frekuensi_harga_pilih,
            kuantitas_harga_pilih,
            jumlah_harga_pilih)
        VALUES (
            '" . $id_praktik . "', 
            '" . $d_harga_lainnya['id_harga'] . "', 
            '" . date('Y-m-d') . "', 
            '1', 
            '1', 
            '" . $d_harga_lainnya['jumlah_harga'] . "'
        )";

    // echo $sql_insert_harga_lainnya . "<br>";
    $conn->query($sql_insert_harga_lainnya);

    //SQL ubah status praktik
    $sql_ubah_status_praktik = "UPDATE tb_praktik
    SET status_cek_praktik = 'HARGA'
    WHERE id_praktik = " . $d_praktik['id_praktik'];
    $conn->query($sql_ubah_status_praktik);
    echo "
    <script type='text/javascript'>
        alert('Data Harga Sudah Disimpan');
        document.location.href = '?prk';
    </script>
    ";
}
