<?php
//Koneksi ke Database
$db = mysqli_connect("localhost", "root", "", "gudangcomputer");

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

function registrasi($data)
{
    global $db;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);


    // cek username sudah ada atau belum 
    $result = mysqli_query($db, "SELECT username FROM user WHERE username = '$username'");

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
                alert('konfirmasi password tidak sesuai');
            </script>
            ";
        return false;
    }
    // enskirpsi password 
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan user baru ke db
    mysqli_query($db, "INSERT INTO user VALUES(id,'$username','$password')");
    return mysqli_affected_rows($db);
}

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
        alert('Ukuran gambar terlalu besar !');
            </script>";
        return false;
    }

    // lolos pengecekan, gambar siap di upload
    // dan generate nama baru 
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, 'image/' . $namaFileBaru);
    return $namaFileBaru;
}

function hapus($query)
{
    global $db;
    $file = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM product WHERE id='$query'"));
    unlink('image/' . $file["gambar"]);
    $hapus = "DELETE FROM product WHERE id='$query'";
    mysqli_query($db, $hapus);
    return mysqli_affected_rows($db);
}

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

function cari($keyword)
{
    $query = "SELECT * FROM product
                WHERE
            nama LIKE '%$keyword%' OR
            spesifikasi LIKE '%$keyword%' OR
            stock LIKE '%$keyword%' OR
            price LIKE '%$keyword%'
            ";
    return query($query);
}