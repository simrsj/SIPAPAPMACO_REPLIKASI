<?php

$id_praktik = $_GET['t'];
$q_praktik = $conn->query("SELECT * FROM tb_praktik 
JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd 
WHERE id_praktik = $id_praktik");
$d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);
$jumlah_praktik = $d_praktik['jumlah_praktik'];
?>

<!-- Menu Harga Lainnya -->
<div class="container-fluid">
    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex flex-row align-items-center">
            <div class="h4 text-gray-800 font-weight-bold">
                Menu Harga Ruangan dan Tempat : <i style='font-size:14px;'>(Jumlah Praktik <b><?php echo $d_praktik['jumlah_praktik']; ?></b>)</i>
            </div>
        </div>
        <div class="card-body">
            <?php
            if ($d_praktik['id_jurusan_pdd_jenis'] == 1) {
                $sql = "tb_tempat.id_jurusan_pdd_jenis = 1 ";
            } elseif ($d_praktik['id_jurusan_pdd_jenis'] == 2) {
                $sql = "tb_tempat.id_jurusan_pdd_jenis = 2 ";
            } elseif ($d_praktik['id_jurusan_pdd_jenis'] == 3) {
                $sql = "tb_tempat.id_jurusan_pdd_jenis = 3 ";
            } elseif ($d_praktik['id_jurusan_pdd_jenis'] == 4) {
                $sql = "tb_tempat.id_jurusan_pdd_jenis = 4";
            }
            $sql_tempat = "SELECT * FROM tb_tempat 
            JOIN tb_jurusan_pdd_jenis ON tb_tempat.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis 
            JOIN tb_harga_satuan ON tb_tempat.id_harga_satuan = tb_harga_satuan.id_harga_satuan
            WHERE $sql AND status_tempat = 'y'
            ORDER BY nama_tempat ASC
                ";

            $q_tempat = $conn->query($sql_tempat);
            $r_tempat = $q_tempat->rowCount();
            if ($r_tempat > 0) {
            ?>
                <table class="table">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Kapasitas</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($d_tempat = $q_tempat->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $no; ?></th>
                                <td><?php echo $d_tempat['nama_tempat']; ?></td>
                                <td><?php echo "Rp " . number_format($d_tempat['harga_tempat'], 0, ",", "."); ?></td>
                                <td><?php echo $d_tempat['nama_harga_satuan']; ?></td>
                                <td><?php echo $d_tempat['kapasitas_tempat']; ?></td>
                                <td><?php echo $d_tempat['ket_tempat']; ?></td>
                                <td>
                                    <div class="boxed-check-group boxed-check-primary boxed-check-sm text-center">
                                        <label class="boxed-check">
                                            <input class="boxed-check-input" type="radio" name="tempat" id="tempat" value="<?php echo $d_tempat['id_tempat'] ?>" required>
                                            <span class="boxed-check-label"><?php echo $d_tempat['nama_tempat'] ?></span>
                                        </label>
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
            ?>

            <nav id="navbar-harga" class="navbar justify-content-center">
                <button type="button" id="simpan_tempat" class="nav-link btn btn-outline-success" onclick="simpan_praktik()">
                    SIMPAN
                </button>
            </nav>
            </form>
        </div>
    </div>
</div>

<?php

if (isset($_POST['pilih_harga'])) {

    $id_praktik = $_POST['id_praktik'];

    //SQL Harga Lainnya
    $sewa_tempat_harga = $_POST['sewa_tempat_harga'];
    $sql_tempat = " SELECT * FROM tb_harga 
    JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis
    JOIN tb_jurusan_pdd_jenis ON tb_harga.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis
    WHERE tb_harga.id_harga = $sewa_tempat_harga
    ";

    $q_tempat = $conn->query($sql_tempat);
    $d_tempat = $q_tempat->fetch(PDO::FETCH_ASSOC);

    $sql_insert_tempat = " INSERT INTO tb_harga_pilih (
            id_praktik, 
            id_harga, 
            tgl_input_harga_pilih, 
            frekuensi_harga_pilih,
            kuantitas_harga_pilih,
            jumlah_harga_pilih)
        VALUES (
            '" . $id_praktik . "', 
            '" . $d_tempat['id_harga'] . "', 
            '" . date('Y-m-d') . "', 
            '1', 
            '1', 
            '" . $d_tempat['jumlah_harga'] . "'
        )";

    // echo $sql_insert_tempat . "<br>";
    $conn->query($sql_insert_tempat);

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
