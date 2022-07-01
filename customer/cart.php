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
                        <a class="nav-link text-white" href="index.php">Home <i class="bi bi-house"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="cart.php">Cart <i class="bi bi-cart3"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="profile.php">Profile <i
                                class="bi bi-person-circle"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="search" class="navbar navbar-expand-lg">
        <div class="navbar-collapse d-flex justify-content-center">
            <form method="" action="" class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </section>
    <!-- Akhir Navbar -->

    <!-- Alert -->
    <section class="container mb-5">
        <div class="alert alert-warning d-flex align-items-center mt-3 border border-secondary" role="alert">
            <div class="text-dark fw-bold">
                <i class="bi bi-box"></i> Choose the Free Shipping voucher to enjoy Free Shipping. Happy Shopping !
            </div>
        </div>
        <!-- Akhir Alert -->

        <!-- Cart -->
        <section id="page-cart" style="height:100vh;">
            <div class="card mb-3 border border-primary">
                <div class=" row g-0">
                    <div class="col-md-4">
                        <p class="text-center mt-4">
                            <img src="../image/62bb3e8ee71d9.png" class="img-fluid rounded-start" alt="..."
                                style="width: 200px;">
                        </p>
                    </div>
                    <div class="col-md-8 mb-">
                        <div class="card-body">
                            <h3 class="card-title fw-bold">MSI RTX 3090 TI 12 GB</h3>
                            <h5 class="card-title fw-bold">Rp 10.222.999</h5>
                            <p class="card-text"><small class="text-muted">M-Banking Payment Only</small></p>
                            <div class="button-buy">
                                <p><button class="fw-bold btn btn-primary">BUY NOW</button></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" card mb-3 border border-primary">
                <div class=" row g-0">
                    <div class="col-md-4">
                        <p class="text-center mt-4">
                            <img src="../image/62bb3e8ee71d9.png" class="img-fluid rounded-start" alt="..."
                                style="width: 200px;">
                        </p>
                    </div>
                    <div class="col-md-8 mb-">
                        <div class="card-body">
                            <h3 class="card-title fw-bold">MSI RTX 3090 TI 12 GB</h3>
                            <h5 class="card-title fw-bold">Rp 10.222.999</h5>
                            <p class="card-text"><small class="text-muted">M-Banking Payment Only</small></p>
                            <div class="button-buy">
                                <p><button class="fw-bold btn btn-primary">BUY NOW</button></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" card mb-3 border border-primary">
                <div class=" row g-0">
                    <div class="col-md-4">
                        <p class="text-center mt-4">
                            <img src="../image/62bb3e8ee71d9.png" class="img-fluid rounded-start" alt="..."
                                style="width: 200px;">
                        </p>
                    </div>
                    <div class="col-md-8 mb-">
                        <div class="card-body">
                            <h3 class="card-title fw-bold">MSI RTX 3090 TI 12 GB</h3>
                            <h5 class="card-title fw-bold">Rp 10.222.999</h5>
                            <p class="card-text"><small class="text-muted">M-Banking Payment Only</small></p>
                            <div class="button-buy">
                                <p><button class="fw-bold btn btn-primary">BUY NOW</button></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!-- Akhir Cart -->

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