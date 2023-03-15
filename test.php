<div class="card bg-light text-black shadow m-2">
    <div class="card-body">
        <?php

        //----------------------------------------------------------------------------------DATABASE SM
        // $servername = "localhost";
        // $database = "";
        // $username = "root";
        // // $password = "";
        // $password = "";

        try {
            $conn_c = new PDO(
                "mysql:host=$servername; dbname=kepegawaian_dummy",
                "root",
                "simrs12345"
            );
            $conn_c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }


        $que = "SELECT jam_mulai, jam_selesai, id, kegiatan, tempat, verif, nama_disave FROM kegiatan_pegawai k ";
        $que .= "WHERE id_absen_masuk='" . 1628 . "' ";
        $que .= "ORDER BY jam_mulai ASC";
        $q_id_mou  = $conn_c->query($que);
        $no = 1;
        while ($d_id_mou  = $q_id_mou->fetch(PDO::FETCH_ASSOC)) {
            $row['no'] = $no;
            if (intval($row['verif']) == 1) $row['disetujui'] = true;
            else $row['disetujui'] = false;
            if (strlen($row['nama_disave']) > 2) $row['gambar'] = true;
            else $row['gambar'] = false;

            $data[] = $row;
            $no++;
        }
        // print_r($data);
        $waktu_awal = strtotime("2019-10-11 00:01:25");
        $waktu_akhir = strtotime("2019-10-12 12:07:59"); // bisa juga waktu sekarang now()

        //menghitung selisih dengan hasil detik
        $diff    = $waktu_akhir - $waktu_awal;

        //membagi detik menjadi jam
        $jam    = floor($diff / (60 * 60));

        //membagi sisa detik setelah dikurangi $jam menjadi menit
        $menit    = $diff - $jam * (60 * 60);

        //menampilkan / print hasil
        echo 'Hasilnya adalah ' . number_format($diff, 0, ",", ".") . ' detik<br /><br />';
        // echo 'Sehingga Anda memiliki sisa waktu promosi selama: ' . $jam .  ' jam dan ' . floor($menit / 60) . ' menit';
        echo 'Sehingga Anda memiliki sisa waktu promosi selama: ' . $jam .  ' jam dan ' . $menit . ' menit';
        ?>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#toast_success').toast("show");
        $('#toast_primary').toast("show");
        $('#toast_danger').toast("show");
    });
</script>