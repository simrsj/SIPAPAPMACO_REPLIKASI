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
                                <td>
                                    <?php
                                    if ($d_praktik['status_cek_praktik'] == 'AKTIF') {
                                        $badge = "badge badge-success text-md";
                                    } else {
                                        $badge = "badge badge-secondary text-md";
                                    }
                                    ?>
                                    <span class="<?php echo $badge; ?>"><?php echo $d_praktik['status_cek_praktik']; ?></span>
                                </td>
                                <td>
                                    <a title="Cetak Invoice" target="_blank" class="btn btn-warning btn-sm" href="./_print/p_praktik_invoice.php?id=<?php echo $d_praktik['id_praktik']; ?>">
                                        <i class="fas fa-print"></i>
                                    </a>

                                    <a title="Detail Harga" class='btn btn-info btn-sm' href='<?php echo "?trs&dtl=" . $d_praktik['id_praktik']; ?>'>
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