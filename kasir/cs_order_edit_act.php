<?php 

include '../config.php';

$id = $_POST['id'];
$id_invoice = $_POST['id_invoice'];
$ket_produk = $_POST['ket_produk'];

$data = mysqli_query($config,"UPDATE orderan SET order_keterangan='$ket_produk' WHERE order_id='$id'");
if ($data == TRUE){
    header("location:cs_edit.php?id=$id_invoice&alert=data-update");
}else{
    header("location:cs_edit.php?id=$id_invoice&alert=data-gagalupdate");
}
