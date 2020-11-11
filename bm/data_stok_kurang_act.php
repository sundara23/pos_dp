<?php

include '../config.php';

$kd_produk = $_POST['produk_jual'];
$stok = $_POST['stok'];
$datetime = date('Y-m-d H:i:s');
mysqli_query($config,"INSERT INTO data_stok VALUES ('','$kd_produk','0','1','$stok','$datetime')");
header("location:data_stok.php?alert=data-add");