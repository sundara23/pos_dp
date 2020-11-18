
<?php
session_start();
if($_SESSION['level'] != "kasir"){
    header("location:../index.php");
}

include '../config.php';
include '../function.php';

$getbln = $_GET['bulan'];
$getthn = $_GET['tahun'];
$getcashbox = $_GET['simpan_trx'];
$kdtoko = $_SESSION['kd_toko'];
$id_admin = $_SESSION['id'];
function tanggal_indo($tanggal)
{
    $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split = explode('-', $tanggal);
    return $bulan[ (int)$split[0] ];
}
$cashbox = mysqli_query($config,"select * from ak_tabel where id_ak='$getcashbox'");
$box = mysqli_fetch_assoc($cashbox);
$toko = mysqli_query($config,"select * from toko where kd_toko='$kdtoko'");
$tk = mysqli_fetch_assoc($toko);

#setting judul laporan dan header tabel
$namatoko = strtoupper($tk['nama_toko']);
$namabulantahun = "Arus Uang Bulan ".tanggal_indo($getbln)." Tahun ".$getthn;
$namakas = "[ ".$box['nama']." ]";

$kdtoko = $_SESSION['kd_toko'];
$id_admin = $_SESSION['id'];;
$masuk = 0;
$keluar = 0;
$datamasuk = mysqli_query($config,"select * from arus_kas_subentry where kd_toko='$kdtoko' and ak_tabel_id>'1111' and ak_tabel_id<'1115' and type='0'");
while($d=mysqli_fetch_array($datamasuk)){
    $data1x = mysqli_query($config,"select * from arus_kas where id_arus_kas='".$d['arus_kas_id']."'");
    $arus_kasx = mysqli_fetch_assoc($data1x);
    if(date('m',strtotime($arus_kasx['tgl_ak'])) == $getbln && date('Y',strtotime($arus_kasx['tgl_ak'])) == $getthn && $d['ak_tabel_id'] == $getcashbox) {
        $masuk += $d['amount'];
    }
}
$datakeluar = mysqli_query($config,"select * from arus_kas_subentry where kd_toko='$kdtoko' and ak_tabel_id>'1111' and ak_tabel_id<'1115' and type='1'");
while($d=mysqli_fetch_array($datakeluar)){
    $data2x = mysqli_query($config,"select * from arus_kas where id_arus_kas='".$d['arus_kas_id']."'");
    $arus_kasxx = mysqli_fetch_assoc($data2x);
    if(date('m',strtotime($arus_kasxx['tgl_ak'])) == $getbln && date('Y',strtotime($arus_kasxx['tgl_ak'])) == $getthn && $d['ak_tabel_id'] == $getcashbox) {
        $keluar += $d['amount'];
    }
}
$saldo = $masuk - $keluar;

$header = array(
    array("label"=>"MASUK", "length"=>63, "align"=>"C"),
    array("label"=>"KELUAR", "length"=>63, "align"=>"C"),
    array("label"=>"SALDO", "length"=>60, "align"=>"C")
);

$headerisi = array(
    array("label"=>"$masuk", "length"=>63, "align"=>"C"),
    array("label"=>"$keluar", "length"=>63, "align"=>"C"),
    array("label"=>"$saldo", "length"=>60, "align"=>"C")
);

$headertrx = array(
    array("label"=>"DATA TRANSAKSI", "length"=>186, "align"=>"C")
);

$headertrxjdl = array(
    array("label"=>"No", "length"=>13, "align"=>"C"),
    array("label"=>"Tanggal", "length"=>20, "align"=>"C"),
    array("label"=>"Keterangan", "length"=>50, "align"=>"C"),
    array("label"=>"Debit", "length"=>34, "align"=>"C"),
    array("label"=>"Kredit", "length"=>34, "align"=>"C"),
    array("label"=>"Jenis Kas", "length"=>35, "align"=>"C")
);

require('../assets/fpdf182/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();

#tampilkan judul laporan
$pdf->SetFont('Arial','B','16');
$pdf->Cell(0,20, $namatoko, '0', 1, 'C');
$pdf->Cell(0,0, $namabulantahun, '0', 1, 'C');
$pdf->Cell(0,20, $namakas, '0', 1, 'C');

#buat header tabel
$pdf->SetFont('Arial','','10');
$pdf->SetDrawColor(0, 127, 0);
$pdf->SetFillColor(0, 255, 0);
$pdf->SetTextColor(0);
foreach ($header as $kolom) {
    $pdf->Cell($kolom['length'], 10, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
foreach ($headerisi as $kolomisi) {
    $pdf->Cell($kolomisi['length'], 10, $kolomisi['label'], 1, '0', $kolomisi['align'], true);
}
$pdf->Ln();
$pdf->SetFont('Arial','','10');
$pdf->SetDrawColor(0, 127, 0);
$pdf->SetFillColor(0, 255, 0);
$pdf->SetTextColor(0);
foreach ($headertrx as $kolomtrx) {
    $pdf->Cell($kolomtrx['length'], 10, $kolomtrx['label'], 1, '0', $kolomtrx['align'], true);
}
$pdf->Ln();
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
foreach ($headertrxjdl as $kolomjdl) {
    $pdf->Cell($kolomjdl['length'], 10, $kolomjdl['label'], 1, '0', $kolomjdl['align'], true);
}
$pdf->Ln();
$pdf->SetFont('Arial','',8);
$no = 1;
$data = mysqli_query($config,"select * from arus_kas_subentry where kd_toko='$kdtoko' and ak_tabel_id>'1111' and ak_tabel_id<'1115'");
while($d=mysqli_fetch_array($data)) {
    $data1 = mysqli_query($config, "select * from arus_kas where id_arus_kas='" . $d['arus_kas_id'] . "'");
    $arus_kas = mysqli_fetch_assoc($data1);
    $data2 = mysqli_query($config, "select * from admin where id='" . $arus_kas['admin_by'] . "'");
    $admin = mysqli_fetch_assoc($data2);
    $data3 = mysqli_query($config, "select * from ak_tabel where id_ak='" . $d['ak_tabel_id'] . "'");
    $ak_tabel = mysqli_fetch_assoc($data3);
    if (date('m', strtotime($arus_kas['tgl_ak'])) == $getbln && date('Y', strtotime($arus_kas['tgl_ak'])) == $getthn && $d['ak_tabel_id'] == $getcashbox) {
        $pdf->Cell(13,10,$no++,1,0, 'C');
        $pdf->Cell(20,10,date('d/m/Y', strtotime($arus_kas['tgl_ak'])),1,0, 'C');
        $pdf->Cell(50,10,$arus_kas['ket_ak'],1,0, 'L');
        if ($d['type'] == 0) {
            $pdf->Cell(34,10,number_format($d['amount']),1,0, 'C');
        } else {
            $pdf->Cell(34,10,'0',1,0, 'C');
        }
        if ($d['type'] == 1) {
            $pdf->Cell(34,10,number_format($d['amount']),1,0, 'C');
        } else {
            $pdf->Cell(34,10,'0',1,0, 'C');
        }
        $pdf->Cell(35,10,$ak_tabel['nama'],1,0, 'C');
        $pdf->Ln();
    }
}
$pdf->Output();
?>