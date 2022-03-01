<?php
function tanggal_between_weekasd($tgl_awal, $tgl_akhir)
{
    $mulai = DateTime::createFromFormat('Y-m-d', $tgl_awal);
    $selesai = DateTime::createFromFormat('Y-m-d', $tgl_akhir);
    if ($tgl_awal > $tgl_akhir) {
        return tanggal_between_weekasd($tgl_akhir, $tgl_awal);
    }
    return ceil($mulai->diff($selesai)->days / 7);
}

echo "asd " . tanggal_between_weekasd("2022-03-01", "2022-03-10");
