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

if ($id_jur == 1 || $id_jur == 2) {
    $sql_jur = " AND (tb_praktik.id_jurusan_pdd IN (1,2)) ";
    $id_kuota = 1;
} elseif ($id_jur == 3) {
    $sql_jur = " AND (tb_praktik.id_jurusan_pdd = 3) ";
    $id_kuota = 4;
} elseif ($id_jur == 4) {
    $sql_jur = " AND (tb_praktik.id_jurusan_pdd = 4) ";
    $id_kuota = 6;
} elseif ($id_jur == 5) {
    $sql_jur = " AND (tb_praktik.id_jurusan_pdd = 5) ";
    $id_kuota = 2;
} elseif ($id_jur == 6) {
    $sql_jur = " AND (tb_praktik.id_jurusan_pdd = 6) ";
    $id_kuota = 7;
} elseif ($id_jur == 7) {
    $sql_jur = " AND (tb_praktik.id_jurusan_pdd = 7) ";
    $id_kuota = 3;
} elseif ($id_jur == 8) {
    $sql_jur = " AND (tb_praktik.id_jurusan_pdd = 8) ";
    $id_kuota = 5;
}
$no = 1;
$json['ket'] = 't';
foreach ($period as $key => $value) {

    $sql = "SELECT * FROM tb_praktik ";
    $sql .= " JOIN tb_praktik_tgl ON tb_praktik.id_praktik = tb_praktik_tgl.id_praktik ";
    $sql .= " WHERE tb_praktik_tgl.praktik_tgl = '" . $value->format('Y-m-d') . "' ";
    $sql .= " $sql_jur";
    $sql .= " AND (tb_praktik.status_cek_praktik IN ('BYR', 'VPT_Y_PPDS','VPT_Y') OR tb_praktik.status_cek_praktik IN ('W', 'Y'))";
    // echo "$sql<br>";
    $q = $conn->query($sql);

    $jt = 0;
    while ($d = $q->fetch(PDO::FETCH_ASSOC)) {
        $jt += $d['jumlah_praktik'];
    }

    $sql_k = "SELECT * FROM tb_kuota";
    $sql_k .= " WHERE id_kuota= $id_kuota";

    $q_k = $conn->query($sql_k);
    $d_k = $q_k->fetch(PDO::FETCH_ASSOC);
    $kuota = $d_k['jumlah_kuota'];

    $jp_jt = $jp + $jt;
    if ($jp_jt > $kuota) {
        $json['ket'] = 'y';
    }
    $no++;
}

echo json_encode($json);
// echo json_encode(['success' => 'Sukses']);
