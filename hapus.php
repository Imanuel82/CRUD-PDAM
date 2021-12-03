<?php
require 'functions.php';

$idMeteran = $_GET["idMeteran"];

if(hapus($idMeteran) > 0 ) {
    echo "
        <script>
            alert('data pelanggan berhasil dihapus!');
            document.location.href = 'index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('data pelanggan gagal dihapus!');
            document.location.href = 'index.php';
        </script>
    ";
}

?>