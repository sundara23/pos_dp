<?php 

include '../config.php';
$id = $_GET['id'];

mysqli_query($config,"delete from level_harga where id_level_harga='$id'");

header("location:level_harga.php?alert=data-hapus");