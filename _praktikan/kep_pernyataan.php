<div class="text-gray-900">
    <div class="text-center h5 mb-4 b">SURAT PERNYATAAN</div>
    Saya, mahasiswa peserta pendidikan klinis Ilmu Keperawatan Jiwa di RS Jiwa Provinsi Jawa Barat, yang bertanda tangan di bawah ini :
    <div class="m-4">
        <table>
            <tr>
                <td width="110px">Nama</td>
                <td>: <?= $d_praktikan['nama_praktikan'] ?></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>: <?= $d_praktikan['no_id_praktikan'] ?></td>
            </tr>
            <tr>
                <td>Universitas</td>
                <td>: <?= $d_praktikan['nama_institusi'] ?></td>
            </tr>
            <tr>
                <td>Periode Stase</td>
                <td> : <?= tanggal($d_praktikan['tgl_mulai_praktik']) . " - " . tanggal($d_praktikan['tgl_selesai_praktik']) ?></td>
            </tr>
        </table>
    </div>
    Setelah membaca dan memahami tata tertib serta uraian tugas dan wewenang di bagian ilmu Keperawatan jiwa, saya berjanji akan mentaati peraturan yang berlaku sesuai yang tercantum. Jika saya terbukti melanggar aturan, amak saya bersedia dikenakan sangsi sesuai dengan aturan yang berlaku.
</div>