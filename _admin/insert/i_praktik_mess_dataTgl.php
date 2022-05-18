<?php

include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$jp = $_POST['jumlah_praktik'];
$id_mess = $_POST['id_mess'];
$d1 = $_POST['tgl_mulai_praktik'];
$d2 = $_POST['tgl_selesai_praktik'];
$d2 = date('Y-m-d', strtotime($d2 . "+1 days"));

$period = new DatePeriod(
    new DateTime($d1),
    new DateInterval('P1D'),
    new DateTime($d2)
);

// echo "<pre>";
// // print_r($period);
// echo "</pre>";

$no = 1;
$json['ket'] = 'T';
foreach ($period as $key => $value) {

    $sql = "SELECT * FROM tb_praktik ";
    $sql .= " JOIN tb_praktik_tgl ON tb_praktik.id_praktik = tb_praktik_tgl.id_praktik ";
    $sql .= " JOIN tb_mess_pilih ON tb_praktik.id_mess = tb_mess_pilih.id_mess ";
    $sql .= " WHERE tb_praktik_tgl.praktik_tgl = '" . $value->format('Y-m-d') . "' ";
    $sql .= " AND tb_mess_pilih.id_mess = " . $id_mess;
    $sql .= " AND (tb_praktik.status_cek_praktik IN ('BYR', 'VPT_Y_PPDS','VPT_Y') OR tb_praktik.status_cek_praktik IN ('W', 'Y'))";
    // echo "$sql<br>";
    $q = $conn->query($sql);

    $jt = 0;
    while ($d = $q->fetch(PDO::FETCH_ASSOC)) {
        $jt += $d['jumlah_praktik'];
    }

    $sql_messKuota = "SELECT * FROM tb_mess";
    $sql_messKuota .= " WHERE id_kuota= " . $id_mess;

    $q_messKuota = $conn->query($q_messKuota);
    $d_messKuota = $q_messKuota->fetch(PDO::FETCH_ASSOC);
    $messKuota = $d_messKuota['jumlah_kuota'];

    $jp_jt = $jp + $jt;
    if ($jp_jt > $messKuota) {
        $json['ket'] = 'Y';
    }
    $no++;
}

echo json_encode($json);
// echo json_encode(['success' => 'Sukses']);
