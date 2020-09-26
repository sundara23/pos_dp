<?php 

include '../config.php';

$id_invoice = $_POST['id_invoice'];
$kostumer = $_POST['kostumer'];
$id_hj = $_POST['id_hj'];
$harga_satuan = $_POST['harga_satuan'];
$sub_total = $_POST['sub_total'];
$jumlah = $_POST['jumlah'];
$panjang = $_POST['panjang'];
$lebar = $_POST['lebar'];

$datetime = date('Y-m-d H:i:s');


$keterangan = "Ukuran : ".$panjang."x".$lebar."<br/>Luas : ".$lebar." (Meter Persegi)";

mysqli_query($config,"INSERT INTO orderan VALUES ('','$id_invoice','$id_hj','$keterangan','$jumlah','$harga_satuan','$sub_total','$datetime')");


// update total
$tot = 0;
$data = mysqli_query($config,"select * from orderan where order_invoice='$id_invoice'");
while($d=mysqli_fetch_array($data)){
	$tot += $d['order_harga_sub_total'];
}
mysqli_query($config,"update invoice set invoice_kostumer='$kostumer', invoice_total='$tot' where invoice_id='$id_invoice'");


header("location:wo_edit.php?id=$id_invoice&alert=data-add");