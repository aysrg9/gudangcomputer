<?php

session_start();

// koneksi 
require '../functions.php';

// cek user login
if (!isset($_SESSION["login"])) {
    // jika belom
    header("Location: login.php");
} else {
    // jika sudah, ambil id nya
    $user_id = $_SESSION['id'];
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

    <!-- Font Goole -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="../css/market.css">

    <!-- Bootsrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <style>
    @media (max-width: 400px) {
        .table {
            width: 20%;
        }
    }
    </style>

    <title>Gudang Computer</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Gudang Computer</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto text-uppercase">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../index.php">Home <i class="bi bi-house"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="cart.php">Cart <i class="bi bi-cart3"></i></a>
                    </li>
                    <?php
                    if (!isset($_SESSION['login'])) {
                        // cek user login
                        echo '
                    <li class="nav-item">
                        <a class="nav-link text-white"
                        href="login.php">Login
                        <i class="bi bi-box-arrow-in-right"></i></a>
                    </li>
                    ';
                    } else {
                        // jika sudah login
                        echo '
                    <li class="nav-item">
                        <a class="nav-link text-white" href="profile.php">Profile
                    <i class="bi bi-person-circle"></i></a>
                    </li>
                    ';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Search -->
    <section id="search" class="navbar navbar-expand-lg">
        <div class="navbar-collapse d-flex justify-content-center">
            <form method="get" action="./customer/seacrh.php" class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword"
                    autocomplete="off">
                <button class="btn btn-primary" name="cari" id="tombol-cari"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </section>
    <!-- Akhir Search -->
    <!-- Akhir Navbar -->

    <!-- Checkout -->
    <section class="container">

        <div class="bg-white mb-3 mt-3 border border-primary">
            <div class="mb-3 ps-4 pe-4 mt-3">
                <label for="addres" class="form-label fw-bold fs-5 text-primary">
                    <i class="bi bi-geo-alt-fill"></i> Shipping address
                </label>
                <input type="Text" class="form-control" id="addres" placeholder="Jakarta, Indonesia"
                    value="Jakarta, Indonesia">
            </div>
        </div>

        <div class="bg-white border border-primary table-responsive mb-3">
            <table class="table mt-3 bg-primary container text-center text-white fw-bold">
                <tr class=" text-uppercase">
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                </tr>

                <tr>
                    <td><img src="../image/product/62bb3e8ee71d9.png" alt="" width="50px" height="50px"></td>
                    <td class="text-truncate">GTX 1660 Super</td>
                    <td>Rp 10.000.000</td>
                    <td>1</td>
                    <td>Rp 10.000.000</td>
                </tr>

            </table>
        </div>

        <div class="bg-white mb-3 mt-3 border border-primary">
            <div class="mb-3 ps-4 pe-4 mt-3">
                <label for="voucher" class="form-label fw-bold fs-5 text-primary">
                    <i class="bi bi-ticket-perforated-fill"></i> Code Voucher
                </label>
                <input type="Text" class="form-control" id="voucher" placeholder="freeshipping">
            </div>
        </div>

        <div class="bg-white mb-3 mt-3 border border-primary">
            <div class="mb-3 ps-4 pe-4 mt-3 text-end">
                <div class="d-block">
                    <p>Subtotal Product : Rp 10.000.000</p>
                    <p>Total shipping cost : Rp 0</p>
                    <p>Subtotal : <span class="fs-5 fw-bold text-primary">Rp 10.000.000</span></p>
                    <button type="submit" class="text-uppercase btn btn-primary fw-bold">make an order</button>
                </div>
            </div>
        </div>

    </section>
    <!-- Akhir Checkout -->

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

    <!-- JS Bootstarp -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>