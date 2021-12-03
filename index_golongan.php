<?php
require "functions.php";
$golongan = query("SELECT * FROM golongan");
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

<h1>Daftar Golongan</h1>

<br>
<a href="index.php" class="btn btn-outline-warning">Beranda Data Pelanggan</a>

<a href="index_petugas.php" class="btn btn-outline-warning">Beranda Data Petugas</a>

<a href="index_tagihan.php" class="btn btn-outline-warning">Beranda Data Tagihan</a>
<br><br><br>

<table border="1" cellpadding="10" cellspacing="0">

    <tr>

        <th>ID Golongan</th>
        <th>Tarif Golongan</th>
    </tr>

    <?php foreach( $golongan as $row ) : ?>
    <tr>
        <td><?= $row["idGolongan"]; ?></td>
        <td><?= $row["tarifGolongan"]; ?></td>
    </tr>
    <?php endforeach; ?>


</table>

</body>
</html>