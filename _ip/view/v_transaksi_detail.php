<?php
$sql_data_praktik = "SELECT * FROM tb_praktik 
JOIN tb_institusi ON tb_praktik.id_institusi = tb_praktik.id_institusi
WHERE tb_praktik.id_praktik ='" . $_GET['dtl'] . "'";

$q_data_praktik = $conn->query($sql_data_praktik);
$d_data_praktik = $q_data_praktik->fetch(PDO::FETCH_ASSOC);


$id_praktik = $_GET['dtl'];

#data harga pilih
$sql_praktik = "SELECT * FROM tb_harga_pilih
JOIN tb_praktik ON tb_harga_pilih.id_praktik = tb_praktik.id_praktik
JOIN tb_harga ON tb_harga_pilih.id_harga = tb_harga.id_harga
JOIN tb_harga_satuan ON tb_harga.id_harga_satuan = tb_harga_satuan.id_harga_satuan
WHERE tb_praktik.id_praktik = '" . $id_praktik . "'
ORDER BY nama_harga ASC";
$q_praktik = $conn->query($sql_praktik);

$data_harga = array();
$no = 1;
$total_harga = 0;
while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
    array_push(
        $data_harga,
        array(
            $no,
            $d_praktik['nama_harga'],
            $d_praktik['nama_harga_satuan'],
            "Rp " . number_format($d_praktik['jumlah_harga'], 0, ",", "."),
            $d_praktik['frekuensi_harga_pilih'],
            $d_praktik['kuantitas_harga_pilih'],
            "Rp " . number_format($d_praktik['jumlah_harga_pilih'], 0, ",", ".")
        )
    );
    $total_harga = $total_harga + $d_praktik['jumlah_harga_pilih'];
    $no++;
}

#data mess pilih
$sql_mess = "SELECT * FROM tb_praktik 
JOIN tb_mess_pilih ON tb_praktik.id_praktik = tb_mess_pilih.id_praktik 
JOIN tb_mess ON tb_mess_pilih.id_mess = tb_mess.id_mess 
WHERE tb_praktik.id_praktik = '" . $id_praktik . "'";
$q_mess = $conn->query($sql_mess);

while ($d_mess = $q_mess->fetch(PDO::FETCH_ASSOC)) {
    array_push(
        $data_harga,
        array(
            $no,
            $d_mess['nama_mess'] . " (Mess)",
            "Hari/Orang",
            "Rp " . number_format(
                $d_mess['total_harga_mess_pilih'] / ($d_mess['jumlah_praktik'] * $d_mess['jumlah_hari_mess_pilih']),
                0,
                ",",
                "."
            ),
            $d_mess['jumlah_praktik'],
            $d_mess['jumlah_hari_mess_pilih'],
            "Rp " . number_format($d_mess['total_harga_mess_pilih'], 0, ",", ".")
        )
    );
    $total_harga = $total_harga + $d_mess['total_harga_mess_pilih'];
    $no++;
}

// // echo "<pre>";
// print_r($data_harga);
// // echo "</pre>";

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-11">
            <h1 class="h3 mb-2 text-gray-800">Daftar Transaksi</h1>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-outline-dark btn-sm" href="?trs">
                <i class="fas fa-arrow-circle-left"></i>
                Kembali
            </a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <b>Nama Institusi :</b><br>
                    <?php echo $d_data_praktik['nama_institusi']; ?><br><br>
                    <b>Nama Praktik :</b><br>
                    <?php echo $d_data_praktik['nama_praktik']; ?><br><br>
                </div>
                <div class="col-lg-6">
                    <b>Tanggal Mulai :</b><br>
                    <?php echo tanggal($d_data_praktik['tgl_mulai_praktik']); ?><br><br>
                    <b>Tanggal Selesai :</b><br>
                    <?php echo tanggal($d_data_praktik['tgl_selesai_praktik']); ?><br><br>
                    <b>Total Harga :</b><br>
                    <?php echo "Rp " . number_format($total_harga, 0, '.', '.'); ?><br><br>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
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

                        foreach ($data_harga as $baris) {
                            echo "<tr>";
                            foreach ($baris as $b) {
                                echo "<td>" . $b . "</td>";
                            }
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>