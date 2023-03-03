<div class="card bg-light text-black shadow m-2">
    <div class="card-body">
        <?php $d_jenis_jurusan['id_jurusan_pdd_jenis'] = 2;
        $id_praktik = 1;
        $jumlah = 4;
        if (
            $d_jenis_jurusan['id_jurusan_pdd_jenis'] == 1 ||
            $d_jenis_jurusan['id_jurusan_pdd_jenis'] == 2
        ) {
            if ($d_jenis_jurusan['id_jurusan_pdd_jenis'] == 1) {

                $array[0] = [$id_praktik, date('Y-m-d'), "BIAYA ADMINISTRASI", "Institusional Fee", 50000, "per-siswa / periode", 1, $jumlah,  1 * (int)$jumlah * 50000];
                $array[1] = [$id_praktik, date('Y-m-d'), "BIAYA ADMINISTRASI", "Management Fee", 75000, "per-siswa / periode", 1, $jumlah,  1 * (int)$jumlah * 75000];
                $array[2]  = [$id_praktik, date('Y-m-d'), "BIAYA ADMINISTRASI", "Alat tulis Kantor Fee", 5000, "per-siswa / periode", 1, $jumlah,  1 * (int)$jumlah * 5000];
                $array[3]  = [$id_praktik, date('Y-m-d'), "BIAYA HABIS PAKAI", "(Handrub,tisue,sabun)", 5000, "per-siswa / periode", 1, $jumlah,  1 * (int)$jumlah * 5000];
                $array[4]  = [$id_praktik, date('Y-m-d'), "BIAYA OVERHEAD OPERASIONAL", "Log Book", 20000, "per-siswa / periode", 1, $jumlah,  1 * (int)$jumlah * 20000];
                $array[5]  = [$id_praktik, date('Y-m-d'), "PEMAKAIAN KEKAYAAN DAERAH", "Kelas", 30000, "per-siswa / periode", 0, $jumlah,  0];
                $array[6]  = [$id_praktik, date('Y-m-d'), "BIAYA PEMBELAJARAN", "CSS", 37500, "per-siswa / kali", 0, $jumlah,  0];
                $array[7]  = [$id_praktik, date('Y-m-d'), "BIAYA PEMBELAJARAN", "CRS", 37500, "per-siswa / kali", 0, $jumlah,  0];
                $array[8]  = [$id_praktik, date('Y-m-d'), "BIAYA PEMBELAJARAN", "CBD", 37500, "per-siswa / kali", 0, $jumlah,  0];
                $array[9]  = [$id_praktik, date('Y-m-d'), "BIAYA PEMBELAJARAN", "Pengayaan", 37500, "per-siswa / kali", 0, $jumlah,  0];
                $array[10]  = [$id_praktik, date('Y-m-d'), "BIAYA PEMBELAJARAN", "Bimbingan", 37500, "per-siswa / kali", 0, $jumlah, 0];
                $array[11]  = [$id_praktik, date('Y-m-d'), "BIAYA PEMBELAJARAN", "BST", 37500, "per-siswa / kali", 0, $jumlah,  0];
                $array[12]  = [$id_praktik, date('Y-m-d'), "BIAYA UJIAN", "Mini Cex",  150000, "per-siswa / kali", 0, $jumlah, 0];
                $array[13]  = [$id_praktik, date('Y-m-d'), "BIAYA UJIAN", "Ujian",  150000, "per-siswa / kali", 0, $jumlah, 0];
                $array[14]  = [$id_praktik, date('Y-m-d'), "BIAYA UJIAN", "Makan Pembimbing", 20000, "per-siswa / kali", 0, $jumlah,  0];
                $array[15]  = [$id_praktik, date('Y-m-d'), "BIAYA UJIAN", "Standar Pasien", 100000, "per-siswa / kali", 0, $jumlah,  0];
            } else if ($d_jenis_jurusan['id_jurusan_pdd_jenis'] == 2) {

                $array[0] = [$id_praktik, date('Y-m-d'), "BIAYA ADMINISTRASI", "Institusional Fee", 20000, "per-siswa / periode", 1, $jumlah,  1 * (int)$jumlah * 20000];
                $array[1] = [$id_praktik, date('Y-m-d'), "BIAYA ADMINISTRASI", "Management Fee", 20000, "per-siswa / periode", 1, $jumlah,  1 * (int)$jumlah * 20000];
                $array[2]  = [$id_praktik, date('Y-m-d'), "BIAYA HABIS PAKAI", "(Handrub,tisue,sabun)", 20000, "per-siswa / periode", 1, $jumlah,  1 * (int)$jumlah * 20000];
                $array[3]  = [$id_praktik, date('Y-m-d'), "BIAYA OVERHEAD OPERASIONAL", "Orientasi", 75000, "per-siswa / kali", 1, 1,  1 * (int)$jumlah * 75000];
                $array[4]  = [$id_praktik, date('Y-m-d'), "BIAYA OVERHEAD OPERASIONAL", "Name Tag", 10000, "per-siswa", 1, $jumlah,  1 * (int)$jumlah * 10000];
                $array[5]  = [$id_praktik, date('Y-m-d'), "PEMAKAIAN KEKAYAAN DAERAH", "Aula", 1000000, "periode", 1, 1,  1000000];
                $array[6]  = [$id_praktik, date('Y-m-d'), "BIAYA PEMBELAJARAN", "BST / Bimbingan", 75000, "per-siswa / minggu", 0, $jumlah,  0];
                $array[7]  = [$id_praktik, date('Y-m-d'), "BIAYA PEMBELAJARAN", "Materi (TAK, Komter, Dokep)", 150000, "per-periode / materi", 0, 1,  0];
            }
            foreach ($array as $key => $value) {

                $sql_insert = "INSERT INTO tb_tarif_pilih ( ";
                $sql_insert .= " id_praktik,";
                $sql_insert .= " tgl_tambah_tarif_pilih,";
                $sql_insert .= " nama_jenis_tarif_pilih,";
                $sql_insert .= " nama_tarif_pilih,";
                $sql_insert .= " nominal_tarif_pilih,";
                $sql_insert .= " nama_satuan_tarif_pilih,";
                $sql_insert .= " frekuensi_tarif_pilih,";
                $sql_insert .= " kuantitas_tarif_pilih,";
                $sql_insert .= " jumlah_tarif_pilih";
                $sql_insert .= " ) VALUES (";
                $sql_insert .= " '" . $value[0] . "', ";
                $sql_insert .= " '" . $value[1]  . "', ";
                $sql_insert .= " '" . $value[2]  . "', ";
                $sql_insert .= " '" . $value[3]  . "', ";
                $sql_insert .= " '" . $value[4]  . "', ";
                $sql_insert .= " '" . $value[5]  . "', ";
                $sql_insert .= " '" . $value[6]  . "', ";
                $sql_insert .= " '" . $value[7]  . "', ";
                $sql_insert .= " '" . $value[8]  . "' ";
                $sql_insert .= " );";
                echo " $sql_insert<br>";
                // $conn->query($sql_insert);
            }
        } ?>
    </div>
</div>