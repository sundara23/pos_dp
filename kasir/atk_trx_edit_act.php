<?php 

include '../config.php';

$trx_id = $_POST['id_invoice'];
$kd_toko = $_POST['kd_toko'];
$id_admin = $_POST['id_admin'];
$jns_brg = $_POST['jenis_barang'];
$produk_id = $_POST['produk_atk'];
$datetime = date('Y-m-d H:i:s');

mysqli_query($config,"INSERT INTO orderan_atk VALUES ('','$kd_toko','$trx_id','$produk_id','','','','$datetime')");


header("location:atk_trx_edit.php?id=$trx_id");