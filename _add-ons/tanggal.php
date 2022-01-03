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

function tanggal_hari($tanggal)
{
	$hari = array(
		1 =>   'Senin',
		'Selasa',
		'Rabu',
		'Kamis',
		"Jum'at",
		'Sabtu',
		'Minggu'
	);

	return $hari[$tanggal];
}

function tanggal_minimal($tanggal)
{
	$bulan = array(
		1 =>   'Jan',
		'Feb',
		'Mar',
		'Apr',
		'Mei',
		'Jun',
		'Jul',
		'Agu',
		'Sep',
		'Okt',
		'Nov',
		'Des'
	);
	$pecahkan = explode('-', $tanggal);

	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun

	return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
function tanggal_bulan($tanggal)
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
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun

	return $bulan[$tanggal];
}

function tanggal_between($tgl_awal, $tgl_akhir)
{
	$tgl_kalkulasi = strtotime($tgl_akhir) - strtotime($tgl_awal);

	return round($tgl_kalkulasi / (60 * 60 * 24)) + 1;
}


function tanggal_between_nonweekend($tgl_awal, $tgl_akhir)
{
	$mulai = new DateTime($tgl_awal);
	$selesai = new DateTime($tgl_akhir);
	$oneday = new DateInterval("P1D");

	$hari = array();
	$no = 0;

	foreach (new DatePeriod($mulai, $oneday, $selesai->add($oneday)) as $hari) {
		$hari_num = $hari->format("N"); /* 'N' number hari 1 (mon) to 7 (sun) */
		if ($hari_num < 6) { /* mingguan */
			$hari[$hari->format("Y-m-d")] = $no;
		}
		$no++;
	}
	// print_r($hari);
	echo count($hari);
}

function tanggal_between_week($tgl_awal, $tgl_akhir)
{
	$mulai = DateTime::createFromFormat('Y-m-d', $tgl_awal);
	$selesai = DateTime::createFromFormat('Y-m-d', $tgl_akhir);
	if ($tgl_awal > $tgl_akhir)
		return tanggal_between_week($tgl_akhir, $tgl_awal);
	return floor($mulai->diff($selesai)->days / 7);
}
