<?php
require 'functions.php';

$idPetugas = $_GET["idPetugas"];

if(hapus_petugas($idPetugas) > 0 ) {
    echo "
        <script>
            alert('data petugas berhasil dihapus!');
            document.location.href = 'index_petugas.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('data petugas gagal dihapus!');
            document.location.href = 'index_petugas.php';
        </script>
    ";
}

?>