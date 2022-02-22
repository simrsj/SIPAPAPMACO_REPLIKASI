<?php

define('NUMBER_OF_COLUMNS', 37);

function renderCalenderMonth($date)
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

    for ($i = 0; $i < NUMBER_OF_COLUMNS; $i++) {
        $weekDays[] = strftime('%a', $timestamp);
        $timestamp = strtotime('+1 day', $timestamp);
    }
    $blank = date('w', strtotime("{$year}-{$month}-01"));
?>

    <div class="table-responsive">
        <table class='table table-striped' id='myTable'>
            <thead class="thead-dark">
                <tr>
                    <th colspan="<?php echo NUMBER_OF_COLUMNS ?>" class="text-center"> <?php echo $title ?> <?php echo $year ?> </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php foreach ($weekDays as $key => $weekDay) : ?>
                        <td class="text-center"><?php echo $weekDay ?></td>
                    <?php endforeach ?>
                </tr>
                <tr>
                    <?php for ($i = 0; $i < $blank; $i++) : ?>
                        <td></td>
                    <?php endfor; ?>
                    <?php for ($i = 1; $i <= $daysInMonth; $i++) : ?>
                        <?php if ($day == $i) : ?>
                            <td><strong><?php echo $i ?></strong></td>
                        <?php else : ?>
                            <td><?php echo $i ?></td>
                        <?php endif; ?>
                        <?php if (($i + $blank) % NUMBER_OF_COLUMNS == 0) : ?>
                </tr>
                <tr>
                <?php endif; ?>
            <?php endfor; ?>
            <?php for ($i = 0; ($i + $blank + $daysInMonth) % NUMBER_OF_COLUMNS != 0; $i++) : ?>
                <td></td>
            <?php endfor; ?>
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
$tahun_10 = date("Y", strtotime(date("Y", strtotime($StaringDate)) . " + 1 year"));
for ($iterateYear = $tahun_sekarang; $iterateYear <= 2023; $iterateYear++) {
    for ($iterateMonth = 1; $iterateMonth <= 12; $iterateMonth++) {

        /* Set the date */
        $date = strtotime(sprintf('%s-%s-01', $iterateYear, $iterateMonth));
        renderCalenderMonth($date);
    }
}
