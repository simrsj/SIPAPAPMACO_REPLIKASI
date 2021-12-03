<form class="form-inline" method="post" action="">

    <!-- pilih jurusan -->
    <label class="mr-sm-2">Jurusan :</label>
    <select class="form-control mr-sm-2" name="id_jurusan_pdd" required>
        <option value="">-- Pilih --</option>
        <?php
        $sql_jurusan_pdd = "SELECT * FROM tb_jurusan_pdd";
        $q_jurusan_pdd = $conn->query($sql_jurusan_pdd);
        while ($d_jurusan_pdd = $q_jurusan_pdd->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <option value="<?php echo $d_jurusan_pdd['id_jurusan_pdd']; ?>"><?php echo $d_jurusan_pdd['nama_jurusan_pdd']; ?></option>
        <?php
        }
        ?>
    </select>

    <!-- pilih jenjang -->
    <label class="mr-sm-2">Jenjang :</label>
    <select class="form-control mr-sm-2" name="id_jenjang_pdd">
        <option value="">-- Pilih --</option>
        <?php
        $sql_jenjang_pdd = "SELECT * FROM tb_jenjang_pdd";
        $q_jenjang_pdd = $conn->query($sql_jenjang_pdd);
        while ($d_jenjang_pdd = $q_jenjang_pdd->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <option value="<?php echo $d_jenjang_pdd['id_jenjang_pdd']; ?>"><?php echo $d_jenjang_pdd['nama_jenjang_pdd']; ?></option>
        <?php
        }
        ?>
    </select>
    <button type="submit" class="btn btn-danger btn-sm mr-sm-2" name="cari_harga"><i class="fas fa-search fa-sm"></i></button>
</form>