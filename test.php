<?php include "./_add-ons/koneksi.php"; ?>

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
        WHERE tb_praktik.id_praktik = 3";
        echo $sql_detail_harga . "<br>";
        $q_detail_harga = $conn->query($sql_detail_harga);
        $no = 1;
        while ($d_detail_harga = $q_detail_harga->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <tr>
                <th><?php echo $no; ?></th>
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