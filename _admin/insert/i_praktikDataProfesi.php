<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

//Mencari jenjang
$id_jurusan_pdd = $_GET['jur'];
$sql_profesi = "SELECT * FROM tb_jurusan_pdd_jenjang_profesi";
$sql_profesi .= " JOIN tb_jurusan_pdd ON tb_jurusan_pdd_jenjang_profesi.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd";
$sql_profesi .= " JOIN tb_profesi_pdd ON tb_jurusan_pdd_jenjang_profesi.id_profesi_pdd = tb_profesi_pdd.id_profesi_pdd";
$sql_profesi .= " WHERE tb_jurusan_pdd.id_jurusan_pdd = " . $id_jurusan_pdd;
$sql_profesi .= " GROUP BY tb_profesi_pdd.nama_profesi_pdd";
echo $sql_profesi;
$q_profesi = $conn->query($sql_profesi);
?>

<select class='select2' name='profesi' id="profesi" required>
    <option value="">-- Pilih --</option>
    <?php
    while ($d_profesi = $q_profesi->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <option value="<?= $d_profesi['id_profesi_pdd']; ?>">
            <?= $d_profesi['nama_profesi_pdd']; ?>
        </option>
    <?php
    }
    if ($q_jurusan_pdd->rowCount() < 1) {
    ?>
        <option value="0">-- Lainnya --</option>
    <?php
    }
    ?>
</select>
<script>
    $(".select2").select2({
        placeholder: "-- Pilih --",
        allowClear: true,
        width: "100%",
    });
</script>