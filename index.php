<?php
require "functions.php";
$pelanggan = query("SELECT * FROM pelanggan");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PDAM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

<h1>Daftar Pelanggan</h1>

<a href="tambah.php" class="btn btn-outline-dark">Tambah Data Pelanggan</a>
<br>
<a href="index.php" class="btn btn-outline-warning">Beranda Data Pelanggan</a>

<a href="index_petugas.php" class="btn btn-outline-warning">Beranda Data Petugas</a>

<a href="index_tagihan.php" class="btn btn-outline-warning">Beranda Data Tagihan</a>
<br><br><br>

<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>Aksi</th>
        <th>ID Meteran</th>
        <th>Nama Pelanggan</th>
        <th>Alamat Pelanggan</th>
        <th>ID Golongan</th>
    </tr>

    <?php foreach( $pelanggan as $row ) : ?>
    <tr>
        <td>
        <a href="ubah.php?idMeteran=<?= $row["idMeteran"]; ?>" class="btn btn-dark btn-sm">Update</a>|
        <a href="hapus.php?idMeteran=<?= $row["idMeteran"]; ?>" class="btn btn-dark btn-sm" onclick="return confirm('Apakah anda yakin?');">Delete</a>
        </td>
        <td><?= $row["idMeteran"]; ?></td>
        <td><?= $row["namaPelanggan"]; ?></td>
        <td><?= $row["alamatPelanggan"]; ?></td>
        <td><?= $row["idGolongan"]; ?></td>
    </tr>
    <?php endforeach; ?>


</table>

</body>
</html>