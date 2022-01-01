<?php
if (isset($_POST['arsip_praktik']) || isset($_POST['selesai_praktik'])) {
    $conn->query("UPDATE `tb_praktik` SET status_praktik = 'T' WHERE id_praktik = " . $_POST['id_praktik']);
    echo "
        <script type='text/javascript'>
            document.location.href = '?ptk';
        </script>
    ";
} elseif (isset($_POST['tambah_praktikan'])) {
    $id_praktik = $_POST['id_praktik'];
    $q_praktikan = $conn->query("SELECT * FROM tb_praktikan WHERE id_praktik= '" . $id_praktik . "'");
    $r_praktikan = $q_praktikan->rowCount();
    if ($r_praktikan > 0) {
        echo "
        <script type='text/javascript'>
           alert('DATA PRAKTIKAN SUDAH ADA');
        </script>
    ";
    } else {
        $sql_insert_praktikan = "INSERT INTO tb_praktikan (id_praktik, status_praktikan)  VALUES ($id_praktik, 'INPUT NILAI')";

        // echo $sql_insert_praktikan;
        $conn->query($sql_insert_praktikan);
    }
    echo "
        <script type='text/javascript'>
            document.location.href = '?ptk';
        </script>
    ";
} elseif (isset($_POST['hapus_praktikan'])) {
    $sql_delete_praktikan_detail_all = "DELETE FROM `tb_praktikan_detail` WHERE id_praktikan = '" . $_POST['id_praktikan'] . "'";

    // echo $sql_delete_praktikan_detail_all . "<br>";
    $conn->query($sql_delete_praktikan_detail_all);

    $sql_ubah_status_praktikan = "UPDATE tb_praktikan
            SET status_praktikan = 'INPUT PRAKTIKAN'
            WHERE id_praktikan = '" . $_POST['id_praktikan'] . "'";

    // echo $sql_ubah_status_praktikan . "<br>";
    $conn->query($sql_ubah_status_praktikan);
    echo "
        <script type='text/javascript'>
            document.location.href = '?ptk';
        </script>
    ";
} elseif (isset($_POST['tambah_data_praktikan'])) {
    $sql_insert_data_praktikan = "INSERT INTO tb_praktikan_detail (
        id_praktikan, 
        no_id_praktikan_detail, 
        nama_praktikan_detail, 
        tgl_lahir_praktikan_detail, 
        telp_praktikan_detail, 
        email_praktikan_detail,
        tgl_input_praktikan_detail
        )  VALUES (
            '" . $_POST['id_praktikan'] . "',
            '" . $_POST['no_id_praktikan_detail'] . "',
            '" . $_POST['nama_praktikan_detail'] . "',
            '" . $_POST['tgl_lahir_praktikan_detail'] . "',
            '" . $_POST['telp_praktikan_detail'] . "',
            '" . $_POST['email_praktikan_detail'] . "',
            '" . date('Y-m-d') . "'
        )";

    $sql_ubah_status_praktikan = "UPDATE tb_praktikan SET
    status_praktikan = 'PRAKTIKAN ADA'
    WHERE id_praktikan = '" . $_POST['id_praktikan'] . "'";

    // echo $sql_insert_data_praktikan . "<br>";
    // echo $sql_ubah_status_praktikan . "<br>";
    $conn->query($sql_insert_data_praktikan);
    $conn->query($sql_ubah_status_praktikan);
    echo "
        <script type='text/javascript'>
            document.location.href = '?ptk';
        </script>
    ";
} elseif (isset($_POST['ubah_data_praktikan'])) {
    $sql_ubah_data_praktikan = "UPDATE tb_praktikan_detail SET
        no_id_praktikan_detail = '" . $_POST['no_id_praktikan_detail'] . "',
        nama_praktikan_detail = '" . $_POST['nama_praktikan_detail'] . "',
        tgl_lahir_praktikan_detail = '" . $_POST['tgl_lahir_praktikan_detail'] . "',
        telp_praktikan_detail = '" . $_POST['telp_praktikan_detail'] . "',
        email_praktikan_detail = '" . $_POST['email_praktikan_detail'] . "',
        tgl_ubah_praktikan_detail = '" . date('Y-m-d') . "'
        WHERE id_praktikan_detail = '" . $_POST['id_praktikan_detail'] . "'
    ";
    // echo $sql_ubah_data_praktikan . "<br>";
    $conn->query($sql_ubah_data_praktikan);
    echo "
        <script type='text/javascript'>
            document.location.href = '?ptk';
        </script>
    ";
} elseif (isset($_POST['hapus_data_praktikan'])) {
    $sql_delete_praktikan_detail = "DELETE FROM `tb_praktikan_detail` WHERE id_praktikan_detail = " . $_POST['id_praktikan_detail'];

    echo $sql_delete_praktikan_detail . "<br>";
    $conn->query($sql_delete_praktikan_detail);

    //jika semuanya dihapus dalam data praktikan ubah status praktikan
    $sql_praktikan_detail = "SELECT * FROM tb_praktikan_detail WHERE id_praktikan = '" . $_POST['id_praktikan'] . "'";
    $q_praktikan_detail = $conn->query($sql_praktikan_detail);
    $r_praktikan_detail = $q_praktikan_detail->rowCount();

    if ($r_praktikan_detail == 0) {
        $sql_ubah_status_praktikan = "UPDATE tb_praktikan
            SET status_praktikan = 'INPUT PRAKTIKAN'
            WHERE id_praktikan = '" . $_POST['id_praktikan'] . "'";

        echo $sql_ubah_status_praktikan . "<br>";
        $conn->query($sql_ubah_status_praktikan);
    }
    echo "
        <script type='text/javascript'>
            document.location.href = '?ptk';
        </script>
    ";
} else {
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Daftar Transaksi</h1>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <?php
                $sql_praktik = "SELECT * FROM tb_praktik
                            JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi
                            WHERE tb_praktik.status_cek_praktik = 'AKTIF' OR tb_praktik.status_cek_praktik = 'SELESAI'
                            ORDER BY tb_institusi.nama_institusi ASC";

                $q_praktik = $conn->query($sql_praktik);
                $r_praktik = $q_praktik->rowCount();

                if ($r_praktik > 0) {
                ?>
                    <table class='table table-striped' id="myTable">
                        <thead class="thead-dark">
                            <tr>
                                <th scope='col'>No</th>
                                <th>Nama Institusi</th>
                                <th>Nama Praktik</th>
                                <th>Tanggal Mulai Praktik</th>
                                <th>Tanggal Selesa Praktik</th>
                                <th>Jumlah Praktik</th>
                                <th>Total Harga Praktik</th>
                                <th>Status Praktik</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {

                                $total_harga = 0;

                                //data harga tb_harga_pilih
                                $sql_data_harga = "SELECT * FROM tb_praktik
                                JOIN tb_harga_pilih ON tb_praktik.id_praktik = tb_harga_pilih.id_praktik
                                WHERE tb_praktik.id_praktik = '" . $d_praktik['id_praktik'] . "' AND
                                (tb_praktik.status_cek_praktik = 'AKTIF' OR tb_praktik.status_cek_praktik = 'SELESAI')";

                                $q_data_harga = $conn->query($sql_data_harga);

                                while ($d_data_harga = $q_data_harga->fetch(PDO::FETCH_ASSOC)) {
                                    $total_harga = $total_harga + $d_data_harga['jumlah_harga_pilih'];
                                }

                                //data mess tb_mess_pilih
                                $sql_data_mess = "SELECT * FROM tb_praktik
                                JOIN tb_mess_pilih ON tb_praktik.id_praktik = tb_mess_pilih.id_praktik
                                WHERE tb_praktik.id_praktik = '" . $d_praktik['id_praktik'] . "' AND
                                (tb_praktik.status_cek_praktik = 'AKTIF' OR tb_praktik.status_cek_praktik = 'SELESAI')";

                                $q_data_mess = $conn->query($sql_data_mess);

                                while ($d_data_mess = $q_data_mess->fetch(PDO::FETCH_ASSOC)) {
                                    $total_harga = $total_harga + $d_data_mess['total_harga_mess_pilih'];
                                }

                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $d_praktik['nama_institusi']; ?></td>
                                    <td><?php echo $d_praktik['nama_praktik']; ?></td>
                                    <td><?php echo tanggal($d_praktik['tgl_mulai_praktik']); ?></td>
                                    <td><?php echo tanggal($d_praktik['tgl_selesai_praktik']); ?></td>
                                    <td><?php echo $d_praktik['jumlah_praktik']; ?></td>
                                    <td><?php echo "Rp " . number_format($total_harga, 0, '.', ','); ?></td>
                                    <td><?php echo $d_praktik['status_cek_praktik']; ?></td>
                                    <td>
                                        <a title="Cetak Invoice" target="_blank" class="btn btn-warning btn-sm" href="./_print/p_praktik_invoice.php?id=<?php echo $d_praktik['id_praktik']; ?>">
                                            <i class="fas fa-print"></i>
                                        </a>
                                        <a title="Detail Harga" class='btn btn-info btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#dtl_u_m" . $d_institusi['id_institusi']; ?>'>
                                            <i class="fas fa-info-circle"></i>
                                        </a>
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
                    <h3 class='text-center'> Data Pembayaran Anda Tidak Ada</h3>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php
}
