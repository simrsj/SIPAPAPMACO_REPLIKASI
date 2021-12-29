<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Daftar Praktikan</h1>
        </div>
    </div>
    <div class="row">
        <div class="card shadow mb-4 col-lg-4">
            <div class="card-body ">
                <form enctype="multipart/form-data" class="form-group" method="post" action="">
                    <b>Atas Nama : </b><span style="color:red">*</span><br>
                    <input class="form-control" type="text" name="atas_nama_bayar" required><br>
                    <b>No. Rekening/Lainnya : </b><span style="color:red">*</span><br>
                    <input class="form-control" type="text" name="no_bayar" required><br>
                    <b>Pembayaran Melalui : </b><span style="color:red">*</span><br>
                    <input class="form-control" type="text" name="melalui_bayar" required><br>
                    <b>Tanggal Bayar : </b><span style="color:red">*</span><br>
                    <input class="form-control" type="date" name="tgl_bayar" required><br>
                    <b>Unggah File : </b><span style="color:red">*</span><br>
                    <input type="file" name="file_bayar" accept="application/pdf" required><br>
                    <input name="id_praktik" value="<?php echo $_GET['ib'] ?>" hidden><br>
                    <div class="modal-footer">
                        <input type="submit" name="simpan_bayar" value="Kirim" class="btn btn-success btn-sm">
                        <a href="?prk" class="btn btn-outline-dark btn-sm">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['simpan_bayar'])) {

    $no_id_bayar = 0;
    while ($d_bayar = $conn->query("SELECT id_bayar FROM tb_bayar ORDER BY id_bayar ASC")->fetch(PDO::FETCH_ASSOC)) {
        if ($no_id_bayar != $d_bayar[0]) {
            $no_id_bayar = $d_bayar[0] + 1;
            break;
        } elseif ($no_id_bayar == 0) {
            $no_id_bayar;
            break;
        }
        $no_id_bayar = $d_bayar[0] + 1;
    }

    //alamat file surat masuk
    $alamat_unggah = "./_file/bayar";

    //ubah Nama File
    $_FILES['file_bayar']['name'] = "bayar_" . $no_id_bayar . "_" . $_POST['id_praktik'] . "-" . date('Y-m-d') . ".pdf";

    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";

    //pembuatan alamat bila tidak ada
    if (!is_dir($alamat_unggah)) {
        mkdir($alamat_unggah, 0777, $rekursif = true);
    }

    //unggah surat dan data praktik
    if (!is_null($_FILES['file_bayar'])) {
        $file_bayar = (object) @$_FILES['file_bayar'];

        //mulai unggah file surat praktik
        if ($file_bayar->size > 1000 * 1000) {
            echo "
                <script>
                    alert('File Harus dibawah 1 Mb');
                </script>
                ";
        } elseif ($file_bayar->type !== 'application/pdf') {
            echo "
                <script>
                    alert('File Surat Harus .pdf');
                </script>
            ";
        } else {
            $unggah_file_bayar = move_uploaded_file(
                $file_bayar->tmp_name,
                "{$alamat_unggah}/{$file_bayar->name}"
            );
            $link_file_bayar = "{$alamat_unggah}/{$file_bayar->name}";
        }
    }
    $sql_insert_bayar = " INSERT INTO tb_bayar (
        id_bayar, 
        id_praktik,
        atas_nama_bayar, 
        no_bayar, 
        tgl_bayar, 
        file_bayar
    ) VALUE (
        '" . $no_id_bayar . "',
        '" . $_POST['id_praktik'] . "',
        '" . $_POST['atas_nama_bayar'] . "',
        '" . $_POST['no_bayar'] . "',        
        '" . $_POST['tgl_bayar'] . "',
        '" . $link_file_bayar . "'
    )";
    // echo $sql_insert_bayar . "<br>";
    $conn->query($sql_insert_bayar);


    //SQL ubah status praktik
    $sql_ubah_status_praktik = "UPDATE tb_praktik
    SET status_cek_praktik = 'PEMBAYARAN'
    WHERE id_praktik = " . $_POST['id_praktik'];

    // echo $sql_ubah_status_praktik . "<br>";
    $conn->query($sql_ubah_status_praktik);
?>
    <script type="text/javascript">
        document.location.href = "?prk";
    </script>
<?php
}
