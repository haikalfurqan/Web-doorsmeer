<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Service</title>
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
        <h1 class="text-center">Delete Service</h1>

        <?php
        include_once("config.php");

        if (isset($_GET['ServiceID'])) {
            $serviceID = $_GET['ServiceID'];

            $result = mysqli_query($mysqli, "DELETE FROM `service` WHERE ServiceID=$serviceID");

            if ($result) {
                echo "<div class='alert alert-success mt-3' role='alert'>Service berhasil dihapus</div>";
            } else {
                echo "<div class='alert alert-danger mt-3' role='alert'>Terjadi kesalahan: " . mysqli_error($mysqli) . "</div>";
            }
        }
        ?>

        <a href="service.php" class="btn btn-primary">Back</a>
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
