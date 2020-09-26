<?php 

include '../config.php';
$id = $_POST['id'];

$id = $_POST['id'];
$hargajual = $_POST['hargajual'];
$minimum_qty = $_POST['minimum_qty'];


mysqli_query($config,"update harga_jual set hj_harga='$hargajual', hj_min_qty='$minimum_qty' where hj_id='$id'");
header("location:harga_jual.php?alert=data-update");