<?php 

include '../config.php';

$id = $_GET['id'];
$status = $_GET['status'];

mysqli_query($config,"UPDATE transaksi SET trx_status='$status' WHERE trx_invoice='$id'");

header("location:index.php?alert=data-add");