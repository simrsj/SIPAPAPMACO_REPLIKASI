<?php

$sql_id_institusi = "SELECT * FROM tb_institusi";
$sql_id_institusi .= " ORDER BY id_institusi ASC";

$q_id_institusi = $conn->query($sql_id_institusi);
if ($q_id_institusi->rowCount() > 0) {
    $no = 1;
    while ($d_id_institusi = $q_id_institusi->fetch(PDO::FETCH_ASSOC)) {
        if ($no != $d_id_institusi['id_institusi']) {
            // $no += 1;
            echo $no . "_no-" . $d_id_institusi['id_institusi'] . "_id BREAK <br>";
            break;
        }
        echo $no . "_no-" . $d_id_institusi['id_institusi'] . "_id LANJUT <br>";;
        $no++;
    }
}
$id_institusi = $no;
