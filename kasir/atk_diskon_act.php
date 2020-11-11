<?php

include '../config.php';

$id_invoice = $_POST['id_invoice'];
$dd = $_POST['diskon'];
$diskon = str_replace(".", "", $dd);

mysqli_query($config,"update transaksi set trx_diskon='$diskon' where trx_invoice='$id_invoice'");

header("location:atk_trx_edit.php?id=$id_invoice");