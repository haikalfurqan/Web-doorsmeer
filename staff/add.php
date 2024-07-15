<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambahkan Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 2px;
            padding: 2px;
            background-color: #ffffff;
        }

        .sidebar {
            background-color: #f8f9fa;
            padding: 1rem;
        }

        .content {
            margin-top: 1rem;
        }

        li {
            list-style: none;
            margin: 20px 0 20px 0;
        }

        a {
            text-decoration: none;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            margin-left: -300px;
            transition: 0.4s;
        }

        .active-main-content {
            margin-left: 250px;
        }

        .active-sidebar {
            margin-left: 0;
        }

        #main-content {
            transition: 0.4s;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand bg-light fixed-top">
        <button class="btn btn-light" id="button-toggle">
            <i class="bi bi-list"></i>
        </button>
        <a class="navbar-brand" href="#"><i class="bi bi-code-slash p-sm-1 fixed"></i> Doorsmeer</a>
    </nav>
    <div class="container mt-5">
        <h1 class="text-center">Tambahkan Staff</h1>
        <form action="add.php" method="POST">
            <div class="mb-3">
                <label for="txt_StaffID" class="form-label">StaffID</label>
                <input type="text" class="form-control" id="txt_nama" name="txt_StaffID" required>
            </div>
            <div class="mb-3">
                <label for="txt_Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="txt_alamat" name="txt_Name" required>
            </div>
            <div class="mb-3">
                <label for="txt_Shift" class="form-label">Shift</label>
                <input type="text" class="form-control" id="txt_nohp" name="txt_Shift" required>
            </div>
            <div class="mb-3">
                <label for="txt_Phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="txt_nohp" name="txt_Phone" required>
            </div>
            <button type="submit" name="btn_simpan" class="btn btn-success">Simpan</button>
            <button type="reset" class="btn btn-warning">Reset</button>
            <a href="staff.php" class="btn btn-primary">Back</a>
        </form>
    </div>

    <?php
    if (isset($_POST['btn_simpan'])) {
        $StaffID = $_POST['txt_StaffID'];
        $Name = $_POST['txt_Name'];
        $Shift = $_POST['txt_Shift'];
        $Phone = $_POST['txt_Phone'];

        include_once("config.php");

        $result = mysqli_query($mysqli, "INSERT INTO `staff`(`StaffID`, `Name`, `Shift`, `Phone`) 
                                        VALUES ('$StaffID','$Name','$Shift', '$Phone')");

        if ($result) {
            echo "<div class='alert alert-success' role='alert'>Staff berhasil ditambahkan</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Terjadi kesalahan: " . mysqli_error($mysqli) . "</div>";
        }
    }
    ?>

    <script>
        document.getElementById("button-toggle").addEventListener("click", () => {
            document.getElementById("sidebar").classList.toggle("active-sidebar");
            document.getElementById("main-content").classList.toggle("active-main-content");
        });
    </script>
</body>

</html>
