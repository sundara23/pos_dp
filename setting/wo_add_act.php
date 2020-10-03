<?php 

include '../config.php';

$trx_id = $_POST['trx_id'];
$kostumer = $_POST['kostumer'];
$bahan_jual = $_POST['bahan_jual'];
$sub_total = $_POST['sub_total'];
$jumlah = $_POST['jumlah'];
$kd_toko = $_POST['kd_toko'];
$id_admin = $_POST['id_admin'];
$id_bahan = $_POST['id_bahan'];
$jns_brg = $_POST['jenis_barang'];
$produk_id = $_POST['produk'];
$ket_produk = $_POST['ket_produk'];

$datetime = date('Y-m-d H:i:s');

$tgl = date('Y-m-d');


mysqli_query($config,"INSERT INTO transaksi VALUES ('', '$trx_id', '$kd_toko', '$tgl', '$jns_brg', '', '', '$kostumer', '', '$sub_total','', '0', '$id_admin')");

mysqli_query($config,"INSERT INTO orderan VALUES ('','$kd_toko','$trx_id','$jns_brg','$produk_id','$id_bahan','$ket_produk','$jumlah','$bahan_jual','$sub_total','$datetime')");

header("location:wo_edit.php?id=$trx_id&alert=data-add");