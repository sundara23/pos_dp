<?php 

include '../config.php';
$id = $_GET['id'];

mysqli_query($config,"delete from bahan where bahan_id='$id'");

header("location:ma.php?alert=data-hapus");