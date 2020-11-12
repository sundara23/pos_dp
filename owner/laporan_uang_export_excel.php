<html>
<head>
    <title> Faskal Laporan</title>
</head>
<body>

<?php
session_start();
if($_SESSION['level'] != "owner"){
    header("location:../index.php");
}

include '../config.php';
include '../function.php';

$getbln = $_GET['bulan'];
$getthn = $_GET['tahun'];
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
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan-arus-uang-" . tanggal_indo($getbln)."-".$getthn .".xls");
?>
<h4 align="center">Jurnal Umum <?php echo tanggal_indo($getbln);?></h4>
<h4 align="center">Tahun <?php echo $getthn;?></h4>
<table border="1">
<thead>
                            <tr>
                                <th colspan="9"class="text-center bg-blue-300">JURNAL UMUM</th>
                            </tr>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Tanggal</th>
                                <th rowspan="2">Keterangan</th>
                                <th colspan="2" class="text-center">Debit</th>
                                <th colspan="2" class="text-center">Kredit</th>
                            </tr>
                            <tr>
                                <td>Ket</td>
                                <td>Nilai</td>
                                <td>Ket</td>
                                <td>Nilai</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $data = mysqli_query($config,"select * from buku_besar inner join ak_tabel on buku_besar.id_ak = ak_tabel.id_ak where month(tgl_ak)='$getbln'");
                            while($d=mysqli_fetch_array($data)){
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['tgl_ak'] ?></td>
                                    <td><?php echo $d['ket_ak'] ?></td>
                                    <td><?php echo $d['id_ak'] ?> - <?php echo $d['nama'] ?></td>
                                    <td>Rp. <?php echo number_format($d['debit']) ?></td>
                                    <td><?php echo $d['id_ak'] ?> - <?php echo $d['nama'] ?></td>
                                    <td>Rp. <?php echo number_format($d['kredit']) ?></td>
                                </tr>
                            <?php } ?>

                             <?php
                                        $trx = mysqli_query($config,"select sum(debit) as totaldebit, sum(kredit) as totalkredit from buku_besar where month(tgl_ak)='$getbln'");
                                        $total = mysqli_fetch_assoc($trx);
                                        $total_debit= $total['totaldebit'];
                                        $total_kredit = $total['totalkredit'];
                             ?>

                            <tr>
                                <th colspan="3" class="text-center">Jumlah</th>
                                <th colspan="2" class="text-center">Rp. <?php echo number_format($total_debit)?></th>
                                <th colspan="2" class="text-center">Rp. <?php echo number_format($total_kredit)?></th>
                            </tr>

                            </tbody>
</table>

</body>
</html>