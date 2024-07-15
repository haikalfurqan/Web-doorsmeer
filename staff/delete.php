<?php
include_once("config.php");

// Mendapatkan ID Staff dari parameter GET
if (isset($_GET['idsupplier'])) {
    $StaffID = $_GET['idsupplier'];

    // Melakukan query untuk menghapus data berdasarkan ID Staff
    $result = mysqli_query($mysqli, "DELETE FROM staff WHERE StaffID='$StaffID'");

    // Mengecek apakah query berhasil
    if ($result) {
        // Redirect ke halaman staff.php setelah sukses
        header("Location: staff.php");
        exit(); // Pastikan menghentikan eksekusi setelah redirect
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error deleting record: " . mysqli_error($mysqli) . "</div>";
    }
} else {
    echo "<div class='alert alert-danger' role='alert'>Staff ID not found.</div>";
}
?>
