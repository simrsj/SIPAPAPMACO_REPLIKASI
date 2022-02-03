<?php

include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
// include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";

$sql_data_praktik = "SELECT * FROM tb_praktik 
JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi
JOIN tb_spesifikasi_pdd ON tb_praktik.id_spesifikasi_pdd = tb_spesifikasi_pdd.id_spesifikasi_pdd
JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd
JOIN tb_jurusan_pdd_jenis ON tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis = tb_jurusan_pdd.id_jurusan_pdd_jenis
JOIN tb_akreditasi ON tb_praktik.id_akreditasi = tb_akreditasi.id_akreditasi 
WHERE tb_praktik.id_praktik = " . $_GET['id'];

echo $sql_data_praktik . "<br>";

$q_data_praktik = $conn->query($sql_data_praktik);
$d_data_praktik = $q_data_praktik->fetch(PDO::FETCH_ASSOC);
?>
<!-- Nama Institusi dan Praktikan -->
<div class="row">
    <div class="col-lg-3">
        Nama Institusi : <br><b><?php echo $d_data_praktik['nama_institusi']; ?></b>
    </div>
    <div class="col-lg-3">
        Gelombang/Kelompok : <br><b><?php echo $d_data_praktik['nama_praktik']; ?></b>
    </div>
    <div class="col-lg-2">
        Jumlah Praktikan : <br><b><?php echo $d_data_praktik['jumlah_praktik']; ?></b>
    </div>

    <div class="col-lg-2">
        Tanggal Mulai : <br><b><?php echo $d_data_praktik['tgl_mulai_praktik']; ?></b>

    </div>
    <div class="col-lg-2">
        Tanggal Selesai : <br><b><?php echo $d_data_praktik['tgl_selesai_praktik']; ?></b>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-lg-2">
        Pilih Jurusan : <br><b><?php echo $d_data_praktik['nama_jurusan_pdd']; ?></b>
    </div>
    <div class="col-lg-2">
        Pilih Jenjang : <br><b><?php echo $d_data_praktik['nama_jenjang_pdd']; ?></b>
    </div>
    <div class="col-lg-3">
        Pilih Spesifikasi :<br><b><?php echo $d_data_praktik['nama_spesifikasi_pdd']; ?></b>
    </div>
    <div class="col-lg-2">
        Akreditasi : <br><b><?php echo $d_data_praktik['nama_akreditasi']; ?></b>
    </div>
    <div class="col-lg-1">
        File Surat :<br>
        <?php
        if ($d_data_praktik['surat_praktik'] == NULL || $d_data_praktik['surat_praktik'] == "") {
        ?>
            <span class="badge badge-warning"> <i class="fas fa-exclamation-circle"></i> File Tidak Ada</span>
        <?php
        } else {
        ?>
            <a class="btn btn-success" href="<?php echo $d_data_praktik['surat_praktik']; ?>"><i class="fas fa-file-download"></i> Download</a>
        <?php
        }
        ?>
    </div>
    <div class="col-lg-2">
        File Data Praktikan :<br>
        <?php
        if ($d_data_praktik['data_praktik'] == NULL || $d_data_praktik['data_praktik'] == "") {
        ?>
            <span class="badge badge-warning"> <i class="fas fa-exclamation-circle"></i> File Tidak Ada</span>
        <?php
        } else {
        ?>
            <a class="btn btn-success" href="<?php echo $d_data_praktik['data_praktik']; ?>"><i class="fas fa-file-download"></i> Download</a>
        <?php
        }
        ?>
    </div>
</div>
<hr>

<div class=" row">
    <div class="col-lg-12 text-center">
        <b>Penanggung Jawab/Pembimbing/Mentor</b>
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        Nama : <br><b><?php echo $d_data_praktik['nama_pembimbing_praktik']; ?></b>
    </div>
    <div class="col-lg-3">
        Email : <br><b><?php echo $d_data_praktik['email_pembimbing_praktik']; ?></b>
    </div>
    <div class="col-lg-6">
        Telpon :<br> <b><?php echo $d_data_praktik['telp_pembimbing_praktik']; ?></b>
    </div>
</div>
<?php $conn = null; ?>