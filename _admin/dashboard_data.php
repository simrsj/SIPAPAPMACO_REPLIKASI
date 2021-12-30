<?php
function data_praktik_semua()
{
}
function data_praktik_aktif()
{
}
function data_praktik_proses()
{
}
function data_praktik_nonaktif()
{
    $sql = "SELECT * FROM tb_praktik WHERE status_praktik";
}
