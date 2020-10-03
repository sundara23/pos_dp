<?php 

include '../config.php';

$id_invoice = $_POST['id_invoice'];
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



mysqli_query($config,"INSERT INTO orderan VALUES ('','$kd_toko','$id_invoice','$jns_brg','$produk_id','$id_bahan','$ket_produk','$jumlah','$bahan_jual','$sub_total','$datetime')");

// update total
$tot = 0;
$data = mysqli_query($config,"select * from orderan where order_invoice='$id_invoice'");
while($d=mysqli_fetch_array($data)){
	$tot += $d['order_harga_sub_total'];
}
mysqli_query($config,"update transaksi set trx_customer='$kostumer', trx_total_pembayaran='$tot' where trx_invoice='$id_invoice'");


header("location:wo_edit.php?id=$id_invoice&alert=data-add");