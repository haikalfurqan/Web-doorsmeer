<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("config.php");

if (isset($_POST['btn_simpan'])) {
    $OrderID = $_POST['txt_OrderID'];
    $CustomerID = $_POST['txt_CustomerID'];
    $OrderDate = $_POST['txt_OrderDate'];
    $hdn_OrderID = $_POST['hdn_OrderID'];

    // Validasi OrderID
    $order_check = mysqli_query($mysqli, "SELECT * FROM `order` WHERE OrderID='$OrderID'");
    if (mysqli_num_rows($order_check) > 0) {
        // OrderID valid, lakukan update
        $result = mysqli_query($mysqli, "UPDATE `order` SET 
            CustomerID='$CustomerID', OrderDate='$OrderDate' 
            WHERE OrderID='$hdn_OrderID'");

        if ($result) {
            header("Location: order.php");
            exit(); // Redirect agar tidak menampilkan konten setelah redirect
        } else {
            echo "<div class='alert alert-danger' role='alert'>Terjadi kesalahan: " . mysqli_error($mysqli) . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'>OrderID tidak valid</div>";
    }
}

$get_OrderID = isset($_GET['OrderID']) ? $_GET['OrderID'] : '';

if ($get_OrderID) {
    $result = mysqli_query($mysqli, "SELECT * FROM `order` WHERE OrderID='$get_OrderID'");

    if ($result) {
        $user_data = mysqli_fetch_array($result);
        $OrderID = $user_data['OrderID'];
        $CustomerID = $user_data['CustomerID'];
        $OrderDate = $user_data['OrderDate'];
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
    <title>Edit Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Order</h1>
        <form action="editorder.php" method="POST">
            <div class="mb-3">
                <label for="txt_OrderID" class="form-label">Order ID</label>
                <input type="text" class="form-control" id="txt_OrderID" name="txt_OrderID"
                    value="<?php echo isset($OrderID) ? $OrderID : ''; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="txt_CustomerID" class="form-label">Customer ID</label>
                <input type="text" class="form-control" id="txt_CustomerID" name="txt_CustomerID"
                    value="<?php echo isset($CustomerID) ? $CustomerID : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="txt_OrderDate" class="form-label">Order Date</label>
                <input type="date" class="form-control" id="txt_OrderDate" name="txt_OrderDate"
                    value="<?php echo isset($OrderDate) ? $OrderDate : ''; ?>" required>
            </div>
            <div class="mb-3">
                <button type="submit" name="btn_simpan" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                <a href="order.php" class="btn btn-primary">Kembali</a>
            </div>
            <input type="hidden" name="hdn_OrderID"
                value="<?php echo isset($OrderID) ? $OrderID : ''; ?>">
        </form>
    </div>

    <script>
        document.getElementById("button-toggle").addEventListener("click", () => {
            document.getElementById("sidebar").classList.toggle("active-sidebar");
            document.getElementById("main-content").classList.toggle("active-main-content");
        });
    </script>
</body>

</html>
