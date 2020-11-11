<?php 

include '../config.php';

$kd_produk = $_POST['produk_jual'];
$nama_level = $_POST['nama_level'];
$harga_level = $_POST['harga_level'];

mysqli_query($config,"INSERT INTO level_harga VALUES ('','$kd_produk','$nama_level','$harga_level')");
header("location:level_harga.php?alert=data-add");