<?php

session_start();

// cek user login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}

// konek function
require '../functions.php';

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font Goole -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

    <!-- Bootsrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <!-- Sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- My CSS -->
    <link rel="stylesheet" href="../css/market.css">

    <title>Profile</title>
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
            <form method="get" action="seacrh.php" class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword"
                    autocomplete="off">
                <button class="btn btn-primary" name="cari" id="tombol-cari"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </section>
    <!-- Akhir Search -->
    <!-- Akhir Navbar -->

    <!-- Voucher-->
    <section class="container mb-5 mt-5" style="background-color: white; height: 100vh;">
        <h1 class="text-center position-absolute top-50 start-50 translate-middle">Vouchers Not Available !</h1>
    </section>
    <!-- Akhir Voucher -->

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>