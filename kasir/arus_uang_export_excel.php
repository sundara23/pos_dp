<html>
<head>
    <title> Faskal Laporan</title>
</head>
<body>

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
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan-arus-uang-" . tanggal_indo($getbln)."-".$getthn .".xls");
$toko = mysqli_query($config,"select * from toko where kd_toko='$kdtoko'");
$tk = mysqli_fetch_assoc($toko);
?>

<h4 align="center"><?php echo strtoupper($tk['nama_toko']);?></h4>
<h4 align="center">Arus Uang Bulan <?php echo tanggal_indo($getbln);?></h4>
<h4 align="center">Tahun <?php echo $getthn;?></h4>
<h4 align="center">[ <?php echo $box['nama'];?> ] </h4>
<table border="1">
    <thead>
        <tr class="bg-grey-300">
            <th colspan="2" class="text-center" bgcolor="#808080">MASUK</th>
            <th colspan="2" class="text-center" bgcolor="#808080">KELUAR</th>
            <th colspan="3" class="text-center" bgcolor="#808080">SALDO</th>
        </tr>
        <tr>
            <?php
            $trx = mysqli_query($config,"select sum(debit) as totalmasuk, sum(kredit) as totalkeluar from arus_kas where kd_toko='$kdtoko' and id_ak = '$getcashbox' and month(tgl_ak)='$getbln' and year(tgl_ak)='$getthn'");
            $total = mysqli_fetch_assoc($trx);
            $totalmasuk= $total['totalmasuk'];
            $totalkeluar = $total['totalkeluar'];
            $saldo = $totalmasuk - $totalkeluar;
            ?>
            <th colspan="2" class="text-center text-blue">Rp. <?php echo number_format($totalmasuk); ?></th>
            <th colspan="2" class="text-center text-danger">Rp. <?php echo number_format($totalkeluar); ?></th>
            <th colspan="3" class="text-center text-green-600">Rp. <?php echo number_format($saldo); ?></th>
        </tr>
        <tr class="bg-grey-300">
            <th colspan="7" class="text-center" bgcolor="#808080">DATA TRANSAKSI</th>
        </tr>
        <tr>
            <th width="1%">No</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>User</th>
            <th>Debit</th>
            <th>Kredit</th>
            <th>KAS / BANK</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $data = mysqli_query($config,"select * from arus_kas, kostumer, ak_tabel where arus_kas.id_ak=ak_tabel.id_ak and arus_kas.user=kostumer.kostumer_id and arus_kas.kd_toko='$kdtoko' and arus_kas.id_ak = '$getcashbox' and month(arus_kas.tgl_ak)='$getbln' and year(arus_kas.tgl_ak)='$getthn' order by tgl_ak desc");
        while($d=mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo date('d/m/Y',strtotime($d['tgl_ak'])); ?></td>
                <td><?php echo $d['ket_ak'] ?></td>
                <td><?php echo $d['kostumer_nama'] ?></td>
                <td><?php echo $d['debit'] ?> </td>
                <td><?php echo $d['kredit'] ?></td>
                <td> <?php echo $d['nama'] ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

</body>
</html>