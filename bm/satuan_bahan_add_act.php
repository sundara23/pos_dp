<?php 

include '../config.php';

$nama = $_POST['nama'];

mysqli_query($config,"INSERT INTO satuan_bahan VALUES ('','$nama')");
header("location:satuan_bahan.php?alert=data-add");