<?php 

include '../config.php';
$id = $_GET['id'];

mysqli_query($config,"delete from produk where produk_id='$id'");

header("location:produk_dp.php?alert=data-hapus");