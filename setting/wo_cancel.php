<?php 

include '../config.php';

$id_invoice = $_GET['id'];

mysqli_query($config,"update transaksi set trx_status='9' where trx_invoice='$id_invoice'");
header("location:index.php?alert=data-batal");