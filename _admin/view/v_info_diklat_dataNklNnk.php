<?php

define('JUMLAH_KOLOM2', 7);

function generateKalenderNklNnk($date)
{
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

    for ($i = 0; $i < JUMLAH_KOLOM2; $i++) {
        $weekDays[] = strftime('%a', $timestamp);
        $timestamp = strtotime('+1 day', $timestamp);
    }
    $blank = date('w', strtotime("{$year}-{$month}-01"));
?>

    <div class="table-responsive">
        <table class='table table-striped'>
            <thead class="thead-dark">
                <tr>
                    <th colspan="<?php echo JUMLAH_KOLOM2 ?>" class="text-center">
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
                        if ($day == $i) {
                    ?>
                            <td>
                                <!-- tombol modal -->
                                <button type="button" class="btn btn-outline-primary btn-sm form-control" data-toggle="modal" data-target="#tlg2<?php echo $year . $month . $i; ?>" title="<?php echo tanggal($year . "-" . $month . "-" . $i); ?>"><?php echo $i; ?></button>

                                <!-- modal   -->
                                <div class="modal fade text-gray-800" id="tlg2<?php echo $year . $month . $i; ?>" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="text-center text-lg">INFO PRAKTIK NAKES LAINNYA DAN NON-NAKES TANGGAL <b><?php echo tanggal($year . "-" . $month . "-" . $i); ?></b></div>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
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
                                <button type="button" class="btn btn-outline-primary btn-sm form-control" data-toggle="modal" data-target="#tlg2<?php echo $year . $month . $i; ?>" title="<?php echo tanggal($year . "-" . $month . "-" . $i); ?>"><?php echo $i; ?></button>

                                <!-- modal   -->
                                <div class="modal fade text-gray-800" id="tlg2<?php echo $year . $month . $i; ?>" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="text-center text-lg">INFO PRAKTIK NAKES LAINNYA DAN NON-NAKES TANGGAL <b><?php echo tanggal($year . "-" . $month . "-" . $i); ?></b></div>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        <?php
                        }
                        if (($i + $blank) % JUMLAH_KOLOM2 == 0) {
                        ?>
                </tr>
                <tr class="text-center">
            <?php
                        }
                    }
            ?>
            <br>
            <?php
            for ($i = 0; ($i + $blank + $daysInMonth) % JUMLAH_KOLOM2 != 0; $i++) {
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
date_default_timezone_set("Asia/Hong_Kong");
$tahun_sekarang = date('Y');
$bulan_sekarang = date('m') - 1;
// $tahun_10 = date("Y", strtotime(date("Y", strtotime($StaringDate)) . " + 1 year"));
for ($iterateYear = $tahun_sekarang; $iterateYear <= $tahun_sekarang + 1; $iterateYear++) {
    for ($iterateMonth = 1; $iterateMonth <= 12; $iterateMonth++) {
        // TAHUN BERJALAN 
        if ($iterateYear == $tahun_sekarang) {
            if ($bulan_sekarang < $iterateMonth) {
                /* Set the date */
                $date = strtotime(sprintf('%s-%s-01', $iterateYear, $iterateMonth));
                generateKalenderNklNnk($date);
            }
        } else {

            /* Set the date */
            $date = strtotime(sprintf('%s-%s-01', $iterateYear, $iterateMonth));
            generateKalenderNklNnk($date);
        }
    }
}
