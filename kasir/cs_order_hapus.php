<?php 

include '../config.php';

$id = $_GET['id'];
$id_invoice = $_GET['id_invoice'];

mysqli_query($config,"delete from orderan where order_id='$id'");


header("location:cs_edit.php?id=$id_invoice&alert=data-hapus");