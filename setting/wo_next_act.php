<?php 

include '../config.php';

$id = $_GET['id'];
$status = $_GET['status'];

$data = mysqli_query($config,"UPDATE transaksi SET trx_status='$status' WHERE trx_invoice='$id'");
if ($data == TRUE){
    header("location:index.php?alert=data-alihkan");
}else{
    header("location:index.php?alert=data-gagalalihkan");
}