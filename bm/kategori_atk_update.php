<?php 

include '../config.php';
$id = $_POST['id'];

$nama = $_POST['nama'];


mysqli_query($config,"update kategori_atk set nama_kategori='$nama' where kd_kategori_atk='$id'");
header("location:kategori_atk.php?alert=data-update");