<?php 

include '../config.php';
$id = $_GET['id'];

mysqli_query($config,"delete from harga_jual where hj_id='$id'");

header("location:harga_jual.php?alert=data-hapus");