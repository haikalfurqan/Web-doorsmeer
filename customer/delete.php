<?php
include_once("config.php");

if (isset($_GET['idcs'])) {
    $customer_id = $_GET['idcs'];
    $query = "DELETE FROM customer WHERE CustomerID = ?";
    $stmt = $mysqli->prepare($query);
    if ($stmt) {
        $stmt->bind_param("i", $customer_id);
        if ($stmt->execute()) {
            header("location: customer.php");
            exit();
        } else {
            echo "Error: Could not execute the delete statement.";
        }
    } else {
        echo "Error: Could not prepare the delete statement.";
    }

    $stmt->close();
} else {
    header("location: customer.php");
    exit();
}

$mysqli->close();
