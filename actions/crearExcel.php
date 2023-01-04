<?php
//esto es en la lista por usuraio
include '../modelo/Socios.php';
include '../modelo/SociosInstitucion.php';
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1','cooperativoa de ahorro y credito');
$sheet->setCellValue('A2','El nombre de los usuarios');
$sheet->setCellValue('B2','');
$sheet->setCellValue('A3','');
$sheet->setCellValue('B3','');
$sheet->setCellValue('F1','');
$sheet->setCellValue('G1','');
$sheet->setCellValue('H1','');
$writer = new Xlsx($spreadsheet);
$writer->save('hola.xlsx');
?>

