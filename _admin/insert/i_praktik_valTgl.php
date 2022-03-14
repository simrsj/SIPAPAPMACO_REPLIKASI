<?php

include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
$jp = $_POST['jumlah_praktik'];
$id_jur = $_POST['id_jurusan_pdd'];
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
foreach ($period as $key => $value) {

    $sql = "SELECT * FROM tb_praktik ";
    $sql .= " JOIN tb_praktik_tgl ON tb_praktik.id_praktik = tb_praktik_tgl.id_praktik ";
    $sql .= " WHERE tb_praktik_tgl.praktik_tgl = '" . $value->format('Y-m-d') . "' ";
    $sql .= " AND (tb_praktik.id_jurusan_pdd IN (1,2)) ";
    $sql .= " AND (tb_praktik.status_cek_praktik IN ('BYR', 'VPT_Y_PPDS','VPT_Y') OR tb_praktik.status_cek_praktik IN ('W', 'Y'))";

    echo "$sql<br><br><br>";
    $q = $conn->query($sql);
    $d = $q->fetch(PDO::FETCH_ASSOC);
    $r = $q->rowCount();



    // $sql_k = "SELECT * FROM tb_kuota";
    // $sql_k .= " WHERE id_kuota= 1";

    // $q_k = $conn->query($sql_k);
    // $d_k = $q_k->fetch(PDO::FETCH_ASSOC);
    // $kuota = $d_k['jumlah_kuota'];

    $no++;
}

json_encode(
    [
        "ket1" => "y",
        "ket2" => "y123",
        "ket3" => "y13"
    ]
);
