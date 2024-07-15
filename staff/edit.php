<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* Add any custom styles here */
    </style>
</head>

<body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include_once("config.php");

    // Initialize variables for form fields
    $StaffID = $Name = $Shift = $Phone = '';

    // Check if form is submitted
    if (isset($_POST['btn_simpan'])) {
        $StaffID = $_POST['txt_StaffID'];
        $Name = $_POST['txt_Name'];
        $Shift = $_POST['txt_Shift'];
        $Phone = $_POST['txt_Phone'];

        // Update staff record in the database
        $result = mysqli_query($mysqli, "UPDATE staff SET 
            Name='$Name', Shift='$Shift', Phone='$Phone' 
            WHERE StaffID='$StaffID'");

        if ($result) {
            header("Location: staff.php");
            exit(); // Redirect to staff.php after successful update
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error updating record: " . mysqli_error($mysqli) . "</div>";
        }
    }

    // Fetch staff details based on StaffID from URL parameter
    $StaffID = isset($_GET['idsupplier']) ? $_GET['idsupplier'] : '';

    if ($StaffID) {
        $result = mysqli_query($mysqli, "SELECT * FROM staff WHERE StaffID='$StaffID'");

        if ($result) {
            $user_data = mysqli_fetch_array($result);
            $Name = $user_data['Name'];
            $Shift = $user_data['Shift'];
            $Phone = $user_data['Phone'];
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error fetching record: " . mysqli_error($mysqli) . "</div>";
        }
    }
    ?>

    <div class="container mt-5">
        <h1 class="text-center">Edit Staff</h1>
        <form action="edit.php" method="POST">
            <div class="mb-3">
                <label for="txt_StaffID" class="form-label">Staff ID</label>
                <input type="text" class="form-control" id="txt_StaffID" name="txt_StaffID"
                    value="<?php echo isset($StaffID) ? $StaffID : ''; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="txt_Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="txt_Name" name="txt_Name"
                    value="<?php echo isset($Name) ? $Name : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="txt_Shift" class="form-label">Shift</label>
                <input type="text" class="form-control" id="txt_Shift" name="txt_Shift"
                    value="<?php echo isset($Shift) ? $Shift : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="txt_Phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="txt_Phone" name="txt_Phone"
                    value="<?php echo isset($Phone) ? $Phone : ''; ?>" required>
            </div>
            <div class="mb-3">
                <button type="submit" name="btn_simpan" class="btn btn-success">Save</button>
                <a href="staff.php" class="btn btn-primary">Back</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
