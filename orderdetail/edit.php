<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit OrderDetail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include_once("config.php");

    if (isset($_POST['btn_simpan'])) {
        $OrderDetailID = $_POST['txt_OrderDetailID'];
        $OrderID = $_POST['txt_OrderID'];
        $ServiceID = $_POST['txt_ServiceID'];
        $Subtotal = $_POST['txt_Subtotal'];
        $hdn_OrderDetailID = $_POST['hdn_OrderDetailID'];

        // Check if OrderID exists
        $order_check = mysqli_query($mysqli, "SELECT * FROM `order` WHERE OrderID='$OrderID'");
        if (mysqli_num_rows($order_check) > 0) {
            // OrderID exists, proceed with update
            $result = mysqli_query($mysqli, "UPDATE orderdetail SET 
                OrderID='$OrderID', ServiceID='$ServiceID', Subtotal='$Subtotal' 
                WHERE OrderDetailID='$hdn_OrderDetailID'");

            if ($result) {
                header("Location: orderdetail.php");
                exit(); // Redirect agar tidak menampilkan konten setelah redirect
            } else {
                echo "<div class='alert alert-danger' role='alert'>Terjadi kesalahan: " . mysqli_error($mysqli) . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>OrderID tidak valid</div>";
        }
    }

    $get_OrderDetailID = isset($_GET['OrderDetailID']) ? $_GET['OrderDetailID'] : '';

    if ($get_OrderDetailID) {
        $result = mysqli_query($mysqli, "SELECT * FROM orderdetail WHERE OrderDetailID='$get_OrderDetailID'");

        if ($result) {
            $user_data = mysqli_fetch_array($result);
            $OrderDetailID = $user_data['OrderDetailID'];
            $OrderID = $user_data['OrderID'];
            $ServiceID = $user_data['ServiceID'];
            $Subtotal = $user_data['Subtotal'];
        } else {
            echo "<div class='alert alert-danger' role='alert'>Terjadi kesalahan: " . mysqli_error($mysqli) . "</div>";
        }
    }
    ?>

    <div class="container mt-5">
        <h1 class="text-center">Edit OrderDetail</h1>
        <form action="edit.php" method="POST">
            <div class="mb-3">
                <label for="txt_OrderDetailID" class="form-label">OrderDetail ID</label>
                <input type="text" class="form-control" id="txt_OrderDetailID" name="txt_OrderDetailID"
                    value="<?php echo isset($OrderDetailID) ? $OrderDetailID : ''; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="txt_OrderID" class="form-label">Order ID</label>
                <input type="text" class="form-control" id="txt_OrderID" name="txt_OrderID"
                    value="<?php echo isset($OrderID) ? $OrderID : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="txt_ServiceID" class="form-label">Service ID</label>
                <input type="text" class="form-control" id="txt_ServiceID" name="txt_ServiceID"
                    value="<?php echo isset($ServiceID) ? $ServiceID : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="txt_Subtotal" class="form-label">Subtotal</label>
                <input type="text" class="form-control" id="txt_Subtotal" name="txt_Subtotal"
                    value="<?php echo isset($Subtotal) ? $Subtotal : ''; ?>" required>
            </div>
            <div class="mb-3">
                <button type="submit" name="btn_simpan" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                <a href="orderdetail.php" class="btn btn-primary">Kembali</a>
            </div>
            <input type="hidden" name="hdn_OrderDetailID"
                value="<?php echo isset($OrderDetailID) ? $OrderDetailID : ''; ?>">
        </form>
    </div>

    <script>
        // event will be executed when the toggle-button is clicked
        document.getElementById("button-toggle").addEventListener("click", () => {
            // when the button-toggle is clicked, it will add/remove the active-sidebar class
            document.getElementById("sidebar").classList.toggle("active-sidebar");
            // when the button-toggle is clicked, it will add/remove the active-main-content class
            document.getElementById("main-content").classList.toggle("active-main-content");
        });
    </script>
</body>

</html>
