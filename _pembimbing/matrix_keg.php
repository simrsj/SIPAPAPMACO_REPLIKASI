<div class="container-fluid">

    <div class="text-center">
        <span class="badge badge-primary text-lg mb-4">Selamat Datang</span>
    </div>

    <div class="card shadow">
        <div class="card-header bg-primary text-light b">
            Data Praktik Anda
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">

                    <b>Nama Institusi : </b><br>
                    <?= $d_praktikan['nama_institusi'] ?><br><br>
                    <b>Nama Kelompok : </b><br>
                    <?= $d_praktikan['nama_praktik'] ?><br><br>
                    <b>Periode Stase : </b><br>
                    <?= tanggal($d_praktikan['tgl_mulai_praktik']) . " - " . tanggal($d_praktikan['tgl_selesai_praktik']) ?><br><br>
                </div>
                <div class="col-md-2">
                    <b>Jurusan : </b><br>
                    <?= $d_praktikan['nama_jurusan_pdd'] ?><br><br>
                    <b>Jenjang : </b><br>
                    <?= $d_praktikan['nama_jenjang_pdd'] ?><br><br>
                    <b>Profesi : </b><br>
                    <?= $d_praktikan['nama_profesi_pdd'] ?><br><br>
                </div>
                <div class="col-md-3">
                    <b>Nama Koordiantor : </b><br>
                    <?= $d_praktikan['nama_koordinator_praktik'] ?><br><br>
                    <b>Nomor Koordiantor : </b><br>
                    <?= $d_praktikan['telp_koordinator_praktik'] ?><br><br>
                    <b>Email Koordiantor : </b><br>
                    <?= $d_praktikan['email_koordinator_praktik'] ?><br><br>
                </div>
                <div class="col-md-2">
                    <b>Surat Pengajuan : </b><br>
                    <a href="<?= $d_praktikan['surat_praktik'] ?>" download class="btn btn-outline-success btn-sm">
                        <i class="fas fa-file"></i> Unduh
                    </a><br><br>
                    <b>Akreditasi Institusi : </b><br>
                    <a href="<?= $d_praktikan['akred_institusi_praktik'] ?>" download class="btn btn-outline-success btn-sm">
                        <i class="fas fa-file"></i> Unduh
                    </a><br><br>
                    <b>Akreditasi Jurusan : </b><br>
                    <a href="<?= $d_praktikan['akred_jurusan_praktik'] ?>" download class="btn btn-outline-success btn-sm">
                        <i class="fas fa-file"></i> Unduh
                    </a><br><br>
                </div>
                <div class="col-md-2">
                    <b>File Swab/Sertifikat Vaksin : </b><br>
                    <a href="<?= $d_praktikan['file_swab_praktikan'] ?>" download class="btn btn-outline-success btn-sm">
                        <i class="fas fa-file"></i> Unduh
                    </a><br><br>
                    <?php
                    if ($d_praktikan['id_jenjang_pdd'] == 9) {
                    ?>
                        <b>File Ijazah : </b><br>
                        <a href="<?= $d_praktikan['file_ijazah_praktikan'] ?>" download class="btn btn-outline-success btn-sm">
                            <i class="fas fa-file"></i> Unduh
                        </a><br><br>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->