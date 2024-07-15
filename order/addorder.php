<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("config.php");

if(isset($_POST['btn_simpan'])){
    $customer_id = $_POST['txt_customer_id'];
    $order_date = $_POST['txt_order_date'];

    $result = mysqli_query($mysqli, "INSERT INTO `order`(`CustomerID`, `OrderDate`) VALUES ('$customer_id','$order_date')");

    if($result){
        echo "<div class='alert alert-success' role='alert'>Order sukses ditambahkan</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Terjadi kesalahan: " . mysqli_error($mysqli) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambahkan Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Tambahkan Order</h1>
        <form action="addorder.php" method="POST">
            <div class="mb-3">
                <label for="txt_customer_id" class="form-label">Customer ID</label>
                <input type="text" class="form-control" id="txt_customer_id" name="txt_customer_id" required>
            </div>
            <div class="mb-3">
                <label for="txt_order_date" class="form-label">Order Date</label>
                <input type="date" class="form-control" id="txt_order_date" name="txt_order_date" required>
            </div>
            <button type="submit" name="btn_simpan" class="btn btn-success">Simpan</button>
            <button type="reset" class="btn btn-warning">Reset</button>
            <a href="order.php" class="btn btn-primary">BACK</a>
        </form>
    </div>
</body>
</html>
