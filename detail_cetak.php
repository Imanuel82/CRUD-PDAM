<?php
    require "fpdf.php";
    include "functions.php";

    $nomorTagihan = $_GET['nomorTagihan'];

    $id_Meteran = query("select idMeteran from pelanggan natural join tagihan where nomorTagihan = '$nomorTagihan'")[0]['idMeteran'];
    $id_nama = query("select namaPelanggan from pelanggan natural join tagihan where nomorTagihan = '$nomorTagihan'")[0]['namaPelanggan'];
    $id_alamat = query("select alamatPelanggan from pelanggan natural join tagihan where nomorTagihan = '$nomorTagihan'")[0]['alamatPelanggan'];
    $id_golongan = query("select idGolongan from pelanggan natural join tagihan where nomorTagihan = '$nomorTagihan'")[0]['idGolongan'];
    $id_tanggal = query("select tanggalTagihan from tagihan where nomorTagihan = '$nomorTagihan'")[0]['tanggalTagihan'];
    $id_standAwal = query("select standAwal from tagihan where nomorTagihan = '$nomorTagihan'")[0]['standAwal'];
    $id_standAkhir = query("select standAkhir from tagihan where nomorTagihan = '$nomorTagihan'")[0]['standAkhir'];
    $id_pakai = $id_standAkhir - $id_standAwal;

    $id_angsuran = query("select angsuran from tagihan where nomorTagihan = '$nomorTagihan'")[0]['angsuran'];

    $id_tarif = query("select tarifGolongan from golongan natural join tagihan where idGolongan = '$id_golongan'")[0]['tarifGolongan'];

    $id_rek = $id_pakai * $id_tarif;

    $id_materai = query("select materai from tagihan where nomorTagihan = '$nomorTagihan'")[0]['materai'];

    $id_administrasi = query("select administrasi from tagihan where nomorTagihan ='$nomorTagihan'")[0]['administrasi'];

    $id_status = query("select statusTagihan from tagihan where nomorTagihan ='$nomorTagihan'")[0]['statusTagihan'];

    $id_transaksi = $id_Meteran + $nomorTagihan;

    if($id_angsuran == 0) {
        $id_total = $id_rek + $id_administrasi + $id_materai;
    }else{
        $id_total = $id_angsuran + $id_administrasi +$id_materai;
    }


    $id_angsuran = number_format($id_angsuran);
    $id_rek = number_format($id_rek);
    $id_materai = number_format($id_materai);
    $id_administrasi = number_format($id_administrasi);
    $id_total = number_format($id_total);


    $pdf = new FPDF("p","mm","a4");
    $pdf->AddPage();

    $pdf->SetFont("Arial","B",20);
    $pdf->Cell(190,7,'BUKTI TRANSAKSI PDAM',0,1,'C');
    $pdf->Cell(150,3,   "",0,2);


    $pdf->SetFont("Arial","",12);

    $pdf->Cell(190,5,"ID Transaksi : $id_golongan$id_transaksi$nomorTagihan",0,2,'C');
    $pdf->Cell(190,3,   "",0,2);
    $pdf->Cell(190,3,   "",0,2);
    $pdf->Cell(150,3,   "",0,2);


    $pdf->Cell(130,5,"No. Tagihan       : $nomorTagihan",0,0);
    $pdf->Cell(59,5,"Angsuran           : Rp $id_angsuran",0,1);
    $pdf->Cell(130,5,"ID Meteran         : $id_Meteran",0,0);
    $pdf->Cell(59,5,"Rek Air               : Rp $id_rek",0,1);
    $pdf->Cell(130,5,"Nama                 : $id_nama",0,0);
    $pdf->Cell(59,5,"Materai               : Rp $id_materai",0,1);
    $pdf->Cell(130,5,"Alamat               : $id_alamat",0,0);
    $pdf->Cell(59,5,"Administrasi       : Rp $id_administrasi",0,1);
    
    $pdf->Cell(130,5,"Tarif                   : $id_golongan",0,0);
    $pdf->Cell(130,5,"-------------------------------------------- +",0,1);

    $pdf->Cell(130,5,"Pakai                 : $id_pakai",0,2);

    $pdf->Cell(59,5,"Tanggal             : $id_tanggal",0,1);

    $pdf->Cell(195,5,"Total        : Rp $id_total.00  ($id_status)",0,0,'R');

    $pdf->Output();

?>
