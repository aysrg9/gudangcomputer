<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
// dipakai function
require '../functions.php';

// cek apakah tombol submit sudah di tekan atau belum 
if (isset($_POST["upload"])) {



    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Data Added Successfully!');
                document.location.href = 'product.php';
            </script>
       ";
    } else {
        echo "
        <script>
            alert('Data Failed To Add!');
            document.location.href = 'product.php';
        </script>
        ";
    }
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

    <title>Add Product</title>
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
                        <a class="nav-link text-white disabled" href="pricing.php">Order List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="product.php">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="logout.php"
                            onclick="return confirm('Are You Sure?')">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <section class="container">

        <!-- Header -->
        <section class="jumbotron text-center mb-4" style="margin-top: 100px;">
            <h1 class="display-5 text-uppercase fw-bold">Add Product</h1>
            <hr class="text-primary underline">
        </section>
        <!-- Akhir Header -->

        <!-- Form Tambah Data -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-4">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Name">
            </div>
            <div class="mb-4">
                <input type="url" class="form-control" id="spesifikasi" name="spesifikasi" placeholder="Specification">
            </div>
            <div class="mb-4">
                <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock">
            </div>
            <div class="mb-4">
                <input type="text" class="form-control" id="price" name="price" placeholder="Price">
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Image">
            </div>
            <button type="submit" class="btn btn-primary mb-4" name="upload"><i class="bi bi-upload"></i></button>
        </form>
        <!-- Akhir Form Tambah Data -->

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