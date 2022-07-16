<?php

session_start();

// cek user login
if (!isset($_SESSION["loginadmin"])) {
    header("Location: login.php");
    exit;
}

// koneksi
require '../functions.php';

// query product
$detailorder = query("SELECT * FROM detailorder");

if (isset($_POST['confirm'])) {
    // cek apakah status berhasil dirubah
    if (confirm($_POST) > 0) {
        echo "
            <script>
                alert('Failed!');
                document.location.href = '../index.php';
            </script>
       ";
    } else {
        echo "
        <script>
            alert('Confirmed!');
            document.location.href = 'orderlist.php';
        </script>
        ";
    }
}

// tombol cari di ketik
if (isset($_POST["nyari"])) {
    $detailorder = nyari($_POST["keywordd"]);
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/index.css">

    <!-- Font Goole -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300&display=swap"
        rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <title>Order List</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-lg fixed-top">
        <div class="container">
            <a class="navbar-brand">Gudang Computer</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto fw-bold text-uppercase">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="orderlist.php">Order List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="product.php">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="logoutadmin.php"
                            onclick="return confirm('Are You Sure?')">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <section id="container" class="container">

        <!-- Header -->
        <section class="jumbotron text-center mb-5" style="margin-top: 100px;">
            <h1 class="display-5 text-uppercase fw-bold">Order list</h1>
            <hr class="text-primary underline">
        </section>
        <!-- Akhir Header -->

        <!-- Search -->
        <form action="" method="post">
            <input class="form-control container mb-3 w-25 float-end" type="search" list="datalistOptions" id="keywordd"
                name="keywordd" autocomplete="off" placeholder="Type to search...">
            <button type="submit" name="nyari" id="tombol-cari"
                class="btn btn-primary ms-1 text-uppercase fw-bold float-end d-none">Cari</button>
        </form>
        <!-- Akhir Search -->

        <!-- Tables -->
        <div id="container">
            <table class="table bg-primary container text-center text-white mb-5 mt-3 fw-bold">

                <thead class="text-uppercase">
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>

                <tbody>
                    <?php
                    $order_query = mysqli_query($db, "SELECT * FROM `detailorder`") or die('query failed');
                    $grand_total = 0;
                    if (mysqli_num_rows($order_query) > 0) {
                        while ($fetch_order = mysqli_fetch_assoc($order_query)) {
                    ?>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $fetch_order['id']; ?>">
                        <input type="hidden" name="status" value="Confirm">
                        <th><?php echo $fetch_order['user_id'] ?></th>
                        <td>
                            <?php echo $fetch_order['name']; ?>
                        </td>
                        <td>
                            <?php echo $fetch_order['alamat']; ?>
                        </td>
                        <td><?php echo $fetch_order['quantity']; ?></td>
                        <td>
                            <p><?php echo rupiah($fetch_order['price']); ?></p>
                        </td>

                        <td>
                            <?php echo $fetch_order['status']; ?>
                        </td>


                        <td><button name="confirm" class="btn btn-primary btn-sm fw-bold fs-5"><i
                                    class="bi bi-check-square-fill"></button></td>


                        </tr>
                        <?php
                        }
                    } else {
                        echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
                    }
                        ?>
                </tbody>
            </table>
            </form>
        </div>
        <!-- Akhir Tables -->

    </section>

    <!-- Footer -->
    <footer id="footer" class="py-4 bg-primary position-relative">
        <div class="container-md text-center text-white fs-6">
            <p class="my-0">&copy; Copyright <span class="fw-bold">gudangcomputer</span>. All Rights Reserved.</p>
            <p class="my-0">
                Created & Design
                by
                <span class="fw-bold">@Egiditya.</span>
            </p>
        </div>
    </footer>
    <!-- Akhir Footer -->

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>