<?php
$id_praktik = 1;
$d1 = '2010-10-01';
$d2 = '2010-10-05';
$d2 = date('Y-m-d', strtotime($d2 . "+1 days"));

$period = new DatePeriod(
    new DateTime($d1),
    new DateInterval('P1D'),
    new DateTime($d2)
);

echo "<pre>";
// print_r($period);
echo "</pre>";

$no = 1;
foreach ($period as $key => $value) {
    echo "INSERT INTO tb_praktik_tgl (
        id_praktik, 
        tgl_praktik
    ) VALUES (
        $id_praktik, 
        '" . $value->format('Y-m-d') . "'
    )";
    echo "<br>";
    $no++;
}
