<?php
require 'functions.php';

$nomorTagihan = $_GET["nomorTagihan"];

if(hapus_tagihan($nomorTagihan) > 0 ) {
    echo "
        <script>
            alert('data tagihan berhasil dihapus!');
            document.location.href = 'index_tagihan.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('data tagihan gagal dihapus!');
            document.location.href = 'index_tagihan.php';
        </script>
    ";
}

?>