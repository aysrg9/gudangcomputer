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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDarkDropdownMenuLink"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu dropdown-menu-primary" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">My Order</a></li>
                            <li><a class="dropdown-item" href="#">My Voucher</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
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

    <!-- Form My Profile -->
    <section class="container mb-5" style="background-color: white;">
        <!-- Header -->
        <section class="jumbotron mb-4 mt-5">
            <h1 class="display-5 fw-bold">My Profile</h1>
            <p>Manage your profile information to control, protect and secure your account</p>
        </section>
        <!-- Akhir Header -->

        <!-- Form Tambah Data -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-4 text-center">
                <img class="rounded-circle border border-primary" width="200px" height="200px" src="../image/person.png"
                    alt="">
                <p class="mt-2"><button class="btn btn-primary">Select Image</button></p>
            </div>
            <div class="mb-4">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Username" value="">
            </div>
            <div class="mb-4">
                <input type="url" class="form-control" id="spesifikasi" name="spesifikasi" placeholder="Name" value="">
            </div>
            <div class="mb-4">
                <input type="number" class="form-control" id="stock" name="stock" placeholder="Email" value="">
            </div>
            <button type="submit" class="btn btn-primary mb-4" name="submit">CHANGE</button>
        </form>
        <!-- Akhir Form Tambah Data -->
    </section>
    <!-- Akhir Form My Profile -->

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