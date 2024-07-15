<?php
include_once("config.php");

if (isset($_GET['OrderID'])) {
    $OrderID = $_GET['OrderID'];
    $query = "DELETE FROM `order` WHERE OrderID = ?";
    $stmt = $mysqli->prepare($query);

    if ($stmt) {
        $stmt->bind_param("i", $OrderID);

        if ($stmt->execute()) {
            // Jika penghapusan berhasil, redirect ke halaman daftar order
            header("location: order.php");
            exit();
        } else {
            // Jika terjadi kesalahan saat mengeksekusi statement delete
            echo "Error: Could not execute the delete statement. " . $stmt->error;
        }

        $stmt->close();
    } else {
        // Jika terjadi kesalahan saat mempersiapkan statement delete
        echo "Error: Could not prepare the delete statement. " . $mysqli->error;
    }
} else {
    // Jika tidak ada OrderID yang diberikan dalam URL, redirect ke halaman daftar order
    header("location: order.php");
    exit();
}

$mysqli->close();
?>
