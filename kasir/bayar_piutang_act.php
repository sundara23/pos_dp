<?php

include '../config.php';

$id_invoice = $_POST['id_invoice'];
$piutang = $_POST['piutang'];
$simpanke = $_POST['simpan_trx'];
$tgl = date('Y-m-d');
$trx_admin_id = $_POST['trx_admin_id'];
$kd_toko= $_POST['kd_toko'];
$trx_costumer= $_POST['trx_costumer'];
//echo $id_invoice.' , '.$piutang.' , '.$simpanke;

mysqli_query($config,"update transaksi set trx_ar='0', trx_dp='0' where trx_invoice='$id_invoice'");
mysqli_query($config,"INSERT INTO arus_kas VALUES ('','$tgl','$simpanke','$kd_toko','CTK','$piutang','','$trx_costumer','Pembayaran Piutang','$trx_admin_id')");

header("location:piutang.php?alert=data-add");