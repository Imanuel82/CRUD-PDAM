<?php
require "functions.php";

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {

    //cek apakah data berhasil ditambahkan atau tidak
    if( tambah($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
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
    <title>Tambah data pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<body>
    <div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header">
                <h1>Tambah data pelanggan</h1>
            </div>
            <div class="card-body">
                
                <form action="" method="post">
                    <ul>

                        <div class="form-floating mb-3">
                            <label for="idMeteran"></label>
                            <input type="text" class="form_control" name="idMeteran" id="idMeteran" placeholder ="ID Meteran"
                            required="">
                        </div>

                        <div class="form-floating mb-3">
                            <label for="namaPelanggan"></label>
                            <input type="text" class="form_control" name="namaPelanggan" id="namaPelanggan" placeholder ="Nama"
                            required="">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="alamatPelanggan"></label>
                            <input type="text" class="form_control" name="alamatPelanggan" id="alamatPelanggan" placeholder ="Alamat"
                            required="">
                        </div>
                            <select class="form_select mb-3" name="idGolongan" id="idGolongan"
                            required="">
                                <option selected>ID Golongan</option>
                                <option value="2A">2A</option>
                                <option value="2B">2B</option>
                                <option value="2C">2C</option>
                            </select>
                        <div>
                            <button class="btn btn-primary" type="submit" name="submit">Tambah Data</button>
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