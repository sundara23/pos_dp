<?php 

include '../config.php';

$id = $_GET['id'];
$id_invoice = $_GET['id_invoice'];

mysqli_query($config,"delete from orderan_atk where order_atk_id='$id'");


header("location:atk_trx_edit.php?id=$id_invoice");