<?php 

include '../config.php';
$id = $_POST['id'];

$nama_level = $_POST['nama_level'];
$harga_level = $_POST['harga_level'];


mysqli_query($config,"update level_harga set nama_level='$nama_level', harga_level='$harga_level' where id_level_harga='$id'");
header("location:level_harga.php?alert=data-update");