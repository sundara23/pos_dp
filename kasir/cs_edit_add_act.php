<?php 

include '../config.php';

$id_invoice = $_POST['id_invoice'];
$kd_toko = $_POST['kd_toko'];
$id_bahan = 0;
$jns_brg = $_POST['jenis_barang'];
$produk_id = $_POST['produk'];
$ket_produk = $_POST['ket_produk'];
$datetime = date('Y-m-d H:i:s');

$data = mysqli_query($config,"INSERT INTO orderan VALUES ('','$kd_toko','$id_invoice','$jns_brg','$produk_id','$id_bahan','','','','$ket_produk','','','','','','$datetime','','')");
if ($data == TRUE){
    header("location:cs_edit.php?id=$id_invoice&alert=data-add");
}else{
    header("location:cs_edit.php?id=$id_invoice&alert=data-gagal");
}
