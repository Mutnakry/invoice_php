<?php
include("./fpdf183/fpdf.php");
// make TCPDF object
$pdf = new FPDF('p', 'mm', 'A4');

// remove defult header and footer
//$pdf->setPrinHeader(false);
//$pdf->setPrinFooter(false);

// add page
$pdf->AddPage();

// tille
// $pdf->SetFont('Arial', 'B', 10);
// $pdf->cell(190,0,'','','this is a html cell',1,1,'C');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30,5,"class",1);
$pdf->cell(160,0,"Program",1,);
$pdf->Ln();
$pdf->Cell(30,5,"class",1);
$pdf->cell(160,0,"Teacher Nmae",1,);
$pdf->Ln();
$pdf->Cell(30,5,"class",1);
$pdf->cell(160,0,"Teacher Nmaernjojgpiqjgp",1,);
$pdf->Ln();


//output
$pdf->Output();