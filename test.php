<?php

$jp = 9;
$id_mess = 1;
$d1 = '2022-05-17';
$d2 = '2022-05-20';
$d2 = date('Y-m-d', strtotime($d2 . "+1 days"));

$period = new DatePeriod(
    new DateTime($d1),
    new DateInterval('P1D'),
    new DateTime($d2)
);

echo "<pre>";
print_r($period);
echo "</pre>";

$no = 1;
$json['ket'] = 'T';
