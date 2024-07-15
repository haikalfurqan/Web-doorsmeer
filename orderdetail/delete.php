<?php
include_once("config.php");

if (isset($_GET['OrderDetailID'])) {
    $OrderDetailID = $_GET['OrderDetailID'];

    $query = "DELETE FROM orderdetail WHERE OrderDetailID = ?";
    $stmt = $mysqli->prepare($query);

    if ($stmt) {
        $stmt->bind_param("i", $OrderDetailID);
        if ($stmt->execute()) {
            header("Location: orderdetail.php");
            exit();
        } else {
            echo "Error: Could not execute the delete statement.";
        }
    } else {
        echo "Error: Could not prepare the delete statement.";
    }

    $stmt->close();
} else {
    echo "ID OrderDetail tidak ditemukan.";
}

$mysqli->close();
?>
