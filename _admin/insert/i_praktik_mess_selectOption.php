<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

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
// // print_r($period);
// echo "</pre>";

$sql_mess = "SELECT * FROM tb_mess";
$q_mess = $conn->query($sql_mess);

$option = '<option value=""></option>';
while ($d_mess = $q_mess->fetch(PDO::FETCH_ASSOC)) {
    foreach ($period as $key => $value) {

        $jumlahTotal = 0;
        $sql = "SELECT * FROM tb_praktik ";
        $sql .= " JOIN tb_praktik_tgl ON tb_praktik.id_praktik = tb_praktik_tgl.id_praktik ";
        $sql .= " JOIN tb_mess_pilih ON tb_praktik.id_praktik = tb_mess_pilih.id_praktik ";
        $sql .= " WHERE tb_praktik_tgl.praktik_tgl = '" . $value->format('Y-m-d') . "' ";
        $sql .= " AND tb_mess_pilih.id_mess = " . $d_mess['id_mess'];
        $sql .= " AND (tb_praktik.status_cek_praktik IN ('BYR', 'VPT_Y_PPDS','VPT_Y') OR tb_praktik.status_cek_praktik IN ('W', 'Y'))";
        $q = $conn->query($sql);
        while ($d = $q->fetch(PDO::FETCH_ASSOC)) {
            $jumlahTotal += $d['jumlah_praktik'];
        }
        $jumlahPraktikanTotal = $jumlahPraktikan + $jumlahTotal;
        if ($jumlahPraktikanTotal > $d_mess['kapasitas_t_mess']) {
            $option .= '<option value="' . $d_mess['id_mess'] . '">' . $d_mess['nama_mess'] . '</option>';
        }
    }

    if ($jumlahPraktikanTotal < $d_mess['kapasitas_t_mess'] && $d_mess['kepemilikan_mess'] == 'dalam') {
        $option .= '<option value="' . $d_mess['id_mess'] . '">' . $d_mess['nama_mess'] . '</option>';
    } else {
    }
}

$dataJSON['option'] = $option;

echo json_encode($dataJSON);
