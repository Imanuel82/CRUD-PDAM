<?php
require "functions.php";
$tagihan = query("SELECT * FROM tagihan");
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

<h1>Daftar Tagihan</h1>

<a href="tambah_tagihan.php" class="btn btn-outline-dark">Tambah Data Tagihan</a> </button>
<br>
<a href="index.php" class="btn btn-outline-warning">Beranda Data Pelanggan</a> </button>

<a href="index_petugas.php" class="btn btn-outline-warning">Beranda Data Petugas</a> </button>

<a href="index_tagihan.php" class="btn btn-outline-warning">Beranda Data Tagihan</a> </button>

<a href="index_golongan.php" class="btn btn-outline-info">Info Golongan</a>
<br><br><br>

<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>Aksi</th>
        <th>Nomor Tagihan</th>
        <th>ID Meteran</th>
        <th>Tanggal Tagihan</th>
        <th>Stand Awal</th>
        <th>Stand Akhir</th>
        <th>Angsuran</th>
        <th>Materai</th>
        <th>Administrasi</th>
        <th>ID Petugas</th>
        <th>Status Tagihan</th>
    </tr>

    <?php foreach( $tagihan as $row ) : ?>
    <tr>
        <td>
            <a href="ubah_tagihan.php?nomorTagihan=<?= $row["nomorTagihan"]; ?>" class="btn btn-dark btn-sm">Update</a>|
            <a href="hapus_tagihan.php?nomorTagihan=<?= $row["nomorTagihan"]; ?>" class="btn btn-dark btn-sm" onclick="return confirm('Apakah anda yakin?');">Delete</a>
            <br>
            <a href="detail_cetak.php?nomorTagihan=<?= $row["nomorTagihan"]; ?>" class="btn btn-warning btn-sm">Cetak</a>
        </td>
        <td><?= $row["nomorTagihan"]; ?></td>
        <td><?= $row["idMeteran"]; ?></td>
        <td><?= $row["tanggalTagihan"]; ?></td>
        <td><?= $row["standAwal"]; ?></td>
        <td><?= $row["standAkhir"]; ?></td>
        <td><?= $row["angsuran"]; ?></td>
        <td><?= $row["materai"]; ?></td>
        <td><?= $row["administrasi"]; ?></td>
        <td><?= $row["idPetugas"]; ?></td>
        <td><?= $row["statusTagihan"]; ?></td>
        
    </tr>
    <?php endforeach; ?>


</table>

</body>
</html>
