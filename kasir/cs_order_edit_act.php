<?php 

include '../config.php';

$id = $_POST['id'];
$id_invoice = $_POST['id_invoice'];
$ket_produk = $_POST['ket_produk'];

mysqli_query($config,"UPDATE orderan SET order_keterangan='$ket_produk' WHERE order_id='$id'");


header("location:cs_edit.php?id=$id_invoice&alert=data-add");