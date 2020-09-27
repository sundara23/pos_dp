<?php 

include '../config.php';
$id = $_GET['id'];

mysqli_query($config,"delete from satuan_bahan where kd_satuan='$id'");

header("location:satuan_bahan.php?alert=data-hapus");