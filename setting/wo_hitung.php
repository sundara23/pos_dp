<?php 

include '../config.php';

$id_invoice = $_POST['id_invoice'];
$harga_satuan = $_POST['harga_satuan'];
$id_order = $_POST['id_order'];
$qty = $_POST['jumlah_order'];
$biaya_tambahan = $_POST['biaya_tambahan'];

$qh = $qty * $harga_satuan;
$subtotal = $qh + $biaya_tambahan;
mysqli_query($config,"update orderan set order_harga_satuan='$harga_satuan', biaya_tambahan='$biaya_tambahan', order_harga_sub_total='$subtotal' where order_id='$id_order'");

header("location:wo_edit.php?id=$id_invoice&alert=data-update");