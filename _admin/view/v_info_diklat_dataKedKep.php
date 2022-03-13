<?php

define('JUMLAH_KOLOM1', 7);

function generateKalenderKedKep($date)
{
    include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

    $day = date('d', $date);
    $month = date('m', $date);
    $year = date('Y', $date);

    $firstDay = mktime(0, 0, 0, $month, 1, $year);
    $title = strftime('%B', $firstDay);
    $dayOfWeek = date('D', $firstDay);
    $daysInMonth = cal_days_in_month(0, $month, $year);
    /* Get the name of the week days */
    $timestamp = strtotime('next Sunday');
    $weekDays = array();

    for ($i = 0; $i < JUMLAH_KOLOM1; $i++) {
        $weekDays[] = strftime('%a', $timestamp);
        $timestamp = strtotime('+1 day', $timestamp);
    }
    $blank = date('w', strtotime("{$year}-{$month}-01"));
?>

    <div class="table-responsive pt-0">
        <table class='table table-striped'>
            <thead class="thead-dark">
                <tr>
                    <th colspan="<?php echo JUMLAH_KOLOM1 ?>" class="text-center">
                        <?php echo $title . " " . $year; ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <?php
                    foreach ($weekDays as $key => $weekDay) {
                    ?>
                        <td class="text-center"><?php echo $weekDay ?></td>
                    <?php
                    }
                    ?>
                </tr>
                <tr class="text-center">
                    <?php
                    for ($i = 0; $i < $blank; $i++) {
                    ?>
                        <td></td>
                    <?php
                    }
                    ?>
                    <?php
                    for ($i = 1; $i <= $daysInMonth; $i++) {
                        // echo strlen((string)$i) . "-" . $i;

                        //tambah 0 jika tanggal 1 digit
                        if (strlen((string)$i) == 1) {
                            $t = "0" . $i;
                        } else {
                            $t = $i;
                        }

                        $tgl = $year . "-" . $month . "-" . $t;
                        $sql_kedKep = "SELECT * FROM tb_praktik";
                        $sql_kedKep .= " JOIN tb_praktik_tgl  ON tb_praktik.id_praktik = tb_praktik_tgl.id_praktik";
                        $sql_kedKep .= " WHERE tb_praktik_tgl.praktik_tgl = '$tgl'";
                        $sql_kedKep .= " AND (tb_praktik.id_jurusan_pdd = 1 OR tb_praktik.id_jurusan_pdd = 2)";
                        $sql_kedKep .= " AND ((tb_praktik.status_cek_praktik = 'BYR') OR (tb_praktik.status_praktik = 'W' OR tb_praktik.status_praktik = 'Y')) ";
                        $sql_kedKep .= " ";
                        // echo "$sql_kedKep<br>";
                        $q_kedKep = $conn->query($sql_kedKep);

                        $jp_jt = 0;
                        $jp_j = 0;
                        $id = 0;
                        $jp_j_ked = 0;
                        $jp_j_kep = 0;
                        $kuota_ked = 0;
                        $kuota_kep = 0;
                        while ($d_kedKep = $q_kedKep->fetch(PDO::FETCH_ASSOC)) {
                            if ($d_kedKep['id_praktik'] != $id) {
                                $jp_jt = $jp_j + $d_kedKep['jumlah_praktik'];

                                //Kuota masing-masing dari kedokteran dan keperawatan
                                if ($d_kedKep['id_jurusan_pdd'] == 1) {
                                    $kuota_ked = $jp_j_ked + $d_kedKep['jumlah_praktik'];
                                } elseif ($d_kedKep['id_jurusan_pdd'] == 2) {
                                    $kuota_kep = $jp_j_kep + $d_kedKep['jumlah_praktik'];
                                }
                            } else {
                                $jp_j = $d_kedKep['jumlah_praktik'];
                                $jp_j_ked = $d_kedKep['jumlah_praktik'];
                                $jp_j_kep = $d_kedKep['jumlah_praktik'];
                                $id = $d_kedKep['id_praktik'];
                            }
                        }

                        $sql_kuotaKedKep = "SELECT * FROM tb_kuota";
                        $sql_kuotaKedKep .= " WHERE id_kuota= 1";

                        $q_kuotaKedKep = $conn->query($sql_kuotaKedKep);
                        $d_kuotaKedKep = $q_kuotaKedKep->fetch(PDO::FETCH_ASSOC);
                        $kuota_keKep = $d_kuotaKedKep['jumlah_kuota'];

                        //penentuan jenis tombol
                        if ($jp_jt == 0) {
                            $btn_kedKep = "success";
                        } elseif (($jp_jt > 0) && ($jp_jt < $kuota_keKep)) {
                            $btn_kedKep = "warning";
                        } elseif ($jp_jt >= $kuota_keKep) {
                            $btn_kedKep = "danger";
                        } else {
                            $btn_kedKep = "secondary";
                        }
                        // echo $jp_jt . "-" . $kuota_ked . "-" . $kuota_kep . "<br>";

                        if ($day == $i) {
                    ?>
                            <td>
                                <!-- tombol modal -->
                                <button type="button" class="btn btn-outline-<?php echo $btn_kedKep; ?> btn-sm form-control" data-toggle="modal" data-target="#tlg<?php echo $tgl; ?>" title="<?php echo tanggal($year . "-" . $month . "-" . $i); ?>"><?php echo $i; ?></button>

                                <!-- modal   -->
                                <div class="modal fade text-gray-800" id="tlg<?php echo $tgl; ?>" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="text-center text-lg">INFO PRAKTIK KEDOKTERAN DAN KEPERAWATAN TANGGAL <b><?php echo tanggal($tgl); ?></b></div>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                JUMLAH PRAKTIK : <?php echo $jp_jt; ?><br>
                                                KEDOKTERAN : <?php echo $kuota_ked; ?><br>
                                                KEPERAWATAN : <?php echo $kuota_kep; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        <?php
                        } else {
                        ?>
                            <td>
                                <!-- tombol modal -->
                                <button type="button" class="btn btn-outline-<?php echo $btn_kedKep; ?> btn-sm form-control" data-toggle="modal" data-target="#tlg<?php echo $tgl; ?>" title="<?php echo tanggal($year . "-" . $month . "-" . $i); ?>"><?php echo $i; ?></button>

                                <!-- modal   -->
                                <div class="modal fade text-gray-800" id="tlg<?php echo $tgl; ?>" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="text-center text-lg">INFO PRAKTIK KEDOKTERAN DAN KEPERAWATAN TANGGAL <b><?php echo tanggal($tgl); ?></b></div>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                JUMLAH PRAKTIK : <?php echo $jp_jt; ?><br>
                                                KEDOKTERAN : <?php echo $kuota_ked; ?><br>
                                                KEPERAWATAN : <?php echo $kuota_kep; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        <?php
                        }
                        if (($i + $blank) % JUMLAH_KOLOM1 == 0) {
                        ?>
                </tr>
                <tr class="text-center">
            <?php
                        }
                    }
            ?>
            <br>
            <?php
            for ($i = 0; ($i + $blank + $daysInMonth) % JUMLAH_KOLOM1 != 0; $i++) {
            ?>
                <td></td>
            <?php
            }
            ?>
                </tr>
            </tbody>
        </table>
    </div>
<?php
}

// ===========================

/* Set the default timezone */
date_default_timezone_set("Asia/Jakarta");
$tahun_sekarang = date('Y');
$bulan_sekarang = date('m') - 1;
// $tahun_10 = date("Y", strtotime(date("Y", strtotime($StaringDate)) . " + 1 year"));
for ($iterateYear = $tahun_sekarang; $iterateYear <= ($tahun_sekarang + 1); $iterateYear++) {
    for ($iterateMonth = 1; $iterateMonth <= 12; $iterateMonth++) {
        // TAHUN BERJALAN 
        if ($iterateYear == $tahun_sekarang) {
            if ($bulan_sekarang < $iterateMonth) {
                /* Set the date */
                $date = strtotime(sprintf('%s-%s-01', $iterateYear, $iterateMonth));
                generateKalenderKedKep($date);
            }
        } else {

            /* Set the date */
            $date = strtotime(sprintf('%s-%s-01', $iterateYear, $iterateMonth));
            generateKalenderKedKep($date);
        }
    }
}
