<?php 

include '../config.php';
$id = $_POST['id'];

$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$hpp = $_POST['hpp'];
$jual = $_POST['jual'];


mysqli_query($config,"update bahan set bahan_nama='$nama', bahan_kategori='$kategori', bahan_hpp='$hpp', bahan_jual='$jual' where bahan_id='$id'");
header("location:ma.php?alert=data-update");