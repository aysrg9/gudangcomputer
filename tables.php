<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';

$product = query("SELECT * FROM product");

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
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/index.css">

    <!-- Font Goole -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300&display=swap"
        rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <title>Tables</title>
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
                        <a class="nav-link text-white disabled" href="pricing.php">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="tables.php">Tables</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <section class="container">

        <!-- Header -->
        <section class="jumbotron text-center mb-5" style="margin-top: 100px;">
            <h1 class="display-5 text-uppercase fw-bold">Product</h1>
            <hr class="text-primary underline">
        </section>
        <!-- Akhir Header -->

        <!-- Search -->
        <a href="tambah.php" class="d-inline-block">
            <button class="btn btn-primary fw-bold"><i class="bi bi-plus-circle-fill"></i></button>
        </a>
        <input class="form-control container mb-3 w-25 float-end" type="search" list="datalistOptions"
            id="exampleDataList" placeholder="Type to search...">
        <!-- Akhir Search -->

        <!-- Tables -->
        <table class="table bg-primary container text-center text-white mb-5 fw-bold">
            <tr>
                <th>No</th>
                <th>Action</th>
                <th>Nama</th>
                <th>Spesifikasi</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Gambar</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach ($product as $row) : ?>

            <tr>
                <td><?= $i ?></td>
                <td>
                    <a class="text-white" href="hapus.php?id=<?= $row["id"] ?>"><i class="bi bi-trash-fill"></i></a> |
                    <a class="text-white" href="ubah.php?id=<?= $row["id"] ?>"><i class="bi bi-pencil-square"></i></a>
                </td>
                <td><?= $row["nama"] ?></td>
                <td><a class="text-white" href="<?= $row["spesifikasi"] ?>" target="_blank">KLIK DISINI</a></td>
                <td><?= $row["stock"] ?></td>
                <td><?= $row["price"] ?></td>
                <td><img src="img/<?= $row["gambar"] ?>" alt=""></td>
            </tr>

            <?php $i++ ?>
            <?php endforeach; ?>

        </table>
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