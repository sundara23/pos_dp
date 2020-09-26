<?php 

include '../config.php';

$id = $_GET['id'];
$id_invoice = $_GET['id_invoice'];

mysqli_query($config,"delete from orderan where order_id='$id'");

// update total
$data = mysqli_query($config,"select * from orderan where order_invoice='$id_invoice'");
while($d=mysqli_fetch_array($data)){
	$tot += $d['order_harga_sub_total'];
}
mysqli_query($config,"update invoice set invoice_total='$tot' where invoice_id='$id_invoice'");


header("location:wo_edit.php?id=$id_invoice&alert=data-hapus");