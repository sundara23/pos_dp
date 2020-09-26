<?php 

include '../config.php';
$id = $_POST['id'];

$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$tipe = $_POST['tipe'];
$hpp = $_POST['hpp'];


mysqli_query($config,"update mesin set mesin_nama='$nama', mesin_tipe='$tipe', mesin_kategori='$kategori', mesin_hpp='$hpp' where mesin_id='$id'");
header("location:ma.php?alert=data-update");