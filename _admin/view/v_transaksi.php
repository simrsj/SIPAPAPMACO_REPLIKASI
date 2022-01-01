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

                                    <a title="Detail Harga" class='btn btn-info btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#dtl_u_m" . $d_praktik['id_praktik']; ?>'>
                                        <i class="fas fa-info-circle"></i>
                                    </a>

                                    <!-- modal detail harga  -->
                                    <div class="modal fade" id="<?php echo "dtl_u_m" . $d_praktik['id_praktik']; ?>" data-backdrop="static" tabindex="-1" aria-labelledby="Modal Detail Harga" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title h4" id="exampleModalXlLabel">Data Detail Harga</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped" id="myTable">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th scope="col">No</th>
                                                                    <th scope="col">Nama Harga</th>
                                                                    <th scope="col">Satuan</th>
                                                                    <th scope="col">Jumlah Harga</th>
                                                                    <th scope="col">Frek.</th>
                                                                    <th scope="col">Ktt.</th>
                                                                    <th scope="col">Total Harga</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $sql_detail_harga = "SELECT * FROM tb_praktik 
                                                                        JOIN tb_harga_pilih ON tb_praktik.id_praktik = tb_harga_pilih.id_praktik
                                                                        JOIN tb_harga ON tb_harga_pilih.id_harga = tb_harga.id_harga
                                                                        JOIN tb_harga_satuan ON tb_harga.id_harga_satuan = tb_harga_satuan.id_harga_satuan
                                                                        WHERE tb_praktik.id_praktik = '" . $d_praktik['id_praktik'] . "'
                                                                ";
                                                                echo $sql_detail_harga . "<br>";
                                                                $q_detail_harga = $conn->query($sql_detail_harga);
                                                                $no = 1;
                                                                while ($d_detail_harga = $q_detail_harga->fetch(PDO::FETCH_ASSOC)) {
                                                                ?>
                                                                    <tr>
                                                                        <td><?php echo $no; ?></td>
                                                                        <td><?php echo $d_detail_harga['nama_harga']; ?></td>
                                                                        <td><?php echo $d_detail_harga['nama_satuan']; ?></td>
                                                                        <td><?php echo "Rp " . number_format($d_detail_harga['jumlah_harga'], 0, '.', ','); ?></td>
                                                                        <td><?php echo $d_detail_harga['frekuensi_harga_pilih']; ?></td>
                                                                        <td><?php echo $d_detail_harga['kuantitas_harga_pilih']; ?></td>
                                                                        <td><?php echo "Rp " . number_format($d_detail_harga['jumlah_harga_pilih'], 0, '.', ','); ?></td>
                                                                    </tr>
                                                                <?
                                                                    $no++;
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                <h3 class='text-center'> Data Pembayaran Anda Tidak Ada</h3>
            <?php
            }
            ?>
        </div>
    </div>
</div>