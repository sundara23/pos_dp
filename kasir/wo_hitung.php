<?php 

include '../config.php';

$id_invoice = $_POST['id_invoice'];
$harga_satuan = $_POST['harga_satuan'];
$id_order = $_POST['id_order'];
$qty = $_POST['jumlah_order'];
$biaya = $_POST['biaya_tambahan'];
$biaya_tambahan= str_replace(".", "", $biaya);
$qh = $qty * $harga_satuan;
$subtotal = $qh + $biaya_tambahan;

//$trx = mysqli_query($config,"select sum(order_harga_sub_total) as totaltrx from orderan where order_invoice='$id_invoice'");
//$jumlah = mysqli_fetch_assoc($trx);
//$jumlahtrx = $jumlah['totaltrx'];

mysqli_query($config,"update orderan set order_harga_satuan='$harga_satuan', biaya_tambahan='$biaya_tambahan', order_harga_sub_total='$subtotal' where order_id='$id_order'");
//mysqli_query($config,"update transaksi set trx_total_pembayaran='$jumlahtrx' where trx_invoice='$id_invoice'");
//
header("location:wo_edit.php?id=$id_invoice");