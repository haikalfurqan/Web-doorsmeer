<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }

        ul {
            margin-top: 0;
            padding-left: 20px;
        }

        li {
            margin-bottom: 5px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .navbar {
            padding: 0.5rem 1rem;
        }

        .bi bi-code-slash {
            padding-left: 12px;
        }

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

    <div>
        <div class="sidebar p-4 bg-light fixed-left" id="sidebar">
            <li><a class="text-light" href="#">
                    <i class="bi bi-house mr-2"></i>
                    Table Menu
                </a>
            </li>
            <li>
                <a class="text-black" href="../index.php">
                    <i class="bi bi-house mr-2"></i>
                    Home
                </a>
            </li>
            <li>
                <a class="text-black" href="../order/order.php">
                    <i class="bi bi-cart mr-2"></i>
                    Order
                </a>
            </li>
            <li>
                <a class="text-black" href="#">
                    <i class="bi bi-person-fill mr-2"></i>
                    Customer
                </a>
            </li>
            <li>
                <a class="text-black" href="../orderdetail/orderdetail.php">
                    <i class="bi bi-envelope-paper mr-2"></i>
                    OrderDetail
                </a>
            </li>
            <li>
                <a class="btn btn-dark text-white active" href="../service/service.php">
                    <i class="bi bi-car-front-fill mr-2"></i>
                    Service
                </a>
            </li>
            <li>
                <a class="text-black" href="../staff/staff.php">
                    <i class="bi bi-person-arms-up mr-2"></i>
                    Staff
                </a>
            </li>
        </div>
    </div>

    <section class="p-4" id="main-content">
        <div class="card mt-5">
            <div class="card-body">
                <?php
                include_once("config.php");

                $result = mysqli_query($mysqli, "SELECT * FROM `service`");

                if (!$result) {
                    echo "Error: " . mysqli_error($mysqli);
                    error_log("Error executing query: " . mysqli_error($mysqli));
                }
                ?>

                <br><a href="add.php" class="btn btn-dark mb-3">Add New User</a><br /><br />

                <br>
                <table width='100%'>
                    <tr>
                        <th>ServiceID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Opsi</th>
                    </tr>
                    <?php
                    if ($result) {
                        while ($user_data = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $user_data['ServiceID'] . "</td>";
                            echo "<td>" . $user_data['Name'] . "</td>";
                            echo "<td>" . $user_data['Type'] . "</td>";
                            echo "<td>" . $user_data['Price'] . "</td>";
                            echo "<td><a href='edit.php?ServiceID=" . $user_data['ServiceID'] . "' class='btn btn-warning'>Edit</a> | 
                            <a href='delete.php?ServiceID=" . $user_data['ServiceID'] . "' class='btn btn-danger'>Delete</a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>

    <script>
        document.getElementById("button-toggle").addEventListener("click", () => {
            document.getElementById("sidebar").classList.toggle("active-sidebar");
            document.getElementById("main-content").classList.toggle("active-main-content");
        });
    </script>
</body>

</html>