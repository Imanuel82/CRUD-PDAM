<?php
require "functions.php";

// ambil data di URL
$idPetugas = $_GET["idPetugas"];

// query data petugas berdasarkan idPetugas
$ptgs = query("SELECT * FROM petugas WHERE idPetugas = $idPetugas")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {

    //cek apakah data berhasil diubah atau tidak
    if( ubah_petugas($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index_petugas.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = 'index_petugas.php';
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
    <title>Update data petugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<body>
    <div class="mx-auto">
            <!-- untuk memasukkan data -->
            <div class="card">
                <div class="card-header">
                    <h1>Update data petugas</h1>
                </div>
                <div class="card-body">
                    
                    <form action="" method="post">
                        <input type="hidden" name="idPetugas" value="<?= $ptgs["idPetugas"]; ?>">
                        <ul>

                            <div class="form-floating mb-3">
                                <label for="namaPetugas"></label>
                                <input type="text" class="form_control" name="namaPetugas" id="namaPetugas" placeholder ="Nama"
                                required value="<?= $ptgs["namaPetugas"] ?>">
                            </div>
                            <div class="form-floating mb-3">
                                <label for="alamatPetugas"></label>
                                <input type="text" class="form_control" name="alamatPetugas" id="alamatPetugas" placeholder ="Alamat"
                                required value="<?= $ptgs["alamatPetugas"] ?>">
                            </div>
                            <div>
                                <button class="btn btn-primary" type="submit" name="submit">Ubah Data</button>
                                <br>
                                <a href="index_petugas.php" class="btn btn-info">Back</a> </button>
                            </div>
                            
                        </ul>

                    </form>
                    </div>
        </div>

    </div>


</body>
</html>