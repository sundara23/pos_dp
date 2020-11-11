<?php 

include '../config.php';

$nama = $_POST['nama'];

mysqli_query($config,"INSERT INTO kategori_atk VALUES ('','$nama')");
header("location:kategori_atk.php?alert=data-add");