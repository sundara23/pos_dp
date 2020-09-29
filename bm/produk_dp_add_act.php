<?php 

include '../config.php';

$kd_produk = $_POST['kd_produk'];
$nama = $_POST['nama'];

mysqli_query($config,"INSERT INTO produk VALUES ('$kd_produk','$nama')");
header("location:produk_dp.php?alert=data-add");