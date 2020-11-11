<?php 

include '../config.php';
$id = $_GET['id'];

mysqli_query($config,"delete from kategori_atk where kd_kategori_atk='$id'");

header("location:kategori_atk.php?alert=data-hapus");