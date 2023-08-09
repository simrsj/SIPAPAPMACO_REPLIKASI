<div class="table-responsive">
    <table class="table table-striped" id="dataTable">
        <thead class="thead-dark">
            <tr class="text-center">
                <th scope="col" class="text-left">No&nbsp;&nbsp;</th>
                <th scope="col">Nama Praktikan</th>
                <th scope="col">ID Praktikan</th>
                <th scope="col">Penilaian</th>
                <th scope="col" title="Pencapaian Kompetensi Keterampilan">P3D</th>
                <th scope="col" title="Jadwal Kegiatan Harian">JKH</th>
                <th scope="col" title="Kasus Yang Ditemukan">KYD</th>
                <th scope="col" title="Pembuatan Status Wajib">PSW</th>
                <th scope="col">Materi</th>
                <th scope="col" title="Lembar Penilaian Perilaku Profesional">LPPP</th>
                <th scope="col">Cetak LOG BOOK</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php while ($d_praktikan = $q_praktikan->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td><?= $d_praktikan['nama_praktikan']; ?></td>
                    <td><?= $d_praktikan['no_id_praktikan']; ?></td>
                    <td class="text-center">
                        <a href="?logbook&data=<?= encryptString($d['id_praktik'], $customkey) ?>" class="btn btn-outline-info" title="Detail Penilaian">
                            <i class="fa-solid fa-info-circle"></i> <span class="d-none d-lg-inline">Detail</span>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="?logbook&data=<?= encryptString($d['id_praktik'], $customkey) ?>" class="btn btn-outline-info" title="Detail Pencapaian Kompetensi Keterampilan">
                            <i class="fa-solid fa-info-circle"></i> <span class="d-none d-lg-inline">Detail</span>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="?logbook&data=<?= encryptString($d['id_praktik'], $customkey) ?>" class="btn btn-outline-info" title="Detail Jadwal Kegiatan Harian">
                            <i class="fa-solid fa-info-circle"></i> <span class="d-none d-lg-inline">Detail</span>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="?logbook&data=<?= encryptString($d['id_praktik'], $customkey) ?>" class="btn btn-outline-info" title="Detail Kasus Yang Ditemukan">
                            <i class="fa-solid fa-info-circle"></i> <span class="d-none d-lg-inline">Detail</span>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="?logbook&data=<?= encryptString($d['id_praktik'], $customkey) ?>" class="btn btn-outline-info" title="Detail Pembuatan Status Wajib">
                            <i class="fa-solid fa-info-circle"></i> <span class="d-none d-lg-inline">Detail</span>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="?logbook&data=<?= encryptString($d['id_praktik'], $customkey) ?>" class="btn btn-outline-info" title="Detail Materi">
                            <i class="fa-solid fa-info-circle"></i> <span class="d-none d-lg-inline">Detail</span>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="?logbook&data=<?= encryptString($d['id_praktik'], $customkey) ?>" class="btn btn-outline-info" title="Detail Lembar Penilaian Perilaku Profesional">
                            <i class="fa-solid fa-info-circle"></i> <span class="d-none d-lg-inline">Detail</span>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="_print\p_logbook_ked_coass.php?data=<?= encryptString($d_praktikan['id_praktikan'], $customkey) ?>" class="btn btn-danger" title="Download Log Book" download>
                            <i class="fa-solid fa-file-pdf"></i> <span class="d-none d-lg-inline">Cetak</span>
                        </a>
                    </td>
                </tr>
                <?php $no++; ?>
            <?php } ?>
        </tbody>
    </table>
</div>