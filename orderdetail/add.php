<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambahkan Detail Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Navbar start -->
    <nav class="navbar navbar-expand bg-light fixed-top">
        <button class="btn btn-light" id="button-toggle">
            <i class="bi bi-list"></i>
        </button>
        <a class="navbar-brand" href="#"><i class="bi bi-stars"></i> Doorsmeer</a>
    </nav>
    <!-- Navbar end -->

    <div class="container mt-5">
        <h1 class="text-center">Tambahkan Detail Order</h1>
        <form action="add.php" method="POST">
            <div class="mb-3">
                <label for="txt_orderid" class="form-label">Order ID</label>
                <input type="text" class="form-control" id="txt_orderid" name="txt_orderid" required>
            </div>
            <div class="mb-3">
                <label for="txt_serviceid" class="form-label">Service ID</label>
                <input type="text" class="form-control" id="txt_serviceid" name="txt_serviceid" required>
            </div>
            <div class="mb-3">
                <label for="txt_subtotal" class="form-label">Subtotal</label>
                <input type="text" class="form-control" id="txt_subtotal" name="txt_subtotal" required>
            </div>
            <button type="submit" name="btn_simpan" class="btn btn-success">Simpan</button>
            <button type="reset" class="btn btn-warning">Reset</button>
            <a href="orderdetail.php" class="btn btn-primary">Kembali</a>
        </form>
    </div>

    <?php
    if(isset($_POST['btn_simpan'])){
        $orderid = $_POST['txt_orderid'];
        $serviceid = $_POST['txt_serviceid'];
        $subtotal = $_POST['txt_subtotal'];

        include_once("config.php");

        $result = mysqli_query($mysqli, "INSERT INTO orderdetail(OrderID, ServiceID, Subtotal) VALUES ('$orderid','$serviceid','$subtotal')");

        if($result){
            echo "<div class='alert alert-success' role='alert'>Detail order berhasil ditambahkan</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Terjadi kesalahan: " . mysqli_error($mysqli) . "</div>";
        }
    }
    ?>
</body>
</html>
