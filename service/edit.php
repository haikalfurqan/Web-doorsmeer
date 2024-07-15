<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- Navbar start -->
    <nav class="navbar navbar-expand bg-light fixed-top">
        <button class="btn btn-light" id="button-toggle">
            <i class="bi bi-list"></i>
        </button>
        <a class="navbar-brand" href="#"><i class="bi bi-stars"></i> Doorsmeer</a>
    </nav>
    <!-- Navbar end -->

    <div class="container mt-5">
        <h1 class="text-center">Edit Service</h1>

        <?php
        include_once("config.php");

        if (isset($_GET['ServiceID'])) {
            $serviceID = $_GET['ServiceID'];
            $result = mysqli_query($mysqli, "SELECT * FROM `service` WHERE ServiceID=$serviceID");

            if ($result) {
                $service_data = mysqli_fetch_array($result);
                $name = $service_data['Name'];
                $type = $service_data['Type'];
                $price = $service_data['Price'];
            }
        }

        if (isset($_POST['btn_update'])) {
            $serviceID = $_POST['serviceID'];
            $name = $_POST['serviceName'];
            $type = $_POST['serviceType'];
            $price = $_POST['servicePrice'];

            $result = mysqli_query($mysqli, "UPDATE `service` SET `Name`='$name', `Type`='$type', `Price`='$price' WHERE `ServiceID`=$serviceID");

            if ($result) {
                echo "<div class='alert alert-success mt-3' role='alert'>Service berhasil diperbarui</div>";
            } else {
                echo "<div class='alert alert-danger mt-3' role='alert'>Terjadi kesalahan: " . mysqli_error($mysqli) . "</div>";
            }
        }
        ?>

        <form action="edit.php" method="POST">
            <div class="mb-3">
                <label for="serviceName" class="form-label">Nama Service</label>
                <input type="text" class="form-control" id="serviceName" name="serviceName" value="<?php echo $name; ?>" required>
            </div>
            <div class="mb-3">
                <label for="serviceType" class="form-label">Tipe Service</label>
                <input type="text" class="form-control" id="serviceType" name="serviceType" value="<?php echo $type; ?>" required>
            </div>
            <div class="mb-3">
                <label for="servicePrice" class="form-label">Harga Service</label>
                <input type="number" class="form-control" id="servicePrice" name="servicePrice" value="<?php echo $price; ?>" required>
            </div>
            <input type="hidden" name="serviceID" value="<?php echo $serviceID; ?>">
            <button type="submit" name="btn_update" class="btn btn-success">Update</button>
            <a href="service.php" class="btn btn-primary">Back</a>
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
