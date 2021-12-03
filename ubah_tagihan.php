<?php
require "functions.php";

// ambil data di URL
$nomorTagihan = $_GET["nomorTagihan"];

// query data petugas berdasarkan idPetugas
$tghn = query("SELECT * FROM tagihan WHERE nomorTagihan = $nomorTagihan")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {

    //cek apakah data berhasil diubah atau tidak
    if( ubah_tagihan($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index_tagihan.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah!');
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
    <title>Update data tagihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<body>
    <div class="mx-auto">
            <!-- untuk memasukkan data -->
            <div class="card">
                <div class="card-header">
                    <h1>Update data tagihan</h1>
                </div>
                <div class="card-body">
                    
                    <form action="" method="post">
                        <input type="hidden" name="nomorTagihan" value="<?= $tghn["nomorTagihan"]; ?>">
                            <ul>
                                <div class="form-floating mb-3">
                                    <label for="idMeteran"></label>
                                    <input type="text" class="form_control" name="idMeteran" id="idMeteran" placeholder ="ID Meteran"
                                    required value="<?= $tghn["idMeteran"] ?>">
                                </div>
                                <div class="form-floating mb-3">
                                    <label for="tanggalTagihan"></label>
                                    <input type="date" class="form_control" name="tanggalTagihan" id="tanggalTagihan" placeholder ="Tanggal Tagihan"
                                    required value="<?= $tghn["tanggalTagihan"]; ?>">
                                </div>
                                <div class="form-floating mb-3">
                                    <label for="standAwal"></label>
                                    <input type="text" class="form_control" name="standAwal" id="standAwal" placeholder ="Stand Awal"
                                    required value="<?= $tghn["standAwal"]; ?>">
                                </div>
                                <div class="form-floating mb-3">
                                    <label for="standAkhir"></label>
                                    <input type="text" class="form_control" name="standAkhir" id="standAkhir" placeholder ="Stand Akhir"
                                    required value="<?= $tghn["standAkhir"]; ?>">
                                </div>
                                <div class="form-floating mb-3">
                                    <label for="angsuran"></label>
                                    <input type="text" class="form_control" name="angsuran" id="angsuran" placeholder ="Angsuran"
                                    required value="<?= $tghn["angsuran"]; ?>">
                                </div>
                                <div class="form-floating mb-3">
                                    <label for="materai"></label>
                                    <input type="text" class="form_control" name="materai" id="materai" placeholder ="Materai"
                                    required value="<?= $tghn["materai"]; ?>">
                                </div>
                                <div class="form-floating mb-3">
                                    <label for="administrasi"></label>
                                    <input type="text" class="form_control" name="administrasi" id="administrasi" placeholder ="Administrasi"
                                    required value="<?= $tghn["administrasi"]; ?>">
                                </div>
                                <div class="form-floating mb-3">
                                    <label for="idPetugas"></label>
                                    <input type="text" class="form_control" name="idPetugas" id="idPetugas" placeholder ="ID Petugas"
                                    required value="<?= $tghn["idPetugas"]; ?>">
                                </div>
                                <div>
                                    <select class="form_select mb-3" name="statusTagihan" id="statusTagihan"
                                    required value="<?= $tghn["statusTagihan"]; ?>">
                                        <option selected>Status Tagihan</option>
                                        <option value="lunas">lunas</option>
                                        <option value="belum lunas">belum lunas</option>
                                    </select>
                                </div>
                                <div>
                                    <button class="btn btn-primary" type="submit" name="submit">Ubah Data</button>
                                    <br>
                                    <a href="index_tagihan.php" class="btn btn-info">Back</a> </button>
                                </div>

                                
                            </ul>

                    </form>
                    </div>
        </div>

    </div>


</body>
</html>