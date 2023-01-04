<?php
include './modelo/Socios.php';
include './modelo/SociosInstitucion.php';
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('B2','NRO');
$sheet->setCellValue('C2','fecha');
$sheet->setCellValue('D2','ap paterno');
$sheet->setCellValue('E2','ap materno');
$sheet->setCellValue('F2','nombre');
$sheet->setCellValue('G2','monto $');
$sheet->setCellValue('H2','monto bs');
$sheet->setCellValue('I2','plazo');
$sheet->setCellValue('J2','tipo de transaccion');

$writer = new Xlsx($spreadsheet);
$writer->save('cas.xlsx');
?>
<i class="fa fa-text-width" >esta creado el excel</i><br>
<button ><a href="index.php">volver</a></button>

 <?php
 
 ?>