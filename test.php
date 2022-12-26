<?php
$timezone = new DateTimeZone('Asia/Jakarta');
$date = new DateTime();
$date->setTimeZone($timezone);

echo 'Indonesian Timezone: ' . $date->format('d-m-Y H:i:s') . '<br/>';
echo 'Default Timezone: ' . date('d-m-Y H:i:s');
