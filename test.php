<?php

include "./_add-ons/koneksi.php";
$sql_praktik = "SELECT * FROM tb_praktik 
JOIN tb_institusi ON tb_institusi.id_institusi = tb_praktik.id_institusi 
ORDER BY nama_institusi ASC";
$q_praktik = $conn->query($sql_praktik);

$data = array();
while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
    array_push(
        $data,
        array(
            $d_praktik['nama_institusi'],
            $d_praktik['nama_praktik'],
            $d_praktik['tgl_mulai_praktik'],
            $d_praktik['tgl_selesai_praktik'],
            $d_praktik['jumlah_praktik']
        )
    );
}
echo "<pre>";
print_r($data);
echo "</pre>";
