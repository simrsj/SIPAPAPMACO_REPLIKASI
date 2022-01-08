<?php
$d1 = new DateTime("2022-05-10");
$d2 = new DateTime(date('Y-m-d'));
$interval = $d1->diff($d2);
$diffInSeconds = $interval->s; //45
$diffInMinutes = $interval->i; //23
$diffInHours   = $interval->h; //8
$diffInDays    = $interval->d; //21
$diffInMonths  = $interval->m; //4
$diffInYears   = $interval->y; //1

//or get Date difference as total difference
$d1 = strtotime("2018-01-10 00:00:00");
$d2 = strtotime("2019-05-18 01:23:45");
$totalSecondsDiff = abs($d1 - $d2); //42600225
$totalMinutesDiff = $totalSecondsDiff / 60; //710003.75
$totalHoursDiff   = $totalSecondsDiff / 60 / 60; //11833.39
$totalDaysDiff    = $totalSecondsDiff / 60 / 60 / 24; //493.05
$totalMonthsDiff  = $totalSecondsDiff / 60 / 60 / 24 / 30; //16.43
$totalYearsDiff   = $totalSecondsDiff / 60 / 60 / 24 / 365; //1.35

echo $diffInYears . " Tahun " . $diffInMonths . " Bulan " . $diffInDays . " Hari";
