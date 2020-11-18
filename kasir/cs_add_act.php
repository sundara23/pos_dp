<?php 

include '../config.php';

$trx_id = $_POST['id_invoice'];
$kd_toko = $_POST['kd_toko'];
$id_admin = $_POST['id_admin'];
$id_bahan = 0;
$jns_brg = $_POST['jenis_barang'];
$produk_id = $_POST['produk'];
$ket_produk = $_POST['ket_produk'];
$datetime = date('Y-m-d H:i:s');
$tgl = date('Y-m-d');

$data1 = mysqli_query($config,"INSERT INTO transaksi VALUES ('', '$trx_id', '$kd_toko', '$tgl', '$jns_brg', '', '', '', '', '', '', '','', '8', '$id_admin')");
$data2 = mysqli_query($config,"INSERT INTO orderan VALUES ('','$kd_toko','$trx_id','$jns_brg','$produk_id','$id_bahan','','','','$ket_produk','','','','','','$datetime','','')");

if ($data1 == TRUE && $data2 == TRUE ){
    header("location:cs_edit.php?id=$trx_id&alert=data-add");
	 }else{
    header("location:cs_edit.php?id=$trx_id&alert=data-gagal");
}