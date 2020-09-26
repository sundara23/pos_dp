<?php 

include '../config.php';

$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$hpp = $_POST['hpp'];

mysqli_query($config,"INSERT INTO bahan VALUES ('','$nama','$kategori','$hpp')");
header("location:ma.php?alert=data-add");