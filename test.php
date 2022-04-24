<?php


$date = "2022-02-01";
$newDate = date('Y-m-d', strtotime($date . ' + 5 years'));

echo $newDate;
