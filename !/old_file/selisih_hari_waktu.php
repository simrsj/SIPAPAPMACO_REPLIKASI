<?php
//$date=date("Y-m-d")-$x;
//echo $date;

$tanggal = '2021-09-01';
$tanggal = new DateTime($tanggal); 
$sekarang = new DateTime();
$perbedaan = $tanggal->diff($sekarang)->days+1;

echo "$perbedaan";

/*gabungkan
echo $perbedaan->y.' selisih tahun.<br>';
echo $perbedaan->m.' selisih bulan.<br>';
echo $perbedaan->d.' selisih hari.<br>';
echo $perbedaan->h.' selisih jam.<br>';
echo $perbedaan->i.' selisih menit.<br>';
*/

$tgl1 = "2013-01-23";// pendefinisian tanggal awal
$tgl2 = date('Y-m-d', strtotime('+6 days', strtotime($tgl1))); //operasi penjumlahan tanggal sebanyak 6 hari
echo $tgl2; //print tanggal


$start = strtotime('2020-07-12');
$end   = strtotime('2020-07-13');
$diff  = $end - $start;
$days = $diff/60/60/24;	
$hours = floor($diff / (60 * 60));
$minutes = $diff - $hours * (60 * 60);
echo 'Selisih Waktu: '.$days.' Hari, ' . $hours .  ' Jam, ' . floor( $minutes / 60 ) . ' Menit ';
