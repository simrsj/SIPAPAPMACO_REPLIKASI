<?php

include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

// $dataJSON['POST'] = print_r($_POST);

if ($_POST['id_m'] != '') {
    $id_mess = $_POST['id_m'];
} else {
    $id_mess = $_GET['id_m'];
}
$jumlahPraktikan = $_POST['jp'];
$tgl_mulai = $_POST['tgl_m'];
$tgl_selesai = $_POST['tgl_s'];
$tgl_selesai = date('Y-m-d', strtotime($tgl_selesai . "+1 days"));

$period = new DatePeriod(
    new DateTime($tgl_mulai),
    new DateInterval('P1D'),
    new DateTime($tgl_selesai)
);

// echo "<pre>";
// print_r($period);
// echo "</pre>";

$no = 1;
$dataJSON['messKet'] = 'T';
foreach ($period as $key => $value) {


    $sql = "SELECT * FROM tb_praktik ";
    $sql .= " JOIN tb_praktik_tgl ON tb_praktik.id_praktik = tb_praktik_tgl.id_praktik ";
    $sql .= " JOIN tb_mess_pilih ON tb_praktik.id_praktik = tb_mess_pilih.id_praktik ";
    $sql .= " JOIN tb_mess ON tb_mess.id_mess = tb_mess_pilih.id_mess ";
    $sql .= " WHERE tb_praktik_tgl.praktik_tgl = '" . $value->format('Y-m-d') . "' ";
    $sql .= " AND tb_mess_pilih.id_mess = " . $id_mess;
    $sql .= " AND (tb_praktik.status_cek_praktik IN ('BYR', 'VPT_Y_PPDS','VPT_Y') OR tb_praktik.status_cek_praktik IN ('W', 'Y'))";
    // $dataJSON['sql'] = $sql;
    $q = $conn->query($sql);

    $jumlahTotal = 0;
    while ($d = $q->fetch(PDO::FETCH_ASSOC)) {
        $jumlahTotal += $d['jumlah_praktik'];
    }

    $sql_mess = "SELECT * FROM tb_mess";
    $sql_mess .= " WHERE id_mess= " . $id_mess;

    $q_mess = $conn->query($sql_mess);
    $d_mess = $q_mess->fetch(PDO::FETCH_ASSOC);
    $messKuota = $d_mess['kapasitas_t_mess'];

    $jumlahPraktikanTotal = $jumlahPraktikan + $jumlahTotal;
    if ($jumlahPraktikanTotal >= $messKuota) {
        $dataJSON['messKet'] = 'Y';
    }
    $no++;
}
$dataJSON['messKuota'] = $messKuota;
echo json_encode($dataJSON);
