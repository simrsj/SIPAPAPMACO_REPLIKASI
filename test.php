<?php
$file = fopen($filename, "r");
//$sql_data = "SELECT * FROM prod_list_1 ";

$count = 0;                                         // add this line
while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
    //print_r($emapData);
    //exit();
    $count++;                                      // add this line

    if ($count > 1) {                                  // add this line
        $sql = "INSERT into prod_list_1(p_bench,p_name,p_price,p_reason) values ('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]')";
        $conn->query($sql);
    }                                              // add this line
}
