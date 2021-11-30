<?php
$id_praktik = $_GET['ih'];

$sql_praktik = "SELECT * FROM tb_praktik 
    JOIN tb_mou ON tb_praktik.id_mou = tb_mou.id_mou
    JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi
    JOIN tb_spesifikasi_pdd ON tb_praktik.id_spesifikasi_pdd = tb_spesifikasi_pdd.id_spesifikasi_pdd
    JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
    JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd
    JOIN tb_akreditasi ON tb_praktik.id_akreditasi = tb_akreditasi.id_akreditasi 
    WHERE tb_praktik.id_praktik = " . $id_praktik;

$q_praktik = $conn->query($sql_praktik);
$d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <h1 class="h3 mb-2 text-gray-800">Daftar Menu Praktikan <?php echo $d_praktik['nama_jurusan_pdd']; ?></h1>
        </div>
    </div>
    <div class="card shadow mb-4 ">
        <div class="card-body">
            <div class="form-group">
                <form method="post" action="">
                    <?php

                    //seleksi jika harga ada
                    if (!is_null($id_praktik)) {
                        if ($d_praktik['id_jurusan_pdd'] == 1) {
                            $id_praktik_harga = 1;
                        } else {
                            $id_praktik_harga = 2;
                        }

                        //perulangan jenis harga (harga_jenis)
                        $sql_harga_jenis = "SELECT * FROM tb_harga 
                JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis 
                WHERE id_jurusan_pdd = " . $id_praktik_harga;
                        $q_harga_jenis = $conn->query($sql_harga_jenis);

                        //perulangan Jenis harga
                        $no_harga_jenis = 1;
                        while ($d_harga_jenis = $q_harga_jenis->fetch(PDO::FETCH_ASSOC)) {
                            if ($no_harga_jenis == 1) {
                    ?>
                                <div class="row">
                                    <div class="col-md-12 bg-secondary text-center">
                                        <b class="" style="color: white;"><?php echo strtoupper($d_harga_jenis['nama_harga_jenis']); ?></b>
                                    </div>
                                </div>
                                <hr>
                            <?php
                            }
                            $no_harga_jenis++;
                            //perulangan nama harga
                            $sql_nama_harga = "SELECT * FROM tb_harga 
                        JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis 
                        WHERE tb_harga.id_harga_jenis = " . $d_harga_jenis['id_harga_jenis'];

                            $q_nama_harga = $conn->query($sql_nama_harga);
                            ?>

                            <!-- tabel baris harga -->
                            <div class="row">
                                <div class="col-md-1">
                                    No
                                </div>
                                <div class="col-md-2">
                                    Nama Harga
                                </div>
                                <div class="col-md-2">
                                    Satuan
                                </div>
                                <div class="col-md-2">
                                    Harga
                                </div>
                            </div>
                            <hr>
                            <?php
                            $no_harga = 1;
                            while ($d_nama_harga = $q_nama_harga->fetch(PDO::FETCH_ASSOC)) {
                                if (fmod($no_harga, 2) == 0) {
                                    $bg_harga = "bg-warning";
                                } else {
                                    $bg_harga = "";
                                }

                            ?>
                                <div class="row">
                                    <div class="col-md-1 <?php echo $bg_harga; ?>">
                                        <?php echo $no_harga; ?>
                                    </div>
                                    <div class="col-md-2 <?php echo $bg_harga; ?>">
                                        <?php echo $d_nama_harga['nama_harga']; ?>
                                    </div>
                                    <div class="col-md-2 <?php echo $bg_harga; ?>">
                                        <?php echo $d_nama_harga['satuan_harga']; ?>
                                    </div>
                                    <div class="col-md-2 <?php echo $bg_harga; ?>">
                                        <?php echo "Rp " . number_format($d_nama_harga['jumlah_harga'], 0, ",", "."); ?>
                                    </div>
                                    <div class="col-md-1 <?php echo $bg_harga; ?>">
                                        <input class="form-control" type="text" name="<?php echo "id_praktik" . $id_praktik . "-id_harga" . $d_nama_harga['id_harga']; ?>">
                                    </div>
                                </div>
                        <?php
                                $no_harga++;
                            }
                            break;
                            $no_harga_jenis = 1;
                        }
                    } else {
                        ?>
                        <h3 class="text-center">DATA TIDAK ADA</h3>
                    <?php
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['simpan_praktik'])) {
    $q_praktik = $conn->query("SELECT id_praktik FROM tb_praktik ORDER BY id_praktik ASC");
    $no_id_praktik = 1;
    //mencari data id_praktikan yg belum ada
    while ($d_pratik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
        if ($no_id_praktik != $d_praktik[0]) {
            $no_id_praktik = $d_praktik[0] + 1;
            break;
        } elseif ($no_id_praktik == 0) {
            $no_id_praktik;
            break;
        }
        $no_id_praktik = $d_praktik[0] + 1;
    }
    //ubah Nama File PDF
    $_FILES['surat_praktik']['name'] = "surat_praktik_" . $no_id_praktik . "_" . date('Y-m-d') . ".pdf";
    $_FILES['data_praktik']['name'] = "data_praktik_" . $no_id_praktik . "_" . date('Y-m-d') . ".xlsx";

    //alamat file surat masuk
    $alamat_unggah = "./_file/praktikan";

    //print_r($_FILES);

    //pembuatan alamat bila tidak ada
    if (!is_dir($alamat_unggah)) {
        mkdir($alamat_unggah, 0777, $rekursif = true);
    }

    //unggah surat dan data praktik
    if (!is_null($_FILES['surat_praktik'])) {
        $file_surat_praktik = (object) @$_FILES['surat_praktik'];

        //mulai unggah file surat praktik
        if ($file_surat_praktik->size > 1000 * 1000) {
            echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>File Unggah Surat</strong>Harus Kurang dari 1 MB
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            ";
            die();
        } elseif ($file_surat_praktik->type !== 'application/pdf') {
            echo "
            <script>
                alert('File Surat Harus .pdf');
            </script>
            ";
            die();
        } else {
            $unggah_surat_praktik = move_uploaded_file(
                $file_surat_praktik->tmp_name,
                "{$alamat_unggah}/{$file_surat_praktik->name}"
            );
            $link_surat_praktik = "{$alamat_unggah}/{$file_surat_praktik->name}";

            // if ($unggah_data_praktik) {
            //     $link = "{$alamat_unggah}/{$file_data_praktik->name}";
            //     echo "Sukses unggah data praktik: <a href='{$link}'>{$file_data_praktik->name}</a>";
            //     echo "<br>";
            // }
        }
    }

    if (!is_null($_FILES['data_praktik'])) {
        $file_data_praktik = (object) @$_FILES['data_praktik'];

        //mulai unggah file data praktik
        if ($file_data_praktik->size > 1000 * 1000) {
            echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>File Unggah Data</strong>Harus Kurang dari 1 MB
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            ";
            die();
        } elseif ($file_data_praktik->type !== 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
            echo "
            <script>
                alert('File data Harus .xls .xlsx');
            </script>
            ";
            die();
        } else {
            $unggah_data_praktik = move_uploaded_file(
                $file_data_praktik->tmp_name,
                "{$alamat_unggah}/{$file_data_praktik->name}"
            );
            $link_data_praktik = "{$alamat_unggah}/{$file_data_praktik->name}";
        }

        // if ($unggah_data_praktik) {
        //     $link = "{$alamat_unggah}/{$file_data_praktik->name}";
        //     echo "Sukses unggah data praktik: <a href='{$link}'>{$file_data_praktik->name}</a>";
        //     echo "<br>";
        // }
    }

    $sql_insert = " INSERT INTO tb_praktik (
        id_mou,
        id_institusi,
        nama_praktik,  
        tgl_input_praktik,
        tgl_mulai_praktik,
        tgl_selesai_praktik, 
        jumlah_praktik, 
        surat_praktik, 
        data_praktik, 
        id_spesifikasi_pdd,
        id_jenjang_pdd, 
        id_jurusan_pdd,
        id_akreditasi,
        id_user, 
        nama_mentor_praktik, 
        email_mentor_praktik,
        telp_mentor_praktik,  
        status_praktik
    ) VALUE (
        '" . $_POST['id_mou'] . "',
        '" . $_POST['id_mou'] . "',
        '" . $_POST['nama_praktik'] . "',
        '" . date('Y-m-d') . "',
        '" . $_POST['tgl_mulai_praktik'] . "',
        '" . $_POST['tgl_selesai_praktik'] . "',  
        '" . $_POST['jumlah_praktik'] . "',     
        '" . $link_surat_praktik . "',     
        '" . $link_data_praktik . "',        
        '" . $_POST['id_spesifikasi_pdd'] . "',
        '" . $_POST['id_jenjang_pdd'] . "',
        '" . $_POST['id_jurusan_pdd'] . "',
        '" . $_POST['id_akreditasi'] . "',
        '" . $_SESSION['id_user'] . "',
        '" . $_POST['nama_mentor_praktik'] . "',
        '" . $_POST['email_mentor_praktik'] . "',
        '" . $_POST['telp_mentor_praktik'] . "',
        'Y'
    )";
    // echo $sql_insert;
    $conn->query($sql_insert);
?>
    <script type="text/javascript">
        document.location.href = "?prk";
    </script>
<?php
}
?>