<?php
include("../db.php"); // Include your database connection script

$invoiceId = 1; // Replace with the actual invoice ID

$sql = "SELECT * FROM invoice_items WHERE invoice_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $invoiceId);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

// Display the items in the invoice
while ($row = mysqli_fetch_assoc($result)) {
    echo "Description: " . $row['description'] . "<br>";
    echo "Quantity: " . $row['quantity'] . "<br>";
    echo "Unit Price: $" . $row['unit_price'] . "<br>";
    echo "Total Price: $" . $row['total_price'] . "<br><br>";
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
