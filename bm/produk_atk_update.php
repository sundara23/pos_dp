<?php 

include '../config.php';
$id = $_POST['id'];

$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$harga_awal = $_POST['harga_awal'];


mysqli_query($config,"update produk_atk set nama_produk='$nama', kd_kategori_atk='$kategori', produk_harga='$harga_awal' where kd_produk='$id'");
header("location:produk_atk.php?alert=data-update");