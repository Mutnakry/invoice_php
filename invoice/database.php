<?php
include("../db.php"); // Include your database connection script

$invoiceId = 1; // Replace with the actual invoice ID
$description = "Product A";
$quantity = 2;
$unitPrice = 25.99;

$totalPrice = $quantity * $unitPrice;

$sql = "INSERT INTO invoice_items (invoice_id, description, quantity, unit_price, total_price)
        VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "issdd", $invoiceId, $description, $quantity, $unitPrice, $totalPrice);
mysqli_stmt_execute($stmt);

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
