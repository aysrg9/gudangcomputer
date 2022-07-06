<?php

// koneksi
require '../functions.php';

// proses regist
if (isset($_POST["register"])) {
    if (registrasic($_POST) > 0) {
        echo "
            <script>
                alert('User Created');
                document.location.href = 'login.php';
            </script>
       ";
    } else {
        echo mysqli_error($db);
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
    <link rel="stylesheet" href="../css/index.css">

    <title>Register</title>
</head>

<body>

    <!-- Login FORM -->
    <div id="login-page">
        <div class="container position-absolute top-50 start-50 translate-middle w-auto">
            <div id="bg-form" style="background-color: rgba(0, 0, 0, 0.8);">
                <div class="form ps-3 pe-3 pt-3 pb-3 text-white border border-primary border-3">
                    <form action="" method="post">
                        <div class="welcome">
                            <h3 class="fs-3 fw-bold">REGISTER</h3>
                        </div>
                        <div class="mb-3" style="display: none;">
                            <input class="form-control form-control-sm" id="picture" name="picture" type="text"
                                value="person.png">
                        </div>
                        <div class="mb-3">
                            <input type"text" class="form-control" id="username" name="username" placeholder="Username"
                                required>
                        </div>
                        <div class="mb-3">
                            <input type"text" class="form-control" id="name" name="name" placeholder="Name" required>
                        </div>
                        <div class="mb-3">
                            <input type"email" class="form-control" id="email" name="email" placeholder="Email"
                                required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password" required>
                        </div>
                        <div class="mb-4">
                            <input type="password" class="form-control" id="password2" name="password2"
                                placeholder="Retype Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary login" name="register">REGISTER</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Login FORM -->

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

    <!-- JS Bootsrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>