<?php 

include '../config.php';

$id_invoice = $_POST['id_invoice'];
$kostumer = 0;
$bahan_jual = 0;
$sub_total = 0;
$jumlah = 0;
$kd_toko = $_POST['kd_toko'];
$id_admin = $_POST['id_admin'];
$id_bahan = 0;
$jf_id = 0;
$jp_id = 0;
$jd_id = 0;
$jns_brg = $_POST['jenis_barang'];
$produk_id = $_POST['produk'];
$ket_produk = $_POST['ket_produk'];
$datetime = date('Y-m-d H:i:s');

mysqli_query($config,"INSERT INTO orderan VALUES ('','$kd_toko','$id_invoice','$jns_brg','$produk_id','$id_bahan','$jd_id','$jf_id','$jp_id','$ket_produk','','$jumlah','$bahan_jual','$sub_total','$datetime','','')");


header("location:cs_edit.php?id=$id_invoice&alert=data-add");