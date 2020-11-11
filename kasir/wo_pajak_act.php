<?php

include '../config.php';

$id_invoice = $_POST['id_invoice'];
$pp = $_POST['pajak'];
$pajak = str_replace(".", "", $pp);

mysqli_query($config,"update transaksi set trx_pajak='$pajak' where trx_invoice='$id_invoice'");

header("location:wo_edit.php?id=$id_invoice");