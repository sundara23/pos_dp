<?php 

include '../config.php';

$nama = $_POST['nama'];

mysqli_query($config,"INSERT INTO produk VALUES ('','$nama')");
header("location:produk_dp.php?alert=data-add");