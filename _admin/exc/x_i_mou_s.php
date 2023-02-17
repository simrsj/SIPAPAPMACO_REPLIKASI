<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

// echo "<pre>";
// // var_dump($_POST);
// print_r($_POST);
// echo "</pre>";

$tgl_selesai_mou = date('Y-m-d', strtotime($_POST['tgl_mulai_mou'] . '+3 years'));
echo $tgl_selesai_mou . "<br>";
$sql_i_mou = "INSERT INTO tb_mou (
    id_mou, 
    id_institusi, 
    tgl_input_mou, 
    tgl_mulai_mou, 
    tgl_selesai_mou, 
    no_rsj_mou, 
    no_institusi_mou, 
    id_jurusan_pdd, 
    id_profesi_pdd, 
    id_jenjang_pdd, 
    arsip_mou,
    ) VALUES (
        '" . $_POST['id_mou'] . "',
        '" . $_POST['id_institusi'] . "',
        '" . date('Y-m-d') . "',
        '" . $_POST['tgl_mulai_mou'] . "',
        '" . $tgl_selesai_mou . "',
        '" . $_POST['no_rsj_mou'] . "',
        '" . $_POST['no_institusi_mou'] . "',
        '" . $_POST['id_jurusan_pdd'] . "',
        '" . $_POST['id_profesi_pdd'] . "',
        '" . $_POST['id_jenjang_pdd'] . "',
        'Y'
    )";


// $sql_i_mou_arsip = "INSERT INTO tb_mou_arsip (
//         id_mou_arsip, 
//         id_institusi, 
//         tgl_input_mou_arsip, 
//         tgl_mulai_mou_arsip, 
//         tgl_selesai_mou_arsip, 
//         no_rsj_mou_arsip, 
//         no_institusi_mou_arsip, 
//         id_jurusan_pdd, 
//         id_profesi_pdd, 
//         id_jenjang_pdd
//         ) VALUES (
//             '" . $_POST['id_mou'] . "',
//             '" . $_POST['id_institusi'] . "',
//             '" . date('Y-m-d') . "',
//             '" . $_POST['tgl_mulai_mou'] . "',
//             '" . $tgl_selesai_mou . "',
//             '" . $_POST['no_rsj_mou'] . "',
//             '" . $_POST['no_institusi_mou'] . "',
//             '" . $_POST['id_jurusan_pdd'] . "',
//             '" . $_POST['id_profesi_pdd'] . "',
//             '" . $_POST['id_jenjang_pdd'] . "'
//         )";

// echo "$sql_i_mou <br>";
// echo "$sql_i_mou_arsip <br>";
$conn->query($sql_i_mou);
// $conn->query($sql_i_mou_arsip);

echo json_encode(['success' => 'Sukses']);
