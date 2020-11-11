<?php

include '../config.php';

$id_invoice = $_POST['id_invoice'];
$np = $_POST['nilai_pengeluaran'];
$pengeluaran = str_replace(".", "", $np);
$ket_pengeluaran = $_POST['ket_pengeluaran'];
$simpanke = $_POST['simpan_trx'];
$tgl = date('Y-m-d');
$trx_admin_id = $_POST['trx_admin_id'];
$kd_toko= $_POST['kd_toko'];
//echo $id_invoice.' , '.$piutang.' , '.$simpanke;

mysqli_query($config,"INSERT INTO arus_kas VALUES ('','$tgl','$simpanke','$kd_toko','0','','$pengeluaran','0','$ket_pengeluaran','$trx_admin_id')");

header("location:arus_uang.php?alert=data-add");