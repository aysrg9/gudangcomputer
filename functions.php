<?php

//Koneksi ke Database
$db = mysqli_connect("localhost", "root", "", "gudangcomputer");

// function query
function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function queryy($queryy)
{
    global $db;
    $resultt = mysqli_query($db, $queryy);
    $rowss = [];
    while ($roww = mysqli_fetch_assoc($resultt)) {
        $rowss[] = $roww;
    }
    return $rowss;
}

// Regist Page Admin
function registrasi($data)
{
    global $db;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);


    // cek username sudah ada atau belum 
    $result = mysqli_query($db, "SELECT username FROM admin WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('User Is Already Registered');
            </script>
            ";
        return false;
    }

    // cek konfirmasi password 
    if ($password !== $password2) {
        echo "
            <script>
                alert('Try Again!');
            </script>
            ";
        return false;
    }
    // enskirpsi password 
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan user baru ke db
    mysqli_query($db, "INSERT INTO admin VALUES(id,'$username','$password')");
    return mysqli_affected_rows($db);
}

// Regist Customer
function registrasic($data)
{
    global $db;

    $picture = strtolower($data["picture"]);
    $username = strtolower(stripslashes($data["username"]));
    $name = (stripslashes($data["name"]));
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);

    // cek username sudah ada atau belum 
    $result = mysqli_query($db, "SELECT username FROM customer WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('User Is Already Registered');
            </script>
            ";
        return false;
    }

    // cek konfirmasi password 
    if ($password !== $password2) {
        echo "
            <script>
                alert('Try Again!');
            </script>
            ";
        return false;
    }
    // enskirpsi password 
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan user baru ke db
    mysqli_query($db, "INSERT INTO customer VALUES(id,'$picture','$username','$name','$email','$password')");
    return mysqli_affected_rows($db);
}

// tambah data product
function tambah($data)
{
    global $db;
    //ambil dari data dari tiap elemen dalam form
    $nama = htmlspecialchars($data["nama"]);
    $spesifikasi = htmlspecialchars($data["spesifikasi"]);
    $stock = htmlspecialchars($data["stock"]);
    $price = htmlspecialchars($data["price"]);

    // upload gambar 
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    //query insert data
    $query = "INSERT INTO product 
    VALUES (id, '$nama', '$spesifikasi', '$stock', '$price', '$gambar')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// upload image product
function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gambar yg diupload
    if ($error === 4) {
        echo "<script>
        alert('pilih gambar terlebih dahulu!');
            </script>";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['JPG', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    // fungsi explode itu string jadi array , kalau nama 
    // filenya qibar.jpg itu menjadi ['qibar','jpg']
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('Yang anda upload bukan gambar');
            </script>";
        return false;
    }

    //cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
        alert('max size 1MB, Try again!');
            </script>";
        return false;
    }

    // lolos pengecekan, gambar siap di upload
    // dan generate nama baru 
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, '../image/product/' . $namaFileBaru);
    return $namaFileBaru;
}

// ubah data product
function ubah($data)
{
    global $db;
    //ambil dari data dari tiap elemen dalam form
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $spesifikasi = htmlspecialchars($data["spesifikasi"]);
    $stock = htmlspecialchars($data["stock"]);
    $price = htmlspecialchars($data["price"]);

    // cek apakah user pilih gambar baru atau tidak 
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    //query insert data
    $query = "UPDATE product SET 
                nama = '$nama',
                spesifikasi = '$spesifikasi',
                stock = '$stock',
                price = '$price',
                gambar = '$gambar'

                WHERE id = $id
                ";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// checkout
function checkout($data)
{
    global $db;
    $id = $_GET["id"];
    $quantity = $_SESSION['quantity'];
    $stock = htmlspecialchars($data["stock"]);

    $jumlah = $stock - $quantity;

    $query = "UPDATE product SET 
                stock = '$jumlah'
                
                WHERE id = $id
                ";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// hapus data product & image di local
function hapus($query)
{
    global $db;
    $file = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM product WHERE id='$query'"));
    unlink('../image/product/' . $file["gambar"]);
    $hapus = "DELETE FROM product WHERE id='$query'";
    mysqli_query($db, $hapus);
    return mysqli_affected_rows($db);
}

// upload image profile
function uploadpicture()
{
    $nameFile = $_FILES['picture']['name'];
    $sizeFile = $_FILES['picture']['size'];
    $tmpName = $_FILES['picture']['tmp_name'];

    //cek apakah yang diupload adalah gambar
    $extensionGambarValid = ['JPG', 'jpeg', 'png'];
    $extensionGambar = explode('.', $nameFile);
    // fungsi explode itu string jadi array , kalau nama 
    // filenya qibar.jpg itu menjadi ['qibar','jpg']
    $extensionGambar = strtolower(end($extensionGambar));
    if (!in_array($extensionGambar, $extensionGambarValid)) {
        echo "<script>
        alert('Yang anda upload bukan gambar');
            </script>";
        return false;
    }

    //cek jika ukurannya terlalu besar
    if ($sizeFile > 2000000) {
        echo "<script>
        alert('Max size file 2MB, Try Again!');
            </script>";
        return false;
    }

    // lolos pengecekan, gambar siap di upload
    // dan generate nama baru 
    $nameFileBaru = uniqid();
    $nameFileBaru .= '.';
    $nameFileBaru .= $extensionGambar;


    move_uploaded_file($tmpName, '../image/profile/' . $nameFileBaru);
    return $nameFileBaru;
}

// ubah profile
function changeprofile($data)
{
    global $db;
    //ambil dari data dari tiap elemen dalam form
    $id = $_SESSION["id"];
    $username = htmlspecialchars($data["username"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);

    // cek apakah user pilih gambar baru atau tidak 
    $pictureOld = htmlspecialchars($data["pictureOld"]);
    if ($_FILES['picture']['error'] === 4) {
        $picture = $pictureOld;
    } else {
        $picture = uploadpicture();
    }

    //query insert data
    $query = "UPDATE customer SET picture = '$picture', username = '$username', nama = '$nama', email = '$email' WHERE id = $id";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// format rupiah
function rupiah($angka)
{
    $hasil = "Rp " . number_format($angka, '2', ',', '.');
    return $hasil;
}