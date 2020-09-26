<?php 

include '../config.php';
$id = $_GET['id'];

mysqli_query($config,"delete from jenis_potong where jenis_potong_id='$id'");

header("location:ma.php?alert=data-hapus");