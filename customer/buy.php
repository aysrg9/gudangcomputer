<?php

session_start();

// koneksi 
require '../functions.php';

// query data product
$product = query("SELECT * FROM product");

// ambil data dari url
$id = $_GET["id"];

//query data product berdasarkan id
$prdct = query("SELECT * FROM product WHERE id = $id")[0];


// cek user login
if (!isset($_SESSION["login"])) {
    header('Location: login.php');
} else {
    // jika sudah, ambil id nya
    $user_id = $_SESSION['id'];
    $_SESSION['quantity'];
}

// cek apakah tombol buy
if (isset($_POST["buy"])) {

    // cek apakah stock berhasil dirubah
    if (checkout($_POST) > 0) {
        echo "
            <script>
                alert('Process!');
                alert('Your Order Was Successful!');
                document.location.href = '../index.php';
            </script>
       ";
    } else {
        echo "
        <script>
            alert('Failed!');
            document.location.href = '../index.php';
        </script>
        ";
    }

    // cek apakah stock berhasil dirubah
    if (order($_POST) > 0) {
        echo "
            <script>
                alert('Failed!');
                document.location.href = '../index.php';
            </script>
       ";
    } else {
        echo "
        <script>
            alert('Your Order Was Successful!');
            document.location.href = '../index.php';
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

    <title>Gudang Computer Checkout</title>
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

        <form action="" method="post">

            <div class="bg-white mb-3 mt-3 border border-primary shadow">
                <div class="mb-3 ps-4 pe-4 mt-3">
                    <label for="addres" class="form-label fw-bold fs-5 text-primary">
                        <i class="bi bi-geo-alt-fill"></i> Shipping address
                    </label>
                    <input name="alamat" type="Text" class="form-control" id="addres" placeholder="Your Address"
                        value="Jakarta, Indonesia" required>
                </div>
            </div>

            <div class="card mb-3 border border-primary shadow" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-md-2">
                        <p class="text-center mt-4">
                            <img src="../image/product/<?= $prdct["gambar"]; ?>" class="img-fluid rounded-start"
                                alt="..." width="100px" height="100px">
                        </p>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title fw-bold"><?= $prdct["nama"]; ?></h5>
                            <p class="card-text d-inline me-3"><?= rupiah($prdct["price"]); ?></p>
                            <p id="stock" class="card-text d-inline me-3">Stock <?= $prdct["stock"]; ?></p>
                            <input type="hidden" class="me-3" type="text" value="<?= $prdct["stock"]; ?>" name="stock">
                            <p class="card-text d-inline">Quantity <?php echo $_SESSION['quantity'] ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white mb-3 mt-3 border border-primary shadow">
                <div class="mb-3 ps-4 pe-4 mt-3">
                    <label for="voucher" class="form-label fw-bold fs-5 text-primary">
                        <i class="bi bi-ticket-perforated-fill"></i> Code Voucher
                    </label>
                    <input type="Text" class="form-control" id="voucher" placeholder="freeshipping">
                </div>
            </div>

            <div class="bg-white mb-5 mt-3 border border-primary shadow">

                <?php
                $grand_total = 0;
                ?>

                <?php $sub_total = ($prdct['price'] * $_SESSION['quantity']); ?>

                <?php
                $grand_total += $sub_total; {
                }

                ?>

                <div class="mb-3 ps-4 pe-4 mt-3">

                    <div class="d-flex">
                        <div class="p-2 fw-bold text-primary fs-5"><i class="bi bi-credit-card"></i> Payment Method
                        </div>
                        <div class="p-2 fs-5">:</div>
                        <div class="ms-auto p-2 fw-bold fs-5">Cash On Delivery Only</div>
                    </div>

                    <hr>

                    <div class="d-flex">
                        <div class="p-2">Handling Fee</div>
                        <div class="p-2">:</div>
                        <div class="ms-auto p-2">Rp 0</div>
                    </div>

                    <div class="d-flex">
                        <div class="p-2">Total shipping cost</div>
                        <div class="p-2">:</div>
                        <div class="ms-auto p-2">Rp 0</div>
                    </div>

                    <div class="d-flex mb-3">
                        <div class="p-2">Subtotal</div>
                        <div class="p-2">:</div>
                        <div class="ms-auto p-2 fw-bold text-primary fs-5"><?php echo rupiah($grand_total); ?></div>
                    </div>

                    <hr>

                    <p class="text-end">
                        <button name="buy" type="submit" class="btn btn-primary btn-sm text-uppercase fw-bold">make an
                            order</button>
                    </p>
                </div>
            </div>

        </form>

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