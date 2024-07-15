<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB Doorsmeer</title>
    <link rel="stylesheet" href="/Assest/Css/style2.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --primary-color: #B76E79; 
            --secondary-color: #6c757d;
            --background-color: #f8f9fa;
            --font-family: 'Arial', sans-serif;
            --card-background: #ffffff;
            --card-border: #ced4da;
            --card-box-shadow: rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: var(--font-family);
            background-color: var(--background-color);
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: var(--primary-color);
            padding: 0.5rem 1rem;
        }

        .navbar-brand {
            color: #fff;
            font-weight: bold;
        }

        .sidebar {
            background-color: var(--secondary-color);
            color: #fff;
            padding: 1rem;
            width: 250px;
            height: 100vh;
            position: fixed;
            transition: margin 0.4s;
            margin-left: -250px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 0.5rem 0;
            margin-bottom: 1rem;
        }

        .sidebar a:hover {
            background-color: #495057;
            border-radius: 4px;
        }

        .active-sidebar {
            margin-left: 0;
        }

        #main-content {
            transition: margin 0.4s;
            margin-left: 0;
            padding: 2rem;
            margin-top: 70px;
        }

        .active-main-content {
            margin-left: 250px;
        }

        .card {
            margin-top: 1rem;
            background-color: var(--card-background);
            border: 1px solid var(--card-border);
            box-shadow: 0 0 10px var(--card-box-shadow);
            transition: margin-left 0.4s;
        }

        .card-body {
            padding: 1.5rem;
        }

        h3 {
            color: var(--primary-color);
        }

        .btn-toggle {
            background-color: var(--primary-color);
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-toggle:hover {
            background-color: #8D4C52; 
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- Navbar start -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <button class="btn btn-toggle" id="button-toggle">
            <i class="bi bi-list"></i>
        </button>
        <a class="navbar-brand" href="#"><i class="bi bi-stars"></i> Doorsmeer</a>
    </nav>
    <!-- Navbar end -->

    <!-- Sidebar start -->
    <div class="sidebar" id="sidebar">
        <a href="#">
            <i class="bi bi-house mr-2"></i>
            Table Menu
        </a>
        <a class="btn btn-dark text-white active" href="index.php">
            <i class="bi bi-house mr-2 active"></i>
            Home
        </a>
        <a href="customer/customer.php">
            <i class="bi bi-person-fill"></i>
            Customer
        </a>
        <a href="order/order.php">
            <i class="bi bi-cart"></i>
            Order
        </a>
        <a href="orderdetail/orderdetail.php">
            <i class="bi bi-envelope-paper mr-2"></i>
            OrderDetail
        </a>
        <a href="service/service.php">
            <i class="bi bi-car-front-fill mr-2"></i>
            Service
        </a>
        <a href="staff/staff.php">
            <i class="bi bi-person-arms-up"></i>
            Staff
        </a>
    </div>
    <!-- Sidebar end -->

    <!-- Main content start -->
    <section id="main-content">
        <div class="container">
            <div class="card" id="card-content">
                <div class="card-body">
                    <h3>PROJEK FINAL</h3>
                    <p>Pembuatan website doorsmeer</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content end -->

    <script>
        document.getElementById("button-toggle").addEventListener("click", () => {
            document.getElementById("sidebar").classList.toggle("active-sidebar");
            document.getElementById("main-content").classList.toggle("active-main-content");
            document.getElementById("card-content").classList.toggle("active-main-content");
        });
    </script>
</body>

</html>
