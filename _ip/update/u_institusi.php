<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Ubah Institusi</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form class="form-group" enctype="multipart/form-data" method="POST">
                        <?php
                        $sql = "SELECT * FROM tb_institusi ";
                        $sql .= " WHERE id_institusi = " . $_SESSION['id_institusi'];
                        $q = $conn->query($sql);

                        $d = $q->fetch(PDO::FETCH_ASSOC);
                        ?>
                        Institusi : <br>
                        <b> <?php echo $d['nama_institusi'] ?></b>
                        <input type="hidden" name="nama_institusi" value="<?php echo $d['nama_institusi'] ?>">
                        <input type="hidden" name="id_institusi" value="<?php echo $d['id_institusi'] ?>">
                        <br><br>
                        Akronim : <br>
                        <input type="text" class="form-control" name="akronim_institusi" value="<?php echo $d['akronim_institusi'] ?>">
                        <br>
                        Logo : <br>
                        <input type="file" name="logo_institusi" id="logo_institusi" accept="image/png"><br>
                        <span class="text-xs font-italic">Format File PNG, ukuran file dibawah 500 Kb</span>
                        <br><br>
                        Alamat : <br>
                        <textarea class="form-control" name="alamat_institusi"><?php echo $d['alamat_institusi'] ?></textarea>
                        <br>
                        Akreditasi : <span class="text-danger">*</span><br>
                        <?php
                        $a = "";
                        $b = "";
                        $c = "";
                        if ($d['akred_institusi'] == 'A') {
                            $a = "selected";
                        } else if ($d['akred_institusi'] == 'B') {
                            $b = "selected";
                        } else if ($d['akred_institusi'] == 'C') {
                            $c = "selected";
                        }

                        ?>
                        <select class="form-control" name="akred_institusi" required>
                            <option value="">-- Pilih --</option>
                            <option value="A" <?php echo $a; ?>>A</option>
                            <option value="B" <?php echo $b; ?>>B</option>
                            <option value="C" <?php echo $c; ?>>C</option>
                        </select>
                        <br>
                        Tanggal Berlaku Akreditasi : <span class="text-danger">*</span><br>
                        <input type="date" class="form-control" name="tglAkhirAkred_institusi" value="<?php echo $d['tglAkhirAkred_institusi'] ?>" required>
                        <br>
                        File Akreditasi : <span class="text-danger">*</span><br>
                        <input type="file" name="fileAkred_institusi" accept="application/pdf" required>
                        <br><br>
                        <span class="font-weight-bold font-italic"><span class=" text-danger">*</span> : Wajib Diisi</span>
                        <hr>
                        <center><button class="btn btn-success btn-sm" type="submit" name="simpan" onclick="uploadFile();">SIMPAN DATA</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // Upload file
    function uploadFile() {

        //Cari ekstensi file yg diupload
        var fileName = document.querySelector('#logo_institusi').value;
        var type = fileName.split('.').pop();

        //cari ukuran file yg diupload
        var size = document.getElementById("file").files[0].size / 1024;

        //Toast bila upload file selain pdf
        if (type != 'pdf') {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 10000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            Toast.fire({
                icon: 'warning',
                title: '<div class="text-md text-center">File Surat Harus <b>.pdf</b></div>'
            });
        } else if (size > 1024) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 10000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            Toast.fire({
                icon: 'warning',
                title: '<div class="text-md text-center">File Surat Harus <br><b>Kurang dari 1 Mb</b></div>'
            });
        } else if (
            files.length > 0 &&
            type == 'pdf'
        ) {

            var formData = new FormData();
            formData.append("file", files[0]);

            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "test1.php", true);
            xhttp.onreadystatechange = function() {
            };
            xhttp.send(formData);

        }

    }
</script>
<?php
if (isset($_POST['simpan'])) {


    if ($_FILES['logo_institusi']['size'] > 0) {
        $alamat_unggah = "./_img/logo_institusi/temp/";

        if (!is_dir($alamat_unggah)) {
            mkdir($alamat_unggah, 0777, $rekursif = true);
        }
        $_FILES['logo_institusi']['name'] = $_POST['id'] . ".png";

        if(){
        }elseif (!is_null($_FILES['logo_institusi'])) {
            $logo_institusi = (object) @$_FILES['logo_institusi'];

            $unggah_logo_institusi = move_uploaded_file(
                $logo_institusi->tmp_name,
                "{$alamat_unggah}/{$logo_institusi->name}"
            );
            $link_logo_institusi = "{$alamat_unggah}/{$logo_institusi->name}";
        }
    }

    $sql = "INSERT INTO tb_institusi_temp
    (
        nama_insTemp, 
        akronim_insTemp, 
        logo_insTemp, 
        alamat_insTemp, 
        akr_insTemp, 
        tglAkr_insTemp, 
        fileAkr_insTemp
    ) VALUE (
        '" . $_POST['nama_institusi'] . "',
        '" . $_POST['akronim_institusi'] . "',
        '" . $_POST['logo_institusi'] . "',
        '" . $_POST['alamat_institusi'] . "',
        '" . $_POST['akred_institusi'] . "',
        '" . $_POST['tglAkhirAkred_institusi'] . "',
        '" . $_POST['fileAkred_institusi'] . "'
    
    ";
}

?>