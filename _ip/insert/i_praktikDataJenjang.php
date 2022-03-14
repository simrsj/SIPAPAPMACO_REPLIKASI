<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

//Mencari jenjang
$id_jurusan_pdd = $_GET['id'];
$sql_jenjang = "SELECT * FROM tb_jurusan_pdd_jenjang
JOIN tb_jenjang_pdd ON tb_jurusan_pdd_jenjang.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
 WHERE tb_jurusan_pdd_jenjang.id_jurusan_pdd = " . $id_jurusan_pdd;

// echo $sql_jenjang;
$q_jenjang = $conn->query($sql_jenjang);
?>

<select class='form-control js-example-placeholder-single' aria-label='Default select example' name='id_jenjang_pdd' id="jenjang" required>
    <option value="">-- Pilih --</option>
    <?php
    while ($d_jenjang = $q_jenjang->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <option value="<?php echo $d_jurusan['id_jurusan_pdd']; ?>">
            <?php echo $d_jenjang['nama_jenjang_pdd']; ?>
        </option>
    <?php
    }
    ?>
</select>