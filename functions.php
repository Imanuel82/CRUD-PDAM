<?php
//koneksi ke database
$db = mysqli_connect("localhost", "root", "", "pdam1");


function query($query) {
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

// function data pelanggan
function tambah($data) {
    global $db;

    $idMeteran = htmlspecialchars($data["idMeteran"]);
    $namaPelanggan = htmlspecialchars($data["namaPelanggan"]);
    $alamatPelanggan = htmlspecialchars($data["alamatPelanggan"]);
    $idGolongan = htmlspecialchars($data["idGolongan"]);

    //query insert data
    $query = ("INSERT INTO pelanggan
                VALUES 
            ('$idMeteran','$namaPelanggan','$alamatPelanggan','$idGolongan')")
            ;
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


function hapus($id) {
    global $db;
    mysqli_query($db, "DELETE FROM pelanggan WHERE idMeteran = $id");

    return mysqli_affected_rows($db);
}


function ubah($data) {
    global $db;

    $idMeteran = $data["idMeteran"];
    $namaPelanggan = htmlspecialchars($data["namaPelanggan"]);
    $alamatPelanggan = htmlspecialchars($data["alamatPelanggan"]);
    $idGolongan = htmlspecialchars($data["idGolongan"]);

    //query insert data
    $query = "UPDATE pelanggan SET idMeteran = '".$idMeteran."', namaPelanggan = '".$namaPelanggan."', alamatPelanggan = '".$alamatPelanggan."', idGolongan = '".$idGolongan."'
                WHERE idMeteran = $idMeteran";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


//function data petugas
function tambah_petugas($data) {
    global $db;

    $idPetugas = htmlspecialchars($data["idPetugas"]);
    $namaPetugas = htmlspecialchars($data["namaPetugas"]);
    $alamatPetugas = htmlspecialchars($data["alamatPetugas"]);

    //query insert data
    $query = ("INSERT INTO petugas
                VALUES 
            ('$idPetugas','$namaPetugas','$alamatPetugas')")
            ;
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


function hapus_petugas($id) {
    global $db;
    mysqli_query($db, "DELETE FROM petugas WHERE idPetugas = $id");

    return mysqli_affected_rows($db);
}


function ubah_petugas($data) {
    global $db;

    $idPetugas = $data["idPetugas"];
    $namaPetugas = htmlspecialchars($data["namaPetugas"]);
    $alamatPetugas = htmlspecialchars($data["alamatPetugas"]);

    //query insert data
    $query = "UPDATE petugas SET idPetugas = '".$idPetugas."', namaPetugas = '".$namaPetugas."', alamatPetugas = '".$alamatPetugas."'
                WHERE idPetugas = $idPetugas";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


//function data transaksi
function tambah_tagihan($data) {
    global $db;

    $nomorTagihan = htmlspecialchars($data["nomorTagihan"]);
    $idMeteran = htmlspecialchars($data["idMeteran"]);
    $tanggalTagihan = htmlspecialchars($data["tanggalTagihan"]);
    $standAwal = htmlspecialchars($data["standAwal"]);
    $standAkhir = htmlspecialchars($data["standAkhir"]);
    $angsuran = htmlspecialchars($data["angsuran"]);
    $materai = htmlspecialchars($data["materai"]);
    $administrasi = htmlspecialchars($data["administrasi"]);
    $idPetugas = htmlspecialchars($data["idPetugas"]);
    $statusTagihan = htmlspecialchars($data["statusTagihan"]);

    //query insert data
    $query = ("INSERT INTO tagihan
                VALUES 
            ('$nomorTagihan','$idMeteran','$tanggalTagihan','$standAwal','$standAkhir','$angsuran','$materai','$administrasi','$idPetugas','$statusTagihan')")
            ;
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


function hapus_tagihan($id) {
    global $db;
    mysqli_query($db, "DELETE FROM tagihan WHERE nomorTagihan = $id");

    return mysqli_affected_rows($db);
}


function ubah_tagihan($data) {
    global $db;

    $nomorTagihan = $data["nomorTagihan"];
    $idMeteran = htmlspecialchars($data["idMeteran"]);
    $tanggalTagihan = htmlspecialchars($data["tanggalTagihan"]);
    $standAwal = htmlspecialchars($data["standAwal"]);
    $standAkhir = htmlspecialchars($data["standAkhir"]);
    $angsuran = htmlspecialchars($data["angsuran"]);
    $materai = htmlspecialchars($data["materai"]);
    $administrasi = htmlspecialchars($data["administrasi"]);
    $idPetugas = htmlspecialchars($data["idPetugas"]);
    $statusTagihan = htmlspecialchars($data["statusTagihan"]);

    //query insert data
    $query = "UPDATE tagihan SET nomorTagihan = '".$nomorTagihan."', idMeteran = '".$idMeteran."', tanggalTagihan = '".$tanggalTagihan."', standAwal = '".$standAwal."', standAkhir = '".$standAkhir."', angsuran = '".$angsuran."', materai = '".$materai."', administrasi = '".$administrasi."', idPetugas = '".$idPetugas."', statusTagihan = '".$statusTagihan."'
                WHERE nomorTagihan = $nomorTagihan";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function cari($keyword) {
    $query = ("SELECT pelanggan.idMeteran, pelanggan.namaPelanggan, pelanggan.idGolongan, tagihan.tanggalTagihan, tagihan.standAwal, tagihan.standAkhir, tagihan.statusTagihan 
                FROM pelanggan LEFT JOIN tagihan ON pelanggan.idMeteran = tagihan.idMeteran
                WHERE pelanggan.idMeteran LIKE '%$keyword%' OR 
                pelanggan.namaPelanggan LIKE '%$keyword%' OR 
                pelanggan.idGolongan LIKE '%$keyword%' OR
                tagihan.tanggalTagihan LIKE '%$keyword%' OR
                tagihan.standAwal LIKE '%$keyword%' OR
                tagihan.standAkhir LIKE '%$keyword%' OR
                tagihan.statusTagihan LIKE '%$keyword%'
                ");
    return query($query);
}


?>