<?php 

include '../config.php';

$id_invoice = $_POST['id_invoice'];

$ar = $_POST['ar'];
$dp = $_POST['dp'];
$disc = $_POST['disc'];
$status = $_POST['status'];
$payment = $_POST['payment'];




// for($a=0;$a<count($harga_satuan);$a++){
// 	$io = $id_order[$a];
// 	$ioo = mysqli_query($config,"select * from orderan where order_id='$io'");
// 	$iooo = mysqli_fetch_assoc($ioo);
// 	$q = $iooo['order_qty'];
// 	$sub_total = $iooo['order_harga_sub_total'];

// 	$bb = $sub_total/$q;
// 	$b = $bb*$qty[$a];

// 	$j = $qty[$a];
// 	$hs = $harga_satuan[$a];


// 	mysqli_query($config,"update orderan set order_qty='$j', order_harga_satuan='$hs', order_harga_sub_total='$b' where order_id='$io'");

// }



// update total
// $tot = 0;
// $data = mysqli_query($config,"select * from orderan where order_invoice='$id_invoice'");
// while($d=mysqli_fetch_array($data)){
// 	$tot += $d['order_harga_sub_total'];
// }
// mysqli_query($config,"update invoice set invoice_total='$tot' where invoice_id='$id_invoice'");

mysqli_query($config,"update invoice set invoice_status='$status', invoice_diskon='$disc', invoice_dp='$dp', invoice_ar='$ar', invoice_payment='$payment' where invoice_id='$id_invoice'");


header("location:wo_detail.php?id=$id_invoice&alert=data-update");