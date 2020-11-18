<?php

include '../config.php';
$id_invoice = $_GET['id'];

$data = mysqli_query($config,"update transaksi set trx_status='9' where trx_invoice='$id_invoice'");
if ($data == TRUE){
    header("location:cs.php?alert=data-batal");
}else{
    header("location:cs.php?alert=data-gagalhapus");
}