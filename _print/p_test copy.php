<?php

include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/vendor/autoload.php";
// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

$phpWord = new PhpOffice\PhpWord\PhpWord();
$section = $phpWord->addSection();
$section->addText('Hello World');

$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('MyDocument.docx');
