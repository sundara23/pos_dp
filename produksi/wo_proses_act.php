<?php 

include '../config.php';

$id = $_GET['id'];
$admin = $_GET['admin'];
$inv = $_GET['inv'];

mysqli_query($config,"UPDATE orderan SET admin2='$admin' WHERE order_id='$id'");

header("location:wo_detail.php?id=$inv&&alert=data-add");