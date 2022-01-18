<?php
session_start();
include '_add-ons/koneksi.php';
include '_add-ons/csrf.php';

$nama_institusi = stripslashes(strip_tags(htmlspecialchars($_POST['nama_institusi'], ENT_QUOTES)));
$nama_praktik = stripslashes(strip_tags(htmlspecialchars($_POST['nama_praktik'], ENT_QUOTES)));

echo $nama_institusi . "-" . $nama_praktik . "-" . "<br>";

//mencari data id_praktikan yg belum ada
$q_praktik = $conn->query("SELECT id_praktik FROM tb_praktik ORDER BY id_praktik ASC");

$no_id_praktik = 1;
while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
	// echo $no_id_praktik . "-" . $d_praktik['id_praktik'] . "-1<br>";
	if ($no_id_praktik == $d_praktik['id_praktik']) {
		$no_id_praktik = $d_praktik['id_praktik'] + 1;
		// echo $no_id_praktik . "-" . $d_praktik['id_praktik'] . "-2<br>";
	} elseif ($no_id_praktik == 1) {
		$no_id_praktik;
		// echo $no_id_praktik . "-" . $d_praktik['id_praktik'] . "-3<br>";
	}
	// echo $no_id_praktik . "-" . $d_praktik['id_praktik'] . "-4<br>";
}
// echo $no_id_praktik . "-5<br>";

// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";

//alamat file surat masuk
$alamat_unggah = "./_file/praktikan";

//pembuatan alamat bila tidak ada
if (!is_dir($alamat_unggah)) {
	mkdir($alamat_unggah, 0777, $rekursif = true);
}

//unggah surat dan data praktik
if ($_FILES['surat_praktik']['size'] > 0) {

	//ubah Nama File PDF
	$_FILES['surat_praktik']['name'] = "surat_praktik_" . $no_id_praktik . "_" . date('Y-m-d') . ".pdf";

	$file_surat_praktik = (object) @$_FILES['surat_praktik'];

	//mulai unggah file surat praktik
	if ($file_surat_praktik->size > 1000 * 1000) {
		echo "
            <script>
                alert('File Surat Praktik Harus Kurang dari 1 Mb');
                document.location.href = '';
            </script>
            ";
	} elseif ($file_surat_praktik->type !== 'application/pdf') {
		echo "
            <script>
                alert('File Surat Praktik Harus .pdf');
                document.location.href = '';
            </script>
            ";
	} else {
		$unggah_surat_praktik = move_uploaded_file(
			$file_surat_praktik->tmp_name,
			"{$alamat_unggah}/{$file_surat_praktik->name}"
		);
		$link_surat_praktik = "{$alamat_unggah}/{$file_surat_praktik->name}";
	}
} else {
	$link_surat_praktik = NULL;
}

if ($_FILES['data_praktik']['size'] > 0) {

	//ubah Nama File xlsx
	$_FILES['data_praktik']['name'] = "data_praktik_" . $no_id_praktik . "_" . date('Y-m-d') . ".xlsx";

	$file_data_praktik = (object) @$_FILES['data_praktik'];

	//mulai unggah file data praktik
	if ($file_data_praktik->size > 1000 * 1000) {
		echo "
            <script>
                alert('File Data Praktik Harus Kurang dari 1 Mb');
                document.location.href = '';
            </script>
            ";
	} elseif ($file_data_praktik->type !== 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
		echo "
            <script>
                alert('File Data Praktik Harus .xls .xlsx');
                document.location.href = '';
            </script>
            ";
	} else {
		$unggah_data_praktik = move_uploaded_file(
			$file_data_praktik->tmp_name,
			"{$alamat_unggah}/{$file_data_praktik->name}"
		);
		$link_data_praktik = "{$alamat_unggah}/{$file_data_praktik->name}";
	}
} else {
	$link_data_praktik = NULL;
}

$sql_insert = " INSERT INTO tb_praktik (
        id_praktik,
        id_institusi,
        nama_praktik,  
        tgl_input_praktik,
        tgl_mulai_praktik,
        tgl_selesai_praktik, 
        jumlah_praktik, 
        surat_praktik, 
        data_praktik, 
        id_jurusan_pdd,
        id_jenjang_pdd, 
        id_spesifikasi_pdd,
        id_akreditasi,
        id_user, 
        nama_mentor_praktik, 
        email_mentor_praktik,
        telp_mentor_praktik,  
        status_cek_praktik,
        status_praktik
        ) VALUE (
            '" . $no_id_praktik . "',
            '" . $_POST['id_institusi'] . "',
            '" . $_POST['nama_praktik'] . "',
            '" . date('Y-m-d') . "',
            '" . $_POST['tgl_mulai_praktik'] . "',
            '" . $_POST['tgl_selesai_praktik'] . "',  
            '" . $_POST['jumlah_praktik'] . "',     
            '" . $link_surat_praktik . "',
            '" . $link_data_praktik . "',
            '" . $_POST['id_jurusan_pdd'] . "',
            '" . $_POST['id_jenjang_pdd'] . "',
            '" . $_POST['id_spesifikasi_pdd'] . "',
            '" . $_POST['id_akreditasi'] . "',
            '" . $_SESSION['id_user'] . "',
            '" . $_POST['nama_mentor_praktik'] . "',
            '" . $_POST['email_mentor_praktik'] . "',
            '" . $_POST['telp_mentor_praktik'] . "',
            'DAFTAR',
            'Y'
        )";
echo $sql_insert;
// $conn->query($sql_insert);

// echo json_encode(['success' => 'Sukses']);
