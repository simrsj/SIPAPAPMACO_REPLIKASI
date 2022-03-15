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
                        <br><br>
                        Akronim : <br>
                        <input type="text" class="form-control" name="akronim_institusi" value="<?php echo $d['akronim_institusi'] ?>">
                        <br>
                        Logo : <br>
                        <input type="file" name="logo_institusi" accept="image/png"><br>
                        <span class="text-xs font-italic">Format File PNG, ukuran file dibawah 500 Kb</span>
                        <br><br>
                        Alamat : <br>
                        <textarea class="form-control" name="akronim_institusi"><?php echo $d['alamat_institusi'] ?></textarea>
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
                        <center><button class="btn btn-success btn-sm" type="submit" name="simpan">SIMPAN DATA</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>