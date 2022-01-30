<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
// include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/csrf.php";

if ($_FILES['file_surat']['size'] > 0) {
    //ubah Nama File PDF
    $_FILES['surat_praktik']['name'] = "surat_" . $_POST['id'] . "_" . date('Y-m-d') . ".pdf";

    //alamat file surat masuk
    $alamat_unggah = "./_file/surat";

    //pembuatan alamat bila tidak ada
    if (!is_dir($alamat_unggah)) {
        mkdir($alamat_unggah, 0777, $rekursif = true);
    }

    //unggah surat dan data praktik
    if (!is_null($_FILES['surat_praktik'])) {
        $surat_praktik = (object) @$_FILES['surat_praktik'];

        //mulai unggah file surat praktik
        if ($surat_praktik->size > 1000 * 10000) {
            echo "
            <script>
                alert('File Surat Harus dibawah 10 Mb');
            </script>
            ";
        } elseif ($surat_praktik->type !== 'application/pdf') {
            echo "
            <script>
                alert('File Surat Harus .pdf');
            </script>
                ";
        } else {
            $unggah_surat_praktik = move_uploaded_file(
                $surat_praktik->tmp_name,
                "{$alamat_unggah}/{$surat_praktik->name}"
            );
            $link_surat_praktik = "{$alamat_unggah}/{$surat_praktik->name}";
        }
    }
}

$_FILES['file_data_praktik']['size'] = 1;
$_FILES['file_data_praktik']['type'] = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';

echo "<pre>";
print_r($_FILES);
echo "</pre>";

if (($surat_praktik->size <= 1000 * 1000)
    && ($file_data_praktik->size <= 1000 * 1000)
    && ($surat_praktik->type == 'application/pdf')
    && ($file_data_praktik->type == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
) {

    $sql_insert = "INSERT INTO tb_praktik (
    id_praktik, 
    id_institusi, 
    nama_praktik,
    tgl_input_praktik,
    tgl_mulai_praktik,
    tgl_selesai_praktik,
    jumlah_praktik,
    id_jurusan_pdd,
    id_jenjang_pdd,
    id_spesifikasi_pdd,
    id_akreditasi,
    id_user,
    nama_pembimbing_praktik,
    email_pembimbing_praktik,
    telp_pembimbing_praktik,
    status_cek_praktik, 
    status_praktik
    ) VALUES (
        '" . $_POST['id'] . "', 
        '" . $_POST['id_institusi'] . "', 
        '" . $_POST['nama_praktik'] . "',
        '" . date('Y-m-d') . "', 
        '" . $_POST['tgl_mulai_praktik'] . "', 
        '" . $_POST['tgl_selesai_praktik'] . "',
        '" . $_POST['jumlah_praktik'] . "', 
        '" . $_POST['id_jurusan_pdd'] . "',
        '" . $_POST['id_jenjang_pdd'] . "',
        '" . $_POST['id_spesifikasi_pdd'] . "', 
        '" . $_POST['id_akreditasi'] . "',
        '" . $_POST['user'] . "',
        '" . $_POST['nama_pembimbing_praktik'] . "', 
        '" . $_POST['email_pembimbing_praktik'] . "',
        '" . $_POST['telp_pembimbing_praktik'] . "', 
        'DATA PRAKTIK', 
        'Y'
        )";
    echo $sql_insert . "<br>";
    // $conn->query($sql_insert);
}
echo json_encode(['success' => 'Data Praktik Berhasil Disimpan']);
