<?php
require '../functions.php';
$keyword = $_GET["keyword"];
$query = $query = "SELECT * FROM product
                    WHERE
                    nama LIKE '%$keyword%' OR
                    stock LIKE '%$keyword%' OR
                    price LIKE '%$keyword%' OR
                    ";

$product = query($query);

?>

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
            <td><a href="image/<?= $row["gambar"] ?>" target="_blank"><img src="image/<?= $row["gambar"] ?>" alt="" width="80px"></a></td>
        </tr>

        <?php $i++ ?>
    <?php endforeach; ?>

</table>