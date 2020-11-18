<?php

include '../config.php';

$id_invoice = $_POST['id_invoice'];
$piutang = $_POST['piutang'];
$type = $_POST['type'];
$simpanke = $_POST['simpan_trx'];
$datetime = date('Y-m-d H:i:s');
$trx_admin_id = $_POST['trx_admin_id'];
$kd_toko= $_POST['kd_toko'];
$ket_piutang = $_POST['ket_piutang'];
$trx_costumer= $_POST['trx_costumer'];
$jumlahtype = count($type);
//echo $id_invoice.' , '.$piutang.' , '.$simpanke;

$data1 = mysqli_query($config,"update transaksi set trx_ar='0', trx_dp='0' where trx_invoice='$id_invoice'");
$data2 = mysqli_query($config,"INSERT INTO arus_kas VALUES ('','$datetime','$kd_toko','$trx_costumer','$ket_piutang','$trx_admin_id')");
if($data1 == TRUE && $data2 == TRUE){
    $tampil = mysqli_query($config, "SELECT LAST_INSERT_ID()");
    while ($r=mysqli_fetch_array($tampil)) {
        $id = $r[0];
        for ($x = 0; $x < $jumlahtype; $x++) {
            mysqli_query($config, "INSERT INTO arus_kas_subentry VALUES ('','$kd_toko','$id','$simpanke[$x]','$piutang','$type[$x]')");
        }
    }
    header("location:piutang.php?alert=data-add");
}else{
    header("location:piutang.php?alert=data-kesalahansistem");
}