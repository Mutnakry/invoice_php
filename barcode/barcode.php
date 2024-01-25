<?php
//require_once 'path/to/pdf_barcode_class.php';
include("pdf_barcode.php");

$pdf = new PDF_BARCODE('P','mm','A4');
$pdf->AddPage();
$pdf->EAN13(10,10,'012345678901', 10, 0.20, 9);
$pdf->EAN13(10,25,'038476743398', 10, 0.20, 9);
$pdf->EAN13(10,40,'038476743398', 10, 0.20, 9);

$pdf->EAN13(100,10,'012345678901', 5, 0.35, 9);
$pdf->EAN13(100,20,'038476743398', 5, 0.35, 9);
$pdf->EAN13(100,30,'038476743398', 5, 0.35, 9);


$pdf->Output();
?>