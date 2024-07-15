<!DOCTYPE html>
<html>

<head>
    <title>Tampilan Input</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include_once("config.php");

    if (isset($_POST['btn_simpan'])) {
        $CustomerID = $_POST['txt_CustomerID'];
        $Name = $_POST['txt_nama'];
        $Address = $_POST['txt_Alamat'];
        $Phone = $_POST['txt_NoTelpon'];
        $hdn_CustomerID = $_POST['hdn_CustomerID'];

        // Query untuk update data customer
        $result = mysqli_query($mysqli, "UPDATE customer SET 
            CustomerID='$CustomerID', Name='$Name', Address='$Address', Phone='$Phone' 
            WHERE CustomerID='$hdn_CustomerID'");

        if ($result) {
            header("Location: customer.php");
        } else {
            echo "Error: " . mysqli_error($mysqli);
        }
    }

    $get_CustomerID = isset($_GET['idcs']) ? $_GET['idcs'] : '';

    if ($get_CustomerID) {
        $result = mysqli_query($mysqli, "SELECT * FROM customer WHERE CustomerID='$get_CustomerID'");

        if ($result) {
            $user_data = mysqli_fetch_array($result);
            $CustomerID = $user_data['CustomerID'];
            $Name = $user_data['Name'];
            $Address = $user_data['Address'];
            $Phone = $user_data['Phone'];
        } else {
            echo "Error: " . mysqli_error($mysqli);
        }
    }
    ?>

    <a href="customer.php">Home</a>
    <br /><br />
    <form action="edit.php" method="POST">
        <div class="container mt-5">
            <h1 class="text-center">Edit Customer</h1>
            <div class="mb-3">
                <label for="txt_CustomerID" class="form-label">ID Customer</label>
                <input type="text" class="form-control" id="txt_CustomerID" name="txt_CustomerID" value="<?php echo isset($CustomerID) ? $CustomerID : ''; ?>" >
            </div>
            <div class="mb-3">
                <label for="txt_nama" class="form-label">Nama Customer</label>
                <input type="text" class="form-control" id="txt_nama" name="txt_nama" value="<?php echo isset($Name) ? $Name : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="txt_Alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="txt_Alamat" name="txt_Alamat" value="<?php echo isset($Address) ? $Address : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="txt_NoTelpon" class="form-label">NoTelpon</label>
                <input type="text" class="form-control" id="txt_NoTelpon" name="txt_NoTelpon" value="<?php echo isset($Phone) ? $Phone : ''; ?>" required>
            </div>
            <div class="mb-3">
                <button type="submit" name="btn_simpan" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                <a href="customer.php" class="btn btn-primary">Back</a>
            </div>
            <input type="hidden" name="hdn_CustomerID" value="<?php echo isset($CustomerID) ? $CustomerID : ''; ?>">
        </div>
    </form>
</body>

</html>
