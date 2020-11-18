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
            ?>
            <th colspan="2" class="text-center text-blue">Rp. <?php echo number_format($masuk); ?></th>
            <th colspan="2" class="text-center text-danger">Rp. <?php echo number_format($keluar); ?></th>
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
            <th>Jenis Kas</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $kdtoko = $_SESSION['kd_toko'];
        //									$data = mysqli_query($config,"select * from arus_kas, admin where arus_kas.admin_by=admin.id and arus_kas.kd_toko='$kdtoko' order by tgl_ak desc");
        $data = mysqli_query($config,"select * from arus_kas_subentry where kd_toko='$kdtoko' and ak_tabel_id>'1111' and ak_tabel_id<'1115'");
        while($d=mysqli_fetch_array($data)){
            $data1 = mysqli_query($config,"select * from arus_kas where id_arus_kas='".$d['arus_kas_id']."'");
            $arus_kas = mysqli_fetch_assoc($data1);
            $data2 = mysqli_query($config,"select * from admin where id='".$arus_kas['admin_by']."'");
            $admin = mysqli_fetch_assoc($data2);
            $data3 = mysqli_query($config,"select * from ak_tabel where id_ak='".$d['ak_tabel_id']."'");
            $ak_tabel = mysqli_fetch_assoc($data3);
            if(date('m',strtotime($arus_kas['tgl_ak'])) == $getbln && date('Y',strtotime($arus_kas['tgl_ak'])) == $getthn && $d['ak_tabel_id'] == $getcashbox) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($arus_kas['tgl_ak'])); ?></td>
                    <td><?php echo $arus_kas['ket_ak'] ?></td>
                    <td><?php echo $admin['nama'] ?></td>
                    <td><?php if ($d['type'] == 0) {
                            echo number_format($d['amount']);
                        } else {
                            echo '0';
                        } ?></td>
                    <td><?php if ($d['type'] == 1) {
                            echo number_format($d['amount']);
                        } else {
                            echo '0';
                        } ?></td>
                    <td><?php echo $ak_tabel['nama'] ?></td>
                </tr>
                <?php
            } }
        ?>
    </tbody>
</table>

</body>
</html>