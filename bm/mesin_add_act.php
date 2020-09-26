<?php 

include '../config.php';

$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$tipe = $_POST['tipe'];
$hpp = $_POST['hpp'];

mysqli_query($config,"INSERT INTO mesin VALUES ('','$nama','$tipe','$kategori','$hpp')");
header("location:ma.php?alert=data-add");