<?php
require "functions.php";
$pelanggan = query("SELECT pelanggan.idMeteran, pelanggan.namaPelanggan, pelanggan.idGolongan, tagihan.tanggalTagihan, tagihan.standAwal, tagihan.standAkhir, tagihan.statusTagihan FROM pelanggan LEFT JOIN tagihan ON pelanggan.idMeteran = tagihan.idMeteran;
");


// tombol cari ditekan
if(isset($_POST["cari"])) {
    $pelanggan = cari($_POST["keyword"]);
}


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {

    //cek apakah data berhasil ditambahkan atau tidak
    if( tambah_tagihan($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index_tagihan.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'index_tagihan.php';
            </script>
        ";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data tagihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<body>
    <div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header">
                <h1>Tambah data tagihan</h1>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <input type="text" name="keyword" size="40" autofocus
                    placeholder="Masukkan keyword pencarian..." autocomplete="off">
                    <button type="submit" name="cari" class="btn btn-secondary">Cari</button>
                    <a href="index_tagihan.php" class="btn btn-info">Back</a> </button>
                </form>
                <br>
                
                <table style="float:right" border="1" cellpadding="10" cellspacing="0">
                    <caption align = "top">TABEL RECORD TAGIHAN</caption>
                    <tr>
                        <th>ID Meteran</th>
                        <th>Nama Pelanggan</th>
                        <th>ID Golongan</th>
                        <th>Tanggal Tagihan</th>
                        <th>Stand Awal</th>
                        <th>Stand Akhir</th>
                        <th>Status Tagihan</th>
                    </tr>
                <?php foreach( $pelanggan as $row ) : ?>
                    <tr>
                        <td><?= $row["idMeteran"]; ?></td>
                        <td><?= $row["namaPelanggan"]; ?></td>
                        <td><?= $row["idGolongan"]; ?></td>
                        <td><?= $row["tanggalTagihan"]; ?></td>
                        <td><?= $row["standAwal"]; ?></td>
                        <td><?= $row["standAkhir"]; ?></td>
                        <td><?= $row["statusTagihan"]; ?></td>
                    </tr>
                <?php endforeach; ?>
                </table>
                <br>
                

                <form action="" method="post">
                    <ul>

                        <div class="form-floating mb-3">
                            <label for="idMeteran"></label>
                            <input type="text" class="form_control" name="idMeteran" id="idMeteran" placeholder ="ID Meteran"
                            required="">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="tanggalTagihan"></label>
                            <input type="date" class="form_control" name="tanggalTagihan" id="tanggalTagihan" placeholder ="Tanggal Tagihan"
                            required="">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="standAwal"></label>
                            <input type="text" class="form_control" name="standAwal" id="standAwal" placeholder ="Stand Awal"
                            required="">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="standAkhir"></label>
                            <input type="text" class="form_control" name="standAkhir" id="standAkhir" placeholder ="Stand Akhir"
                            required>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="angsuran"></label>
                            <input type="text" class="form_control" name="angsuran" id="angsuran" placeholder ="Angsuran"
                            required="">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="materai"></label>
                            <input type="text" class="form_control" name="materai" id="materai" placeholder ="Materai"
                            required="">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="administrasi"></label>
                            <input type="text" class="form_control" name="administrasi" id="administrasi" placeholder ="Administrasi"
                            required="">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="idPetugas"></label>
                            <input type="text" class="form_control" name="idPetugas" id="idPetugas" placeholder ="ID Petugas"
                            required="">
                        </div>
                        <div>
                            <select class="form_select mb-3" name="statusTagihan" id="statusTagihan"
                            required="">
                                <option selected>Status Tagihan</option>
                                <option value="lunas">lunas</option>
                                <option value="belum lunas">belum lunas</option>
                            </select>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit" name="submit">Tambah Data</button>
                        </div>
                    </ul>

                </form>
                </div>
        </div>

    </div>


</body>
</html>