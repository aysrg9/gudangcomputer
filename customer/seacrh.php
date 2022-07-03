<?php

session_start();

require '../functions.php';

$keyword = $_GET['keyword'];

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
    #hasil {
        height: 100vh;
    }
    </style>
    <title>Gudang Computer Search</title>
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
                        echo '
                    <li class="nav-item">
                        <a class="nav-link text-white"
                        href="login.php">Login
                        <i class="bi bi-box-arrow-in-right"></i></a>
                    </li>
                    ';
                    } else {
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

    <section id="search" class="navbar navbar-expand-lg">
        <div class="navbar-collapse d-flex justify-content-center">
            <form method="get" action="" class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword"
                    autocomplete="off">
                <button class="btn btn-primary" name="cari" id="tombol-cari"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </section>
    <!-- Akhir Navbar -->

    <!-- Content Produk -->
    <!-- Header -->
    <section id="hasil" class="container mb-5">
        <div class="mt-4 bg-primary">
            <h1 class="header-market text-uppercase text-center text-white">Product</h1>
        </div>
        <!-- Akhir Header -->

        <!-- Product -->
        <div class="row row-cols-1 row-cols-md-5 g-3">
            <?php

            $query = mysqli_query($db, "SELECT * FROM product WHERE nama LIKE '%$keyword%' OR spesifikasi LIKE '%$keyword%' OR stock LIKE '%$keyword%' OR price LIKE '%$keyword%'");
            $i = mysqli_num_rows($query);

            if ($i > 0) {
                while ($p = mysqli_fetch_array($query)) {
            ?>

            <a class="col" href="view.php?id=<?= $p["id"] ?>" style="text-decoration: none;">
                <div class="card h-100 border border-primary">
                    <p class="text-center mt-2">
                        <img id="image-prdct" src="../image/product/<?= $p["gambar"] ?>" class="card-img-top" alt="...">
                    </p>
                    <div class="card-body">
                        <p class="card-title text-center text-dark fs-5"><?= $p["nama"] ?></p>
                        <p class="card-text fw-bold text-primary text-center">Rp <?= $p["price"] ?></p>
                    </div>
                </div>
            </a>

            <?php
                }
            } else {
                echo "<script>alert('data not found!')</script>";
            }
            ?>
            <!-- Akhir Product -->
        </div>
    </section>
    <!-- Akhir Content Produk -->

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