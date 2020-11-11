<?php 

include '../config.php';
$id = $_GET['id'];

mysqli_query($config,"delete from satuan_atk where kd_satuan='$id'");

header("location:satuan_atk.php?alert=data-hapus");