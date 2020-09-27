<?php 

include '../config.php';
$id = $_POST['id'];

$nama = $_POST['nama'];
$hpp = $_POST['hpp'];


mysqli_query($config,"update produk set produk_nama='$nama' where produk_id='$id'");
header("location:produk_dp.php?alert=data-update");