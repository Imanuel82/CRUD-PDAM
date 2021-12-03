<?php
require "functions.php";

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {

    //cek apakah data berhasil ditambahkan atau tidak
    if( tambah_petugas($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index_petugas.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
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
    <title>Tambah data petugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<body>
    <div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header">
                <h1>Tambah data petugas</h1>
            </div>
            <div class="card-body">
                
                <form action="" method="post">
                    <ul>

                        <div class="form-floating mb-3">
                            <label for="namaPetugas"></label>
                            <input type="text" class="form_control" name="namaPetugas" id="namaPetugas" placeholder ="Nama"
                            required="">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="alamatPetugas"></label>
                            <input type="text" class="form_control" name="alamatPetugas" id="alamatPetugas" placeholder ="Alamat"
                            required="">
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit" name="submit">Tambah Data</button>
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