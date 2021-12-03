<?php
require "functions.php";

// ambil data di URL
$idMeteran = $_GET["idMeteran"];

// query data pelanggan berdasarkan idMeteran
$plgn = query("SELECT * FROM pelanggan WHERE idMeteran = $idMeteran")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {

    //cek apakah data berhasil diubah atau tidak
    if( ubah($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = 'index.php';
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
    <title>Update data pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<body>
    <div class="mx-auto">
            <!-- untuk memasukkan data -->
            <div class="card">
                <div class="card-header">
                    <h1>Update data pelanggan</h1>
                </div>
                <div class="card-body">

                    <form action="" method="post">
                        <input type="hidden" name="idMeteran" value="<?= $plgn["idMeteran"]; ?>">
                        <ul>

                            <div class="form-floating mb-3">
                                <label for="namaPelanggan"></label>
                                <input type="text" class="form_control" name="namaPelanggan" id="namaPelanggan" placeholder ="Nama"
                                required value="<?= $plgn["namaPelanggan"] ?>">
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form_control" name="alamatPelanggan" id="alamatPelanggan" placeholder ="Alamat"
                                required value="<?= $plgn["alamatPelanggan"] ?>">
                            </div>
                                <select class="form_select mb-3" name="idGolongan" id="idGolongan"
                                required="">
                                    <option selected>ID Golongan</option>
                                    <option value="2A">2A</option>
                                    <option value="2B">2B</option>
                                    <option value="2C">2C</option>
                                </select>
                            <div>
                                <button class="btn btn-primary" type="submit" name="submit">Ubah Data</button>
                                <br>
                                <a href="index.php" class="btn btn-info">Back</a> </button>
                            </div>

                        </ul>

                    </form>
                    </div>
        </div>

    </div>


</body>
</html>