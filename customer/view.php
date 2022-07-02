<?php

session_start();

require '../functions.php';

$product = query("SELECT * FROM product");

// ambil data di url 
$id = $_GET["id"];

if (isset($_GET["cari"])) {
    $keyword = $_GET["keyword"];
}

//query data product berdasarkan id
$prdct = query("SELECT * FROM product WHERE id = $id")[0];

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
                        echo '
                    <li class="nav-item">
                        <a class="nav-link text-white"
                        href="login.php">Login
                        <i class="bi bi-box-arrow-in-right"></i></a>
                    </li>
                    ';
                    } else {
                        if ($_SESSION) {
                            echo '
                    <li class="nav-item">
                        <a class="nav-link text-white" href="profile.php">Profile
                        <i class="bi bi-person-circle"></i></a>
                    </li>
                        ';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <section id="search" class="navbar navbar-expand-lg">
        <div class="navbar-collapse d-flex justify-content-center">
            <form method="get" action="seacrh.php" class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword"
                    autocomplete="off">
                <button class="btn btn-primary" name="cari" id="tombol-cari"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </section>
    <!-- Akhir Navbar -->

    <!-- View Produk -->
    <section class="container">
        <div class="card mb-5 mt-5">
            <div class=" row g-0">
                <div class="col-md-4">
                    <p class="text-center mt-4">
                        <img src="../image/product/<?= $prdct["gambar"]; ?>" class="img-fluid rounded-start" alt="...">
                    </p>
                </div>
                <div class="col-md-8 mb-">
                    <div class="card-body">
                        <h3 class="card-title fw-bold"><?= $prdct['nama']; ?></h3>
                        <h5 class="card-title fw-bold mb-3">Rp <?= $prdct['price']; ?></h5>
                        <p class="card-text">The products sold at the <span class="fw-bold">Gudang Computer</span> have
                            been confirmed
                            to be 100%
                            original
                            and have an official guarantee, for a warranty claim, you just have to come to our store.
                            Thank you.</p>
                        <p class="card-text"><small class="text-muted"><a href="<?= $prdct["spesifikasi"]; ?>"
                                    target="_blank">Read more
                                    about the product
                                    here</a></small></p>
                        <p class="card-text"><small class="text-muted">Delivery Free Shipping</small></p>
                        <p class="card-text mb-5"><small class="text-muted">NOTE Minimum Purchase *1</small></p>
                        <div class="button-buy-chart">
                            <p><button class="fw-bold btn btn-primary">BUY NOW</button></p>
                            <p><button class="fw-bold btn btn-primary">ADD TO CHART</button></p>
                        </div>
                        <div class="icon fs-4">
                            <i class="bi bi-share pe-2"></i>
                            <i class="bi bi-bookmark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir View Produk -->

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