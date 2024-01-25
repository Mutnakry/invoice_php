
<?php

$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, 'saleproduct');

// get data
// $query = mysqli_query($conn, "SELECT * FROM orders ");
// //$query = "SELECT * FROM orders";
// $invoice = mysqli_fetch_array($query);



include("./fpdf183/fpdf.php");
$pdf = new FPDF('p', 'mm', 'A4');

$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(71, 10, '', 0, 0);
$pdf->Cell(59, 5, 'Invoice 1', 0, 0);
$pdf->Cell(59, 5, '', 0, 1);


$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(71, 5, 'wet', 0, 0);
$pdf->Cell(59, 5, '', 0, 1);
$pdf->Cell(59, 5, 'Datail', 0, 1);


$pdf->SetFont('Arial', 'B', 10);

$pdf->Cell(130, 5, 'Near Dav', 0, 0);
$pdf->Cell(25, 5, 'Customer ID', 0, 0);
$pdf->Cell(34, 5, '0012', 0, 1);

$pdf->Cell(130, 5, 'ciry, 238343243', 0, 0);
$pdf->Cell(25, 5, 'Invoice date', 0, 0);
$pdf->Cell(34, 5, '12th jan 2019', 0, 1);

$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(130, 5, 'bill to', 0, 0);
$pdf->Cell(25, 5, 'Invoice date', 0, 0);
$pdf->Cell(34, 5, '', 0, 1);

// heading of the table
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 6, 'SL', 1, 0, 'C');
$pdf->Cell(80, 6, 'Description', 1, 0, 'C');
$pdf->Cell(23, 6, 'QTY', 1, 0, 'C');
$pdf->Cell(30, 6, 'Unit Price', 1, 0, 'C');
$pdf->Cell(20, 6, 'Total', 1, 0, 'C');
$pdf->Cell(25, 6, 'tax', 1, 1, 'C');

// table show data
// $pdf->SetFont('Arial', 'B', 10);
// for ($i = 0; $i <= 10; $i++) {
//     $pdf->Cell(10, 6, $i, 1, 0, 'R');
//     $pdf->Cell(80, 6, $invoice['product_name'], 1, 0, 'R');
//     $pdf->Cell(23, 6, '2', 1, 0, 'R');
//     $pdf->Cell(30, 6, '200$', 1, 0, 'R');
//     $pdf->Cell(20, 6, '10', 1, 0, 'R');
//     $pdf->Cell(25, 6, '410', 1, 1, 'R');
// }
// $pdf->Cell(118, 6, '',0, 0);
// $pdf->Cell(25, 6, 'Subtotal',0,0);
// $pdf->Cell(45, 6, '410.00$', 1, 1, 'R');



$invoiceId = 1; // Replace with the actual invoice ID

$sql = "SELECT * FROM invoice_items WHERE invoice_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $invoiceId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$qty = 1; // total tax
$amount = 0; // total amount
$price = 0;
$total = 0;

$pdf->SetFont('Arial', 'B', 10);
while ($item = mysqli_fetch_array($result)) {

    $qty = $item['quantity'];
    $price = $item['unit_price'];
    $total = $qty * $price;
    

    $pdf->Cell(10, 6, '', 1, 0, 'R');
    $pdf->Cell(80, 6, $item['description'], 1, 0, 'R');
    $pdf->Cell(23, 6, number_format($item['quantity']), 1, 0, 'R');
    $pdf->Cell(30, 6, number_format($item['unit_price']), 1, 0, 'R'); // end line
    $pdf->Cell(20, 6, number_format( $total), 1, 0, 'R');
    $pdf->Cell(25, 6, number_format($amount), 1, 1, 'R');

    $amount += $total;
}


$pdf->Cell(118, 6, '', 0, 0);
$pdf->Cell(25, 6, 'Subtotal', 0, 0);
$pdf->Cell(20, 6, number_format($amount), 1, 1, 'R');




// buttom
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(71, 5, 'wet', 0, 0);
$pdf->Cell(59, 5, '', 0, 1);

$pdf->Cell(59, 5, 'Datail', 0, 1);


$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(130, 5, 'Near Dav', 0, 0);
$pdf->Cell(25, 5, 'Customer ID', 0, 0);
$pdf->Cell(34, 5, '0012', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(130, 5, 'Near Dav', 0, 0);
$pdf->Cell(25, 5, 'Customer ID', 0, 0);
$pdf->Cell(34, 5, '0012', 0, 1);

$pdf->Output();
