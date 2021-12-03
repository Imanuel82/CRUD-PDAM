<?php
require "functions.php";
$petugas = query("SELECT * FROM petugas");
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

<h1>Daftar Petugas</h1>

<a href="tambah_petugas.php" class="btn btn-outline-dark">Tambah Data Petugas</a> </button>
<br>
<a href="index.php" class="btn btn-outline-warning">Beranda Data Pelanggan</a> </button>

<a href="index_petugas.php" class="btn btn-outline-warning">Beranda Data Petugas</a> </button>

<a href="index_tagihan.php" class="btn btn-outline-warning">Beranda Data Tagihan</a> </button>

<a href="index_golongan.php" class="btn btn-outline-info">Info Golongan</a>
<br><br><br>

<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>Aksi</th>
        <th>ID Petugas</th>
        <th>Nama Petugas</th>
        <th>Alamat Petugas</th>
    </tr>

    <?php foreach( $petugas as $row ) : ?>
    <tr>
        <td>
            <a href="ubah_petugas.php?idPetugas=<?= $row["idPetugas"]; ?>" class="btn btn-dark btn-sm">Update</a>|
            <a href="hapus_petugas.php?idPetugas=<?= $row["idPetugas"]; ?>" class="btn btn-dark btn-sm" onclick="return confirm('Apakah anda yakin?');">Delete</a>
        </td>
        <td><?= $row["idPetugas"]; ?></td>
        <td><?= $row["namaPetugas"]; ?></td>
        <td><?= $row["alamatPetugas"]; ?></td>
    </tr>
    <?php endforeach; ?>


</table>

</body>
</html>
