<?php 

include '../config.php';

$kd_produk = $_POST['kd_produk'];
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$stok = $_POST['stok_produk'];
$harga_awal = $_POST['harga_awal'];

mysqli_query($config,"INSERT INTO produk_atk VALUES ('$kd_produk','$nama','$kategori','$harga_awal')");
$datetime = date('Y-m-d H:i:s');
mysqli_query($config,"INSERT INTO data_stok VALUES ('','$kd_produk','1','0','$stok','$datetime')");
header("location:produk_atk.php?alert=data-add");