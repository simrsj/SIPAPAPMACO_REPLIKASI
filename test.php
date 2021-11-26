<?php
$sql_harga_jenis = "SELECT * FROM tb_harga_jenis order by id_harga_jenis ASC";
$q_harga_jenis = $conn->query($sql_harga_jenis);
$no = 1;
while ($d_harga_jenis = $q_harga_jenis->fetch(PDO::FETCH_ASSOC)) {
    if ($no != $d_harga_jenis['id_harga_jenis']) {
        $id_harga_jenis = $no;
        break;
    }
    $id_harga_jenis = $d_harga_jenis['id_harga_jenis'];
    $no++;
}
echo $id_harga_jenis;
