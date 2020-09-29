<?php 

include '../config.php';

$kd_bhn = $_POST['kd_bhn'];
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$hpp = $_POST['hpp'];
$jual = $_POST['jual'];

mysqli_query($config,"INSERT INTO bahan VALUES ('$kd_bhn','$nama','$kategori','$hpp','$jual')");
header("location:ma.php?alert=data-add");