<?php
session_start();

// cek user login
if (!isset($_SESSION["loginadmin"])) {
    header("Location: login.php");
    exit;
}

// koneksi
require '../functions.php';

// ambil data di url berdasarkan id
$id = $_GET["id"];

if (hapus($id) > 0) {
    echo "
            <script>
                alert('data berhasil dihapus!');
                document.location.href = 'product.php';
            </script>
       ";
} else {
    echo "
            <script>
                alert('data gagal dihapus!');
                document.location.href = 'product.php';
            </script>
       ";
}