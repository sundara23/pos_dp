<html>
<head>
    <title> Faskal Laporan Excel</title>
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
                                <th colspan="7"class="text-center bg-blue-300">JURNAL UMUM</th>
                            </tr>
                            <?php
                            $debit = mysqli_query($config,"select sum(amount) as debit from arus_kas_subentry where type='0'");
                            $totaldebit = mysqli_fetch_assoc($debit);
                            $masuk= $totaldebit['debit'];
                            $kredit = mysqli_query($config,"select sum(amount) as kredit from arus_kas_subentry where type='1'");
                            $totalkredit = mysqli_fetch_assoc($kredit);
                            $keluar= $totalkredit['kredit'];
                            ?>
                            <tr>
                                <th colspan="3" class="text-center bg-grey-300">Jumlah</th>
                                <th colspan="2" class="text-center bg-grey-300">Rp. <?php echo number_format($masuk)?></th>
                                <th colspan="2" class="text-center bg-grey-300">Rp. <?php echo number_format($keluar)?></th>
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
                            $aruskas = mysqli_query($config,"select * from arus_kas order by tgl_ak desc");
                            while($ak=mysqli_fetch_array($aruskas)){
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo date('d/m/Y',strtotime($ak['tgl_ak'])); ?></td>
                                    <td><?php echo $ak['ket_ak']; ?></td>
                                    <?php
                                    $subentry = mysqli_query($config,"select * from arus_kas_subentry where arus_kas_id='".$ak['id_arus_kas']."'");
                                    while($aks=mysqli_fetch_array($subentry)){
                                        $data3 = mysqli_query($config,"select * from ak_tabel where id_ak='".$aks['ak_tabel_id']."'");
                                        $ak_tabel = mysqli_fetch_assoc($data3);
                                    ?>
                                    <td><?php echo $ak_tabel['id_ak'].' - '.$ak_tabel['nama']; ?></td>
                                    <td><?php echo $aks['amount']; ?></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>

                            </tbody>

                            </tbody>
</table>

</body>
</html>