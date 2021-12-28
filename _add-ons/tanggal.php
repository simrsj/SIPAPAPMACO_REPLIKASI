<?php
function tanggal($tanggal)
{
	$bulan = array(
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$hari = array(
		1 =>   'Senin',
		'Selasa',
		'Rabu',
		'Kamis',
		"Jum'at",
		'Sabtu',
		'Minggu'
	);
	$pecahkan = explode('-', $tanggal);

	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun

	return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
function tanggal_between($tgl_awal, $tgl_akhir)
{
	$tgl_kalkulasi = $tgl_akhir - $tgl_awal;

	echo round($tgl_kalkulasi / (60 * 60 * 24));
}