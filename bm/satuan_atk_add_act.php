<?php 

include '../config.php';

$nama = $_POST['nama'];

mysqli_query($config,"INSERT INTO satuan_atk VALUES ('','$nama')");
header("location:satuan_atk.php?alert=data-add");