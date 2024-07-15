<?php
$databaseHost = '127.0.0.1';
$databaseport = 3311;
$databaseName = 'doorsmeer';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName, $databaseport);

if ($mysqli) {
    echo "koneksi berhasil";
} else {
    echo "koneksi gagal: " . mysqli_connect_error();
}
?>
