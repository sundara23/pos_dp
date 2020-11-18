<?php

include '../config.php';

$np = $_POST['nilai_pengeluaran'];
$pengeluaran = str_replace(".", "", $np);
$ket_pengeluaran = $_POST['ket_pengeluaran'];
$simpanke = $_POST['pengeluaran'];
$datetime = date('Y-m-d H:i:s');
$trx_admin_id = $_POST['id_admin'];
$kd_toko= $_POST['kd_toko'];
$type = $_POST['type'];
$jumlahtype = count($type);

$data = mysqli_query($config,"INSERT INTO arus_kas VALUES ('','$datetime','$kd_toko','0','$ket_pengeluaran','$trx_admin_id')");
if($data == TRUE){
    $tampil = mysqli_query($config, "SELECT LAST_INSERT_ID()");
    while ($r=mysqli_fetch_array($tampil)) {
        $id = $r[0];
        for ($x = 0; $x < $jumlahtype; $x++) {
            mysqli_query($config, "INSERT INTO arus_kas_subentry VALUES ('','$kd_toko','$id','$simpanke[$x]','$pengeluaran','$type[$x]')");
        }
    }
    header("location:pengeluaran.php?alert=data-add");
}else{
    header("location:pengeluaran.php?alert=data-kesalahansistem");
}