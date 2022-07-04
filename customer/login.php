<?php

session_start();
require '../functions.php';

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($db, "SELECT username FROM customer WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($db, "SELECT * FROM customer WHERE username = '$username'");
    $user = mysqli_fetch_assoc($result);

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $user["password"])) {

            // set session
            $_SESSION['id'] = $user['id'];
            $_SESSION['picture'] = $user['picture'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['email'] = $user['email'];

            $_SESSION["login"] = true;

            // cek remember me
            if (isset($_SESSION["login"])) {
                // buat cookie
                setcookie('id', $row['id'], time());
                setcookie('key', hash('sha256', $row['username']), time());
            }

            header("Location: ../index.php");
            exit;
        }
    }

    $error = true;
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

    <title>Login</title>
</head>

<body>

    <!-- Login FORM -->
    <div id="login-page">
        <div class="container position-absolute top-50 start-50 translate-middle w-auto">
            <div id="bg-form" style="background-color: rgba(0, 0, 0, 0.8);">
                <div class="form ps-3 pe-3 pt-3 pb-3 text-white border border-primary border-3">
                    <form action="" method="post">
                        <div class="welcome">
                            <h3 class="fs-3 fw-bold">WELCOME</h3>
                        </div>

                        <?php if (isset($error)) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Try Again!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <input type"text" class="form-control" id="username" name="username" placeholder="Username">
                        </div>
                        <div class="mb-1">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>
                        <div class="mb-3" style="font-size: 13px;">
                            <a class="text-white" href="regist.php">Don't Have Account ?</a>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary login">LOGIN</button>
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