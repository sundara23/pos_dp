<?php 

include '../config.php';

$id = $_GET['id'];

mysqli_query($config,"delete from orderan where order_invoice='$id'");

mysqli_query($config,"delete from invoice where invoice_id='$id'");

header("location:index.php?alert=data-hapus");