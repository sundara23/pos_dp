<?php 

include '../config.php';
$id = $_GET['id'];

mysqli_query($config,"delete from produk_atk where kd_produk='$id'");

header("location:produk_atk.php?alert=data-hapus");