<?php 

include '../config.php';

$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$hpp = $_POST['hpp'];
$jual = $_POST['jual'];

mysqli_query($config,"INSERT INTO bahan VALUES ('','$nama','$kategori','$hpp','$jual')");
header("location:ma.php?alert=data-add");